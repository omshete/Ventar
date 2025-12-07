@extends('admin.layouts.app')

@section('title','Edit Service')

@section('content')
<h2 class="text-xl font-semibold mb-4">Edit Service</h2>

<form method="post" action="{{ route('admin.services.update', $service) }}" class="space-y-4 max-w-xl">
    @csrf
    @method('PUT')
    @include('admin.services.partials.form', ['service' => $service])
</form>
@endsection
