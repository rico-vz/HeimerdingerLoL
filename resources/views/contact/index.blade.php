@extends('layouts.app')

@section('title', 'Heimerdinger.LoL • Contact')
@section('description', 'Contact Heimerdinger.LoL for any inquiries, feedback, or suggestions. We are always looking to
 improve our website and content.')

@section('content')
    <form method="POST" action="{{route('contact.store')}}" class="max-w-screen-md mx-auto mt-2 prose prose-stone">
        @csrf
        @honeypot
        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-bold text-stone-300">Name</label>
            <input type="text" id="name" name="name" class="w-full p-2 border border-stone-300 rounded">
        </div>
        <div class="mb-6">
            <label for="email" class="block mb-2 text-sm font-bold text-stone-300">Email</label>
            <input type="email" id="email" name="email" class="w-full p-2 border border-stone-300 rounded">
        </div>
        <div class="mb-6">
            <label for="discord" class="block mb-2 text-sm font-bold text-stone-300">Discord (optional)</label>
            <input type="text" id="discord" name="discord" class="w-full p-2 border border-stone-300 rounded">
        </div>
        <div class="mb-6">
            <label for="category" class="block mb-2 text-sm font-bold text-stone-300">Category</label>
            <select id="category" name="category" class="w-full p-2 border border-stone-300 rounded">
                <option value="question">Question</option>
                <option value="advertising">Advertising</option>
                <option value="bug_report">Bug Report</option>
                <option value="feedback">Feedback</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div class="mb-6">
            <label for="subject" class="block mb-2 text-sm font-bold text-stone-300">Subject</label>
            <input type="text" id="subject" name="subject" class="w-full p-2 border border-stone-300 rounded">
        </div>
        <div class="mb-6">
            <label for="message" class="block mb-2 text-sm font-bold text-stone-300">Message</label>
            <textarea id="message" name="message" class="w-full p-2 border border-stone-300 rounded"></textarea>
        </div>
        <button type="submit" class="w-full p-3 bg-orange-500 text-stone-900 rounded hover:bg-orange-400">Submit</button>

    </form>
@endsection
