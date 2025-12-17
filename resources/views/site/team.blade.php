@extends('layouts.app')

@section('content')
<section id="hero" class="min-h-screen flex items-center text-slate-900 py-24"
         style="background: radial-gradient(circle at top left, #ffe1c2 0, #ffe9d4 30%, #fde7d7 55%, #fbe5d5 75%, #f8ddc7 100%);">
    <div class="max-w-6xl mx-auto px-6">
        <h1 class="text-5xl font-black md:text-7xl text-slate-900 text-center mb-16 scroll-animate">Our Team</h1>

        <div class="grid gap-8 md:grid-cols-3">
            @forelse($team as $member)
                <div class="bg-white rounded-2xl shadow p-6 text-center">
                    @if($member->photo)
                        <img src="{{ asset('uploads/team/'.$member->photo) }}"
                             class="w-24 h-24 rounded-full mx-auto mb-4 object-cover" alt="{{ $member->name }}">
                    @else
                        <div class="w-24 h-24 rounded-full mx-auto mb-4 bg-slate-200"></div>
                    @endif
                    <h2 class="font-semibold text-lg mb-1">{{ $member->name }}</h2>
                    <p class="text-sm text-slate-500 mb-2">{{ $member->designation }}</p>
                    @if($member->linkedin_url)
                        <a href="{{ $member->linkedin_url }}" target="_blank"
                           class="text-sm text-orange-500 font-semibold hover:underline">
                            LinkedIn
                        </a>
                    @endif
                </div>
            @empty
                <p>No team members added yet.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
