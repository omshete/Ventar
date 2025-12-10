@extends('layouts.app')

@section('content')

{{-- FULL SCREEN HERO SECTION --}}
<section class="bg-gradient-to-br from-red-500 to-pink-500 text-white min-h-screen flex items-center">
    <div class="max-w-6xl mx-auto px-4 py-20 grid md:grid-cols-2 gap-10 items-center">
        
        {{-- Left Text --}}
        <div>
            <h1 class="text-4xl md:text-5xl font-extrabold mb-4">
                Ventar – Your IT Service Partner
            </h1>
            <p class="text-base md:text-lg mb-6">
                Ventar is an IT service providing company delivering scalable, secure and modern digital solutions.
            </p>

            <a href="{{ route('services') }}"
               class="inline-block bg-white text-red-500 font-semibold px-6 py-3 rounded-full shadow hover:bg-slate-100">
                Explore Services
            </a>
        </div>

        {{-- Right Cards --}}
        <div class="hidden md:block">
            <div class="bg-white/10 rounded-3xl p-6 shadow-xl">
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-white/90 rounded-2xl p-4 text-slate-800">
                        <h3 class="font-semibold mb-1 text-sm">Web Development</h3>
                        <p class="text-xs">High-performance business websites.</p>
                    </div>

                    <div class="bg-white/90 rounded-2xl p-4 text-slate-800">
                        <h3 class="font-semibold mb-1 text-sm">Cloud & DevOps</h3>
                        <p class="text-xs">Secure, scalable infrastructure.</p>
                    </div>

                    <div class="bg-white/90 rounded-2xl p-4 text-slate-800">
                        <h3 class="font-semibold mb-1 text-sm">UI/UX Design</h3>
                        <p class="text-xs">Beautiful, intuitive interfaces.</p>
                    </div>

                    <div class="bg-white/90 rounded-2xl p-4 text-slate-800">
                        <h3 class="font-semibold mb-1 text-sm">Consulting</h3>
                        <p class="text-xs">Strategic technology guidance.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


{{-- SERVICES SECTION --}}
<section class="max-w-6xl mx-auto px-4 py-20">
    <h2 class="text-2xl font-bold mb-6 text-slate-900">Our Services</h2>

    <div class="grid gap-6 md:grid-cols-3">
        <div class="bg-white rounded-2xl shadow p-5">
            <h3 class="font-semibold mb-2 text-slate-900">Custom Web Applications</h3>
            <p class="text-sm text-slate-600">Robust Laravel applications tailored to your business needs.</p>
        </div>

        <div class="bg-white rounded-2xl shadow p-5">
            <h3 class="font-semibold mb-2 text-slate-900">Mobile-friendly Websites</h3>
            <p class="text-sm text-slate-600">Responsive designs that look perfect on every device.</p>
        </div>

        <div class="bg-white rounded-2xl shadow p-5">
            <h3 class="font-semibold mb-2 text-slate-900">Maintenance & Support</h3>
            <p class="text-sm text-slate-600">Continuous monitoring, updates and optimization.</p>
        </div>
    </div>
</section>


{{-- BLOG SECTION --}}
<section class="bg-slate-100">
    <div class="max-w-6xl mx-auto px-4 py-20">
        <h2 class="text-2xl font-bold mb-6 text-slate-900">Latest Blogs</h2>

        <div class="grid gap-6 md:grid-cols-3">
            <article class="bg-white rounded-2xl shadow p-5">
                <h3 class="font-semibold mb-2 text-slate-900">Why your business needs a modern website</h3>
                <p class="text-sm text-slate-600 mb-3">Discover how a responsive site improves trust, reach and growth.</p>
                <a href="#" class="text-sm text-red-500 font-semibold hover:underline">Read more</a>
            </article>

            <article class="bg-white rounded-2xl shadow p-5">
                <h3 class="font-semibold mb-2 text-slate-900">5 tips for secure web apps</h3>
                <p class="text-sm text-slate-600 mb-3">Essential security practices that every application should follow.</p>
                <a href="#" class="text-sm text-red-500 font-semibold hover:underline">Read more</a>
            </article>

            <article class="bg-white rounded-2xl shadow p-5">
                <h3 class="font-semibold mb-2 text-slate-900">Making UI delightful and usable</h3>
                <p class="text-sm text-slate-600 mb-3">How thoughtful design turns visitors into customers.</p>
                <a href="#" class="text-sm text-red-500 font-semibold hover:underline">Read more</a>
            </article>
        </div>
    </div>
</section>

@endsection
