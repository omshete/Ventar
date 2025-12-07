@if ($errors->any())
    <div class="bg-red-100 text-red-700 px-4 py-2 rounded text-sm">
        {{ $errors->first() }}
    </div>
@endif

<div>
    <label class="block text-sm font-medium mb-1">Title</label>
    <input type="text" name="title"
           value="{{ old('title', $service->title ?? '') }}"
           class="w-full border rounded-lg px-3 py-2" required>
</div>

<div>
    <label class="block text-sm font-medium mb-1">Short Description</label>
    <textarea name="short_description" rows="3"
              class="w-full border rounded-lg px-3 py-2">{{ old('short_description', $service->short_description ?? '') }}</textarea>
</div>

<div>
    <label class="block text-sm font-medium mb-1">Full Description</label>
    <textarea name="description" rows="5"
              class="w-full border rounded-lg px-3 py-2">{{ old('description', $service->description ?? '') }}</textarea>
</div>

<div>
    <label class="block text-sm font-medium mb-1">Order</label>
    <input type="number" name="order"
           value="{{ old('order', $service->order ?? 0) }}"
           class="w-full border rounded-lg px-3 py-2">
</div>

<button class="bg-red-500 text-white px-4 py-2 rounded-lg">
    Save
</button>
<a href="{{ route('admin.services.index') }}" class="text-sm ml-2">Cancel</a>
