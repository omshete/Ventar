@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-16">
    <h1 class="text-3xl font-bold mb-4">{{ $blog->title }}</h1>
    <p class="text-sm text-slate-500 mb-6">
        Published {{ optional($blog->published_at)->format('d M Y') }}
    </p>
    <div class="prose max-w-none">
        {!! nl2br(e($blog->content)) !!}
    </div>
</div>
@endsection
