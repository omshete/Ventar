@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-6 py-4 rounded-lg mb-6">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li class="text-sm">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Main Title --}}
<div class="mb-6">
    <label class="block text-sm font-semibold text-slate-700 mb-3">Main Title <span class="text-red-500">*</span></label>
    <input type="text" name="title"
           value="{{ old('title', $story->title ?? '') }}"
           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm" 
           required>
    @error('title')
        <p class="mt-2 text-xs text-red-600 font-medium">{{ $message }}</p>
    @enderror
</div>

{{-- Paragraph 1 --}}
<div class="mb-6">
    <label class="block text-sm font-semibold text-slate-700 mb-3">Paragraph 1 <span class="text-red-500">*</span></label>
    <textarea name="paragraph_1" rows="4"
              class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm resize-vertical"
              placeholder="Enter paragraph 1 content..." required>{{ old('paragraph_1', $story->paragraph_1 ?? '') }}</textarea>
    @error('paragraph_1')
        <p class="mt-2 text-xs text-red-600 font-medium">{{ $message }}</p>
    @enderror
</div>

{{-- Paragraph 2 --}}
<div class="mb-6">
    <label class="block text-sm font-semibold text-slate-700 mb-3">Paragraph 2 (optional)</label>
    <textarea name="paragraph_2" rows="3"
              class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm resize-vertical"
              placeholder="Enter paragraph 2 content...">{{ old('paragraph_2', $story->paragraph_2 ?? '') }}</textarea>
    @error('paragraph_2')
        <p class="mt-2 text-xs text-red-600 font-medium">{{ $message }}</p>
    @enderror
</div>

{{-- Paragraph 3 --}}
<div class="mb-6">
    <label class="block text-sm font-semibold text-slate-700 mb-3">Paragraph 3 (optional)</label>
    <textarea name="paragraph_3" rows="3"
              class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm resize-vertical"
              placeholder="Enter paragraph 3 content...">{{ old('paragraph_3', $story->paragraph_3 ?? '') }}</textarea>
    @error('paragraph_3')
        <p class="mt-2 text-xs text-red-600 font-medium">{{ $message }}</p>
    @enderror
</div>
{{-- Paragraph 4 --}}
<div class="mb-6">
    <label class="block text-sm font-semibold text-slate-700 mb-3">Paragraph 4 (optional)</label>
    <textarea name="paragraph_4" rows="3"
              class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm resize-vertical"
              placeholder="Enter paragraph 4 content...">{{ old('paragraph_4', $story->paragraph_4 ?? '') }}</textarea>
    @error('paragraph_4')
        <p class="mt-2 text-xs text-red-600 font-medium">{{ $message }}</p>
    @enderror
</div>
{{-- Paragraph 5 --}}
<div class="mb-6">
    <label class="block text-sm font-semibold text-slate-700 mb-3">Paragraph 5 (optional)</label>
    <textarea name="paragraph_5" rows="3"
              class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm resize-vertical"
              placeholder="Enter paragraph 5 content...">{{ old('paragraph_5', $story->paragraph_5 ?? '') }}</textarea>
    @error('paragraph_5')
        <p class="mt-2 text-xs text-red-600 font-medium">{{ $message }}</p>
    @enderror
</div>
{{-- Paragraph 6 --}}
<div class="mb-6">
    <label class="block text-sm font-semibold text-slate-700 mb-3">Paragraph 6 (optional)</label>
    <textarea name="paragraph_6" rows="3"
              class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm resize-vertical"
              placeholder="Enter paragraph 6 content...">{{ old('paragraph_6', $story->paragraph_6 ?? '') }}</textarea>
    @error('paragraph_6')
        <p class="mt-2 text-xs text-red-600 font-medium">{{ $message }}</p>
    @enderror
</div>


{{-- Right Card Title --}}
<div class="mb-6">
    <label class="block text-sm font-semibold text-slate-700 mb-3">Right Card Title <span class="text-red-500">*</span></label>
    <input type="text" name="side_title"
           value="{{ old('side_title', $story->side_title ?? '') }}"
           class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm" 
           required>
    @error('side_title')
        <p class="mt-2 text-xs text-red-600 font-medium">{{ $message }}</p>
    @enderror
</div>

{{-- Bullets Grid --}}
<div class="mb-8">
    <label class="block text-sm font-semibold text-slate-700 mb-4">Bullets (optional)</label>
    <div class="grid md:grid-cols-2 gap-6">
        {{-- Bullet 1 --}}
        <div>
            <label class="block text-xs font-medium text-slate-600 mb-2">Bullet 1</label>
            <input type="text" name="bullet_1"
                   value="{{ old('bullet_1', $story->bullet_1 ?? '') }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            @error('bullet_1')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Bullet 2 --}}
        <div>
            <label class="block text-xs font-medium text-slate-600 mb-2">Bullet 2</label>
            <input type="text" name="bullet_2"
                   value="{{ old('bullet_2', $story->bullet_2 ?? '') }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            @error('bullet_2')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Bullet 3 --}}
        <div>
            <label class="block text-xs font-medium text-slate-600 mb-2">Bullet 3</label>
            <input type="text" name="bullet_3"
                   value="{{ old('bullet_3', $story->bullet_3 ?? '') }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            @error('bullet_3')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        {{-- Bullet 4 --}}
        <div>
            <label class="block text-xs font-medium text-slate-600 mb-2">Bullet 4</label>
            <input type="text" name="bullet_4"
                   value="{{ old('bullet_4', $story->bullet_4 ?? '') }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            @error('bullet_4')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>
        {{-- Bullet 5 --}}
        <div>
            <label class="block text-xs font-medium text-slate-600 mb-2">Bullet 5</label>
            <input type="text" name="bullet_5"
                   value="{{ old('bullet_5', $story->bullet_5 ?? '') }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            @error('bullet_5')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>
        {{-- Bullet 6 --}}
        <div>
            <label class="block text-xs font-medium text-slate-600 mb-2">Bullet 6</label>
            <input type="text" name="bullet_6"
                   value="{{ old('bullet_6', $story->bullet_6 ?? '') }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            @error('bullet_6')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>
        {{-- Bullet 7 --}}
        <div>
            <label class="block text-xs font-medium text-slate-600 mb-2">Bullet 7</label>
            <input type="text" name="bullet_7"
                   value="{{ old('bullet_7', $story->bullet_7 ?? '') }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            @error('bullet_7')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>
        {{-- Bullet 8 --}}
        <div>
            <label class="block text-xs font-medium text-slate-600 mb-2">Bullet 8</label>
            <input type="text" name="bullet_8"
                   value="{{ old('bullet_8', $story->bullet_8 ?? '') }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            @error('bullet_8')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>
        {{-- Bullet 9 --}}
        <div>
            <label class="block text-xs font-medium text-slate-600 mb-2">Bullet 9</label>
            <input type="text" name="bullet_9"
                   value="{{ old('bullet_9', $story->bullet_9 ?? '') }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            @error('bullet_9')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>
        {{-- Bullet 10 --}}
        <div>
            <label class="block text-xs font-medium text-slate-600 mb-2">Bullet 10</label>
            <input type="text" name="bullet_10"
                   value="{{ old('bullet_10', $story->bullet_10 ?? '') }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            @error('bullet_10')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>
