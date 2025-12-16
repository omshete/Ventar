@extends('admin.layouts.app')

@section('title','Home Hero')

@section('content')
<div class="mb-4 flex justify-between items-center">
    <h2 class="text-xl font-semibold">Home Hero Sections</h2>
    <a href="{{ route('admin.home-hero.create') }}"
       class="bg-red-500 text-white text-sm px-4 py-2 rounded-lg">
        + Add Hero
    </a>
</div>

<table class="min-w-full bg-white rounded-xl shadow overflow-hidden text-sm">
    <thead class="bg-slate-100 text-left">
    <tr>
        <th class="px-4 py-2">ID</th>
        <th class="px-4 py-2">Title</th>
        <th class="px-4 py-2">Button</th>
        <th class="px-4 py-2">Active?</th>
        <th class="px-4 py-2">Sort</th>
        <th class="px-4 py-2 text-right">Actions</th>
    </tr>
    </thead>
    <tbody>
    @forelse($heroes as $hero)
        <tr class="border-t">
            <td class="px-4 py-2">{{ $hero->id }}</td>
            <td class="px-4 py-2 max-w-xs truncate">{{ $hero->title }}</td>
            <td class="px-4 py-2">{{ $hero->button_label }}</td>
            <td class="px-4 py-2">
                @if($hero->is_active)
                    <span class="text-green-600 font-semibold">Yes</span>
                @else
                    <span class="text-red-600 font-semibold">No</span>
                @endif
            </td>
            <td class="px-4 py-2">{{ $hero->sort_order }}</td>
            <td class="px-4 py-2 text-right space-x-2">
                <a href="{{ route('admin.home-hero.edit', $hero) }}"
                   class="text-xs text-blue-600">Edit</a>
                <form action="{{ route('admin.home-hero.destroy', $hero) }}"
                      method="post" class="inline"
                      onsubmit="return confirm('Delete this hero section?');">
                    @csrf
                    @method('DELETE')
                    <button class="text-xs text-red-600">Delete</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6" class="px-4 py-8 text-center text-slate-500">
                No hero sections found.
            </td>
        </tr>
    @endforelse
    </tbody>
</table>

<div class="mt-4">
    {{ $heroes->links() }}
</div>
@endsection
