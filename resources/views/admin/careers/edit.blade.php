@extends('admin.layouts.app')

@section('title','Edit Job Position')

@section('content')
<h2 class="text-xl font-semibold mb-4">Edit Job Position</h2>

<form method="POST" action="{{ route('admin.careers.update', $career) }}" class="space-y-4 max-w-2xl">
    @csrf
    @method('PUT')
    @include('admin.careers.partials.form', ['career' => $career])
</form>
@endsection
