<?php

namespace App\Http\Controllers;

use App\Exports\ContactsExport;
use App\Models\Contacts;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = ContactUs::orderBy('created_at', 'desc')->get();
        return view('admin.contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'phone_number' => 'required|digits:11',
            'message' => 'required|string|max:1000',
        ]);

        ContactUs::create($validated);

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Your contact has been submitted successfully']);
        }

        return redirect()->back()->with('Success', 'Your contact has been submitted successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactUs $contact)
    {
        $contact->delete();
        return redirect()->back()->with('success', 'Contact Deleted Successfully');
    }


    public function export()
    {
        return Excel::download(new ContactsExport, 'contacts.xlsx');
    }
}
