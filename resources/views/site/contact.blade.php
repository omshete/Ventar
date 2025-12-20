@extends('layouts.app')

@section('title','Contact Us')

@section('content')
<section id="hero" class="min-h-screen flex items-center text-slate-900 py-24"
         style="background: radial-gradient(circle at top left, #ffe1c2 0, #ffe9d4 30%, #fde7d7 55%, #fbe5d5 75%, #f8ddc7 100%);">
    <div class="max-w-6xl mx-auto px-6">
        <h1 class="text-5xl font-black md:text-7xl text-slate-900 text-center mb-16 scroll-animate">Contact Us</h1>

        {{-- Success message --}}
        @if(session('success'))
            <div class="mb-8 bg-orange-100 border border-orange-400 text-orange-700 px-6 py-4 rounded-3xl text-center max-w-2xl mx-auto shadow-lg">
                {{ session('success') }}
            </div>
        @endif

        {{-- Validation errors --}}
        @if($errors->any())
            <div class="mb-8 bg-orange-100 border border-orange-400 text-orange-700 px-6 py-4 rounded-3xl max-w-2xl mx-auto shadow-lg scroll-animate">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="grid lg:grid-cols-2 gap-12 items-start scroll-animate">
            {{-- Contact Form (Left Side) --}}
            <div>
                <form method="POST" action="{{ route('contact.submit') }}" class="space-y-6 bg-white/90 p-8 rounded-3xl shadow-xl border border-orange-100">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-semibold text-slate-700 mb-2">Full Name</label>
                        <input id="name" type="text" name="name"
                               value="{{ old('name') }}"
                               class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 @error('name') border-orange-500 @enderror"
                               placeholder="Enter your full name" required>
                        @error('name')
                            <p class="mt-1 text-sm text-orange-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">Email Address</label>
                        <input id="email" type="email" name="email"
                               value="{{ old('email') }}"
                               class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 @error('email') border-orange-500 @enderror"
                               placeholder="your@email.com" required>
                        @error('email')
                            <p class="mt-1 text-sm text-orange-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-semibold text-slate-700 mb-2">Phone (Optional)</label>
                        <input id="phone" type="tel" name="phone"
                               value="{{ old('phone') }}"
                               class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                               placeholder="+91-XXXXXXXXXX">
                    </div>

                    <div>
                        <label for="subject" class="block text-sm font-semibold text-slate-700 mb-2">Subject</label>
                        <input id="subject" type="text" name="subject"
                               value="{{ old('subject') }}"
                               class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 @error('subject') border-orange-500 @enderror"
                               placeholder="What can we help you with?" required>
                        @error('subject')
                            <p class="mt-1 text-sm text-orange-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-semibold text-slate-700 mb-2">Message</label>
                        <textarea id="message" name="message" rows="6"
                                  class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 resize-vertical @error('message') border-orange-500 @enderror"
                                  placeholder="Tell us about your project or question..." required>{{ old('message') }}</textarea>
                        @error('message')
                            <p class="mt-1 text-sm text-orange-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                            class="w-full bg-orange-500 text-white font-bold py-4 px-6 rounded-2xl shadow-xl hover:bg-orange-600 hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
                        Send Message
                    </button>
                </form>
            </div>

            {{-- Contact Info (Right Side) --}}
            <div class="space-y-8">
                {{-- Intro Card --}}
                <div class="bg-orange-500 text-white p-8 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <h3 class="text-2xl font-black mb-4">Get In Touch</h3>
                    <p class="text-lg leading-relaxed">
                        @isset($contacts)
                            @php
                                $activeContact = $contacts->where('is_active', true)->first();
                            @endphp
                            @if($activeContact && $activeContact->intro_text)
                                {!! $activeContact->intro_text !!}
                            @else
                                Ready to start your next project with us? Send us a message and we'll respond within 24 hours. We're here to help you succeed.
                            @endif
                        @else
                            Ready to start your next project with us? Send us a message and we'll respond within 24 hours. We're here to help you succeed.
                        @endisset
                    </p>
                </div>

                {{-- Contact Details --}}
                <div class="space-y-6">
                    {{-- Email Section --}}
                    @isset($contacts)
                        @php
                            $activeContact = $contacts->where('is_active', true)->first();
                        @endphp
                        @if($activeContact && $activeContact->email_value)
                            <div class="bg-white/90 p-6 rounded-3xl shadow-xl border border-orange-100 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                                <div class="flex items-center mb-3">
                                    <div class="w-12 h-12 bg-red-500 rounded-full flex items-center justify-center text-white font-bold text-lg flex-shrink-0 border-2 border-white">
                                        <span class="material-icons text-lg">email</span>
                                    </div>
                                    <h4 class="font-black text-xl text-slate-900 ml-4">{{ $activeContact->email_label ?? 'Email' }}</h4>
                                </div>
                                <p class="text-slate-700 text-lg"><a href="mailto:{{ $activeContact->email_value }}">{{ $activeContact->email_value }}</a></p>
                            </div>
                        @endif
                    @endisset

                    {{-- Phone Section --}}
                    @isset($contacts)
                        @php
                            $activeContact = $contacts->where('is_active', true)->first();
                        @endphp
                        @if($activeContact && $activeContact->phone_value)
                            <div class="bg-white/90 p-6 rounded-3xl shadow-xl border border-orange-100 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                                <div class="flex items-center mb-3">
                                    <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center text-white font-bold text-lg flex-shrink-0 border-2 border-white">
                                        <span class="material-icons text-lg">phone</span>
                                    </div>
                                    <h4 class="font-black text-xl text-slate-900 ml-4">{{ $activeContact->phone_label ?? 'Phone' }}</h4>
                                </div>
                                <p class="text-slate-700 text-lg"><a href="tel:{{ $activeContact->phone_value }}">{{ $activeContact->phone_value }}</a></p>
                            </div>
                        @endif
                    @endisset

                    {{-- Careers Section - NEW ADDITION --}}
                    <div class="bg-white/90 p-6 rounded-3xl shadow-xl border border-orange-100 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div class="flex items-center mb-3">
                            <div class="w-12 h-12 bg-orange-500 rounded-full flex items-center justify-center text-white font-bold text-lg flex-shrink-0 border-2 border-white">
                                <span class="material-icons text-lg">work</span>
                            </div>
                            <h4 class="font-black text-xl text-slate-900 ml-4">Careers</h4>
                        </div>
                        <p class="text-slate-700 text-lg mb-4">
                            Join our growing team! We're hiring passionate developers, designers & innovators.
                        </p>
                        <a href="{{ route('careers') }}" 
                           class="inline-flex items-center bg-orange-500 text-white font-bold px-6 py-3 rounded-xl hover:bg-orange-600 shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                            <span class="material-icons text-sm mr-2">arrow_forward</span>
                            Explore Opportunities
                        </a>
                    </div>

                    {{-- Fallback if no contacts --}}
                    @unless(isset($contacts) && $contacts->where('is_active', true)->first())
                        <div class="bg-white/90 p-6 rounded-3xl shadow-xl border border-orange-100 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                            <div class="flex items-center mb-3">
                                <div class="w-12 h-12 bg-red-500 rounded-full flex items-center justify-center text-white font-bold text-lg flex-shrink-0 border-2 border-white">
                                    <span class="material-icons text-lg">email</span>
                                </div>
                                <h4 class="font-black text-xl text-slate-900 ml-4">Email</h4>
                            </div>
                            <p class="text-slate-700 text-lg">info@ventar.in</p>
                        </div>
                        <div class="bg-white/90 p-6 rounded-3xl shadow-xl border border-orange-100 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                            <div class="flex items-center mb-3">
                                <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center text-white font-bold text-lg flex-shrink-0 border-2 border-white">
                                    <span class="material-icons text-lg">phone</span>
                                </div>
                                <h4 class="font-black text-xl text-slate-900 ml-4">Phone</h4>
                            </div>
                            <p class="text-slate-700 text-lg">+91-9860036529</p>
                        </div>
                    @endunless
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
