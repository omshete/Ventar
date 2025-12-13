@extends('layouts.app')

@section('content')
{{-- HERO SECTION --}}
<section id="hero" class="bg-gradient-to-br from-red-500 to-pink-500 text-white min-h-screen flex items-center">
    <div class="max-w-6xl mx-auto px-4 py-20 grid md:grid-cols-2 gap-12 items-center">
        {{-- Left Text --}}
        <div>
            <h1 class="text-4xl md:text-6xl font-black mb-6 leading-tight">
                Ventar – Your IT Service Partner
            </h1>
            <p class="text-lg md:text-xl mb-8 max-w-lg leading-relaxed">
                {{ $homeText }}
            </p>
            <a href="#services" class="scroll-btn inline-block bg-white text-red-500 font-bold px-8 py-4 rounded-full shadow-2xl hover:bg-slate-100 transition-all duration-300">
                Explore Services ↓
            </a>
        </div>

        {{-- Right Cards (Static Teasers) --}}
        <div class="hidden md:block">
            <div class="bg-white/10 backdrop-blur-xl rounded-3xl p-8 shadow-2xl">
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-white/90 rounded-2xl p-6 shadow-lg hover:scale-105 transition-transform">
                        <h3 class="font-bold mb-2 text-slate-800 text-sm">Web Development</h3>
                        <p class="text-xs text-slate-700">High-performance sites</p>
                    </div>
                    <div class="bg-white/90 rounded-2xl p-6 shadow-lg hover:scale-105 transition-transform">
                        <h3 class="font-bold mb-2 text-slate-800 text-sm">Cloud & DevOps</h3>
                        <p class="text-xs text-slate-700">Scalable infrastructure</p>
                    </div>
                    <div class="bg-white/90 rounded-2xl p-6 shadow-lg hover:scale-105 transition-transform">
                        <h3 class="font-bold mb-2 text-slate-800 text-sm">UI/UX Design</h3>
                        <p class="text-xs text-slate-700">Beautiful interfaces</p>
                    </div>
                    <div class="bg-white/90 rounded-2xl p-6 shadow-lg hover:scale-105 transition-transform">
                        <h3 class="font-bold mb-2 text-slate-800 text-sm">Consulting</h3>
                        <p class="text-xs text-slate-700">Tech strategy</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{{-- SERVICES SECTION - FIXED --}}
<section id="services" class="scroll-animate py-24 bg-gradient-to-b from-slate-50 to-white">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-5xl font-black text-slate-900 mb-6">Our Services</h2>
            <p class="text-xl text-slate-600 max-w-2xl mx-auto">Professional IT solutions tailored for your business growth</p>
        </div>

        @if($services->count() > 0)
            <div class="grid gap-8 md:grid-cols-3">
                @foreach($services as $service)
                    <div class="group bg-white rounded-3xl shadow-xl p-8 hover:shadow-2xl transition-all duration-500 hover:-translate-y-4 border border-slate-100 hover:border-red-100">
                        <div class="w-16 h-16 bg-gradient-to-r from-red-500 to-pink-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-lg">
                            <span class="text-2xl">{{ $service->icon ?? '⭐' }}</span>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-4 leading-tight">{{ $service->title }}</h3>
                        <p class="text-slate-600 mb-6 leading-relaxed">
                            {{ Str::limit($service->short_description ?? $service->description ?? 'Professional service', 80) }}
                        </p>
                        <a href="{{ route('services') }}#service-{{ $service->id }}" 
                           class="text-red-500 font-semibold hover:underline inline-flex items-center gap-1">
                            Learn More → 
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            {{-- TEMPORARY FALLBACK - Remove after adding services --}}
            <div class="text-center py-20 col-span-full">
                <div class="w-24 h-24 bg-gradient-to-r from-red-400 to-pink-400 rounded-3xl flex items-center justify-center mx-auto mb-8 text-4xl">
                    ✨
                </div>
                <h3 class="text-3xl font-bold text-slate-900 mb-4">Services Coming Soon</h3>
                <p class="text-xl text-slate-600 max-w-lg mx-auto mb-8">We're preparing amazing IT solutions for you!</p>
                <a href="{{ url('/contact-us') }}" class="bg-gradient-to-r from-red-500 to-pink-500 text-white font-bold px-10 py-4 rounded-full shadow-2xl hover:shadow-3xl transition-all">
                    Contact Us
                </a>
            </div>
        @endif
    </div>
</section>


{{-- BLOGS SECTION - DYNAMIC FROM DB --}}
<section id="blogs" class="scroll-animate py-24 bg-slate-100">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-5xl font-black text-slate-900 mb-6">Latest Blogs</h2>
            <p class="text-xl text-slate-600 max-w-2xl mx-auto">Stay updated with latest IT trends and insights</p>
        </div>

        <div class="grid gap-8 md:grid-cols-3">
            @forelse($blogs as $blog)
                <article class="group bg-white rounded-3xl shadow-xl p-8 hover:shadow-2xl transition-all duration-500 hover:-translate-y-3 cursor-pointer">
                    <div class="w-12 h-12 bg-gradient-to-r from-red-400 to-pink-400 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <span class="text-xl">{{ $blog->icon ?? '📝' }}</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4 leading-tight">{{ Str::limit($blog->title, 50) }}</h3>
                    <p class="text-slate-600 mb-6 leading-relaxed">{{ Str::limit(strip_tags($blog->content), 80) }}</p>
                    <a href="{{ route('blogs.show', $blog->slug ?? $blog->id) }}" class="text-red-500 font-semibold hover:underline flex items-center gap-2">
                        Read More <span>→</span>
                    </a>
                </article>
            @empty
                <div class="col-span-full text-center py-20">
                    <p class="text-xl text-slate-500">No blogs published yet...</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
