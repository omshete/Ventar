@if ($errors->any())
    <div class="bg-red-100 text-red-700 px-4 py-2 rounded text-sm">
        {{ $errors->first() }}
    </div>
@endif

<div>
    <label class="block text-sm font-medium mb-1">Name *</label>
    <input type="text" name="name"
           value="{{ old('name', $customer->name ?? '') }}"
           class="w-full border rounded-lg px-3 py-2">
</div>

<div>
    <label class="block text-sm font-medium mb-1">Company Name</label>
    <input type="text" name="company_name"
           value="{{ old('company_name', $customer->company_name ?? '') }}"
           class="w-full border rounded-lg px-3 py-2">
</div>

<div>
    <label class="block text-sm font-medium mb-1">Address</label>
    <input type="text" name="address"
           value="{{ old('address', $customer->address ?? '') }}"
           class="w-full border rounded-lg px-3 py-2">
</div>

<div>
    <label class="block text-sm font-medium mb-1">Company Details</label>
    <textarea name="details" rows="4"
              class="w-full border rounded-lg px-3 py-2">{{ old('details', $customer->details ?? '') }}</textarea>
</div>

<div>
    <label class="block text-sm font-medium mb-1">Logo</label>
    @if($customer && $customer->logo_path)
        <div class="mb-2 p-2 bg-slate-50 rounded-lg">
            <img src="{{ asset('storage/'.$customer->logo_path) }}"
                 alt="{{ $customer->name }}"
                 class="h-16 w-auto rounded object-cover">
        </div>
    @endif
    <input type="file" name="logo" class="w-full border rounded-lg px-3 py-2 text-sm file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-red-50 file:text-red-700 hover:file:bg-red-100">
    <p class="text-xs text-slate-500 mt-1">Optional. JPG/PNG, max 2MB</p>
</div>

<div class="pt-2">
    <button class="bg-red-500 text-white px-4 py-2 rounded-lg">
        Save
    </button>
    <a href="{{ route('admin.customers.index') }}" class="text-sm ml-2">Cancel</a>
</div>
