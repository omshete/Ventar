@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-16">
    <h1 class="text-3xl font-bold mb-6">Blogs</h1>

    <div class="grid gap-6 md:grid-cols-3">
        @forelse($blogs as $blog)
            <article class="bg-white rounded-2xl shadow p-5">
                <h2 class="text-xl font-semibold mb-2">{{ $blog->title }}</h2>
                <p class="text-sm text-slate-600 mb-3">{{ $blog->excerpt }}</p>
                <a href="{{ route('blog.detail', $blog->slug) }}"
                   class="text-sm text-red-500 font-semibold hover:underline">
                    Read more
                </a>
            </article>
        @empty
            <p>No blog posts yet.</p>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $blogs->links() }}
    </div>
</div>
@endsection
