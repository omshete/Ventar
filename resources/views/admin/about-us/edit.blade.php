@extends('admin.layouts.app')

@section('title','Edit About Us')

@section('content')
<h2 class="text-xl font-semibold mb-4">Edit About Us Section</h2>

<form method="post" action="{{ route('admin.about-us.update', $aboutUs) }}" class="space-y-4 max-w-xl">
    @csrf
    @method('PUT')
    @include('admin.about-us.partials.form', ['aboutUs' => $aboutUs])
</form>
@endsection
