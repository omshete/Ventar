@extends('layouts.app')

@section('title', $service->title ?? 'Service')

@section('content')
<section id="hero" class="py-26 text-white text-center bg-gradient-to-br from-red-500 to-orange-500 text-white">
    <div class="max-w-4xl mx-auto px-6">
        <h1 class="text-4xl md:text-6xl font-black text-white mb-6">
            {{ $service->title }}
        </h1>
        @if($service->short_description)
            <p class="text-xl md:text-2xl mb-8 text-white leading-relaxed">
                {{ $service->short_description }}
            </p>
        @endif
    </div>
</section>

<section class="py-24 scroll-animate"
         style="background: radial-gradient(circle at top left, #ffe1c2 0, #ffe9d4 30%, #fde7d7 55%, #fbe5d5 75%, #f8ddc7 100%);">
    <div class="max-w-4xl mx-auto px-6">
        @if($service->description)
            <div class="text-lg text-slate-900 leading-relaxed space-y-4 mb-10 bg-white/90 rounded-3xl p-8 shadow-xl">
                {!! nl2br(e($service->description)) !!}
            </div>
        @endif

        <a href="{{ url('/contact-us') }}"
           class="inline-flex items-center gap-2 bg-orange-500 text-white font-bold px-8 py-3 rounded-full shadow-2xl hover:bg-orange-600 hover:shadow-3xl transition-all hover:-translate-y-1">
            Contact US <span>→</span>
        </a>

        <a href="{{ route('services') }}" class="inline-block ml-4 text-orange-500 hover:underline font-semibold">
            ← Back to all services
        </a>
    </div>
</section>
@endsection
