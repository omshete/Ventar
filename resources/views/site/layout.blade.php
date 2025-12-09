@php
    $logo = \App\Models\Setting::getValue('logo_path', 'images/ventar-logo.png');
@endphp

<img src="{{ asset($logo) }}" alt="Ventar Logo">
