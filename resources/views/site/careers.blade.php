@extends('layouts.app')

@section('title', 'Careers - Join Our Team')

@section('content')
<!-- Hero Section -->
<section id="hero" class="py-26 text-white text-center bg-gradient-to-br from-red-500 to-orange-500 text-white">
    <div class="max-w-6xl mx-auto px-6 text-center text-white">
        <h1 class="text-5xl md:text-7xl font-black mb-6 scroll-animate">Careers</h1>
        <p class="text-2xl md:text-3xl font-light max-w-3xl mx-auto leading-relaxed mb-12 scroll-animate">
            Join our passionate team and build the future of web development with us.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center scroll-animate">
            <a href="#open-positions" class="bg-white text-orange-500 font-bold px-8 py-4 rounded-2xl shadow-2xl hover:shadow-3xl transform hover:-translate-y-2 transition-all duration-300 text-lg">
                <span class="material-icons mr-2">work</span>
                View Open Positions
            </a>
            <a href="#apply-now" class="border-2 border-white text-white font-bold px-8 py-4 rounded-2xl hover:bg-white hover:text-orange-500 shadow-2xl hover:shadow-3xl transform hover:-translate-y-2 transition-all duration-300 text-lg">
                Apply Now
            </a>
        </div>
    </div>
</section>

<!-- Why Join Us -->
<section class="py-24 bg-gradient-to-br from-orange-50 to-pink-50">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-20 scroll-animate">
            <h2 class="text-4xl md:text-5xl font-black text-slate-900 mb-6">Why Join Ventar?</h2>
            <p class="text-xl text-slate-600 max-w-3xl mx-auto leading-relaxed">Work with cutting-edge technologies, collaborate with brilliant minds, and grow your career with us.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-3 scroll-animate">
                <div class="w-15 h-15 bg-orange-500 rounded-2xl flex items-center justify-center mx-auto mb-6 text-white text-2xl">
                    <span class="material-icons">rocket_launch</span>
                </div>
                <h3 class="text-2xl font-black text-slate-900 mb-4 text-center">Innovative Projects</h3>
                <p class="text-slate-600 text-lg leading-relaxed text-center">Work on exciting Laravel & React.js projects that challenge and grow your skills.</p>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-3 scroll-animate delay-200">
                <div class="w-15 h-15 bg-orange-500 rounded-2xl flex items-center justify-center mx-auto mb-6 text-white text-2xl">
                    <span class="material-icons">groups</span>
                </div>
                <h3 class="text-2xl font-black text-slate-900 mb-4 text-center">Great Team</h3>
                <p class="text-slate-600 text-lg leading-relaxed text-center">Collaborate with talented developers in a supportive, fun work environment.</p>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-3 scroll-animate delay-400">
                <div class="w-15 h-15 bg-orange-500 rounded-2xl flex items-center justify-center mx-auto mb-6 text-white text-2xl">
                    <span class="material-icons">trending_up</span>
                </div>
                <h3 class="text-2xl font-black text-slate-900 mb-4 text-center">Career Growth</h3>
                <p class="text-slate-600 text-lg leading-relaxed text-center">Continuous learning opportunities and clear career progression paths.</p>
            </div>
        </div>
    </div>
</section>

<!-- Open Positions -->
<section id="open-positions" class="py-24 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-20 scroll-animate">
            <h2 class="text-4xl md:text-5xl font-black text-slate-900 mb-6">Open Positions</h2>
            <p class="text-xl text-slate-600 max-w-2xl mx-auto">We're always looking for talented individuals to join our team.</p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-gradient-to-br from-orange-500 to-indigo-100 p-8 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-orange-100 scroll-animate">
                <div class="flex items-start mb-6">
                    <div class="w-12 h-12 bg-orange-500 rounded-xl flex items-center justify-center text-white font-bold text-lg flex-shrink-0 mt-1">
                        <span class="material-icons text-sm">code</span>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-2xl font-black text-slate-900 mb-2">Full Stack Developer</h3>
                        <span class="bg-orange-100 text-orange-800 px-3 py-1 rounded-full text-sm font-semibold">Pune, Maharashtra (On-site)</span>
                    </div>
                </div>
                <ul class="text-slate-700 text-lg space-y-2 mb-6">
                    <li>• Laravel & React.js expertise required</li>
                    <li>• 2+ years experience</li>
                    <li>• Competitive salary + benefits</li>
                </ul>
                <a href="#apply-now" class="w-full block bg-orange-500 text-white font-bold py-3 px-6 rounded-xl text-center hover:bg-orange-600 shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                    Apply Now
                </a>
            </div>

            <div class="bg-gradient-to-br from-orange-500 to-indigo-100 p-8 rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-orange-100 scroll-animate">
                <div class="flex items-start mb-6">
                    <div class="w-12 h-12 bg-orange-500 rounded-xl flex items-center justify-center text-white font-bold text-lg flex-shrink-0 mt-1">
                        <span class="material-icons text-sm">visibility</span>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-2xl font-black text-slate-900 mb-2">Frontend Developer</h3>
                        <span class="bg-orange-100 text-orange-800 px-3 py-1 rounded-full text-sm font-semibold">Pune, Maharashtra (Hybrid)</span>
                    </div>
                </div>
                <ul class="text-slate-700 text-lg space-y-2 mb-6">
                    <li>• React.js & Tailwind CSS</li>
                    <li>• 1+ years experience</li>
                    <li>• Modern UI/UX focus</li>
                </ul>
                <a href="#apply-now" class="w-full block bg-orange-500 text-white font-bold py-3 px-6 rounded-xl text-center hover:bg-orange-600 shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                    Apply Now
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
