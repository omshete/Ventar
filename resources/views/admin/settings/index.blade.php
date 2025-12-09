<form action="{{ route('admin.settings.save') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="email" name="contact_email" value="{{ old('contact_email', $settings['contact_email']->value ?? '') }}">
    <!-- Other text/url fields -->
    <input type="file" name="logo">

    <button type="submit">Save</button>
</form>
