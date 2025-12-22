@extends('admin.layouts.app')

@section('title','Add Job Position')

@section('content')
<h2 class="text-xl font-semibold mb-4">Add Job Position</h2>

<form method="post" action="{{ route('admin.careers.store') }}" class="space-y-4 max-w-2xl">
    @csrf
    @include('admin.careers.partials.form', ['career' => null])
</form>
@endsection
