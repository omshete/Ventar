@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-16">
    <h1 class="w-full py-14">{{ $about->title ?? 'About Ventar' }}</h1>
    <p class="text-slate-700 text-base leading-relaxed">
        {{ $about->content ?? 'About content will be managed from admin panel.' }}
    </p>
</div>
@endsection
