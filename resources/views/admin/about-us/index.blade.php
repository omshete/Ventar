@extends('admin.layouts.app')

@section('title','About Us')

@section('content')
<div class="mb-4 flex justify-between items-center">
    <h2 class="text-xl font-semibold">About Us</h2>
    <a href="{{ route('admin.about-us.create') }}"
       class="bg-red-500 text-white text-sm px-4 py-2 rounded-lg">
        + Add About Section
    </a>
</div>

<table class="min-w-full bg-white rounded-xl shadow overflow-hidden text-sm">
    <thead class="bg-slate-100 text-left">
    <tr>
        <th class="px-4 py-2">ID</th>
        <th class="px-4 py-2">Title</th>
        <th class="px-4 py-2">Sort Order</th>
        <th class="px-4 py-2">Active?</th>
        <th class="px-4 py-2 text-right">Actions</th>
    </tr>
    </thead>
    <tbody>
    @forelse($abouts as $about)
        <tr class="border-t">
            <td class="px-4 py-2">{{ $about->id }}</td>
            <td class="px-4 py-2 max-w-xs truncate">{{ $about->title }}</td>
            <td class="px-4 py-2">{{ $about->sort_order }}</td>
            <td class="px-4 py-2">
                @if($about->is_active)
                    <span class="text-green-600 font-semibold">Yes</span>
                @else
                    <span class="text-red-600 font-semibold">No</span>
                @endif
            </td>
            <td class="px-4 py-2 text-right space-x-2">
                <a href="{{ route('admin.about-us.edit', $about) }}"
                   class="text-xs text-blue-600">Edit</a>
                <form action="{{ route('admin.about-us.destroy', $about) }}"
                      method="post" class="inline"
                      onsubmit="return confirm('Delete this about section?');">
                    @csrf
                    @method('DELETE')
                    <button class="text-xs text-red-600">Delete</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5" class="px-4 py-8 text-center text-slate-500">No about sections found</td>
        </tr>
    @endforelse
    </tbody>
</table>

<div class="mt-4">
    {{ $abouts->links() }}
</div>
@endsection
