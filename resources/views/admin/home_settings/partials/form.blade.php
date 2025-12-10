@if ($errors->any())
    <div class="bg-red-100 text-red-700 px-4 py-2 rounded text-sm mb-3">
        {{ $errors->first() }}
    </div>
@endif

<div>
    <label class="block text-sm font-medium mb-1">Key</label>
    <input type="text" name="key"
           value="{{ old('key', $setting->key ?? '') }}"
           class="w-full border rounded-lg px-3 py-2" required>
    <p class="text-xs text-slate-500 mt-1">
        Example: contact_email, contact_phone, social_linkedin, logo_path
    </p>
</div>

<div>
    <label class="block text-sm font-medium mb-1">Value</label>
    <textarea name="value" rows="3"
              class="w-full border rounded-lg px-3 py-2">{{ old('value', $setting->value ?? '') }}</textarea>
    <p class="text-xs text-slate-500 mt-1">
        For logo_path store something like <code>images/ventar-logo.png</code>, for links store full URL.
    </p>
</div>

<button class="bg-red-500 text-white px-4 py-2 rounded-lg">
    Save
</button>
<a href="{{ route('admin.home_settings.index') }}" class="text-sm ml-2">
    Cancel
</a>
