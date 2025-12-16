@extends('admin.layouts.app')

@section('title','Add About Us')

@section('content')
<h2 class="text-xl font-semibold mb-4">Add About Us Section</h2>

<form method="post" action="{{ route('admin.about-us.store') }}" class="space-y-4 max-w-xl">
    @csrf
    @include('admin.about-us.partials.form')
</form>
@endsection
