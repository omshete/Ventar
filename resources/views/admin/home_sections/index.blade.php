@extends('admin.layouts.app')

@section('title','Home Sections')

@section('content')
<div class="mb-4 flex justify-between items-center">
    <h2 class="text-xl font-semibold">Home Sections</h2>
</div>

<table class="min-w-full bg-white rounded-xl shadow overflow-hidden text-sm">
    <thead class="bg-slate-100 text-left">
    <tr>
        <th class="px-4 py-2">Key</th>
        <th class="px-4 py-2">Title</th>
        <th class="px-4 py-2">Order</th>
        <th class="px-4 py-2 text-right">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($sections as $section)
        <tr class="border-t">
            <td class="px-4 py-2">{{ $section->section_key }}</td>
            <td class="px-4 py-2">{{ $section->title }}</td>
            <td class="px-4 py-2">{{ $section->order }}</td>
            <td class="px-4 py-2 text-right">
                <a href="{{ route('admin.home-sections.edit', $section) }}"
                   class="text-xs text-blue-600">Edit</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
