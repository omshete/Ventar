@if ($errors->any())
    <div class="bg-red-100 text-red-700 px-4 py-2 rounded text-sm">
        {{ $errors->first() }}
    </div>
@endif

<div>
    <label class="block text-sm font-medium mb-1">Name</label>
    <input type="text" name="name"
           value="{{ old('name', $member->name ?? '') }}"
           class="w-full border rounded-lg px-3 py-2" required>
    @error('name')
        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>

<div>
    <label class="block text-sm font-medium mb-1">Designation</label>
    <input type="text" name="designation"
           value="{{ old('designation', $member->designation ?? '') }}"
           class="w-full border rounded-lg px-3 py-2" required>
    @error('designation')
        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>

<div>
    <label class="block text-sm font-medium mb-1">LinkedIn URL</label>
    <input type="url" name="linkedin_url"
           value="{{ old('linkedin_url', $member->linkedin_url ?? '') }}"
           class="w-full border rounded-lg px-3 py-2"
           placeholder="https://www.linkedin.com/in/username">
    @error('linkedin_url')
        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>

<div>
    <label class="block text-sm font-medium mb-1">Photo</label>
    @if(!empty($member?->photo_path))
        <div class="mb-2">
            <img src="{{ asset('storage/'.$member->photo_path) }}"
                 alt="{{ $member->name }}"
                 class="h-16 w-16 rounded-full object-cover">
        </div>
    @endif
    <input type="file" name="photo"
           class="w-full border rounded-lg px-3 py-2 bg-white"
           accept="image/*">
</div>

<div>
    <label class="block text-sm font-medium mb-1">Order</label>
    <input type="number" name="order"
           value="{{ old('order', $member->order ?? 0) }}"
           class="w-full border rounded-lg px-3 py-2">
    @error('order')
        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="flex items-center space-x-2">
    <input type="hidden" name="is_active" value="0">
    <input type="checkbox" id="is_active" name="is_active" value="1"
           @checked(old('is_active', $member->is_active ?? true))>
    <label for="is_active" class="text-sm font-medium">Active</label>
</div>

<button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg">
    {{ isset($member) && $member ? 'Update' : 'Save' }}
</button>
<a href="{{ route('admin.team.index') }}" class="text-sm ml-2">Cancel</a>
