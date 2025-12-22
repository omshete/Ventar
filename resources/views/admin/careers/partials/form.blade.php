@if ($errors->any())
    <div class="bg-red-100 text-red-700 px-4 py-2 rounded text-sm">
        {{ $errors->first() }}
    </div>
@endif

<div>
    <label class="block text-sm font-medium mb-1">Job Title *</label>
    <input type="text" name="title"
           value="{{ old('title', $career->title ?? '') }}"
           class="w-full border rounded-lg px-3 py-2" required>
    @error('title')
        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="grid md:grid-cols-2 gap-4">
    <div>
        <label class="block text-sm font-medium mb-1">Location *</label>
        <input type="text" name="location"
               value="{{ old('location', $career->location ?? '') }}"
               class="w-full border rounded-lg px-3 py-2" required>
        @error('location')
            <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label class="block text-sm font-medium mb-1">Job Type *</label>
        <select name="type" class="w-full border rounded-lg px-3 py-2" required>
            <option value="">Select Type</option>
            <option value="Full-time" {{ old('type', $career->type ?? '') == 'Full-time' ? 'selected' : '' }}>Full-time</option>
            <option value="Part-time" {{ old('type', $career->type ?? '') == 'Part-time' ? 'selected' : '' }}>Part-time</option>
            <option value="Contract" {{ old('type', $career->type ?? '') == 'Contract' ? 'selected' : '' }}>Contract</option>
            <option value="Hybrid" {{ old('type', $career->type ?? '') == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
            <option value="Remote" {{ old('type', $career->type ?? '') == 'Remote' ? 'selected' : '' }}>Remote</option>
        </select>
        @error('type')
            <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>

<div>
    <label class="block text-sm font-medium mb-1">Description *</label>
    <textarea name="description" rows="5" 
              class="w-full border rounded-lg px-3 py-2" required>{{ old('description', $career->description ?? '') }}</textarea>
    @error('description')
        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="grid md:grid-cols-2 gap-4">
    <div>
        <label class="block text-sm font-medium mb-1">Icon (Material Icon name)</label>
        <input type="text" name="icon"
               value="{{ old('icon', $career->icon ?? 'work') }}"
               class="w-full border rounded-lg px-3 py-2" placeholder="work, code, design_services">
        <p class="text-xs text-slate-500 mt-1">See: material.io/icons</p>
    </div>
    <div>
        <label class="block text-sm font-medium mb-1">Sort Order</label>
        <input type="number" name="sort_order"
               value="{{ old('sort_order', $career->sort_order ?? 0) }}"
               class="w-full border rounded-lg px-3 py-2">
    </div>
</div>

<div class="flex items-center space-x-2">
    <input type="hidden" name="is_active" value="0">
    <input type="checkbox" id="is_active" name="is_active" value="1"
           @checked(old('is_active', $careers->is_active ?? true))>
    <label for="is_active" class="text-sm font-medium">Active</label>
</div>

<button class="bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-red-600 mt-4">
    {{ isset($careers) ? 'Update' : 'Save' }}
</button>
<a href="{{ route('admin.careers.index') }}" class="ml-2 text-sm text-slate-600 hover:underline">Cancel</a>
