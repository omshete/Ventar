@extends('admin.layouts.app')

@section('title', 'Edit Home Section')

@section('content')
<h2 class="text-xl font-semibold mb-4">Edit Home Section</h2>

<form method="POST"
      action="{{ route('admin.home-sections.update', $section) }}"
      class="space-y-4 max-w-2xl bg-white p-6 rounded-xl shadow">
    @csrf
    @method('PUT')
    @include('admin.home_sections.partials.form', ['section' => $section])
</form>
@endsection
