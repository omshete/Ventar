@if ($errors->any())
    <div class="bg-red-100 text-red-700 px-4 py-2 rounded text-sm">
        {{ $errors->first() }}
    </div>
@endif

<div>
    <label class="block text-sm font-medium mb-1">Title</label>
    <input type="text" name="title"
           value="{{ old('title', $career->title ?? '') }}"
           class="w-full border rounded-lg px-3 py-2" required>
</div>

<div>
    <label class="block text-sm font-medium mb-1">Short Description</label>
    <textarea name="short_description" rows="3"
              class="w-full border rounded-lg px-3 py-2">{{ old('short_description', $career->short_description ?? '') }}</textarea>
</div>

<div>
    <label class="block text-sm font-medium mb-1">Location</label>
    <input type="text" name="location"
           value="{{ old('location', $career->location ?? '') }}"
           class="w-full border rounded-lg px-3 py-2" required>
</div>

<div>
    <label class="block text-sm font-medium mb-1">Job Type</label>
    <select name="type" class="w-full border rounded-lg px-3 py-2" required>
        <option value="">Select job type</option>
        <option value="fulltime" {{ old('type', $career->type ?? '') == 'fulltime' ? 'selected' : '' }}>Full Time</option>
        <option value="parttime" {{ old('type', $career->type ?? '') == 'parttime' ? 'selected' : '' }}>Part Time</option>
        <option value="contract" {{ old('type', $career->type ?? '') == 'contract' ? 'selected' : '' }}>Contract</option>
        <option value="internship" {{ old('type', $career->type ?? '') == 'internship' ? 'selected' : '' }}>Internship</option>
    </select>
</div>

<div>
    <label class="block text-sm font-medium mb-1">Experience</label>
    <select name="experience" class="w-full border rounded-lg px-3 py-2" required>
        <option value="">Select experience</option>
        <option value="0-1" {{ old('experience', $career->experience ?? '') == '0-1' ? 'selected' : '' }}>0-1 Year</option>
        <option value="1-3" {{ old('experience', $career->experience ?? '') == '1-3' ? 'selected' : '' }}>1-3 Years</option>
        <option value="3-5" {{ old('experience', $career->experience ?? '') == '3-5' ? 'selected' : '' }}>3-5 Years</option>
        <option value="5+" {{ old('experience', $career->experience ?? '') == '5+' ? 'selected' : '' }}>5+ Years</option>
    </select>
</div>

<div class="flex items-center space-x-2">
    <input type="hidden" name="is_active" value="0">
    <input type="checkbox" id="is_active" name="is_active" value="1"
           @checked(old('is_active', $career->is_active ?? true))>
    <label for="is_active" class="text-sm font-medium">Active</label>
</div>

<button class="bg-red-500 text-white px-4 py-2 rounded-lg">
    Save
</button>
<a href="{{ route('admin.careers.index') }}" class="text-sm ml-2">Cancel</a>
