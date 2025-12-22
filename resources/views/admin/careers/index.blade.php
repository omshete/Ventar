@extends('admin.layouts.app')

@section('title','Careers')

@section('content')
<div class="mb-4 flex justify-between items-center">
    <h2 class="text-xl font-semibold">Job Positions</h2>
    <a href="{{ route('admin.careers.create') }}"
       class="bg-red-500 text-white text-sm px-4 py-2 rounded-lg">
        + Add Job Position
    </a>
</div>

<table class="min-w-full bg-white rounded-xl shadow overflow-hidden text-sm">
    <thead class="bg-slate-100 text-left">
    <tr>
        <th class="px-4 py-2">ID</th>
        <th class="px-4 py-2">Title</th>
        <th class="px-4 py-2">Location</th>
        <th class="px-4 py-2">Type</th>
        <th class="px-4 py-2">Active?</th>
        <th class="px-4 py-2">Sort</th>
        <th class="px-4 py-2 text-right">Actions</th>
    </tr>
    </thead>
    <tbody>
    @forelse($careers as $career)
        <tr class="border-t">
            <td class="px-4 py-2">{{ $career->id }}</td>
            <td class="px-4 py-2 max-w-xs truncate">{{ $career->title }}</td>
            <td class="px-4 py-2">{{ $career->location }}</td>
            <td class="px-4 py-2">
                <span class="px-2 py-1 bg-orange-100 text-orange-800 rounded-full text-xs">{{ $career->type }}</span>
            </td>
            <td class="px-4 py-2">
                @if($career->is_active)
                    <span class="text-green-600 font-semibold">Yes</span>
                @else
                    <span class="text-red-600 font-semibold">No</span>
                @endif
            </td>
            <td class="px-4 py-2">{{ $career->sort_order }}</td>
            <td class="px-4 py-2 text-right space-x-2">
                <a href="{{ route('admin.careers.edit', $career) }}"
                   class="text-xs text-blue-600 hover:underline">Edit</a>
                <form action="{{ route('admin.careers.destroy', $career) }}"
                      method="post" class="inline"
                      onsubmit="return confirm('Delete this job?');">
                    @csrf
                    @method('DELETE')
                    <button class="text-xs text-red-600 hover:underline">Delete</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="7" class="px-4 py-8 text-center text-slate-500">
                No job positions found. <a href="{{ route('admin.careers.create') }}" class="text-blue-600">Create one!</a>
            </td>
        </tr>
    @endforelse
    </tbody>
</table>

<div class="mt-4">
    {{ $careers->links() }}
</div>
@endsection
