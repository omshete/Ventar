@extends('admin.layouts.app')

@section('title','Edit Our Aim')

@section('content')
<h2 class="text-xl font-semibold mb-4">Edit Our Aim Section</h2>

<form method="post" action="{{ route('admin.aim.update', $aim) }}" class="space-y-4 max-w-xl">
    @csrf
    @method('PUT')
    @include('admin.aim.partials.form', ['aim' => $aim])
</form>
@endsection
