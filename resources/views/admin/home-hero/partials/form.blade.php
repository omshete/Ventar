@if($errors->any())
    <div class="bg-red-100 text-red-700 px-4 py-2 rounded text-sm mb-4">
        {{ $errors->first() }}
    </div>
@endif

<div>
    <label class="block text-sm font-medium mb-1">Main Title</label>
    <input type="text" name="title"
           value="{{ old('title', $hero->title ?? 'Ventar – Your IT Service Partner') }}"
           class="w-full border rounded-lg px-3 py-2" required>
</div>

<div>
    <label class="block text-sm font-medium mb-1">Description (under title)</label>
    <textarea name="description" rows="3"
              class="w-full border rounded-lg px-3 py-2">{{ old('description', $hero->description ?? '') }}</textarea>
</div>

<div class="grid md:grid-cols-2 gap-4">
    <div>
        <label class="block text-sm font-medium mb-1">Button Label</label>
        <input type="text" name="button_label"
               value="{{ old('button_label', $hero->button_label ?? 'Explore Services ↓') }}"
               class="w-full border rounded-lg px-3 py-2" required>
    </div>
    <div>
        <label class="block text-sm font-medium mb-1">Button Link (URL or #anchor)</label>
        <input type="text" name="button_link"
               value="{{ old('button_link', $hero->button_link ?? '#services') }}"
               class="w-full border rounded-lg px-3 py-2" required>
    </div>
</div>

<hr class="my-4">

<h3 class="font-semibold text-sm mb-2">Right Cards</h3>

<div class="grid md:grid-cols-2 gap-4">
    <div>
        <label class="block text-xs font-medium mb-1">Card 1 Title</label>
        <input type="text" name="card1_title"
               value="{{ old('card1_title', $hero->card1_title ?? 'Web Development') }}"
               class="w-full border rounded-lg px-3 py-2">
        <label class="block text-xs font-medium mt-2 mb-1">Card 1 Text</label>
        <input type="text" name="card1_text"
               value="{{ old('card1_text', $hero->card1_text ?? 'High-performance sites') }}"
               class="w-full border rounded-lg px-3 py-2">
    </div>

    <div>
        <label class="block text-xs font-medium mb-1">Card 2 Title</label>
        <input type="text" name="card2_title"
               value="{{ old('card2_title', $hero->card2_title ?? 'Cloud & DevOps') }}"
               class="w-full border rounded-lg px-3 py-2">
        <label class="block text-xs font-medium mt-2 mb-1">Card 2 Text</label>
        <input type="text" name="card2_text"
               value="{{ old('card2_text', $hero->card2_text ?? 'Scalable infrastructure') }}"
               class="w-full border rounded-lg px-3 py-2">
    </div>

    <div>
        <label class="block text-xs font-medium mb-1">Card 3 Title</label>
        <input type="text" name="card3_title"
               value="{{ old('card3_title', $hero->card3_title ?? 'UI/UX Design') }}"
               class="w-full border rounded-lg px-3 py-2">
        <label class="block text-xs font-medium mt-2 mb-1">Card 3 Text</label>
        <input type="text" name="card3_text"
               value="{{ old('card3_text', $hero->card3_text ?? 'Beautiful interfaces') }}"
               class="w-full border rounded-lg px-3 py-2">
    </div>

    <div>
        <label class="block text-xs font-medium mb-1">Card 4 Title</label>
        <input type="text" name="card4_title"
               value="{{ old('card4_title', $hero->card4_title ?? 'Consulting') }}"
               class="w-full border rounded-lg px-3 py-2">
        <label class="block text-xs font-medium mt-2 mb-1">Card 4 Text</label>
        <input type="text" name="card4_text"
               value="{{ old('card4_text', $hero->card4_text ?? 'Tech strategy') }}"
               class="w-full border rounded-lg px-3 py-2">
    </div>
</div>

<hr class="my-4">

<div class="grid md:grid-cols-2 gap-4">
    <div>
        <label class="block text-sm font-medium mb-1">Sort Order</label>
        <input type="number" name="sort_order"
               value="{{ old('sort_order', $hero->sort_order ?? 0) }}"
               class="w-full border rounded-lg px-3 py-2">
    </div>

    <div class="flex items-center space-x-2 mt-6 md:mt-8">
        <input type="hidden" name="is_active" value="0">
        <input type="checkbox" id="is_active" name="is_active" value="1"
               @checked(old('is_active', $hero->is_active ?? true))>
        <label for="is_active" class="text-sm font-medium">Active</label>
    </div>
</div>

<button class="bg-red-500 text-white px-4 py-2 rounded-lg mt-4">
    {{ isset($hero) && $hero ? 'Update' : 'Save' }}
</button>
<a href="{{ route('admin.home-hero.index') }}" class="text-sm ml-2">Cancel</a>
