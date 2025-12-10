@extends('admin.layouts.app')

@section('title','Settings')

@section('content')
<div class="mb-4 flex justify-between items-center">
    <h2 class="text-xl font-semibold">Settings</h2>
    <a href="{{ route('admin.home_settings.create') }}"
       class="bg-red-500 text-white text-sm px-4 py-2 rounded-lg">
        + Add Setting
    </a>
</div>

@if(session('success'))
    <div class="mb-4 bg-green-100 text-green-800 px-4 py-2 rounded text-sm">
        {{ session('success') }}
    </div>
@endif

<table class="min-w-full bg-white rounded-xl shadow overflow-hidden text-sm">
    <thead class="bg-slate-100 text-left">
    <tr>
        <th class="px-4 py-2">ID</th>
        <th class="px-4 py-2">Key</th>
        <th class="px-4 py-2">Value</th>
        <th class="px-4 py-2 text-right">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($settings as $setting)
        <tr class="border-t">
            <td class="px-4 py-2">{{ $setting->id }}</td>
            <td class="px-4 py-2 font-mono text-xs">{{ $setting->key }}</td>
            <td class="px-4 py-2">
                {{ \Illuminate\Support\Str::limit($setting->value, 60) }}
            </td>
            <td class="px-4 py-2 text-right space-x-2">
                <a href="{{ route('admin.home_settings.edit', $setting) }}"
                   class="text-xs text-blue-600">Edit</a>
                <form action="{{ route('admin.home_settings.destroy', $setting) }}"
                      method="post" class="inline"
                      onsubmit="return confirm('Delete this setting?');">
                    @csrf
                    @method('DELETE')
                    <button class="text-xs text-red-600">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="mt-4">
    {{ $settings->links() }}
</div>
@endsection
