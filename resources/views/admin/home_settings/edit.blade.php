@extends('admin.layouts.app')

@section('title','Edit Setting')

@section('content')
<h2 class="text-xl font-semibold mb-4">Edit Setting</h2>

<form method="post"
      action="{{ route('admin.home_settings.update', $setting) }}"
      class="space-y-4 max-w-xl">
    @csrf
    @method('PUT')

    @include('admin.home_settings.partials.form', ['setting' => $setting])
</form>
@endsection
