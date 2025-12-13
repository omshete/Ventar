@if ($errors->any())
    <div class="bg-red-100 text-red-700 px-4 py-2 rounded text-sm">
        {{ $errors->first() }}
    </div>
@endif

{{-- Main Title --}}
<div>
    <label class="block text-sm font-medium mb-1">Main Title</label>
    <input type="text" name="title"
           value="{{ old('title', $story->title ?? '') }}"
           class="w-full border rounded-lg px-3 py-2" required>
    @error('title')
        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>

{{-- Paragraph 1 --}}
<div>
    <label class="block text-sm font-medium mb-1">Paragraph 1</label>
    <textarea name="paragraph_1" rows="3"
              class="w-full border rounded-lg px-3 py-2" required>{{ old('paragraph_1', $story->paragraph_1 ?? '') }}</textarea>
    @error('paragraph_1')
        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>

{{-- Paragraph 2 --}}
<div>
    <label class="block text-sm font-medium mb-1">Paragraph 2 (optional)</label>
    <textarea name="paragraph_2" rows="3"
              class="w-full border rounded-lg px-3 py-2">{{ old('paragraph_2', $story->paragraph_2 ?? '') }}</textarea>
    @error('paragraph_2')
        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>

{{-- Paragraph 3 --}}
<div>
    <label class="block text-sm font-medium mb-1">Paragraph 3 (optional)</label>
    <textarea name="paragraph_3" rows="3"
              class="w-full border rounded-lg px-3 py-2">{{ old('paragraph_3', $story->paragraph_3 ?? '') }}</textarea>
    @error('paragraph_3')
        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>

{{-- Right Card Title --}}
<div>
    <label class="block text-sm font-medium mb-1">Right Card Title</label>
    <input type="text" name="side_title"
           value="{{ old('side_title', $story->side_title ?? '') }}"
           class="w-full border rounded-lg px-3 py-2" required>
    @error('side_title')
        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>

{{-- Bullets --}}
<div class="grid md:grid-cols-2 gap-4">
    <div>
        <label class="block text-sm font-medium mb-1">Bullet 1 (optional)</label>
        <input type="text" name="bullet_1"
               value="{{ old('bullet_1', $story->bullet_1 ?? '') }}"
               class="w-full border rounded-lg px-3 py-2">
        @error('bullet_1')
            <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Bullet 2 (optional)</label>
        <input type="text" name="bullet_2"
               value="{{ old('bullet_2', $story->bullet_2 ?? '') }}"
               class="w-full border rounded-lg px-3 py-2">
        @error('bullet_2')
            <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Bullet 3 (optional)</label>
        <input type="text" name="bullet_3"
               value="{{ old('bullet_3', $story->bullet_3 ?? '') }}"
               class="w-full border rounded-lg px-3 py-2">
        @error('bullet_3')
            <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Bullet 4 (optional)</label>
        <input type="text" name="bullet_4"
               value="{{ old('bullet_4', $story->bullet_4 ?? '') }}"
               class="w-full border rounded-lg px-3 py-2">
        @error('bullet_4')
            <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>

<button class="bg-red-500 text-white px-4 py-2 rounded-lg">
    Save Changes
</button>
<a href="{{ route('admin.home.our-story.index') }}" class="text-sm ml-2">Cancel</a>
