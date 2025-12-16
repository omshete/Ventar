@extends('layouts.app')

@section('title', $about->title ?? 'About Ventar')

@section('content')
<section class="bg-gradient-to-br from-red-500 to-pink-500 text-white py-24">
    <div class="max-w-4xl mx-auto px-6">
        <h1 class="text-4xl md:text-6xl font-black mb-6">
            {{ $about->title ?? 'About Ventar' }}
        </h1>
        @if($about && $about->is_active && $about->short_description)
            <p class="text-xl md:text-2xl mb-8 text-slate-100 leading-relaxed">
                {{ $about->short_description }}
            </p>
        @endif
    </div>
</section>

<section class="py-16 bg-gradient-to-b from-slate-50 to-white">
    <div class="max-w-4xl mx-auto px-6">
        @if($about && $about->is_active && $about->content)
            <div class="text-lg text-slate-700 leading-relaxed space-y-4 mb-10">
                {!! nl2br(e($about->content)) !!}
            </div>
        @else
            <div class="text-center py-20">
                <h1 class="text-4xl md:text-5xl font-bold text-slate-900 mb-8">About Ventar</h1>
                <p class="text-xl text-slate-600 max-w-2xl mx-auto mb-8">
                    About content will appear here once added from the admin panel.
                </p>
                <a href="/admin/about-us" class="inline-block bg-gradient-to-r from-red-500 to-pink-500 text-white font-bold px-8 py-3 rounded-full shadow-2xl hover:shadow-3xl transition-all hover:-translate-y-1">
                    Add About Content <span>→</span>
                </a>
            </div>
        @endif

        <div class="flex flex-col sm:flex-row gap-4 mt-12">
            <a href="{{ url('/contact-us') }}"
               class="inline-flex items-center gap-2 bg-gradient-to-r from-red-500 to-pink-500 text-white font-bold px-8 py-3 rounded-full shadow-2xl hover:shadow-3xl transition-all hover:-translate-y-1 flex-1 text-center">
                Contact Us <span>→</span>
            </a>

            <a href="{{ url('/') }}" class="inline-flex items-center justify-center gap-2 bg-white text-slate-700 font-bold px-8 py-3 rounded-full shadow-lg hover:shadow-xl transition-all hover:-translate-y-1 border border-slate-200 flex-1">
                ← Back to Home
            </a>
        </div>
    </div>
</section>
@endsection
