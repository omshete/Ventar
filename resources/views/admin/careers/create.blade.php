@extends('admin.layouts.app')

@section('title','Add Career')

@section('content')
<h2 class="text-xl font-semibold mb-4">Add Career</h2>

<form method="post" action="{{ route('admin.careers.store') }}" class="space-y-4 max-w-xl">
    @csrf
    @include('admin.careers.partials.form', ['career' => null])
</form>
@endsection
