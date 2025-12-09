@extends('admin.layouts.app')

@section('title','Edit Home Section')

@section('content')
<h2 class="text-xl font-semibold mb-4">
    Edit Section: {{ $section->section_key }}
</h2>

@if ($errors->any())
    <div class="bg-red-100 text-red-700 px-4 py-2 rounded text-sm mb-4">
        {{ $errors->first() }}
    </div>
@endif

<form method="post"
      action="{{ route('admin.home-sections.update', $section) }}"
      class="space-y-4 max-w-xl">
    @csrf
    @method('PUT')

    <div>
        <label class="block text-sm font-medium mb-1">Title</label>
        <input type="text" name="title"
               value="{{ old('title', $section->title) }}"
               class="w-full border rounded-lg px-3 py-2">
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Content</label>
        <textarea name="content" rows="6"
                  class="w-full border rounded-lg px-3 py-2">{{ old('content', $section->content) }}</textarea>
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Order</label>
        <input type="number" name="order"
               value="{{ old('order', $section->order ?? 0) }}"
               class="w-full border rounded-lg px-3 py-2">
    </div>

    <div class="mt-4">
        <button class="bg-red-500 text-white px-4 py-2 rounded-lg">
            Save
        </button>
        <a href="{{ route('admin.home-sections.index') }}" class="text-sm ml-2">
            Cancel
        </a>
    </div>
</form>
@endsection
