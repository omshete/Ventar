<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ventar Admin - @yield('title','Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-100">
<div class="min-h-screen flex">

    {{-- Sidebar --}}
    <aside class="w-60 bg-slate-900 text-slate-100 hidden md:block">
        <div class="p-4 font-bold text-lg border-b border-slate-700">
            Ventar Admin
        </div>

        <nav class="p-4 space-y-2 text-sm">
            
            {{-- Dashboard menu item --}}
            <a href="{{ route('admin.dashboard') }}" class="block hover:text-white p-3 rounded-lg bg-slate-800/50">
                <b>Dashboard</b>
            </a>

            {{-- Home Hero menu item --}}
            @if (Route::has('admin.home-hero.index'))
                <a href="{{ route('admin.home-hero.index') }}" class="block hover:text-white p-3 rounded-lg bg-slate-800/50">
                    <b>Home hero</b>
                </a>
            @endif

            {{-- Home Content menu item --}}
            @if (Route::has('admin.home.index'))
                <a href="{{ route('admin.home.index') }}" class="block hover:text-white p-3 rounded-lg bg-slate-800/50">
                    <b>Our Story</b>
                </a>
            @endif

            {{-- Customers menu item --}}
            @if (Route::has('admin.customers.index'))
                <a href="{{ route('admin.customers.index') }}" class="block hover:text-white p-3 rounded-lg bg-slate-800/50">
                    <b>Customers</b>
                </a>
            @endif
             
            {{-- Settings menu item --}}
            @if (Route::has('admin.home_settings.index'))
                <a href="{{ route('admin.home_settings.index') }}" class="block hover:text-white p-3 rounded-lg bg-slate-800/50">
                    <b>Footer Settings</b>
                </a>
            @endif

            {{-- Services menu item --}}
            <a href="{{ route('admin.services.index') }}" class="block hover:text-white p-3 rounded-lg bg-slate-800/50">
                <b>Services</b>
            </a>

            {{-- About Us menu item --}}
            @if (Route::has('admin.about-us.index'))
                <a href="{{ route('admin.about-us.index') }}" class="block hover:text-white p-3 rounded-lg bg-slate-800/50">
                    <b>About Us</b>
                </a>
            @endif

            {{-- Our Aim menu item --}}
            @if (Route::has('admin.aim.index'))
                <a href="{{ route('admin.aim.index') }}" class="block hover:text-white p-3 rounded-lg bg-slate-800/50">
                    <b>Our Aim</b>
                </a>
            @endif

            {{-- Team menu item --}}
            <a href="{{ route('admin.team.index') }}" class="block hover:text-white p-3 rounded-lg bg-slate-800/50">
                <b>Team</b>
            </a>

            {{-- Blogs menu item --}}
            <a href="{{ route('admin.blogs.index') }}" class="block hover:text-white p-3 rounded-lg bg-slate-800/50">
                <b>Blogs</b>
            </a>

            {{-- Contact Settings menu item --}}
            @if (Route::has('admin.contact-settings.index'))
                <a href="{{ route('admin.contact-settings.index') }}" class="block hover:text-white p-3 rounded-lg bg-slate-800/50">
                    <b>Contact Settings</b>
                </a>
            @endif

            {{-- Logout --}}
            <form method="post" action="{{ route('admin.logout') }}" class="mt-4">
                @csrf
                <button class="text-xs text-red-400 hover:text-red-200 w-full p-3 rounded-lg bg-slate-800/50 text-left" type="submit">
                    <b>Logout</b>
                </button>
            </form>
        </nav>
    </aside>

    {{-- Main content --}}
    <main class="flex-1">
        <header class="bg-white shadow px-4 py-3 flex justify-between items-center">
            <h1 class="font-semibold text-lg">
                @yield('title','Dashboard')
            </h1>

            <span class="md:hidden text-xs text-slate-500">
                Ventar Admin
            </span>
        </header>

        <div class="p-6">
            @if(session('success'))
                <div class="mb-4 bg-green-100 text-green-800 px-4 py-2 rounded text-sm">
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </div>
    </main>

</div>
</body>
</html>
