@extends('admin.layouts.app')

@section('title','Add Home Hero')

@section('content')
<h2 class="text-xl font-semibold mb-4">Add Home Hero</h2>

<form method="post" action="{{ route('admin.home-hero.store') }}" class="space-y-4 max-w-2xl">
    @csrf
    @include('admin.home-hero.partials.form', ['hero' => null])
</form>
@endsection
