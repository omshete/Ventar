@extends('admin.layouts.app')

@section('title','Our Aim')

@section('content')
<div class="mb-4 flex justify-between items-center">
    <h2 class="text-xl font-semibold">Our Aim</h2>
    <a href="{{ route('admin.aim.create') }}"
       class="bg-red-500 text-white text-sm px-4 py-2 rounded-lg">
        + Add Aim Section
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
    @forelse($aims as $aim)
        <tr class="border-t">
            <td class="px-4 py-2">{{ $aim->id }}</td>
            <td class="px-4 py-2 max-w-xs truncate">{{ $aim->title }}</td>
            <td class="px-4 py-2">{{ $aim->sort_order }}</td>
            <td class="px-4 py-2">
                @if($aim->is_active)
                    <span class="text-green-600 font-semibold">Yes</span>
                @else
                    <span class="text-red-600 font-semibold">No</span>
                @endif
            </td>
            <td class="px-4 py-2 text-right space-x-2">
                <a href="{{ route('admin.aim.edit', $aim) }}"
                   class="text-xs text-blue-600">Edit</a>
                <form action="{{ route('admin.aim.destroy', $aim) }}"
                      method="post" class="inline"
                      onsubmit="return confirm('Delete this aim section?');">
                    @csrf
                    @method('DELETE')
                    <button class="text-xs text-red-600">Delete</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5" class="px-4 py-8 text-center text-slate-500">No aim sections found</td>
        </tr>
    @endforelse
    </tbody>
</table>

<div class="mt-4">
    {{ $aims->links() }}
</div>
@endsection
