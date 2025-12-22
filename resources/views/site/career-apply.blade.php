@extends('layouts.app')

@section('title', 'Apply - '.$career->title)

@section('content')
<section id="hero" class="min-h-screen flex items-center text-slate-900 py-24"
         style="background: radial-gradient(circle at top left, #ffe1c2 0, #ffe9d4 30%, #fde7d7 55%, #fbe5d5 75%, #f8ddc7 100%);">
    <div class="max-w-4xl mx-auto px-6">
        <h1 class="text-4xl md:text-6xl font-black text-slate-900 text-center mb-10 scroll-animate">
            Apply for {{ $career->title }}
        </h1>

        {{-- Success --}}
        @if(session('success'))
            <div class="text-center py-16 space-y-8">
                <div class="mb-8 bg-orange-100 border border-orange-400 text-orange-700 px-6 py-8 rounded-3xl text-center shadow-lg max-w-2xl mx-auto">
                    <div class="text-6xl mb-4">✅</div>
                    <h2 class="text-2xl font-black mb-4 text-orange-800">Application Sent Successfully!</h2>
                    {{ session('success') }}
                </div>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('careers') }}"
                       class="bg-orange-500 text-white font-bold px-8 py-4 rounded-2xl shadow-xl hover:bg-orange-600 hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 inline-flex items-center">
                        <span class="material-icons mr-2">arrow_back</span>
                        Back to Careers
                    </a>
                    <a href="{{ route('careers.apply.form', $career->id) }}"
                       class="border-2 border-orange-500 text-orange-500 font-bold px-8 py-4 rounded-2xl shadow-lg hover:bg-orange-500 hover:text-white transform hover:-translate-y-1 transition-all duration-300 inline-flex items-center">
                        <span class="material-icons mr-2">edit</span>
                        Apply Again
                    </a>
                </div>
            </div>
        @else
            {{-- Errors --}}
            @if($errors->any())
                <div class="mb-8 bg-orange-100 border border-orange-400 text-orange-700 px-6 py-4 rounded-3xl shadow-lg">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Job summary --}}
            <div class="mb-8 bg-white/90 p-6 rounded-3xl shadow-xl border border-orange-100">
                <h2 class="text-2xl font-black text-slate-900 mb-2">{{ $career->title }}</h2>
                <p class="text-sm text-slate-600 mb-1"><strong>Location:</strong> {{ $career->location }}</p>
                <p class="text-sm text-slate-600 mb-3"><strong>Type:</strong> {{ $career->type }}</p>
                <div class="text-slate-700 text-base leading-relaxed">
                    {!! nl2br(e($career->description)) !!}
                </div>
            </div>

            {{-- Application form --}}
            <form method="POST"
                  action="{{ route('careers.apply') }}"
                  enctype="multipart/form-data"
                  class="space-y-6 bg-white/90 p-8 rounded-3xl shadow-xl border border-orange-100">
                @csrf

                <input type="hidden" name="job_title" value="{{ $career->title }}">
                <input type="hidden" name="job_location" value="{{ $career->location }}">
                <input type="hidden" name="job_type" value="{{ $career->type }}">

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
                    <label for="portfolio" class="block text-sm font-semibold text-slate-700 mb-2">Portfolio / LinkedIn (Optional)</label>
                    <input id="portfolio" type="url" name="portfolio"
                           value="{{ old('portfolio') }}"
                           class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                           placeholder="https://linkedin.com/in/yourprofile">
                </div>

                {{-- Resume upload --}}
                <div>
                    <label for="resume" class="block text-sm font-semibold text-slate-700 mb-2">Resume (PDF, DOC, DOCX)</label>
                    <input id="resume" type="file" name="resume"
                           class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-orange-500 @error('resume') border-orange-500 @enderror"
                           accept=".pdf,.doc,.docx">
                    @error('resume')
                        <p class="mt-1 text-sm text-orange-600">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-xs text-slate-500">Max size 2MB.</p>
                </div>

                <button type="submit"
                        class="w-full bg-orange-500 text-white font-bold py-4 px-6 rounded-2xl shadow-xl hover:bg-orange-600 hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
                    Send Application
                </button>

                 <a href="{{ route('careers') }}"
                       class="bg-orange-500 text-white font-bold px-8 py-4 rounded-2xl shadow-xl hover:bg-orange-600 hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 inline-flex items-center">
                        ← Back to Careers
                </a>
            </form>
        @endif
    </div>
</section>
@endsection
