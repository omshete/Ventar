@if ($errors->any())
    <div class="bg-red-100 text-red-700 px-4 py-2 rounded text-sm">
        {{ $errors->first() }}
    </div>
@endif

<div>
    <label class="block text-sm font-medium mb-1">Page Title</label>
    <input type="text" name="page_title"
           value="{{ old('page_title', $contact->page_title ?? 'Contact Us') }}"
           class="w-full border rounded-lg px-3 py-2" required>
</div>

<div>
    <label class="block text-sm font-medium mb-1">Intro Text (right top card)</label>
    <textarea name="intro_text" rows="3"
              class="w-full border rounded-lg px-3 py-2">{{ old('intro_text', $contact->intro_text ?? 'Ready to start your next project with us? Send us a message and we\'ll respond within 24 hours. We\'re here to help you succeed.') }}</textarea>
</div>

<div class="grid md:grid-cols-2 gap-4">
    <div>
        <label class="block text-sm font-medium mb-1">Email Label</label>
        <input type="text" name="email_label"
               value="{{ old('email_label', $contact->email_label ?? 'Email') }}"
               class="w-full border rounded-lg px-3 py-2" required>
    </div>
    <div>
        <label class="block text-sm font-medium mb-1">Email Value (shown on page)</label>
        <input type="email" name="email_value"
               value="{{ old('email_value', $contact->email_value ?? '') }}"
               class="w-full border rounded-lg px-3 py-2" required>
    </div>
</div>

<div class="grid md:grid-cols-2 gap-4">
    <div>
        <label class="block text-sm font-medium mb-1">Phone Label</label>
        <input type="text" name="phone_label"
               value="{{ old('phone_label', $contact->phone_label ?? 'Phone') }}"
               class="w-full border rounded-lg px-3 py-2" required>
    </div>
    <div>
        <label class="block text-sm font-medium mb-1">Phone Value (shown on page)</label>
        <input type="text" name="phone_value"
               value="{{ old('phone_value', $contact->phone_value ?? '') }}"
               class="w-full border rounded-lg px-3 py-2" required>
    </div>
</div>

<div>
    <label class="block text-sm font-medium mb-1">Send Message To (email)</label>
    <input type="email" name="send_to_email"
           value="{{ old('send_to_email', $contact->send_to_email ?? '') }}"
           class="w-full border rounded-lg px-3 py-2" required>
    <p class="text-xs text-slate-500 mt-1">
        The contact form will send messages to this email.
    </p>
</div>

<div class="grid md:grid-cols-2 gap-4 mt-2">
    <div>
        <label class="block text-sm font-medium mb-1">Sort Order</label>
        <input type="number" name="sort_order"
               value="{{ old('sort_order', $contact->sort_order ?? 0) }}"
               class="w-full border rounded-lg px-3 py-2">
    </div>

    <div class="flex items-center space-x-2 mt-6 md:mt-8">
        <input type="hidden" name="is_active" value="0">
        <input type="checkbox" id="is_active" name="is_active" value="1"
               @checked(old('is_active', $contact->is_active ?? true))>
        <label for="is_active" class="text-sm font-medium">Active</label>
    </div>
</div>

<button class="bg-red-500 text-white px-4 py-2 rounded-lg mt-4">
    {{ isset($contact) && $contact ? 'Update' : 'Save' }}
</button>
<a href="{{ route('admin.contact-settings.index') }}" class="text-sm ml-2">Cancel</a>
