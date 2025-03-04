<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactSubmissionRequest;
use App\Models\ContactSubmission;
use Spatie\DiscordAlerts\Facades\DiscordAlert;

class ContactSubmissionController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function store(ContactSubmissionRequest $request)
    {
        $contactSubmission = ContactSubmission::create($request->validated());

        $descriptionContent = "**Name**: {$contactSubmission->name}\n\n**Email**: {$contactSubmission->email}\n\n**Category**: {$contactSubmission->category->humanReadable()}\n\n**Subject**: {$contactSubmission->subject}\n\n**Message**: {$contactSubmission->message}";

        if ($contactSubmission->discord) {
            $descriptionContent .= '


**Discord**: ' . $contactSubmission->discord;
        }

        DiscordAlert::message(sprintf('There is a new contact submission from %s (%s).', $contactSubmission->name, $contactSubmission->email), [
            [
                'title' => sprintf('%s - %s', $contactSubmission->category->humanReadable(), $contactSubmission->subject),
                'description' => $descriptionContent,
                'color' => '#ff8a4c',
            ],
        ]);

        return redirect()->route('contact.index')->with('success', 'Your message has been sent!');
    }
}
