@extends('admin.layouts.app')

@section('title','Dashboard')

@section('content')
<div class="grid md:grid-cols-3 gap-6">

    {{-- home hero --}} 
    <div class="bg-white rounded-xl shadow p-5">
        <h2 class="text-sm text-slate-500">home hero</h2>
        <p class="text-3xl font-bold">{{ \App\Models\HomeHero::count() }}</p>
    </div>

    {{-- Our Story --}} 
    <div class="bg-white rounded-xl shadow p-5">
        <h2 class="text-sm text-slate-500">Our Story</h2>
        <p class="text-3xl font-bold">{{ \App\Models\HomeStory::count() }}</p>
    </div>

    {{-- Customers --}}
    <div class="bg-white rounded-xl shadow p-5">
        <h2 class="text-sm text-slate-500">Customers</h2>
        <p class="text-3xl font-bold">{{ \App\Models\Customer::count() }}</p>
    </div>

    {{-- Footer Settings --}}
    <div class="bg-white rounded-xl shadow p-5">
        <h2 class="text-sm text-slate-500">Footer Settings</h2>
        <p class="text-3xl font-bold">{{ \App\Models\HomeSetting::count() }}</p>
    </div>

    {{-- Services --}}
    <div class="bg-white rounded-xl shadow p-5">
        <h2 class="text-sm text-slate-500">Services</h2>
        <p class="text-3xl font-bold">{{ \App\Models\Service::count() }}</p>
    </div>

    {{-- About Us --}}
    <div class="bg-white rounded-xl shadow p-5">
        <h2 class="text-sm text-slate-500">About Us</h2>
        <p class="text-3xl font-bold">{{ \App\Models\AboutUs::count() }}</p>
    </div>

    {{-- Our Aim --}}
    <div class="bg-white rounded-xl shadow p-5">
        <h2 class="text-sm text-slate-500">Our Aim</h2>
        <p class="text-3xl font-bold">{{ \App\Models\Aim::count() }}</p>
    </div>

    {{-- Team Members --}}
    <div class="bg-white rounded-xl shadow p-5">
        <h2 class="text-sm text-slate-500">Teams</h2>
        <p class="text-3xl font-bold">{{ \App\Models\TeamMember::count() }}</p>
    </div>

    {{-- Blogs --}}
    <div class="bg-white rounded-xl shadow p-5">
        <h2 class="text-sm text-slate-500">Blogs</h2>
        <p class="text-3xl font-bold">{{ \App\Models\BlogPost::count() }}</p>
    </div>

    {{-- Contact Settings --}}
    <div class="bg-white rounded-xl shadow p-5">
        <h2 class="text-sm text-slate-500">contact settings</h2>
        <p class="text-3xl font-bold">{{ \App\Models\ContactSetting::count() }}</p>
    </div>

    {{-- Careers --}}
    <div class="bg-white rounded-xl shadow p-5">
        <h2 class="text-sm text-slate-500">Careers</h2>
        <p class="text-3xl font-bold">{{ \App\Models\Career::count() }}</p>
    </div>

</div>
@endsection
