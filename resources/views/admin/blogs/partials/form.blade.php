@if ($errors->any())
    <div class="bg-red-100 text-red-700 px-4 py-2 rounded text-sm mb-4">
        {{ $errors->first() }}
    </div>
@endif

<div class="space-y-4">
    <div>
        <label class="block text-sm font-medium mb-1">Title</label>
        <input type="text" name="title"
               value="{{ old('title', $blog->title ?? '') }}"
               class="w-full border rounded-lg px-3 py-2" required>
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Slug (optional)</label>
        <input type="text" name="slug"
               value="{{ old('slug', $blog->slug ?? '') }}"
               class="w-full border rounded-lg px-3 py-2"
               placeholder="Leave empty to auto-generate">
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Content</label>
        <textarea name="content" rows="6"
                  class="w-full border rounded-lg px-3 py-2"
                  required>{{ old('content', $blog->content ?? '') }}</textarea>
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Icon (optional)</label>
        <input type="text" name="icon"
               value="{{ old('icon', $blog->icon ?? '') }}"
               class="w-full border rounded-lg px-3 py-2"
               placeholder="e.g. 📝 or CSS class">
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Published At (optional)</label>
        <input type="datetime-local" name="published_at"
               value="{{ old('published_at', isset($blog->published_at) ? $blog->published_at->format('Y-m-d\TH:i') : '') }}"
               class="w-full border rounded-lg px-3 py-2">
    </div>

    <div class="flex items-center space-x-2">
        <input type="hidden" name="is_published" value="0">
        <input type="checkbox" id="is_published" name="is_published" value="1"
               @checked(old('is_published', $blog->is_published ?? true))>
        <label for="is_published" class="text-sm font-medium">Published</label>
    </div>

    <div class="pt-2">
        <button class="bg-red-500 text-white px-4 py-2 rounded-lg">
            Save
        </button>
        <a href="{{ route('admin.blogs.index') }}" class="text-sm ml-2">Cancel</a>
    </div>
</div>
