<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $homeSetting->site_title ?? 'Ventar - IT Services' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-slate-50">
    {{-- Loader --}}
    <div id="loader" class="fixed inset-0 z-50 flex items-center justify-center bg-gradient-to-br from-red-500 to-pink-500">
        <div class="relative flex flex-col items-center">
            @if(!empty($homeSetting->logo))
                {{-- when logo is saved in DB (storage/app/public/...) --}}
                <img src="{{ asset('storage/'.$homeSetting->logo) }}"
                     alt="{{ $homeSetting->site_title ?? 'Ventar' }}"
                     class="w-32 h-32 mb-4">
            @else
                {{-- fallback SVG in public/images --}}
                <img src="{{ asset('images/ventar-logo.svg') }}"
                     alt="{{ $homeSetting->site_title ?? 'Ventar' }}"
                     class="w-32 h-32 mb-4">
            @endif
            <div class="paper-plane w-8 h-8 bg-white rounded-full shadow-lg"></div>
            <p class="mt-4 text-white text-lg font-semibold">
                Loading {{ $homeSetting->site_title ?? 'Ventar' }}...
            </p>
        </div>
    </div>

    {{-- Header / Navbar --}}
    <header class="bg-white text-orange-500 shadow-lg"
            x-data="{ openMenu:false, openAbout:false }">
        <div class="max-w-6xl mx-auto flex items-center justify-between py-4 px-4">
            {{-- LOGO --}}
            <div class="flex items-center gap-3 animate-fade-in">
                @if(!empty($homeSetting->logo))
                    <img src="{{ asset('storage/'.$homeSetting->logo) }}"
                         alt="{{ $homeSetting->site_title ?? 'Ventar' }}"
                         class="w-10 h-10 transform transition duration-300 hover:scale-110">
                @else
                    <img src="{{ asset('images/ventar-logo.svg') }}"
                         alt="{{ $homeSetting->site_title ?? 'Ventar' }}"
                         class="w-10 h-10 transform transition duration-300 hover:scale-110">
                @endif
            </div>

            {{-- DESKTOP MENU --}}
            <nav class="hidden md:flex items-center gap-6 text-base animate-slide-down">
                <a href="{{ url('/') }}" class="nav-link">Home</a>
                <a href="{{ url('/services') }}" class="nav-link">Services</a>

                {{-- ABOUT DROPDOWN DESKTOP --}}
                <div class="relative group">
                    <button class="nav-link inline-flex items-center gap-1 py-2">
                        About Us <span class="text-sm">▼</span>
                    </button>
                    <div class="absolute left-0 mt-2 w-40 bg-white text-slate-800 shadow-lg rounded-md
                                opacity-0 translate-y-2 invisible group-hover:opacity-100 group-hover:visible
                                group-hover:translate-y-0 transition-all duration-300 ease-out z-50">
                        <a href="{{ url('/about-us') }}" class="dropdown-item">About Us</a>
                        <a href="{{ url('/our-aim') }}" class="dropdown-item">Our Aim</a>
                        <a href="{{ url('/team') }}" class="dropdown-item">Team</a>
                    </div>
                </div>

                <a href="{{ url('/blogs') }}" class="nav-link">Blogs</a>
                <a href="{{ url('/contact-us') }}" class="nav-link">Contact</a>
            </nav>

            {{-- MOBILE MENU BUTTON --}}
            <button @click="openMenu = !openMenu"
                    class="md:hidden text-3xl text-orange-500 transform transition duration-300 hover:scale-110"
                    :class="{ 'rotate-90' : openMenu }">
                ☰
            </button>
        </div>

        {{-- MOBILE MENU --}}
        <div x-show="openMenu"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 -translate-y-5"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-300"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-5"
             class="md:hidden bg-white text-orange-500 border-t border-orange-200">
            <nav class="flex flex-col p-4 space-y-3 text-base">
                <a href="{{ url('/') }}" class="mobile-link">Home</a>
                <a href="{{ url('/services') }}" class="mobile-link">Services</a>

                {{-- MOBILE ABOUT DROPDOWN --}}
                <div x-data="{ openAboutMobile: false }" class="flex flex-col">
                    <button @click="openAboutMobile = !openAboutMobile"
                            class="flex justify-between items-center mobile-link w-full">
                        <span>About Us</span>
                        <span x-text="openAboutMobile ? '▲' : '▼'"></span>
                    </button>
                    <div x-show="openAboutMobile"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 -translate-y-2"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 -translate-y-2"
                         class="ml-4 flex flex-col space-y-2">
                        <a href="{{ url('/about-us') }}" class="mobile-sub-link">About Us</a>
                        <a href="{{ url('/our-aim') }}" class="mobile-sub-link">Our Aim</a>
                        <a href="{{ url('/team') }}" class="mobile-sub-link">Team</a>
                    </div>
                </div>

                <a href="{{ url('/blogs') }}" class="mobile-link">Blogs</a>
                <a href="{{ url('/contact-us') }}" class="mobile-link">Contact</a>
            </nav>
        </div>
    </header>

    {{-- Tailwind classes for animations --}}
    <style>
        .animate-fade-in { animation: fade-in 0.6s ease-out forwards; }
        .animate-slide-down { animation: slide-down 0.6s ease-out forwards; }

        @keyframes fade-in {
            from { opacity: 0; transform: translateY(-10px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        @keyframes slide-down {
            from { opacity: 0; transform: translateY(-20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .nav-link {
            position: relative;
            transition: 0.3s ease;
            color: #f97316;
            font-weight: 500;
        }
        .nav-link:hover {
            transform: translateY(-2px) scale(1.05);
            color: #ea580c;
        }

        .dropdown-item {
            display: block;
            padding: 8px 16px;
            transition: 0.2s;
            color: #0f172a;
        }
        .dropdown-item:hover {
            background: #f1f5f9;
            padding-left: 20px;
        }

        .mobile-link {
            transition: 0.3s ease;
            color: #f97316;
            font-weight: 500;
        }
        .mobile-link:hover {
            transform: translateX(4px);
            color: #ea580c;
        }

        .mobile-sub-link {
            transition: 0.2s ease;
            color: #0f172a;
        }
        .mobile-sub-link:hover {
            transform: translateX(6px);
        }

        .scroll-animate {
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }
        .scroll-animate.in-view {
            opacity: 1;
            transform: translateY(0);
        }
    </style>

    {{-- Page content --}}
    <main class="min-h-screen">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="bg-[#333333] text-slate-100">
        <div class="max-w-6xl mx-auto px-6 py-8 grid md:grid-cols-3 gap-8 text-sm">
            {{-- COMPANY --}}
            <div>
                <h3 class="text-2xl font-semibold mb-4">
                    {{ $homeSetting->footer_company ?? 'Ventar IT Solutions' }}
                </h3>
                <p class="text-slate-300">
                    {{ $homeSetting->footer_description ?? 'Your trusted IT partner.' }}
                </p>
            </div>

            {{-- CONTACT --}}
            <div>
                <h4 class="text-lg font-semibold mb-4">
                    <a href="{{ url('/contact-us') }}" class="mobile-link">
                        Contact Us:-
                    </a>
                </h4>
                <div class="space-y-3 text-slate-300">
                    <div>✉️ {{ $homeSetting->footer_email ?? 'info@ventar.in' }}</div>
                    <div>📞 {{ $homeSetting->footer_phone ?? '+91 9860036529' }}</div>
                    <div>📍 {{ $homeSetting->footer_address ?? 'Pune, Maharashtra' }}</div>
                </div>
            </div>

            {{-- FOLLOW US --}}
            <div>
                <h4 class="text-lg font-semibold mb-4">Follow Us:-</h4>
                <div class="flex items-center gap-6">
                    <a href="{{ $homeSetting->footer_x ?? 'https://x.com/ventarit?s=21' }}"
                       target="_blank" rel="noopener noreferrer"
                       class="w-12 h-12 rounded-full bg-black flex items-center justify-center text-white text-lg transition hover:scale-110">
                        <i class="fa-brands fa-x-twitter"></i>
                    </a>
                    <a href="{{ $homeSetting->footer_linkedin ?? 'https://www.linkedin.com/company/ventar-it-solutions/posts/?feedView=all&viewAsMember=true' }}"
                       target="_blank" rel="noopener noreferrer"
                       class="w-12 h-12 rounded-full bg-[#0A66C2] flex items-center justify-center text-white text-lg transition hover:scale-110">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                    <a href="{{ $homeSetting->footer_facebook ?? 'https://www.facebook.com/people/Ventar/61581899771931/?mibextid=wwXIfr&rdid=tXXeCG1dnzKEZLGP&share_url=https%253A%252F%252Fwww.facebook.com%252Fshare%252F1CuLXisNW9%252F%253Fmibextid%253DwwXIfr' }}"
                       target="_blank" rel="noopener noreferrer"
                       class="w-12 h-12 rounded-full bg-[#1877F2] flex items-center justify-center text-white text-lg transition hover:scale-110">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="{{ $homeSetting->footer_instagram ?? 'https://www.instagram.com/ventar_it?igsh=cGwyaThuaWxubW1z&utm_source=qr' }}"
                       target="_blank" rel="noopener noreferrer"
                       class="w-12 h-12 rounded-full bg-gradient-to-tr from-pink-500 via-red-500 to-yellow-500 flex items-center justify-center text-white text-lg transition hover:scale-110">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="border-t border-slate-600 text-center py-3 text-xs text-slate-300">
            © {{ date('Y') }} {{ $homeSetting->footer_company ?? 'Ventar IT Solutions' }}. All rights reserved.
        </div>
    </footer>

    {{-- Loader + Scroll animation scripts --}}
    <script>
        window.addEventListener('load', function () {
            const loader = document.getElementById('loader');
            if (loader) {
                loader.style.opacity = '0';
                loader.style.transition = 'opacity 0.5s ease';
                setTimeout(() => loader.style.display = 'none', 500);
            }
        });

        document.addEventListener('DOMContentLoaded', function () {
            const animatedSections = document.querySelectorAll('.scroll-animate');
            if ('IntersectionObserver' in window) {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('in-view');
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.2 });

                animatedSections.forEach(section => observer.observe(section));
            } else {
                animatedSections.forEach(section => section.classList.add('in-view'));
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>
