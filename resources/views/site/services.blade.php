@extends('layouts.app')

@section('title', 'Services')

@section('content')
{{-- ALL SERVICES --}}
<section id="hero" class="min-h-screen flex items-center text-slate-900 py-24"
         style="background: radial-gradient(circle at top left, #ffe1c2 0, #ffe9d4 30%, #fde7d7 55%, #fbe5d5 75%, #f8ddc7 100%);">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-20">
            <h1 class="text-5xl md:text-7xl font-black text-slate-900 mb-6">Our Services</h1>
            <p class="text-xl text-slate-700 max-w-2xl mx-auto">Explore our wide range of IT solutions tailored to your needs</p>
        </div>
        
        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            @forelse($services as $service)
                <div class="group bg-white/90 rounded-3xl shadow-xl p-8 hover:shadow-2xl transition-all duration-500 hover:-translate-y-4 border border-orange-100">
                    <div class="w-20 h-20 bg-orange-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-lg text-white">
                        <span class="text-3xl">{{ $service->icon ?? '⭐' }}</span>
                    </div>
                    <h2 class="text-3xl font-bold text-slate-900 mb-4">{{ $service->title }}</h2>

                    @if($service->short_description)
                        <p class="text-xl text-slate-700 mb-6 leading-relaxed">
                            {{ Str::limit($service->short_description, 120) }}
                        </p>
                    @endif

                    <a href="{{ route('services.show', $service->slug ?? $service->id) }}"
                       class="text-orange-500 font-semibold hover:underline inline-flex items-center gap-1 text-lg">
                        Learn More →
                    </a>
                </div>
            @empty
                <div class="col-span-full text-center py-20">
                    <div class="w-24 h-24 bg-orange-400 rounded-3xl flex items-center justify-center mx-auto mb-8 text-4xl">✨</div>
                    <h2 class="text-4xl font-bold text-slate-900 mb-4">Services Coming Soon</h2>
                    <p class="text-xl text-slate-700 max-w-2xl mx-auto mb-8">Our services are being prepared. Check back soon!</p>
                    <a href="{{ url('/contact-us') }}"
                       class="bg-orange-500 text-white font-bold px-10 py-4 rounded-full shadow-2xl hover:bg-orange-600 hover:shadow-3xl transition-all">
                        Contact Us
                    </a>
                </div>
            @endforelse
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-24 text-white text-center"
         style="background: radial-gradient(circle at top left, #ffe1c2 0, #ffe9d4 30%, #fde7d7 55%, #fbe5d5 75%, #f8ddc7 100%);">
    <div class="max-w-4xl mx-auto px-6">
        <h2 class="text-4xl md:text-6xl font-black text-slate-900 mb-6">Ready to Start?</h2>
        <p class="text-xl md:text-2xl mb-12 max-w-2xl mx-auto text-slate-700">Get free consultation today</p>
        <a href="{{ url('/contact-us') }}" class="inline-block bg-orange-500 text-white font-black text-xl px-16 py-6 rounded-full shadow-2xl hover:bg-orange-600 hover:shadow-3xl transition-all hover:-translate-y-2">Contact US</a>
    </div>
</section>
@endsection
