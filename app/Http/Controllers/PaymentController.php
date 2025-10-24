<?php

namespace App\Http\Controllers;

use App\Models\Lots;
use App\Models\Payments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    private string $paymongoSecret = 'Basic c2tfdGVzdF9YNHZ1elRQZ0Z6Q05SWWUxb3NaWnlnaGU6';

    public function index()
    {
        $payments = Payments::with('lot')->get();
        return view('payments.index', compact('payments'));
    }

    public function create()
    {
        $lots = Lots::doesntHave('payment')->get();
        return view('payments.create', compact('lots'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'lot_id' => 'required|exists:lots,id',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'contact_number' => 'required|string|max:20',
            'telephone_number' => 'nullable|string|max:20',
            'payment_method' => 'required|string|in:gcash,paymaya',
            'payment_type' => 'required|string|in:partial,full',
        ]);

        $lot = Lots::findOrFail($request->lot_id);
        $amount = $lot->price ?? 0;

        $userData = [
            'name'  => $request->full_name,
            'email' => $request->email,
            'phone' => $request->contact_number,
        ];

        $successUrl = route('payments.success', ['lot_id' => $lot->id]);
        $cancelUrl  = route('payments.cancel', ['lot_id' => $lot->id]);

        // Determine payment amount
        $paymentAmount = $request->payment_type === 'partial' ? 50000 : $amount;

        // If payment is zero, save directly
        if ($paymentAmount <= 0) {
            Payments::create([
                'lot_id' => $lot->id,
                'full_name' => $request->full_name,
                'email' => $request->email,
                'contact_number' => $request->contact_number,
                'telephone_number' => $request->telephone_number,
                'total' => $amount,
                'amount_paid' => $amount,
                'payment_method' => 'free',
                'status' => 'paid',
            ]);
            $lot->update(['status' => 'sold']);

            return redirect($successUrl)->with('success', 'Payment not required. Lot marked as sold.');
        }

        // Create PayMongo checkout session
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => $this->paymongoSecret,
        ])->post('https://api.paymongo.com/v1/checkout_sessions', [
            'data' => [
                'attributes' => [
                    'billing' => $userData,
                    'line_items' => [[
                        'name' => $lot->lot_name ?? 'Lot Payment',
                        'description' => "Lot #{$lot->id} | {$request->full_name} | {$request->email}",
                        'amount' => intval($paymentAmount * 100),
                        'currency' => 'PHP',
                        'quantity' => 1,
                        'metadata' => [
                            'lot_id' => $lot->id,
                            'payment_type' => $request->payment_type,
                        ],
                    ]],
                    'payment_method_types' => [$request->payment_method],
                    'success_url' => $successUrl,
                    'cancel_url' => $cancelUrl,
                    'statement_descriptor' => 'Lot Payment',
                    'send_email_receipt' => true,
                ]
            ]
        ]);

        if (!$response->successful()) {
            Log::error('PayMongo Error:', $response->json());
            $data = $response->json();
            return back()->withErrors([
                'payment' => $data['errors'][0]['detail'] ?? 'Failed to create checkout session.',
            ]);
        }

        $checkout = $response->json();
        $attributes = $checkout['data']['attributes'];

        // Redirect to PayMongo checkout
        return redirect($attributes['checkout_url']);
    }

    public function webhook(Request $request)
    {
        Log::info('PayMongo Webhook Received:', $request->all());

        $payload = $request->all();
        if (!isset($payload['data']['attributes']['status'])) {
            return response()->json(['message' => 'Invalid webhook payload'], 400);
        }

        $status = $payload['data']['attributes']['status']; // 'paid', 'failed', etc.
        $checkoutId = $payload['data']['id'];

        // Only save if status is 'paid'
        if ($status !== 'paid') {
            return response()->json(['message' => 'Payment not completed, nothing saved']);
        }

        // Extract customer info and metadata
        $billing = $payload['data']['attributes']['billing'] ?? [];
        $lineItem = $payload['data']['attributes']['line_items'][0] ?? [];
        $metadata = $lineItem['metadata'] ?? [];
        $lotId = $metadata['lot_id'] ?? null;
        $paymentType = $metadata['payment_type'] ?? 'full';
        $amountPaid = ($payload['data']['attributes']['amount'] ?? 0) / 100;

        if (!$lotId) {
            return response()->json(['message' => 'Lot not found'], 404);
        }

        $lot = Lots::find($lotId);
        if (!$lot) {
            return response()->json(['message' => 'Lot not found'], 404);
        }

        // Determine status
        if ($paymentType === 'partial') {
            $statusToSave = 'partial';
            $lotStatus = 'reserved';
        } else {
            $statusToSave = 'paid';
            $lotStatus = 'sold';
        }

        // Save payment
        Payments::create([
            'lot_id' => $lot->id,
            'full_name' => $billing['name'] ?? 'Unknown',
            'email' => $billing['email'] ?? 'Unknown',
            'contact_number' => $billing['phone'] ?? null,
            'telephone_number' => null,
            'total' => $lot->price,
            'amount_paid' => $amountPaid,
            'payment_method' => $lineItem['payment_method'] ?? 'gcash',
            'status' => $statusToSave,
            'checkout_id' => $checkoutId,
        ]);

        $lot->update(['status' => $lotStatus]);

        return response()->json(['message' => 'Payment saved successfully']);
    }

    public function success()
    {
        return view('payments.success');
    }

    public function cancel()
    {
        return view('payments.cancel');
    }
}
