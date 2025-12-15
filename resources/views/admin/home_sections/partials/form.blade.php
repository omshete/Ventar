@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-6 py-4 rounded-xl mb-6">
        <ul class="list-disc list-inside space-y-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="space-y-6">
    {{-- Title & Subtitle --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-semibold mb-2">Main Title</label>
            <input type="text" name="title" value="{{ old('title', $homeSection->title ?? '') }}"
                   class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-red-500 @error('title') border-red-500 @enderror">
        </div>
        <div>
            <label class="block text-sm font-semibold mb-2">Subtitle</label>
            <input type="text" name="subtitle" value="{{ old('subtitle', $homeSection->subtitle ?? '') }}"
                   class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-red-500 @error('subtitle') border-red-500 @enderror"
                   placeholder="Optional subtitle">
        </div>
    </div>

    {{-- Main Description --}}
    <div>
        <label class="block text-sm font-semibold mb-2">Main Description</label>
        <textarea name="description" rows="6" class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-red-500 @error('description') border-red-500 @enderror"
                  placeholder="Enter detailed description">{!! old('description', $homeSection->description ?? '') !!}</textarea>
    </div>

    {{-- Button --}}
    @if($homeSection->section_type == 'hero')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-semibold mb-2">Button Text</label>
            <input type="text" name="button_text" value="{{ old('button_text', $homeSection->button_text ?? 'Explore Services ↓') }}"
                   class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-red-500">
        </div>
        <div>
            <label class="block text-sm font-semibold mb-2">Button URL</label>
            <input type="text" name="button_url" value="{{ old('button_url', $homeSection->button_url ?? '#services') }}"
                   class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-red-500">
        </div>
    </div>
    @endif

    {{-- Image Upload --}}
    <div>
        <label class="block text-sm font-semibold mb-2">Section Image (Optional)</label>
        <input type="file" name="image" class="w-full border-2 border-dashed border-slate-300 rounded-xl px-4 py-8 text-center hover:border-slate-400 @error('image') border-red-500 @enderror" accept="image/*">
        @if($homeSection->image)
            <img src="{{ asset('storage/' . $homeSection->image) }}" class="mt-4 w-32 h-32 object-cover rounded-xl mx-auto block shadow-md">
        @endif
    </div>

    {{-- Teaser Cards (Hero Only) --}}
    @if($homeSection->section_type == 'hero')
    <div>
        <label class="block text-sm font-semibold mb-4">Teaser Cards (Right Side)</label>
        <div id="teaser-cards" class="space-y-3">
            @if(old('teaser_cards', $homeSection->teaser_cards))
                @foreach(json_decode(old('teaser_cards', $homeSection->teaser_cards ?? '[]'), true) as $index => $card)
                <div class="flex gap-3 items-end bg-slate-50 p-4 rounded-xl">
                    <div class="flex-1">
                        <input type="text" name="teaser_cards[{{ $index }}][title]" value="{{ $card['title'] ?? '' }}" 
                               placeholder="Card Title" class="w-full border rounded-lg px-3 py-2 mb-2">
                        <input type="text" name="teaser_cards[{{ $index }}][description]" value="{{ $card['description'] ?? '' }}" 
                               placeholder="Card Description" class="w-full border rounded-lg px-3 py-2">
                    </div>
                    <button type="button" onclick="removeCard(this)" class="px-3 py-2 bg-red-500 text-white rounded-lg text-sm">Remove</button>
                </div>
                @endforeach
            @endif
        </div>
        <button type="button" onclick="addTeaserCard()" class="mt-3 bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-xl font-semibold">
            + Add Teaser Card
        </button>
    </div>
    @endif
</div>

<div class="flex gap-4 pt-8 border-t mt-8">
    <div class="flex items-center gap-3">
        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $homeSection->is_active ?? true) ? 'checked' : '' }} class="w-5 h-5">
        <label class="font-semibold">Active</label>
    </div>
    <div class="ml-auto space-x-3">
        <button type="submit" class="bg-gradient-to-r from-red-500 to-pink-500 text-white px-8 py-3 rounded-xl font-semibold hover:shadow-lg">
            Save Changes
        </button>
        <a href="{{ route('admin.home_sections.index') }}" class="px-8 py-3 border border-slate-300 rounded-xl font-semibold hover:bg-slate-50">
            Cancel
        </a>
    </div>
</div>

<script>
let cardIndex = {{ count(old('teaser_cards', $homeSection->teaser_cards ?? '[]')) ?? 0 }};

function addTeaserCard() {
    const container = document.getElementById('teaser-cards');
    const cardHtml = `
        <div class="flex gap-3 items-end bg-slate-50 p-4 rounded-xl">
            <div class="flex-1">
                <input type="text" name="teaser_cards[${cardIndex}][title]" placeholder="Card Title" class="w-full border rounded-lg px-3 py-2 mb-2">
                <input type="text" name="teaser_cards[${cardIndex}][description]" placeholder="Card Description" class="w-full border rounded-lg px-3 py-2">
            </div>
            <button type="button" onclick="removeCard(this)" class="px-3 py-2 bg-red-500 text-white rounded-lg text-sm">Remove</button>
        </div>
    `;
    container.insertAdjacentHTML('beforeend', cardHtml);
    cardIndex++;
}

function removeCard(button) {
    button.closest('div.flex').remove();
}
</script>
@endsection
