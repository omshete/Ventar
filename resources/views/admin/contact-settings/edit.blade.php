@extends('admin.layouts.app')

@section('title','Edit Contact Settings')

@section('content')
<h2 class="text-xl font-semibold mb-4">Edit Contact Page Settings</h2>

<form method="POST"
      action="{{ route('admin.contact-settings.update', $contact) }}"
      class="space-y-4 max-w-2xl">
    @csrf
    @method('PUT')

    @include('admin.contact-settings.partials.form', ['contact' => $contact])
</form>
@endsection
