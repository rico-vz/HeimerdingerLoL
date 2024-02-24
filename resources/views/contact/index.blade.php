@extends('layouts.app')

@section('title', 'Heimerdinger.LoL • Contact')
@section('description',
    'Contact Heimerdinger.LoL for any inquiries, feedback, or suggestions. We are always looking to
    improve our website and content.')

    @push('top_scripts')
        {!! HCaptcha::renderJs() !!}
    @endpush

@section('content')
    <div class="mt-8 mb-24">
        <h1
            class="text-3xl font-bold text-center text-transparent uppercase sm:text-4xl bg-gradient-to-bl from-orange-300 to-orange-500 bg-clip-text">
            Get in Contact</h1>
        <p class="mb-2 text-sm italic text-center text-stone-400">* = required</p>

        @if ($errors->any())
            <div class="max-w-screen-md mx-auto mt-8 mb-8 prose prose-stone">
                <div class="p-4 text-red-700 bg-red-100 border-l-4 border-red-500">
                    <p class="font-bold">There was an error with your submission</p>
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        @if (session('success'))
            <div class="max-w-screen-md mx-auto mt-8 mb-8 prose prose-stone">
                <div class="p-4 text-green-700 bg-green-100 border-l-4 border-green-500">
                    <p class="font-bold">Success</p>
                    <p>{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <form method="POST" action="{{ route('contact.store') }}" class="max-w-screen-md mx-auto mt-2 prose prose-stone">
            @csrf
            @honeypot
            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm font-bold text-stone-300">Name <span
                        class="text-red-500">*</span></label>
                <input required type="text" id="name" name="name" maxlength="50"
                    class="w-full p-2 border-2 rounded border-stone-600 bg-stone-700 focus:outline-none focus:border-stone-500 text-stone-300">
            </div>
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-bold text-stone-300">Email <span
                        class="text-red-500">*</span></label>
                <input required type="email" id="email" name="email" maxlength="250"
                    class="w-full p-2 border-2 rounded border-stone-600 bg-stone-700 focus:outline-none focus:border-stone-500 text-stone-300">
            </div>
            <div class="mb-6">
                <label for="discord" class="block mb-2 text-sm font-bold text-stone-300">Discord <span
                        class="text-sm italic font-normal opacity-75">(optional)</span></label>
                <input type="text" id="discord" name="discord" maxlength="34"
                    class="w-full p-2 border-2 rounded border-stone-600 bg-stone-700 focus:outline-none focus:border-stone-500 text-stone-300">
            </div>
            <div class="mb-6">
                <label for="category" class="block mb-2 text-sm font-bold text-stone-300">Category <span
                        class="text-red-500">*</span></label>
                <select id="category" name="category"
                    class="w-full p-2 border-2 rounded border-stone-600 bg-stone-700 focus:outline-none focus:border-stone-500 text-stone-300">
                    <option value="question">Question</option>
                    <option value="advertising">Advertising</option>
                    <option value="bug_report">Bug Report</option>
                    <option value="feedback">Feedback</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="mb-6">
                <label for="subject" class="block mb-2 text-sm font-bold text-stone-300">Subject <span
                        class="text-red-500">*</span></label>
                <input required type="text" id="subject" name="subject" maxlength="200"
                    class="w-full p-2 border-2 rounded border-stone-600 bg-stone-700 focus:outline-none focus:border-stone-500 text-stone-300">
            </div>
            <div class="mb-6">
                <label for="message" class="block mb-2 text-sm font-bold text-stone-300">Message <span
                        class="text-red-500">*</span></label>
                <textarea required rows="4" id="message" name="message" maxlength="3200"
                    class="w-full p-2 border-2 rounded border-stone-600 bg-stone-700 focus:outline-none focus:border-stone-500 text-stone-300"></textarea>
            </div>
            <div class="mb-6">
                <label for="h-captcha-response" class="block mb-2 text-sm font-bold text-stone-300">
                    Verify you are human <span class="text-red-500">*</span>
                </label>
                {!! HCaptcha::display(['data-theme' => 'dark']) !!}
            </div>
            <button type="submit"
                class="w-full p-3 bg-orange-500 rounded text-stone-900 hover:bg-orange-400">Submit</button>
        </form>
    </div>
@endsection
