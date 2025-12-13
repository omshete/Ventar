@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-16 bg-gradient-to-b from-slate-50 to-white min-h-screen">
    <article>
        <h1 class="text-4xl md:text-5xl font-black text-slate-900 mb-6">{{ $blog->title }}</h1>
        <div class="text-sm text-slate-500 mb-8 flex items-center gap-4">
            <span>Published {{ optional($blog->published_at)->format('d M Y') }}</span>
            <span>•</span>
            <span>5 min read</span>
        </div>
        <div class="prose prose-lg max-w-none text-slate-800 leading-relaxed">
            {!! $blog->content !!}
        </div>
    </article>
    
    <div class="mt-20 pt-12 border-t border-slate-200">
        <a href="{{ route('blogs') }}" class="text-red-500 font-bold hover:underline flex items-center gap-2">
            ← Back to Blogs
        </a>
    </div>
</div>
@endsection
