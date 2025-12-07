@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-16">
    <h1 class="text-3xl font-bold mb-6">Services</h1>

    <div class="grid gap-6 md:grid-cols-3">
        @forelse($services as $service)
            <div class="bg-white rounded-2xl shadow p-5">
                <h2 class="text-xl font-semibold mb-2">{{ $service->title }}</h2>
                <p class="text-sm text-slate-600 mb-3">
                    {{ $service->short_description ?? 'Detail coming soon.' }}
                </p>
                @if($service->description)
                    <p class="text-sm text-slate-700">{{ $service->description }}</p>
                @endif
            </div>
        @empty
            <p>No services added yet.</p>
        @endforelse
    </div>
</div>
@endsection
