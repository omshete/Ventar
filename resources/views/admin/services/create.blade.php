@extends('admin.layouts.app')

@section('title','Add Service')

@section('content')
<h2 class="text-xl font-semibold mb-4">Add Service</h2>

<form method="post" action="{{ route('admin.services.store') }}" class="space-y-4 max-w-xl">
    @csrf
    @include('admin.services.partials.form', ['service' => null])
</form>
@endsection
