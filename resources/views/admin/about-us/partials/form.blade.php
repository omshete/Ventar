@if ($errors->any())
    <div class="bg-red-100 text-red-700 px-4 py-2 rounded text-sm">
        {{ $errors->first() }}
    </div>
@endif

<div>
    <label class="block text-sm font-medium mb-1">Title</label>
    <input type="text" name="title"
           value="{{ old('title', $aboutUs->title ?? '') }}"
           class="w-full border rounded-lg px-3 py-2" required>
    @error('title')
        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>

<div>
    <label class="block text-sm font-medium mb-1">Content</label>
    <textarea name="content" rows="8"
              class="w-full border rounded-lg px-3 py-2" required>{{ old('content', $aboutUs->content ?? '') }}</textarea>
    @error('content')
        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>

<div>
    <label class="block text-sm font-medium mb-1">Sort Order</label>
    <input type="number" name="sort_order"
           value="{{ old('sort_order', $aboutUs->sort_order ?? 0) }}"
           class="w-full border rounded-lg px-3 py-2">
</div>

<div class="flex items-center space-x-2">
    <input type="hidden" name="is_active" value="0">
    <input type="checkbox" id="is_active" name="is_active" value="1"
           @checked(old('is_active', $aboutUs->is_active ?? true))>
    <label for="is_active" class="text-sm font-medium">Active</label>
</div>

<button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg">
    {{ isset($aboutUs) ? 'Update' : 'Create' }}
</button>
<a href="{{ route('admin.about-us.index') }}" class="text-sm ml-2">Cancel</a>
