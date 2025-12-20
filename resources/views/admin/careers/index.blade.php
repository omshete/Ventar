@extends('admin.layouts.app')

@section('title','Careers')

@section('content')
<div class="mb-4 flex justify-between items-center">
    <h2 class="text-xl font-semibold">Careers</h2>
    <a href="{{ route('admin.careers.create') }}"
       class="bg-red-500 text-white text-sm px-4 py-2 rounded-lg">
        + Add Career
    </a>
</div>

@if(session('success'))
<div class="bg-green-100 text-green-700 px-4 py-2 rounded text-sm mb-4">
    {{ session('success') }}
</div>
@endif

<table class="min-w-full bg-white rounded-xl shadow overflow-hidden text-sm">
    <thead class="bg-slate-100 text-left">
    <tr>
        <th class="px-4 py-2">ID</th>
        <th class="px-4 py-2">Title</th>
        <th class="px-4 py-2">Location</th>
        <th class="px-4 py-2">Experience</th>
        <th class="px-4 py-2">Active?</th>
        <th class="px-4 py-2 text-right">Actions</th>
    </tr>
    </thead>
    <tbody>
    @forelse($careers as $career)
        <tr class="border-t">
            <td class="px-4 py-2">{{ $career->id }}</td>
            <td class="px-4 py-2 font-medium">{{ $career->title }}</td>
            <td class="px-4 py-2">{{ $career->location }}</td>
            <td class="px-4 py-2">{{ $career->experience }}</td>
            <td class="px-4 py-2">
                @if($career->is_active)
                    <span class="text-green-600 font-semibold">Yes</span>
                @else
                    <span class="text-red-600 font-semibold">No</span>
                @endif
            </td>
            <td class="px-4 py-2 text-right space-x-2">
                <a href="{{ route('admin.careers.edit', $career) }}"
                   class="text-xs text-blue-600">Edit</a>
                <form action="{{ route('admin.careers.destroy', $career) }}"
                      method="post" class="inline"
                      onsubmit="return confirm('Delete this career?');">
                    @csrf
                    @method('DELETE')
                    <button class="text-xs text-red-600">Delete</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6" class="px-4 py-12 text-center text-gray-500">No careers found</td>
        </tr>
    @endforelse
    </tbody>
</table>

<div class="mt-4">
    {{ $careers->links() }}
</div>
@endsection
