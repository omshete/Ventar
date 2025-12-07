<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ventar Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-br from-red-500 to-pink-500 min-h-screen flex items-center justify-center">
<div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-8">
    <h1 class="text-2xl font-bold mb-6 text-center">Ventar Admin Login</h1>

    @if($errors->any())
        <div class="mb-4 bg-red-100 text-red-700 px-4 py-2 rounded text-sm">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="post" action="{{ route('admin.login') }}">
        @csrf
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Email</label>
            <input type="email" name="email" class="w-full border rounded-lg px-3 py-2" required autofocus>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Password</label>
            <input type="password" name="password" class="w-full border rounded-lg px-3 py-2" required>
        </div>
        <div class="mb-4 flex items-center">
            <input type="checkbox" name="remember" id="remember" class="mr-2">
            <label for="remember" class="text-sm">Remember me</label>
        </div>
        <button class="w-full bg-red-500 text-white font-semibold py-2 rounded-lg hover:bg-red-600">
            Login
        </button>
    </form>
</div>
</body>
</html>
