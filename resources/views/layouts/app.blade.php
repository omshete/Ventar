<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $homeSetting->site_title ?? 'Ventar - IT Services' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-slate-50">
    {{-- Loader --}}
    <div id="loader" class="fixed inset-0 z-50 flex items-center justify-center bg-gradient-to-br from-orange-500 to-orange-600 text-white">
        <div class="relative flex flex-col items-center text-white">
            @if(!empty($homeSetting->logo))
                <img src="{{ asset('storage/'.$homeSetting->logo) }}"
                     alt="{{ $homeSetting->site_title ?? 'Ventar' }}"
                     class="h-50 w-auto mb-4">
            @else
                <img src="{{ asset('images/ventar-logo.svg') }}"
                     alt="{{ $homeSetting->site_title ?? 'Ventar' }}"
                     class="h-50 w-auto mb-4">
            @endif
            <div class="paper-plane w-8 h-8 bg-white rounded-full shadow-lg"></div>
            <p class="mt-4 text-white text-lg font-semibold">
                Loading {{ $homeSetting->site_title ?? 'Ventar' }}...
            </p>
        </div>
    </div>

    {{-- Header / Navbar --}}
    <header class="bg-white/95 backdrop-blur-md text-orange-500 shadow-xl border-b border-orange-100"
            x-data="{ 
                openMenu: false, 
                showAbout: false
            }">
        <div class="max-w-6xl mx-auto flex items-center justify-between px-4 py-4"
             style="height:72px;">
            
            {{-- LOGO --}}
            <div class="flex items-center gap-2 animate-fade-in">
                <a href="{{ url('/') }}" class="inline-flex items-center">
                    @if(!empty($homeSetting->logo))
                        <img src="{{ asset('storage/'.$homeSetting->logo) }}"
                             alt="{{ $homeSetting->site_title ?? 'Ventar' }}"
                             class="h-25 w-auto">
                    @else
                        <img src="{{ asset('images/ventar-logo.svg') }}"
                             alt="{{ $homeSetting->site_title ?? 'Ventar' }}"
                             class="h-25 w-auto">
                    @endif
                </a>
            </div>

            {{-- DESKTOP MENU --}}
            <nav class="hidden md:flex items-center gap-8 text-base animate-slide-down">
                <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active-nav' : '' }}">Home</a>
                <a href="{{ url('/services') }}" class="nav-link {{ request()->is('services*') ? 'active-nav' : '' }}">Services</a>

                {{-- FIXED DESKTOP ABOUT DROPDOWN --}}
                <div class="relative {{ request()->is('about-us*', 'our-aim*', 'team*') ? 'active-dropdown' : '' }}" x-data="{ showAbout: false }">
                    <button @click="showAbout = !showAbout"
                            class="nav-link inline-flex items-center gap-2 px-4 py-2 focus:outline-none rounded-xl {{ request()->is('about-us*', 'our-aim*', 'team*') ? 'active-nav' : '' }}">
                        About Us 
                        <i class="fas fa-chevron-down text-sm transition-transform duration-200" :class="showAbout ? 'rotate-180' : ''"></i>
                    </button>
                    
                    <div x-show="showAbout" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 -translate-y-2 scale-95"
                         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                         x-transition:leave-end="opacity-0 -translate-y-2 scale-95"
                         @click.away="showAbout = false"
                         class="absolute left-0 mt-2 w-56 bg-white shadow-2xl rounded-2xl border border-orange-100 z-50 overflow-hidden">
                        
                        <a href="{{ url('/about-us') }}" 
                           class="block dropdown-item px-6 py-4 hover:bg-orange-50 {{ request()->is('about-us') ? 'bg-orange-100 text-orange-800 font-bold' : '' }}">
                            <div class="flex items-center gap-3">
                                <i class="fas fa-info-circle text-orange-500"></i>
                                <span>About Us</span>
                            </div>
                        </a>
                        
                        <a href="{{ url('/our-aim') }}" 
                           class="block dropdown-item px-6 py-4 hover:bg-orange-50 {{ request()->is('our-aim') ? 'bg-orange-100 text-orange-800 font-bold' : '' }}">
                            <div class="flex items-center gap-3">
                                <i class="fas fa-bullseye text-orange-500"></i>
                                <span>Our Aim</span>
                            </div>
                        </a>
                        
                        <a href="{{ url('/team') }}" 
                           class="block dropdown-item px-6 py-4 hover:bg-orange-50 {{ request()->is('team') ? 'bg-orange-100 text-orange-800 font-bold' : '' }}">
                            <div class="flex items-center gap-3">
                                <i class="fas fa-users text-orange-500"></i>
                                <span>Team</span>
                            </div>
                        </a>
                    </div>
                </div>

                <a href="{{ url('/blogs') }}" class="nav-link {{ request()->is('blogs*') ? 'active-nav' : '' }}">Blogs</a>
                <a href="{{ url('/contact-us') }}" class="nav-link {{ request()->is('contact-us') ? 'active-nav' : '' }}">Contact</a>
            </nav>

            {{-- MOBILE MENU BUTTON --}}
            <button @click="openMenu = !openMenu"
                    class="md:hidden text-3xl text-orange-500 hover:text-orange-600 transition-colors p-2 rounded-xl"
                    :class="{ 'bg-orange-100 text-orange-600': openMenu }">
                <i class="fas" :class="openMenu ? 'fa-times' : 'fa-bars'"></i>
            </button>
        </div>

        {{-- MOBILE MENU --}}
        <div x-show="openMenu"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 scale-100"
             x-transition:leave-end="opacity-0 -translate-y-4"
             @click.away="openMenu = false"
             class="md:hidden bg-white/95 backdrop-blur-md border-t border-orange-100 shadow-2xl">
            
            <nav class="p-6 space-y-2">
                <a href="{{ url('/') }}" class="block mobile-link {{ request()->is('/') ? 'mobile-active' : '' }}">Home</a>
                <a href="{{ url('/services') }}" class="block mobile-link {{ request()->is('services*') ? 'mobile-active' : '' }}">Services</a>

                {{-- FIXED MOBILE ABOUT DROPDOWN --}}
                <div x-data="{ showMobileAbout: false }" class="border-l-4 {{ request()->is('about-us*', 'our-aim*', 'team*') ? 'border-orange-400 bg-orange-50/30 pl-4 py-2 rounded-r-xl' : 'border-orange-200 pl-4 py-2' }}">
                    <button @click="showMobileAbout = !showMobileAbout" 
                            class="w-full flex justify-between items-center mobile-link py-3 {{ request()->is('about-us*', 'our-aim*', 'team*') ? 'mobile-active' : '' }}">
                        <span>About Us</span>
                        <i class="fas fa-chevron-down text-sm transition-transform duration-200" :class="showMobileAbout ? 'rotate-180' : ''"></i>
                    </button>
                    
                    <div x-show="showMobileAbout" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 -translate-y-2"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-end="opacity-0 -translate-y-2"
                         @click.away="showMobileAbout = false"
                         class="mt-2 ml-2 space-y-1">
                        <a href="{{ url('/about-us') }}" class="block mobile-sub-link {{ request()->is('about-us') ? 'mobile-sub-active' : '' }}">About Us</a>
                        <a href="{{ url('/our-aim') }}" class="block mobile-sub-link {{ request()->is('our-aim') ? 'mobile-sub-active' : '' }}">Our Aim</a>
                        <a href="{{ url('/team') }}" class="block mobile-sub-link {{ request()->is('team') ? 'mobile-sub-active' : '' }}">Team</a>
                    </div>
                </div>

                <a href="{{ url('/blogs') }}" class="block mobile-link {{ request()->is('blogs*') ? 'mobile-active' : '' }}">Blogs</a>
                <a href="{{ url('/contact-us') }}" class="block mobile-link {{ request()->is('contact-us') ? 'mobile-active' : '' }}">Contact</a>
            </nav>
        </div>
    </header>

    {{-- STYLES --}}
    <style>
        .animate-fade-in { animation: fadeIn 0.6s ease-out forwards; }
        .animate-slide-down { animation: slideDown 0.6s ease-out forwards; }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* NAV LINKS */
        .nav-link {
            color: #f97316; font-weight: 600; padding: 8px 16px; 
            border-radius: 12px; transition: all 0.2s ease;
        }
        .nav-link:hover { background: rgba(251, 146, 60, 0.1); }

        .active-nav {
            background: rgba(251, 146, 60, 0.2) !important;
            color: #ea580c !important;
            box-shadow: 0 4px 12px rgba(251, 146, 60, 0.25);
        }

        .active-dropdown .nav-link {
            background: rgba(251, 146, 60, 0.2) !important;
            color: #ea580c !important;
            box-shadow: 0 4px 12px rgba(251, 146, 60, 0.25);
        }

        .dropdown-item { 
            transition: all 0.2s ease; color: #374151; 
            font-weight: 500; border-radius: 8px;
        }
        .dropdown-item:hover { color: #ea580c; }

        /* MOBILE */
        .mobile-link {
            color: #f97316; font-weight: 600; padding: 12px 16px; 
            border-radius: 12px; transition: all 0.2s ease; display: block;
        }
        .mobile-link:hover { background: rgba(251, 146, 60, 0.1); }
        .mobile-active {
            background: rgba(251, 146, 60, 0.2) !important;
            color: #ea580c !important;
            box-shadow: 0 4px 12px rgba(251, 146, 60, 0.25);
        }
        .mobile-sub-link {
            color: #4b5563; padding: 10px 16px; border-radius: 8px; 
            border-left: 3px solid transparent; margin-left: 8px;
            transition: all 0.2s ease;
        }
        .mobile-sub-link:hover { 
            background: #fed7aa; border-left-color: #f97316; 
        }
        .mobile-sub-active {
            background: #fed7aa !important; color: #ea580c !important;
            border-left-color: #ea580c !important;
        }

        .scroll-animate {
            opacity: 0; transform: translateY(50px); 
            transition: all 0.8s ease-out;
        }
        .scroll-animate.in-view { opacity: 1; transform: translateY(0); }

        /* FOOTER PAGES LINKS - VERTICAL */
        .footer-pages-link {
            display: block;
            color: #f97316; font-weight: 600; 
            transition: all 0.2s ease; padding: 8px 0;
            border-radius: 6px;
        }
        .footer-pages-link:hover { 
            color: #ea580c; padding-left: 8px;
            text-decoration: none; 
        }
    </style>

    <main class="min-h-screen">@yield('content')</main>

    {{-- FOOTER --}}
    <footer class="bg-gradient-to-r from-slate-900 to-slate-800 text-slate-100">
        <div class="max-w-6xl mx-auto px-6 py-12 grid md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-3xl font-black mb-6 text-white">
                    <a href="/">{{ $homeSetting->footer_company ?? 'Ventar IT Solutions' }}</a>
                </h3>
                <p class="text-slate-300">{{ $homeSetting->footer_description ?? 'Your trusted IT partner.' }}</p>
            </div>
            
            <div class="md:col-span-2">
                <div class="grid md:grid-cols-3 gap-8">
                    <div>
                        <h4 class="text-xl font-bold mb-6 text-white"><a href="/contact-us">Contact Us</a></h4>
                        <div class="space-y-4 text-slate-300">
                            <div><span class="text-orange-400">✉️</span><a href="mailto:{{ $homeSetting->footer_email ?? 'info@ventar.in' }}">{{ $homeSetting->footer_email ?? 'info@ventar.in' }}</a></div>
                            <div><span class="text-orange-400">📞</span><a href="tel:{{ $homeSetting->footer_phone ?? '+91 9860036529' }}">{{ $homeSetting->footer_phone ?? '+91 9860036529' }}</a></div>
                            <div><span class="text-orange-400">📍</span><a href="https://maps.google.com/?q={{ urlencode($homeSetting->footer_address ?? 'Pune, Maharashtra') }}">{{ $homeSetting->footer_address ?? 'Pune, Maharashtra' }}</a></div>
                        </div>
                    </div>
                    
                    <div>
                        <h4 class="text-xl font-bold mb-2 text-white">Quick Links</h4>
                        <div class="flex flex-col">
                            @if(isset($footerPages) && count($footerPages) > 0)
                                @foreach($footerPages as $page)
                                    <a href="{{ url($page->slug) }}" class="footer-pages-link">
                                        {{ $page->title }}
                                    </a>
                                @endforeach
                            @else
                                <div class="flex flex-col">
                                    <a href="{{ url('/') }}" class="footer-pages-link">Home</a>
                                    <a href="{{ url('/services') }}" class="footer-pages-link">Services</a>
                                    <a href="{{ url('/about-us') }}" class="footer-pages-link">About</a>
                                    <a href="{{ url('/blogs') }}" class="footer-pages-link">Blogs</a>
                                    <a href="{{ url('/careers') }}" class="footer-pages-link">Careers</a>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <div>
                        <h4 class="text-xl font-bold mb-6 text-white">Follow Us</h4>
                        <div class="flex gap-4">
                            <a href="{{ $homeSetting->footer_x ?? '#' }}" target="_blank" class="w-12 h-12 bg-slate-700 rounded-xl flex items-center justify-center hover:shadow-3xl transition-all hover:-translate-y-2 hover:bg-black"><i class="fab fa-x-twitter"></i></a>
                            <a href="{{ $homeSetting->footer_linkedin ?? '#' }}" target="_blank" class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center hover:shadow-3xl transition-all hover:-translate-y-2 hover:bg-blue-700"><i class="fab fa-linkedin-in"></i></a>
                            <a href="{{ $homeSetting->footer_facebook ?? '#' }}" target="_blank" class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center hover:shadow-3xl transition-all hover:-translate-y-2 hover:bg-blue-700"><i class="fab fa-facebook-f"></i></a>
                            <a href="{{ $homeSetting->footer_instagram ?? '#' }}" target="_blank" class="w-12 h-12 bg-gradient-to-r from-pink-500 to-orange-500 rounded-xl flex items-center justify-center hover:shadow-3xl transition-all hover:-translate-y-2 hover:from-pink-600 hover:to-orange-600"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-t border-slate-700 text-center py-4 text-xs text-slate-400">
            © {{ date('Y') }} {{ $homeSetting->footer_company ?? 'Ventar IT Solutions' }}. All rights reserved.
        </div>
    </footer>

    <script>
        window.addEventListener('load', () => {
            const loader = document.getElementById('loader');
            if (loader) {
                loader.style.opacity = '0';
                setTimeout(() => loader.remove(), 600);
            }
        });

        document.addEventListener('DOMContentLoaded', () => {
            const sections = document.querySelectorAll('.scroll-animate');
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('in-view');
                    }
                });
            });
            sections.forEach(section => observer.observe(section));
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>
