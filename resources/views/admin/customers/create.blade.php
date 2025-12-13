@extends('admin.layouts.app')

@section('title','Add Customer')

@section('content')
<h2 class="text-xl font-semibold mb-4">Add Customer</h2>

<form method="post" action="{{ route('admin.customers.store') }}" class="space-y-4 max-w-xl" enctype="multipart/form-data">
    @csrf
    @include('admin.customers.partials.form', ['customer' => null])
</form>
@endsection
