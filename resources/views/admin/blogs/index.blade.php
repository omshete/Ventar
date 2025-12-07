@extends('admin.layouts.app')

@section('title','Blogs')

@section('content')
<div class="mb-4 flex justify-between items-center">
    <h2 class="text-xl font-semibold">Blogs</h2>
    <a href="{{ route('admin.blogs.create') }}"
       class="bg-red-500 text-white text-sm px-4 py-2 rounded-lg">
        + Add Blog
    </a>
</div>

<table class="min-w-full bg-white rounded-xl shadow overflow-hidden text-sm">
    <thead class="bg-slate-100 text-left">
    <tr>
        <th class="px-4 py-2">ID</th>
        <th class="px-4 py-2">Title</th>
        <th class="px-4 py-2">Published At</th>
        <th class="px-4 py-2">Published?</th>
        <th class="px-4 py-2 text-right">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($blogs as $blog)
        <tr class="border-t">
            <td class="px-4 py-2">{{ $blog->id }}</td>
            <td class="px-4 py-2">{{ $blog->title }}</td>
            <td class="px-4 py-2">
                {{ $blog->published_at ? $blog->published_at->format('d M Y') : '-' }}
            </td>
            <td class="px-4 py-2">
                @if($blog->is_published)
                    <span class="inline-flex px-2 py-1 text-xs bg-green-100 text-green-700 rounded-full">
                        Yes
                    </span>
                @else
                    <span class="inline-flex px-2 py-1 text-xs bg-slate-100 text-slate-700 rounded-full">
                        No
                    </span>
                @endif
            </td>
            <td class="px-4 py-2 text-right space-x-2">
                <a href="{{ route('admin.blogs.edit', $blog) }}"
                   class="text-xs text-blue-600">Edit</a>
                <form action="{{ route('admin.blogs.destroy', $blog) }}"
                      method="post" class="inline"
                      onsubmit="return confirm('Delete this blog?');">
                    @csrf
                    @method('DELETE')
                    <button class="text-xs text-red-600">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="mt-4">
    {{ $blogs->links() }}
</div>
@endsection
