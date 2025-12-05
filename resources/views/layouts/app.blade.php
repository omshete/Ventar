<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ventar - IT Services</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-50">
    {{-- Loader --}}
    <div id="loader" class="fixed inset-0 z-50 flex items-center justify-center bg-gradient-to-br from-red-500 to-pink-500">
        <div class="relative flex flex-col items-center">
            <img src="{{ asset('images/ventar-logo.png') }}" alt="Ventar" class="w-32 h-32 mb-4">
            <div class="paper-plane w-8 h-8 bg-white rounded-full shadow-lg"></div>
            <p class="mt-4 text-white text-lg font-semibold">Loading Ventar...</p>
        </div>
    </div>

    {{-- Header / navbar --}}
    <header class="bg-gradient-to-r from-red-500 to-pink-500 text-white">
        <div class="max-w-6xl mx-auto flex items-center justify-between py-4 px-4">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/ventar-logo.png') }}" alt="Ventar" class="w-10 h-10">
                <span class="font-bold text-xl">Ventar</span>
            </div>
            <nav class="space-x-4 text-sm md:text-base">
                <a href="{{ url('/') }}" class="hover:underline">Home</a>
                <a href="{{ url('/services') }}" class="hover:underline">Services</a>
                <a href="{{ url('/about-us') }}" class="hover:underline">About Us</a>
                <a href="{{ url('/our-aim') }}" class="hover:underline">Our Aim</a>
                <a href="{{ url('/team') }}" class="hover:underline">Team</a>
                <a href="{{ url('/blogs') }}" class="hover:underline">Blogs</a>
                <a href="{{ url('/contact-us') }}" class="hover:underline">Contact</a>
            </nav>
        </div>
    </header>

    {{-- Page content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-slate-900 text-slate-200 mt-16">
        <div class="max-w-6xl mx-auto px-4 py-8 grid md:grid-cols-3 gap-6 text-sm">
            <div>
                <h4 class="font-semibold mb-2">Ventar - IT Services</h4>
                <p>Smart IT solutions for modern businesses.</p>
            </div>
            <div>
                <h4 class="font-semibold mb-2">Contact</h4>
                <p>Email: info@ventar.com</p>
                <p>Phone: +91-0000000000</p>
            </div>
            <div>
                <h4 class="font-semibold mb-2">Follow us</h4>
                <p>LinkedIn | Instagram | Facebook | X</p>
            </div>
        </div>
        <div class="text-center text-xs py-3 border-t border-slate-700">
            © {{ date('Y') }} Ventar. All rights reserved.
        </div>
    </footer>

    {{-- Loader script --}}
    <script>
        window.addEventListener('load', function () {
            const loader = document.getElementById('loader');
            if (loader) {
                loader.style.opacity = '0';
                loader.style.transition = 'opacity 0.5s ease';
                setTimeout(() => loader.style.display = 'none', 500);
            }
        });
    </script>
</body>
</html>