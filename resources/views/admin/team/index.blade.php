@extends('admin.layouts.app')

@section('title','Team')

@section('content')
<div class="mb-4 flex justify-between items-center">
    <h2 class="text-xl font-semibold">Team Members</h2>
    <a href="{{ route('admin.team.create') }}"
       class="bg-red-500 text-white text-sm px-4 py-2 rounded-lg">
        + Add Member
    </a>
</div>

<table class="min-w-full bg-white rounded-xl shadow overflow-hidden text-sm">
    <thead class="bg-slate-100 text-left">
    <tr>
        <th class="px-4 py-2">ID</th>
        <th class="px-4 py-2">Photo</th>
        <th class="px-4 py-2">Name</th>
        <th class="px-4 py-2">Designation</th>
        <th class="px-4 py-2">LinkedIn</th>
        <th class="px-4 py-2">Order</th>
        <th class="px-4 py-2 text-right">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($team as $member)
        <tr class="border-t">
            <td class="px-4 py-2">{{ $member->id }}</td>
            <td class="px-4 py-2">
                @if($member->photo_path)
                    <img src="{{ asset('storage/'.$member->photo_path) }}"
                         alt="{{ $member->name }}"
                         class="h-10 w-10 rounded-full object-cover">
                @else
                    <span class="text-xs text-slate-400">No photo</span>
                @endif
            </td>
            <td class="px-4 py-2">{{ $member->name }}</td>
            <td class="px-4 py-2">{{ $member->designation }}</td>
            <td class="px-4 py-2">
                @if($member->linkedin_url)
                    <a href="{{ $member->linkedin_url }}" target="_blank"
                       class="text-xs text-blue-600 underline">
                        View
                    </a>
                @else
                    <span class="text-xs text-slate-400">—</span>
                @endif
            </td>
            <td class="px-4 py-2">{{ $member->order }}</td>
            <td class="px-4 py-2 text-right space-x-2">
                <a href="{{ route('admin.team.edit', $member) }}"
                   class="text-xs text-blue-600">Edit</a>
                <form action="{{ route('admin.team.destroy', $member) }}"
                      method="post" class="inline"
                      onsubmit="return confirm('Delete this member?');">
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
    {{ $team->links() }}
</div>
@endsection
