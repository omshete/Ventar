@extends('layouts.app')

@section('title', $blog->title ?? 'Blog')

@section('content')
<section class="bg-gradient-to-br from-red-500 to-pink-500 text-white py-24">
    <div class="max-w-4xl mx-auto px-6">
        <h1 class="text-4xl md:text-6xl font-black mb-4">
            {{ $blog->title }}
        </h1>

        <div class="text-sm md:text-base text-slate-100 mb-6 flex flex-wrap items-center gap-3 opacity-90">
            @if($blog->published_at)
                <span>Published {{ $blog->published_at->format('d M Y') }}</span>
            @endif
            @if(!empty($blog->author))
                <span>•</span>
                <span>By {{ $blog->author }}</span>
            @endif
        </div>

        @if(!empty($blog->short_description))
            <p class="text-xl md:text-2xl mb-8 text-slate-100 leading-relaxed">
                {{ $blog->short_description }}
            </p>
        @endif
    </div>
</section>

<section class="py-16 bg-gradient-to-b from-slate-50 to-white">
    <div class="max-w-4xl mx-auto px-6">

        @if(!empty($blog->content))
            <div class="text-lg text-slate-700 leading-relaxed space-y-4 mb-10">
                {!! nl2br(e($blog->content)) !!}
            </div>
        @endif

        <a href="{{ route('blogs.index') }}"
           class="inline-flex items-center gap-2 bg-gradient-to-r from-red-500 to-pink-500 text-white font-bold px-8 py-3 rounded-full shadow-2xl hover:shadow-3xl transition-all hover:-translate-y-1">
            ← Back to all blogs
        </a>
    </div>
</section>
@endsection
