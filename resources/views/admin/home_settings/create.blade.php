@extends('admin.layouts.app')

@section('title','Add Setting')

@section('content')
<h2 class="text-xl font-semibold mb-4">Add Setting</h2>

<form method="post"
      action="{{ route('admin.home_settings.store') }}"
      class="space-y-4 max-w-xl">
    @csrf

    @include('admin.home_settings.partials.form', ['setting' => null])
</form>
@endsection
