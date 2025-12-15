@extends('layouts.app')

@section('title','Contact Us')

@section('content')
<div class="max-w-6xl mx-auto py-12 px-4">
    <h1 class="text-5xl font-black md:text-7xl text-slate-900 text-center mb-16">Contact Us</h1>

    {{-- Success message --}}
    @if(session('success'))
        <div class="mb-8 bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-lg text-center max-w-2xl mx-auto">
            {{ session('success') }}
        </div>
    @endif

    {{-- Validation errors --}}
    @if($errors->any())
        <div class="mb-8 bg-red-100 border border-red-400 text-red-700 px-6 py-4 rounded-lg max-w-2xl mx-auto">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="grid lg:grid-cols-2 gap-12 items-start">
        {{-- Contact Form (Left Side) --}}
        <div>
            <form method="POST" action="{{ route('contact.submit') }}" class="space-y-6 bg-white p-8 rounded-xl shadow-lg">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Full Name</label>
                    <input id="name" type="text" name="name"
                           value="{{ old('name') }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent @error('name') border-red-500 @enderror"
                           placeholder="Enter your full name" required>
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
                    <input id="email" type="email" name="email"
                           value="{{ old('email') }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent @error('email') border-red-500 @enderror"
                           placeholder="your@email.com" required>
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">Phone (Optional)</label>
                    <input id="phone" type="tel" name="phone"
                           value="{{ old('phone') }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent"
                           placeholder="+91-XXXXXXXXXX">
                </div>

                <div>
                    <label for="subject" class="block text-sm font-semibold text-gray-700 mb-2">Subject</label>
                    <input id="subject" type="text" name="subject"
                           value="{{ old('subject') }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent @error('subject') border-red-500 @enderror"
                           placeholder="What can we help you with?" required>
                    @error('subject')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">Message</label>
                    <textarea id="message" name="message" rows="6"
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent resize-vertical @error('message') border-red-500 @enderror"
                              placeholder="Tell us about your project or question..." required>{{ old('message') }}</textarea>
                    @error('message')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                        class="w-full bg-gradient-to-r from-red-500 to-pink-500 text-white font-semibold py-4 px-6 rounded-lg shadow-lg hover:from-red-600 hover:to-pink-600 transform hover:-translate-y-0.5 transition-all duration-200">
                    Send Message
                </button>
            </form>
        </div>

        {{-- Contact Info (Right Side) --}}
        <div class="space-y-8">
            <div class="bg-gradient-to-br from-red-500 to-pink-500 text-white p-8 rounded-xl shadow-lg">
                <h3 class="text-2xl font-bold mb-4">Get In Touch</h3>
                <p class="text-lg leading-relaxed">Ready to start your next project with us? Send us a message and we'll respond within 24 hours. We're here to help you succeed.</p>
            </div>

            <div class="space-y-6">
                <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100 hover:shadow-xl transition-shadow">
                    <div class="flex items-center mb-3">
                        <div class="w-12 h-12 bg-red-500 rounded-full flex items-center justify-center text-white font-bold text-lg flex-shrink-0">
                            📧
                        </div>
                        <h4 class="font-semibold text-xl text-gray-800 ml-4">Email</h4>
                    </div>
                    <p class="text-gray-600 text-lg">{{ $contactEmail }}</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100 hover:shadow-xl transition-shadow">
                    <div class="flex items-center mb-3">
                        <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center text-white font-bold text-lg flex-shrink-0">
                            📞
                        </div>
                        <h4 class="font-semibold text-xl text-gray-800 ml-4">Phone</h4>
                    </div>
                    <p class="text-gray-600 text-lg">{{ $contactPhone }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
