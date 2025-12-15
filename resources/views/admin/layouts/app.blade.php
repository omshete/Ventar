<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ventar Admin - @yield('title','Dashboard')</title>
    <meta name="viewport" content="width=device-width, login-scale=1">
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
            <a href="{{ route('admin.dashboard') }}" class="block hover:text-white">
                Dashboard
            </a>

            <a href="{{ route('admin.services.index') }}" class="block hover:text-white">
                Services
            </a>

            <a href="{{ route('admin.blogs.index') }}" class="block hover:text-white">
                Blogs
            </a>

            <a href="{{ route('admin.team.index') }}" class="block hover:text-white">
                Team
            </a>

            <a href="{{ route('admin.home_sections.index') }}" class="block hover:text-white p-3 rounded-lg bg-slate-800/50">
                <i class="fas fa-home mr-2"></i>Hero Sections
            </a>


            {{-- Home Content menu item --}}
            @if (Route::has('admin.home.index'))
                <a href="{{ route('admin.home.index') }}" class="block hover:text-white">
                    Home Content
                </a>
            @endif


            <a href="{{ route('admin.customers.index') }}" class="block hover:text-white">
                Customers
            </a>

            {{-- Settings menu item --}}
            @if (Route::has('admin.home_settings.index'))
                <a href="{{ route('admin.home_settings.index') }}" class="block hover:text-white">
                    Settings / Logo
                </a>
            @endif

            <form method="post" action="{{ route('admin.logout') }}" class="mt-4">
                @csrf
                <button class="text-xs text-red-400 hover:text-red-200">
                    Logout
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
