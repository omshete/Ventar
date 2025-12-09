@extends('admin.layouts.app')

@section('title','Edit Team Member')

@section('content')
<h2 class="text-xl font-semibold mb-4">Edit Team Member</h2>

<form method="post"
      action="{{ route('admin.team.update', $member) }}"
      enctype="multipart/form-data"
      class="space-y-4 max-w-xl">
    @csrf
    @method('PUT')
    @include('admin.team.partials.form', ['member' => $member])
</form>
@endsection
