@extends('admin.layouts.app')

@section('title','Add Contact Settings')

@section('content')
<h2 class="text-xl font-semibold mb-4">Add Contact Page Settings</h2>

<form method="post" action="{{ route('admin.contact-settings.store') }}" class="space-y-4 max-w-2xl">
    @csrf
    @include('admin.contact-settings.partials.form', ['contact' => null])
</form>
@endsection
