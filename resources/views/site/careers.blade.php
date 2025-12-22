@extends('layouts.app')

@section('title', 'Careers - Join Our Team')

@section('content')
<section id="hero" class="py-26 text-white text-center bg-gradient-to-br from-red-500 to-orange-500">
    <div class="max-w-6xl mx-auto px-6">
        <h1 class="text-5xl md:text-7xl font-black mb-6 scroll-animate">Careers</h1>
        <p class="text-2xl md:text-3xl font-light max-w-3xl mx-auto leading-relaxed mb-12 scroll-animate">
            Join our passionate team and build the future together.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center scroll-animate">
            <a href="#open-positions" class="bg-white text-orange-500 font-bold px-8 py-4 rounded-2xl shadow-2xl hover:shadow-3xl transform hover:-translate-y-2 transition-all duration-300 text-lg">
                <span class="material-icons mr-2">work</span>
                View Open Positions
            </a>
            <a href="{{ url('/contact-us') }}"
                       class="bg-orange-500 text-white font-bold px-8 py-4 rounded-2xl shadow-xl hover:bg-orange-600 hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 inline-flex items-center">
                        ← Back to Contact US
            </a>
        </div>
    </div>
</section>

<section class="py-24 bg-gradient-to-br from-orange-50 to-pink-50">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-20 scroll-animate">
            <h2 class="text-4xl md:text-5xl font-black text-slate-900 mb-6">Why Join Ventar?</h2>
            <p class="text-xl text-slate-600 max-w-3xl mx-auto leading-relaxed">Work with cutting-edge technologies, collaborate with brilliant minds, and grow your career with us.</p>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-3 scroll-animate">
                <div class="w-16 h-16 bg-orange-500 rounded-2xl flex items-center justify-center mx-auto mb-6 text-white text-2xl">
                    <span class="material-icons">rocket_launch</span>
                </div>
                <h3 class="text-2xl font-black text-slate-900 mb-4 text-center">Innovative Projects</h3>
                <p class="text-slate-600 text-lg leading-relaxed text-center">Work on exciting Laravel & React.js projects that challenge and grow your skills.</p>
            </div>
            <div class="bg-white p-8 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-3 scroll-animate delay-200">
                <div class="w-16 h-16 bg-orange-500 rounded-2xl flex items-center justify-center mx-auto mb-6 text-white text-2xl">
                    <span class="material-icons">groups</span>
                </div>
                <h3 class="text-2xl font-black text-slate-900 mb-4 text-center">Great Team</h3>
                <p class="text-slate-600 text-lg leading-relaxed text-center">Collaborate with talented developers in a supportive, fun work environment.</p>
            </div>
            <div class="bg-white p-8 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-3 scroll-animate delay-400">
                <div class="w-16 h-16 bg-orange-500 rounded-2xl flex items-center justify-center mx-auto mb-6 text-white text-2xl">
                    <span class="material-icons">trending_up</span>
                </div>
                <h3 class="text-2xl font-black text-slate-900 mb-4 text-center">Career Growth</h3>
                <p class="text-slate-600 text-lg leading-relaxed text-center">Continuous learning opportunities and clear career progression paths.</p>
            </div>
        </div>
    </div>
</section>

<section id="open-positions" class="py-24 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-20 scroll-animate">
            <h2 class="text-4xl md:text-5xl font-black text-slate-900 mb-6">Open Positions</h2>
            <p class="text-xl text-slate-600 max-w-2xl mx-auto">
                @if($careers->where('is_active', true)->count() > 0)
                    We're always looking for talented individuals to join our team.
                @else
                    No open positions right now. Check back soon!
                @endif
            </p>
        </div>

        @if($careers->where('is_active', true)->count() > 0)
            <div class="grid md:grid-cols-2 lg:grid-cols-2 gap-8">
                @foreach($careers->where('is_active', true)->sortBy('sort_order') as $career)
                    <div class="bg-gradient-to-br from-orange-500 to-indigo-100 p-8 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-orange-100 scroll-animate">
                        <div class="flex items-start mb-6">
                            <div class="w-12 h-12 bg-orange-500 rounded-xl flex items-center justify-center text-white font-bold text-lg flex-shrink-0 mt-1">
                                <span class="material-icons text-sm">{{ $career->icon ?? 'work' }}</span>
                            </div>
                            <div class="ml-4 flex-1 min-w-0">
                                <h3 class="text-2xl font-black text-slate-900 mb-2 truncate">{{ $career->title }}</h3>
                                <span class="bg-orange-100 text-orange-800 px-3 py-1 rounded-full text-sm font-semibold">{{ $career->location }}</span>
                                <p class="text-xs text-slate-500 mt-1 font-medium">{{ $career->type }}</p>
                            </div>
                        </div>

                        <div class="text-slate-700 text-lg mb-8 leading-relaxed" style="max-height: 120px; overflow:hidden;">
                            {!! nl2br(e($career->description)) !!}
                        </div>

                        <a href="{{ route('careers.apply.form', $career->id) }}"
                           class="w-full inline-flex items-center justify-center bg-orange-500 text-white font-bold py-3 px-6 rounded-xl text-center hover:bg-orange-600 shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                            <span class="material-icons mr-2 text-sm">send</span>
                            Apply Now
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-24">
                <span class="material-icons text-6xl text-slate-300 mb-6 block mx-auto">work_off</span>
                <h3 class="text-2xl font-black text-slate-600 mb-4">No Open Positions</h3>
                <p class="text-slate-600 max-w-md mx-auto mb-8">We're not hiring right now, but we'll post new opportunities soon.</p>
                <a href="mailto:sheteom28@gmail.com?subject=General%20Job%20Inquiry&body=Hi%20Team,%0A%0AI'd%20love%20to%20work%20with%20Ventar.%20Please%20keep%20me%20posted%20on%20new%20openings."
                   class="bg-orange-500 text-white font-bold px-8 py-4 rounded-2xl shadow-xl hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 inline-flex items-center">
                    <span class="material-icons mr-2">email</span>
                    Email Us Anyway
                </a>
            </div>
        @endif
    </div>
</section>
@endsection
