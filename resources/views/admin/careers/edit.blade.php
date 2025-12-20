@extends('admin.layouts.app')

@section('title','Edit Career')

@section('content')
<h2 class="text-xl font-semibold mb-4">Edit Career</h2>

<form method="post" action="{{ route('admin.careers.update', $career) }}" class="space-y-4 max-w-xl">
    @csrf
    @method('PUT')
    @include('admin.careers.partials.form', ['career' => $career])
</form>
@endsection
