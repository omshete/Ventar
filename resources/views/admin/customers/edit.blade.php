@extends('admin.layouts.app')

@section('title','Edit Customer')

@section('content')
<h2 class="text-xl font-semibold mb-4">Edit Customer</h2>

<form method="post" action="{{ route('admin.customers.update', $customer) }}" class="space-y-4 max-w-xl" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('admin.customers.partials.form', ['customer' => $customer])
</form>
@endsection
