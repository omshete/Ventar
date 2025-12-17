@extends('layouts.app')

@section('content')
{{-- HERO SECTION --}}
<section id="hero"
    class="min-h-screen flex items-center text-slate-900"
    style="background: radial-gradient(circle at top left, #ffe1c2 0, #ffe9d4 30%, #fde7d7 55%, #fbe5d5 75%, #f8ddc7 100%);">
    <div class="max-w-6xl mx-auto px-4 py-20 grid md:grid-cols-2 gap-12 items-center">
        {{-- Left Text --}}
        <div>
            <h1 class="text-4xl md:text-6xl font-black mb-6 leading-tight">
                {{ $hero->title ?? 'Ventar – Your IT Service Partner' }}
            </h1>
            <p class="text-lg md:text-xl mb-8 max-w-lg leading-relaxed">
                {{ $hero->description ?? $homeText }}
            </p>
            <a href="{{ $hero->button_link ?? '#services' }}"
               class="scroll-btn inline-block bg-orange-500 text-white font-bold px-8 py-4 rounded-full shadow-2xl hover:bg-orange-600 transition-all duration-300">
                {{ $hero->button_label ?? 'Explore Services ↓' }}
            </a>
        </div>

        {{-- Right Cards --}}
        <div class="hidden md:block">
            <div class="bg-white/75 backdrop-blur-xl rounded-3xl p-8 shadow-2xl">
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-white rounded-2xl p-6 shadow-lg hover:scale-105 transition-transform">
                        <h3 class="font-bold mb-2 text-slate-800 text-sm">
                            {{ $hero->card1_title ?? 'Web Development' }}
                        </h3>
                        <p class="text-xs text-slate-700">
                            {{ $hero->card1_text ?? 'High-performance sites' }}
                        </p>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-lg hover:scale-105 transition-transform">
                        <h3 class="font-bold mb-2 text-slate-800 text-sm">
                            {{ $hero->card2_title ?? 'Cloud & DevOps' }}
                        </h3>
                        <p class="text-xs text-slate-700">
                            {{ $hero->card2_text ?? 'Scalable infrastructure' }}
                        </p>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-lg hover:scale-105 transition-transform">
                        <h3 class="font-bold mb-2 text-slate-800 text-sm">
                            {{ $hero->card3_title ?? 'UI/UX Design' }}
                        </h3>
                        <p class="text-xs text-slate-700">
                            {{ $hero->card3_text ?? 'Beautiful interfaces' }}
                        </p>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-lg hover:scale-105 transition-transform">
                        <h3 class="font-bold mb-2 text-slate-800 text-sm">
                            {{ $hero->card4_title ?? 'Consulting' }}
                        </h3>
                        <p class="text-xs text-slate-700">
                            {{ $hero->card4_text ?? 'Tech strategy' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- SERVICES SECTION --}}
<section id="services" class="scroll-animate py-24"
         style="background: radial-gradient(circle at top left, #ffe1c2 0, #ffe9d4 30%, #fde7d7 55%, #fbe5d5 75%, #f8ddc7 100%);">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-5xl font-black text-slate-900 mb-6">Our Services</h2>
            <p class="text-xl text-slate-700 max-w-2xl mx-auto">
                Professional IT solutions tailored for your business growth
            </p>
        </div>

        @if($services->count() > 0)
            <div class="grid gap-8 md:grid-cols-3 mb-12">
                @foreach($services as $service)
                    <div class="group bg-white/90 rounded-3xl shadow-xl p-8 hover:shadow-2xl transition-all duration-500 hover:-translate-y-4 border border-orange-100">
                        <div class="w-16 h-16 bg-orange-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-lg text-white">
                            <span class="text-2xl">{{ $service->icon ?? '⭐' }}</span>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-4 leading-tight">{{ $service->title }}</h3>

                        {{-- ONLY SHORT DESCRIPTION ON HOME --}}
                        <p class="text-slate-700 mb-6 leading-relaxed">
                            {{ Str::limit($service->short_description, 80) }}
                        </p>

                        <a href="{{ route('services.show', $service->slug ?? $service->id) }}"
                           class="text-orange-500 font-semibold hover:underline inline-flex items-center gap-1">
                            Learn More →
                        </a>
                    </div>
                @endforeach
            </div>

            {{-- CTA BELOW SERVICES --}}
            <section class="text-center">
                <div class="max-w-4xl mx-auto px-6">
                    <a href="{{ url('/services') }}"
                       class="inline-block bg-orange-500 text-white font-black text-xl px-16 py-4 rounded-full shadow-2xl hover:bg-orange-600 hover:shadow-3xl transition-all hover:-translate-y-2">
                        View All Services
                    </a>
                </div>
            </section>
        @else
            <div class="text-center py-20 col-span-full">
                <div class="w-24 h-24 bg-orange-400 rounded-3xl flex items-center justify-center mx-auto mb-8 text-4xl">
                    ✨
                </div>
                <h3 class="text-3xl font-bold text-slate-900 mb-4">Services Coming Soon</h3>
                <p class="text-xl text-slate-700 max-w-lg mx-auto mb-8">
                    We're preparing amazing IT solutions for you!
                </p>
                <a href="{{ url('/contact-us') }}"
                   class="bg-orange-500 text-white font-bold px-10 py-4 rounded-full shadow-2xl hover:bg-orange-600 hover:shadow-3xl transition-all">
                    Contact Us
                </a>
            </div>
        @endif
    </div>
</section>

{{-- OUR STORY SECTION - DYNAMIC FROM ADMIN --}}
<section id="our-story" class="py-24"
         style="background: radial-gradient(circle at top left, #ffe1c2 0, #ffe9d4 30%, #fde7d7 55%, #fbe5d5 75%, #f8ddc7 100%);">
    <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
        <div>
            @if($ourStory)
                <h2 class="text-4xl md:text-5xl font-black text-slate-900 mb-6">
                    {{ $ourStory->title }}
                </h2>
                <p class="text-lg text-slate-700 mb-4 leading-relaxed">
                    {{ $ourStory->paragraph_1 }}
                </p>
                @if($ourStory->paragraph_2)
                    <p class="text-lg text-slate-700 mb-4 leading-relaxed">
                        {{ $ourStory->paragraph_2 }}
                    </p>
                @endif
                @if($ourStory->paragraph_3)
                    <p class="text-lg text-slate-700 leading-relaxed">
                        {{ $ourStory->paragraph_3 }}
                    </p>
                @endif
                @if($ourStory->paragraph_4)
                    <p class="text-lg text-slate-700 leading-relaxed">
                        {{ $ourStory->paragraph_4 }}
                    </p>
                @endif
                @if($ourStory->paragraph_5)
                    <p class="text-lg text-slate-700 leading-relaxed">
                        {{ $ourStory->paragraph_5 }}
                    </p>
                @endif
                @if($ourStory->paragraph_6)
                    <p class="text-lg text-slate-700 leading-relaxed">
                        {{ $ourStory->paragraph_6 }}
                    </p>
                @endif
            @else
                <h2 class="text-4xl md:text-5xl font-black text-slate-900 mb-6">Our Story</h2>
                <p class="text-lg text-slate-700 mb-4 leading-relaxed">
                    Ventar was started with a simple goal: help businesses grow through reliable, modern technology solutions.
                </p>
                <p class="text-lg text-slate-700 mb-4 leading-relaxed">
                    From small startups to established enterprises, the team has worked across industries to build scalable, secure and user-friendly digital products.
                </p>
                <p class="text-lg text-slate-700 leading-relaxed">
                    The focus is on long-term partnerships, transparent communication, and delivering real business results—not just code.
                </p>
            @endif
        </div>

        <div class="relative">
            <div class="absolute -inset-4 bg-orange-400/10 rounded-3xl blur-2xl"></div>
            <div class="relative bg-slate-900 text-white rounded-3xl p-8 shadow-2xl">
                @if($ourStory)
                    <h3 class="text-2xl font-bold mb-4">{{ $ourStory->side_title }}</h3>
                    <ul class="space-y-3 text-slate-100 text-base">
                        @if($ourStory->bullet_1)<li>• {{ $ourStory->bullet_1 }}</li>@endif
                        @if($ourStory->bullet_2)<li>• {{ $ourStory->bullet_2 }}</li>@endif
                        @if($ourStory->bullet_3)<li>• {{ $ourStory->bullet_3 }}</li>@endif
                        @if($ourStory->bullet_4)<li>• {{ $ourStory->bullet_4 }}</li>@endif
                        @if($ourStory->bullet_5)<li>• {{ $ourStory->bullet_5 }}</li>@endif
                        @if($ourStory->bullet_6)<li>• {{ $ourStory->bullet_6 }}</li>@endif
                        @if($ourStory->bullet_7)<li>• {{ $ourStory->bullet_7 }}</li>@endif
                        @if($ourStory->bullet_8)<li>• {{ $ourStory->bullet_8 }}</li>@endif
                        @if($ourStory->bullet_9)<li>• {{ $ourStory->bullet_9 }}</li>@endif
                        @if($ourStory->bullet_10)<li>• {{ $ourStory->bullet_10 }}</li>@endif
                    </ul>
                @else
                    <h3 class="text-2xl font-bold mb-4">Why Ventar?</h3>
                    <ul class="space-y-3 text-slate-100 text-base">
                        <li>• Experienced team across web, cloud and DevOps.</li>
                        <li>• Focus on performance, security and scalability.</li>
                        <li>• Clear communication and on-time delivery.</li>
                        <li>• Long-term support beyond project launch.</li>
                    </ul>
                @endif
            </div>
        </div>
    </div>
</section>

{{-- BLOGS SECTION - DYNAMIC FROM DB --}}
<section id="blogs" class="scroll-animate py-24"
         style="background: radial-gradient(circle at top left, #ffe1c2 0, #ffe9d4 30%, #fde7d7 55%, #fbe5d5 75%, #f8ddc7 100%);">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-20">
            <h2 class="text-4xl md:text-5xl font-black text-slate-900 mb-6">Latest Blogs</h2>
            <p class="text-xl text-slate-700 max-w-2xl mx-auto">Stay updated with latest IT trends and insights</p>
        </div>

        <div class="grid gap-8 md:grid-cols-3">
            @forelse($blogs as $blog)
                <article class="group bg-white/90 rounded-3xl shadow-xl p-8 hover:shadow-2xl transition-all duration-500 hover:-translate-y-3 cursor-pointer">
                    <div class="w-12 h-12 bg-orange-400 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform text-white">
                        <span class="text-xl">{{ $blog->icon ?? '📝' }}</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4 leading-tight">{{ Str::limit($blog->title, 50) }}</h3>
                    <p class="text-slate-700 mb-6 leading-relaxed">{{ Str::limit(strip_tags($blog->content), 80) }}</p>
                    <a href="{{ route('blogs.show', $blog->slug ?? $blog->id) }}" class="text-orange-500 font-semibold hover:underline flex items-center gap-2">
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

{{-- OUR CUSTOMERS SECTION --}}
<section id="customers" class="scroll-animate py-24"
         style="background: radial-gradient(circle at top left, #ffe1c2 0, #ffe9d4 30%, #fde7d7 55%, #fbe5d5 75%, #f8ddc7 100%);">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-black text-slate-900 mb-4">
                Our Customers
            </h2>
            <p class="text-xl text-slate-700 max-w-2xl mx-auto">
                Brands and businesses that trust Ventar for reliable IT solutions.
            </p>
        </div>

        @if(isset($customers) && $customers->count() > 0)
            <div class="grid gap-8 md:grid-cols-3 lg:grid-cols-4">
                @foreach($customers as $customer)
                    <div class="group bg-white/90 rounded-3xl p-6 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-orange-100">
                        <div class="flex items-center justify-center mb-4 h-16">
                            @if($customer->logo_path)
                                <img src="{{ asset('storage/'.$customer->logo_path) }}"
                                     alt="{{ $customer->name }}"
                                     class="max-h-14 w-auto object-contain">
                            @else
                                <span class="text-2xl font-bold text-slate-400">
                                    {{ strtoupper(substr($customer->name, 0, 1)) }}
                                </span>
                            @endif
                        </div>
                        <h3 class="text-lg font-semibold text-slate-900 text-center mb-1">
                            {{ $customer->name }}
                        </h3>
                        @if($customer->company_name)
                            <p class="text-sm text-slate-700 text-center mb-1">
                                {{ $customer->company_name }}
                            </p>
                        @endif
                        @if($customer->address)
                            <p class="text-xs text-slate-500 text-center">
                                {{ $customer->address }}
                            </p>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-16">
                <p class="text-lg text-slate-500">
                    Customers will appear here once added from the admin panel.
                </p>
            </div>
        @endif
    </div>
</section>

@endsection
