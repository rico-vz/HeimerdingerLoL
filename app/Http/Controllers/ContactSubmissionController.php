<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactSubmissionRequest;
use App\Models\ContactSubmission;

class ContactSubmissionController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function store(ContactSubmissionRequest $request)
    {
        $contactSubmission = ContactSubmission::create($request->validated());

        return redirect()->route('contact.index')->with('success', 'Your message has been sent!');
    }
}
