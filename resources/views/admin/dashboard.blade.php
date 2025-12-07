@extends('admin.layouts.app')

@section('title','Dashboard')

@section('content')
<div class="grid md:grid-cols-3 gap-6">
    <div class="bg-white rounded-xl shadow p-5">
        <h2 class="text-sm text-slate-500">Services</h2>
        <p class="text-3xl font-bold">{{ \App\Models\Service::count() }}</p>
    </div>
    <div class="bg-white rounded-xl shadow p-5">
        <h2 class="text-sm text-slate-500">Blogs</h2>
        <p class="text-3xl font-bold">{{ \App\Models\BlogPost::count() }}</p>
    </div>
    <div class="bg-white rounded-xl shadow p-5">
        <h2 class="text-sm text-slate-500">Team Members</h2>
        <p class="text-3xl font-bold">{{ \App\Models\TeamMember::count() }}</p>
    </div>
</div>
@endsection
