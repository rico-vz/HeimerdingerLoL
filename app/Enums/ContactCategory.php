<?php

namespace App\Enums;

enum ContactCategory: string
{
    case Question = 'question';
    case Advertising = 'advertising';
    case BugReport = 'bug_report';
    case Feedback = 'feedback';
    case Other = 'other';

    public function humanReadable(): string
    {
        return match ($this) {
            ContactCategory::Question => 'Question',
            ContactCategory::Advertising => 'Advertising',
            ContactCategory::BugReport => 'Bug Report',
            ContactCategory::Feedback => 'Feedback',
            ContactCategory::Other => 'Other',
        };
    }
}
