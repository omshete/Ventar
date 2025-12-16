@extends('admin.layouts.app')

@section('title','Add Our Aim')

@section('content')
<h2 class="text-xl font-semibold mb-4">Add Our Aim Section</h2>

<form method="post" action="{{ route('admin.aim.store') }}" class="space-y-4 max-w-xl">
    @csrf
    @include('admin.aim.partials.form')
</form>
@endsection
