@extends('admin.layouts.app')

@section('title', 'Home Sections')

@section('content')
<div class="mb-4 flex justify-between items-center">
    <h2 class="text-xl font-semibold">Home Sections</h2>
    <a href="{{ route('admin.home-sections.create') }}"
       class="bg-red-500 text-white text-sm px-4 py-2 rounded-lg">
        + Add Section
    </a>
</div>

@if(session('success'))
    <div class="bg-green-100 text-green-700 px-4 py-2 rounded text-sm mb-4">
        {{ session('success') }}
    </div>
@endif

<table class="min-w-full bg-white rounded-xl shadow text-sm">
    <thead class="bg-slate-100 text-left">
        <tr>
            <th class="px-4 py-2">Key</th>
            <th class="px-4 py-2">Title</th>
            <th class="px-4 py-2">Order</th>
            <th class="px-4 py-2">Updated</th>
            <th class="px-4 py-2 text-right">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($sections as $section)
        <tr class="border-t">
            <td class="px-4 py-2 font-mono text-xs">{{ $section->section_key }}</td>
            <td class="px-4 py-2">{{ $section->title }}</td>
            <td class="px-4 py-2">{{ $section->order }}</td>
            <td class="px-4 py-2 text-xs">{{ $section->updated_at->format('d M Y') }}</td>
            <td class="px-4 py-2 text-right space-x-2">
                <a href="{{ route('admin.home-sections.edit', $section) }}"
                   class="text-blue-600 text-xs">Edit</a>

                <form action="{{ route('admin.home-sections.destroy', $section) }}"
                      method="POST" class="inline"
                      onsubmit="return confirm('Delete this section?');">
                    @csrf @method('DELETE')
                    <button class="text-red-600 text-xs">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="px-4 py-4 text-center text-slate-500">
                No sections added yet.
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-4">
    {{ $sections->links() }}
</div>
@endsection
