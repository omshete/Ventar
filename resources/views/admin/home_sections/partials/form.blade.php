@if ($errors->any())
    <div class="bg-red-100 text-red-700 px-4 py-2 rounded text-sm">
        {{ $errors->first() }}
    </div>
@endif

<div>
    <label class="block text-sm font-medium mb-1">Section Key</label>
    <input type="text" name="section_key"
           value="{{ old('section_key', $section->section_key ?? '') }}"
           class="w-full border rounded-lg px-3 py-2 font-mono text-sm"
           @if(isset($section)) disabled @endif
           required>

    <p class="text-xs text-slate-500 mt-1">
        @if(isset($section))
            Key cannot be changed after creation.
        @else
            Example: hero_title, hero_text, services_intro, footer_about
        @endif
    </p>
</div>

<div>
    <label class="block text-sm font-medium mb-1">Title (admin label)</label>
    <input type="text" name="title"
           value="{{ old('title', $section->title ?? '') }}"
           class="w-full border rounded-lg px-3 py-2 text-sm" required>
</div>

<div>
    <label class="block text-sm font-medium mb-1">Content</label>
    <textarea name="content" rows="6"
              class="w-full border rounded-lg px-3 py-2 text-sm"
              required>{{ old('content', $section->content ?? '') }}</textarea>
</div>

<div>
    <label class="block text-sm font-medium mb-1">Order</label>
    <input type="number" name="order"
           value="{{ old('order', $section->order ?? 0) }}"
           class="w-full border rounded-lg px-3 py-2 text-sm">
</div>

<div class="pt-2">
    <button class="bg-red-500 text-white px-4 py-2 rounded-lg text-sm">
        {{ isset($section) ? 'Update' : 'Save' }}
    </button>
    <a href="{{ route('admin.home-sections.index') }}" class="text-sm ml-2 text-slate-600">
        Cancel
    </a>
</div>
