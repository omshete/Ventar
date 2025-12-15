@extends('admin.layouts.app')
@section('title', 'Edit ' . ucfirst(str_replace('_', ' ', $homeSection->section_type)))
@section('content')
<h2 class="text-2xl font-semibold mb-6 text-slate-800">Edit {{ ucfirst(str_replace('_', ' ', $homeSection->section_type)) }}</h2>

<form method="POST" action="{{ route('admin.home_sections.update', $homeSection->section_type) }}" class="space-y-6 max-w-4xl" enctype="multipart/form-data">
    @csrf @method('PUT')
    @include('admin.home_sections.partials.form', ['homeSection' => $homeSection])
</form>
@endsection
