@extends('admin.layouts.app')

@section('title','Edit Home Hero')

@section('content')
<h2 class="text-xl font-semibold mb-4">Edit Home Hero</h2>

<form method="post" action="{{ route('admin.home-hero.update', $hero) }}" class="space-y-4 max-w-2xl">
    @csrf
    @method('PUT')
    @include('admin.home-hero.partials.form', ['hero' => $hero])
</form>
@endsection
