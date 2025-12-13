@extends('admin.layouts.app')

@section('title','Edit Our Story')

@section('content')
<h2 class="text-xl font-semibold mb-4">Edit Our Story</h2>

<form method="post" action="{{ route('admin.home.our-story.update', $story) }}" class="space-y-4 max-w-2xl">
    @csrf
    @method('PUT')
    @include('admin.home.partials.form', ['story' => $story])
</form>
@endsection
