@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-16">
    <h1 class="text-3xl font-bold mb-6">Our Team</h1>

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
                       class="text-sm text-red-500 font-semibold hover:underline">
                        LinkedIn
                    </a>
                @endif
            </div>
        @empty
            <p>No team members added yet.</p>
        @endforelse
    </div>
</div>
@endsection
