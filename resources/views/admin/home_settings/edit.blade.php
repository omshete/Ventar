@extends('admin.layouts.app')

@section('title','Footer Settings')

@section('content')
    <div class="mb-4 flex justify-between items-center">
        <h2 class="text-xl font-semibold">Footer Settings</h2>
    </div>

    @if(session('success'))
        <div class="mb-4 bg-green-100 text-green-800 px-4 py-2 rounded text-sm">
            {{ session('success') }}
        </div>
    @endif

    @include('admin.home_settings.partials.form', ['homeSetting' => $homeSetting])
@endsection
