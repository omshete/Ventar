@extends('admin.layouts.app')

@section('title','Add Blog')

@section('content')
<h2 class="text-xl font-semibold mb-4">Add Blog</h2>

<form method="post"
      action="{{ route('admin.blogs.store') }}"
      enctype="multipart/form-data"
      class="space-y-4 max-w-xl">
    @csrf
    @include('admin.blogs.partials.form', ['blog' => null])
</form>
@endsection
