<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Lots;
use App\Models\Payments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    /**
     * Display a listing of payments.
     */
    public function index()
    {
        $payments = Payment::with('lot')->get();
        return view('payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new payment.
     */
    public function create()
    {
        $lots = Lots::doesntHave('payment')->get(); // only lots without payment
        return view('payments.create', compact('lots'));
    }

    /**
     * Store a newly created payment in storage and create a PayMongo checkout session.
     */
    public function store(Request $request)
    {
        $request->validate([
            'lot_id' => 'required|exists:lots,id|unique:payments,lot_id',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'contact_number' => 'required|string|max:20',
            'telephone_number' => 'nullable|string|max:20',
            'payment_method' => 'required|string|in:gcash,paymaya',
        ]);

        $lot = Lots::findOrFail($request->lot_id);
        $amount = $lot->price ?? 0;

        $userData = [
            'name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->contact_number,
        ];

        $successUrl = route('payments.success', ['lot_id' => $lot->id]);
        $cancelUrl = route('payments.cancel', ['lot_id' => $lot->id]);

        // If lot price is zero, skip PayMongo
        if ($amount <= 0) {
            Payments::create([
                'lot_id' => $lot->id,
                'full_name' => $request->full_name,
                'email' => $request->email,
                'contact_number' => $request->contact_number,
                'telephone_number' => $request->telephone_number,
                'payment_method' => 'free',
                'status' => 'paid',
            ]);

            return redirect($successUrl)->with('success', 'Payment not required. Lot marked as paid.');
        }

        // Create PayMongo checkout session
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Basic c2tfdGVzdF9YNHZ1elRQZ0Z6Q05SWWUxb3NaWnlnaGU6=', // replace with your secret key
        ])->post('https://api.paymongo.com/v1/checkout_sessions', [
            'data' => [
                'attributes' => [
                    'billing' => $userData,
                    'line_items' => [
                        [
                            'name' => $lot->lot_name,
                            'description' => 'Payment for lot',
                            'amount' => intval($amount * 100),
                            'currency' => 'PHP',
                            'quantity' => 1,
                        ]
                    ],
                    'payment_method_types' => [$request->payment_method],
                    'success_url' => $successUrl,
                    'cancel_url' => $cancelUrl,
                    'statement_descriptor' => 'Lot Payment',
                    'send_email_receipt' => true,
                ]
            ]
        ]);

        if (!$response->successful()) {
            $data = $response->json();
            return back()->withErrors([
                'payment' => $data['errors'][0]['detail'] ?? 'Failed to create checkout session',
            ]);
        }

        $checkout = $response->json();
        $attributes = $checkout['data']['attributes'];
        $checkoutId = $checkout['data']['id'];

        // Create payment record
        Payments::create([
            'lot_id' => $lot->id,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'contact_number' => $request->contact_number,
            'telephone_number' => $request->telephone_number,
            'payment_method' => $request->payment_method,
            'status' => 'unpaid',
            'checkout_id' => $checkoutId,
            'checkout_url' => $attributes['checkout_url'],
        ]);

        return redirect($attributes['checkout_url']);
    }

    /**
     * Display the specified payment.
     */
    public function show(Payments $payment)
    {
        return view('payments.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified payment.
     */
    public function edit(Payments $payment)
    {
        $lots = Lots::all();
        return view('payments.edit', compact('payment', 'lots'));
    }

    /**
     * Update the specified payment in storage.
     */
    public function update(Request $request, Payments $payment)
    {
        $request->validate([
            'lot_id' => 'required|exists:lots,id|unique:payments,lot_id,' . $payment->id,
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'contact_number' => 'required|string|max:20',
            'telephone_number' => 'nullable|string|max:20',
            'payment_method' => 'required|string|max:50',
            'status' => 'required|in:paid,unpaid,partial',
        ]);

        $payment->update($request->all());

        return redirect()->route('payments.index')->with('success', 'Payment updated successfully.');
    }

    /**
     * Remove the specified payment from storage.
     */
    public function destroy(Payments $payment)
    {
        $payment->delete();

        return redirect()->route('payments.index')->with('success', 'Payment deleted successfully.');
    }

    /**
     * PayMongo webhook handler
     */
    public function webhook(Request $request)
    {
        Log::info('PayMongo Webhook Received:', $request->all());

        $payload = $request->all();

        if (!isset($payload['data']['attributes']['status'])) {
            return response()->json(['message' => 'Invalid webhook payload'], 400);
        }

        $status = $payload['data']['attributes']['status'];
        $checkoutId = $payload['data']['id'];

        $payment = Payments::where('checkout_id', $checkoutId)->first();

        if (!$payment) {
            return response()->json(['message' => 'Payment record not found'], 404);
        }

        if ($status === 'paid') {
            $payment->update(['status' => 'paid']);

            if ($payment->lot) {
                $payment->lot->update(['status' => 'sold']); // or 'paid'
            }
        } elseif ($status === 'failed') {
            $payment->update(['status' => 'unpaid']);
        }

        return response()->json(['message' => 'Webhook processed successfully']);
    }

    /**
     * Optional success page
     */
    public function success(Request $request)
    {
        return view('payments.success');
    }

    /**
     * Optional cancel page
     */
    public function cancel(Request $request)
    {
        return view('payments.cancel');
    }
}
