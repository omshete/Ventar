@extends('layouts.app')

@section('title', $aim->title ?? 'Our Aim')

@section('content')
<section id="hero" class="min-h-screen flex items-center text-slate-900 py-24"
         style="background: radial-gradient(circle at top left, #ffe1c2 0, #ffe9d4 30%, #fde7d7 55%, #fbe5d5 75%, #f8ddc7 100%);">
    <div class="max-w-4xl mx-auto px-6">
        <h1 class="text-4xl md:text-6xl font-black text-slate-900 mb-6">
            {{ $aim->title ?? 'Our Aim' }}
        </h1>
        @if($aim && $aim->is_active && $aim->short_description)
            <p class="text-xl md:text-2xl mb-8 text-slate-700 leading-relaxed">
                {{ $aim->short_description }}
            </p>
        @endif
    </div>
</section>

<section class="py-24 scroll-animate"
         style="background: radial-gradient(circle at top left, #ffe1c2 0, #ffe9d4 30%, #fde7d7 55%, #fbe5d5 75%, #f8ddc7 100%);">
    <div class="max-w-4xl mx-auto px-6">
        @if($aim && $aim->is_active && $aim->content)
            <div class="text-lg text-slate-900 leading-relaxed space-y-4 mb-10 bg-white/90 rounded-3xl p-8 shadow-xl border border-orange-100">
                {!! nl2br(e($aim->content)) !!}
            </div>
        @else
            <div class="text-center py-20">
                <h1 class="text-4xl md:text-5xl font-black text-slate-900 mb-8">Our Aim</h1>
                <p class="text-xl text-slate-700 max-w-2xl mx-auto mb-8">
                    Our Aim content will appear here once added from the admin panel.
                </p>
                <a href="/admin/aim" class="inline-block bg-orange-500 text-white font-bold px-8 py-3 rounded-2xl shadow-2xl hover:bg-orange-600 hover:shadow-3xl transition-all hover:-translate-y-1">
                    Add Aim Content <span>→</span>
                </a>
            </div>
        @endif

        <div class="flex flex-col sm:flex-row gap-4 mt-12">
            <a href="{{ url('/contact-us') }}"
               class="inline-flex items-center gap-2 bg-orange-500 text-white font-bold px-8 py-3 rounded-2xl shadow-2xl hover:bg-orange-600 hover:shadow-3xl transition-all hover:-translate-y-1 flex-1 text-center">
                Contact Us <span>→</span>
            </a>

            <a href="{{ url('/') }}" class="inline-flex items-center justify-center gap-2 bg-white/90 text-slate-900 font-bold px-8 py-3 rounded-2xl shadow-xl hover:shadow-2xl transition-all hover:-translate-y-1 border border-orange-100 flex-1">
                ← Back to Home
            </a>
        </div>
    </div>
</section>
@endsection
