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
        <h2 class="text-sm text-slate-500">Teams</h2>
        <p class="text-3xl font-bold">{{ \App\Models\TeamMember::count() }}</p>
    </div>
    <div class="bg-white rounded-xl shadow p-5">
        <h2 class="text-sm text-slate-500">Customers</h2>
        <p class="text-3xl font-bold">{{ \App\Models\Customer::count() }}</p>
    </div>
    <div class="bg-white rounded-xl shadow p-5">
        <h2 class="text-sm text-slate-500">Our Story</h2>
        <p class="text-3xl font-bold">{{ \App\Models\HomeStory::count() }}</p>
    </div>
    <div class="bg-white rounded-xl shadow p-5">
        <h2 class="text-sm text-slate-500">Hero Sections</h2>
        <p class="text-3xl font-bold">{{ \App\Models\HomeSection::count() }}</p>
    </div>
    <div class="bg-white rounded-xl shadow p-5">
        <h2 class="text-sm text-slate-500">Footer Settings</h2>
        <p class="text-3xl font-bold">{{ \App\Models\HomeSetting::count() }}</p>
    </div>
</div>
@endsection
