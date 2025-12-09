@extends('admin.layouts.app')

@section('title','Add Team Member')

@section('content')
<h2 class="text-xl font-semibold mb-4">Add Team Member</h2>

<form method="post"
      action="{{ route('admin.team.store') }}"
      enctype="multipart/form-data"
      class="space-y-4 max-w-xl">
    @csrf
    @include('admin.team.partials.form', ['member' => null])
</form>
@endsection
