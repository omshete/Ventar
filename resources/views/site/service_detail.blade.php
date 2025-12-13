@extends('layouts.app')

@section('title', $service->title ?? 'Service')

@section('content')
<section class="bg-gradient-to-br from-red-500 to-pink-500 text-white py-24">
    <div class="max-w-4xl mx-auto px-6">
        <h1 class="text-4xl md:text-6xl font-black mb-6">
            {{ $service->title }}
        </h1>
        @if($service->short_description)
            <p class="text-xl md:text-2xl mb-8 text-slate-100 leading-relaxed">
                {{ $service->short_description }}
            </p>
        @endif
    </div>
</section>

<section class="py-16 bg-gradient-to-b from-slate-50 to-white">
    <div class="max-w-4xl mx-auto px-6">
        @if($service->description)
            <div class="text-lg text-slate-700 leading-relaxed space-y-4 mb-10">
                {!! nl2br(e($service->description)) !!}
            </div>
        @endif

        <a href="{{ url('/contact-us') }}"
           class="inline-flex items-center gap-2 bg-gradient-to-r from-red-500 to-pink-500 text-white font-bold px-8 py-3 rounded-full shadow-2xl hover:shadow-3xl transition-all hover:-translate-y-1">
            Get Quote <span>→</span>
        </a>

        <a href="{{ route('services') }}" class="inline-block ml-4 text-slate-600 hover:underline">
            ← Back to all services
        </a>
    </div>
</section>
@endsection
