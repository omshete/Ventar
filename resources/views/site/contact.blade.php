@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-16 grid md:grid-cols-2 gap-10">
    <div>
        <h1 class="text-3xl font-bold mb-4">Contact Us</h1>
        <p class="mb-2">Email: {{ $email }}</p>
        <p class="mb-6">Phone: {{ $phone }}</p>
        <p class="text-slate-600">
            Share your requirements and the Ventar team will connect with you.
        </p>
    </div>

    <div>
        <form method="post" action="#">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Name</label>
                <input type="text" class="w-full border rounded-lg px-3 py-2" disabled>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Email</label>
                <input type="email" class="w-full border rounded-lg px-3 py-2" disabled>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Message</label>
                <textarea class="w-full border rounded-lg px-3 py-2 h-28" disabled></textarea>
            </div>
            <button type="button"
                    class="bg-slate-400 text-white px-4 py-2 rounded-lg cursor-not-allowed">
                Form will be enabled later
            </button>
        </form>
    </div>
</div>
@endsection
