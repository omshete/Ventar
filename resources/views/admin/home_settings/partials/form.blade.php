@if ($errors->any())
    <div class="mb-4 bg-red-100 text-red-700 px-4 py-2 rounded text-sm">
        {{ $errors->first() }}
    </div>
@endif

<form method="post"
      action="{{ route('admin.home_settings.update', $homeSetting) }}"
      class="space-y-4 max-w-2xl">
    @csrf
    @method('PUT')

    {{-- COMPANY --}}
    <div>
        <label class="block text-sm font-medium mb-1">Footer Company Name</label>
        <input type="text" name="footer_company"
               value="{{ old('footer_company', $homeSetting->footer_company ?? '') }}"
               class="w-full border rounded-lg px-3 py-2">
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Footer Description</label>
        <textarea name="footer_description" rows="3"
                  class="w-full border rounded-lg px-3 py-2">{{ old('footer_description', $homeSetting->footer_description ?? '') }}</textarea>
    </div>

    {{-- CONTACT --}}
    <div class="border-t pt-4 mt-4">
        <h3 class="font-semibold mb-2">Contact Us</h3>

        <div class="mb-3">
            <label class="block text-sm font-medium mb-1">Email</label>
            <input type="email" name="footer_email"
                   value="{{ old('footer_email', $homeSetting->footer_email ?? '') }}"
                   class="w-full border rounded-lg px-3 py-2">
        </div>

        <div class="mb-3">
            <label class="block text-sm font-medium mb-1">Phone</label>
            <input type="text" name="footer_phone"
                   value="{{ old('footer_phone', $homeSetting->footer_phone ?? '') }}"
                   class="w-full border rounded-lg px-3 py-2">
        </div>

        <div class="mb-3">
            <label class="block text-sm font-medium mb-1">Address</label>
            <input type="text" name="footer_address"
                   value="{{ old('footer_address', $homeSetting->footer_address ?? '') }}"
                   class="w-full border rounded-lg px-3 py-2">
        </div>
    </div>

    {{-- QUICK LINKS - NEW SECTION --}}
    <div class="border-t pt-4 mt-4">
        <h3 class="font-semibold mb-2">Quick Links (Footer Menu)</h3>
        <p class="text-sm text-slate-500 mb-4">Enter each link as "Title|URL" (one per line)</p>
        
        <div class="bg-slate-50 p-4 rounded-lg border">
            <textarea name="footer_quick_links" rows="6"
                      placeholder="Home|/&#10;Services|/services&#10;About Us|/about-us&#10;Blogs|/blogs&#10;Contact|/contact-us"
                      class="w-full border rounded-lg px-3 py-2 font-mono text-sm">{{ old('footer_quick_links', $homeSetting->footer_quick_links ?? '') }}</textarea>
            <p class="text-xs text-slate-500 mt-1">Format: Title|URL (one link per line)</p>
        </div>
    </div>

    {{-- FOLLOW US --}}
    <div class="border-t pt-4 mt-4">
        <h3 class="font-semibold mb-2">Follow Us Links</h3>

        <div class="mb-3">
            <label class="block text-sm font-medium mb-1">X / Twitter URL</label>
            <input type="text" name="footer_x"
                   value="{{ old('footer_x', $homeSetting->footer_x ?? '') }}"
                   class="w-full border rounded-lg px-3 py-2">
        </div>

        <div class="mb-3">
            <label class="block text-sm font-medium mb-1">LinkedIn URL</label>
            <input type="text" name="footer_linkedin"
                   value="{{ old('footer_linkedin', $homeSetting->footer_linkedin ?? '') }}"
                   class="w-full border rounded-lg px-3 py-2">
        </div>

        <div class="mb-3">
            <label class="block text-sm font-medium mb-1">Facebook URL</label>
            <input type="text" name="footer_facebook"
                   value="{{ old('footer_facebook', $homeSetting->footer_facebook ?? '') }}"
                   class="w-full border rounded-lg px-3 py-2">
        </div>

        <div class="mb-3">
            <label class="block text-sm font-medium mb-1">Instagram URL</label>
            <input type="text" name="footer_instagram"
                   value="{{ old('footer_instagram', $homeSetting->footer_instagram ?? '') }}"
                   class="w-full border rounded-lg px-3 py-2">
        </div>
    </div>

    <button type="submit" class="bg-red-500 text-white px-6 py-2 rounded-lg font-medium hover:bg-red-600">
        Save Footer Settings
    </button>
</form>
<a href="{{ route('admin.home_settings.index') }}" class="text-sm ml-4 text-slate-500 hover:text-slate-700">Cancel</a>
