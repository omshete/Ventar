@extends('admin.layouts.app')

@section('title','Edit Home Content')

@section('content')
<div class="mb-6">
    <h2 class="text-xl font-semibold mb-4">Edit Home Content</h2>
    
    @if (session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
</div>

<form method="POST" action="{{ route('admin.home.update') }}" class="space-y-4 max-w-2xl">
    @csrf
    @method('PUT')
    @include('admin.home.partials.form', ['story' => $story])
    
    <div class="flex space-x-4 pt-4">
        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
            Save Changes
        </button>
        <a href="{{ route('admin.home.index') }}" class="text-gray-600 hover:text-gray-900 px-6 py-2 border rounded-lg">
            Cancel
        </a>
    </div>
</form>
@endsection
