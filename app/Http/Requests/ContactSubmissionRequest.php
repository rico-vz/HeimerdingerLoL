<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactSubmissionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'     => ['required', 'max:254'],
            'email'    => ['required', 'email', 'max:254'],
            'discord'  => ['nullable', 'min:2', 'max:35'],
            'category' => ['required', 'in:question,advertising,bug_report,feedback,other'],
            'subject'  => ['required', 'max:254'],
            'message'  => ['required', 'unique:contact_submissions', 'max:3500'],
            'h-captcha-response' => [
                'required',
                'HCaptcha',
            ],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'h-captcha-response.required' => 'Please verify that you are not a robot.',
            'h-captcha-response.h_captcha' => 'Failed to validate captcha.',
            'category.in' => 'Invalid category.',
            'message.unique' => 'You have already submitted this message.',
        ];
    }
}
