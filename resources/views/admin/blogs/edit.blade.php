@extends('admin.layouts.app')

@section('title','Edit Blog')

@section('content')
<h2 class="text-xl font-semibold mb-4">Edit Blog</h2>

<form method="post" action="{{ route('admin.blogs.update', $blog) }}" class="space-y-4 max-w-3xl">
    @csrf
    @method('PUT')
    @include('admin.blogs.partials.form', ['blog' => $blog])
</form>
@endsection
