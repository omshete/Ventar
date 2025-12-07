@if ($errors->any())
    <div class="bg-red-100 text-red-700 px-4 py-2 rounded text-sm">
        {{ $errors->first() }}
    </div>
@endif

<div>
    <label class="block text-sm font-medium mb-1">Title</label>
    <input type="text" name="title"
           value="{{ old('title', $blog->title ?? '') }}"
           class="w-full border rounded-lg px-3 py-2" required>
</div>

<div>
    <label class="block text-sm font-medium mb-1">Excerpt</label>
    <textarea name="excerpt" rows="3"
              class="w-full border rounded-lg px-3 py-2">{{ old('excerpt', $blog->excerpt ?? '') }}</textarea>
</div>

<div>
    <label class="block text-sm font-medium mb-1">Content</label>
    <textarea name="content" rows="5"
              class="w-full border rounded-lg px-3 py-2">{{ old('content', $blog->content ?? '') }}</textarea>
</div>

<div>
    <label class="block text-sm font-medium mb-1">Image</label>
    @if (!empty($blog?->image_path))
        <div class="mb-2">
            <img src="{{ asset('storage/'.$blog->image_path) }}"
                 alt="Current image"
                 class="h-20 rounded object-cover">
        </div>
    @endif
    <input type="file" name="image"
           class="w-full border rounded-lg px-3 py-2 bg-white">
</div>

<div class="flex items-center mt-2">
    <input type="checkbox" id="is_published" name="is_published" value="1"
           class="mr-2"
           {{ old('is_published', $blog->is_published ?? false) ? 'checked' : '' }}>
    <label for="is_published" class="text-sm">Published</label>
</div>

<div class="mt-4">
    <button class="bg-red-500 text-white px-4 py-2 rounded-lg">
        {{ isset($blog) && $blog ? 'Update' : 'Save' }}
    </button>
    <a href="{{ route('admin.blogs.index') }}" class="text-sm ml-2">Cancel</a>
</div>
