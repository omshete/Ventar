@extends('layouts.app')

@section('title', 'Our Team')

@section('content')
<section class="bg-gradient-to-br from-red-500 to-pink-500 text-white py-10">
    <div class="max-w-4xl mx-auto px-6">
        <h1 class="text-4xl md:text-6xl font-black mb-6">
            Our Team
        </h1>
        <p class="text-xl md:text-2xl mb-8 text-slate-100 leading-relaxed">
            Meet the experts who power Ventar's success
        </p>
    </div>
</section>

<section class="py-16 bg-gradient-to-b from-slate-50 to-white">
    <div class="max-w-4xl mx-auto px-6">
        @if($team && $team->count() > 0)
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3 mb-12">
                @forelse($team as $member)
                    @if($member->is_active ?? true)
                        <div class="bg-white rounded-2xl shadow-lg p-8 text-center hover:shadow-2xl transition-all hover:-translate-y-2">
                            @if($member->photo_path)
                                <img src="{{ asset('storage/'.$member->photo_path) }}"
                                     class="w-24 h-24 rounded-full mx-auto mb-6 object-cover shadow-xl" 
                                     alt="{{ $member->name }}">
                            @else
                                <div class="w-24 h-24 rounded-full mx-auto mb-6 bg-slate-200 flex items-center justify-center">
                                    <span class="text-xl font-bold text-slate-500">{{ strtoupper(substr($member->name, 0, 1)) }}</span>
                                </div>
                            @endif
                            <h2 class="text-xl font-bold text-slate-900 mb-2">{{ $member->name }}</h2>
                            @if($member->designation)
                                <p class="text-lg text-slate-600 mb-4 font-medium">{{ $member->designation }}</p>
                            @endif
                            @if($member->linkedin_url)
                                <a href="{{ $member->linkedin_url }}" target="_blank" rel="noopener noreferrer"
                                   class="inline-flex items-center gap-2 text-red-500 font-semibold hover:underline text-sm">
                                    LinkedIn <span>→</span>
                                </a>
                            @endif
                        </div>
                    @endif
                @empty
                    <p class="col-span-full text-center text-slate-500">No active team members found.</p>
                @endforelse
            </div>
        @else
            <div class="text-center py-20">
                <h1 class="text-4xl md:text-5xl font-bold text-slate-900 mb-8">Our Team</h1>
                <p class="text-xl text-slate-600 max-w-2xl mx-auto mb-8">
                    Team members will appear here once added from the admin panel.
                </p>
                <a href="/admin/team" class="inline-block bg-gradient-to-r from-red-500 to-pink-500 text-white font-bold px-8 py-3 rounded-full shadow-2xl hover:shadow-3xl transition-all hover:-translate-y-1">
                    Add Team Members <span>→</span>
                </a>
            </div>
        @endif

        <div class="flex flex-col sm:flex-row gap-4 mt-12">
            <a href="{{ url('/contact-us') }}"
               class="inline-flex items-center gap-2 bg-gradient-to-r from-red-500 to-pink-500 text-white font-bold px-8 py-3 rounded-full shadow-2xl hover:shadow-3xl transition-all hover:-translate-y-1 flex-1 text-center">
                Contact Us <span>→</span>
            </a>

            <a href="{{ url('/') }}" class="inline-flex items-center justify-center gap-2 bg-white text-slate-700 font-bold px-8 py-3 rounded-full shadow-lg hover:shadow-xl transition-all hover:-translate-y-1 border border-slate-200 flex-1">
                ← Back to Home
            </a>
        </div>
    </div>
</section>
@endsection
