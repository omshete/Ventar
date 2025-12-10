@extends('admin.layouts.app')

@section('title', 'Add Home Section')

@section('content')
<h2 class="text-xl font-semibold mb-4">Add Home Section</h2>

<form method="POST"
      action="{{ route('admin.home-sections.store') }}"
      class="space-y-4 max-w-2xl bg-white p-6 rounded-xl shadow">
    @csrf
    @include('admin.home_sections.partials.form', ['section' => null])
</form>
@endsection
