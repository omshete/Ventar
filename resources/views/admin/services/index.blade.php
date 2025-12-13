@extends('admin.layouts.app')

@section('title','Services')

@section('content')
<div class="mb-4 flex justify-between items-center">
    <h2 class="text-xl font-semibold">Services</h2>
    <a href="{{ route('admin.services.create') }}"
       class="bg-red-500 text-white text-sm px-4 py-2 rounded-lg">
        + Add Service
    </a>
</div>

<table class="min-w-full bg-white rounded-xl shadow overflow-hidden text-sm">
    <thead class="bg-slate-100 text-left">
    <tr>
        <th class="px-4 py-2">ID</th>
        <th class="px-4 py-2">Title</th>
        <th class="px-4 py-2">Order</th>
        <th class="px-4 py-2">Sort Order</th>
        <th class="px-4 py-2">Active?</th>
        <th class="px-4 py-2 text-right">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($services as $service)
        <tr class="border-t">
            <td class="px-4 py-2">{{ $service->id }}</td>
            <td class="px-4 py-2">{{ $service->title }}</td>
            <td class="px-4 py-2">{{ $service->order }}</td>
            <td class="px-4 py-2">{{ $service->sort_order }}</td>
            <td class="px-4 py-2">
                @if($service->is_active)
                    <span class="text-green-600 font-semibold">Yes</span>
                @else
                    <span class="text-red-600 font-semibold">No</span>
                @endif
            </td>
            <td class="px-4 py-2 text-right space-x-2">
                <a href="{{ route('admin.services.edit', $service) }}"
                   class="text-xs text-blue-600">Edit</a>
                <form action="{{ route('admin.services.destroy', $service) }}"
                      method="post" class="inline"
                      onsubmit="return confirm('Delete this service?');">
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
    {{ $services->links() }}
</div>
@endsection
