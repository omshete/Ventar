@extends('admin.layouts.app')
@section('title', 'Create Home Section')
@section('content')
<div class="max-w-4xl mx-auto">
    <h2 class="text-2xl font-semibold mb-6 text-slate-800">Create New Section</h2>
    
    <div class="bg-white rounded-xl shadow-lg p-8 border">
        <form method="POST" action="{{ route('admin.home_sections.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Section Type *</label>
                    <select name="section_type" class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-red-500" required>
                        <option value="">Select Section</option>
                        <option value="hero">Hero Section</option>
                        <option value="services_intro">Services Intro</option>
                        <option value="our_story">Our Story</option>
                        <option value="blogs_intro">Blogs Intro</option>
                        <option value="customers_intro">Customers Intro</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Sort Order</label>
                    <input type="number" name="sort_order" value="0" min="0" class="w-full border border-slate-300 rounded-xl px-4 py-3">
                </div>
            </div>
            <div class="mt-6 p-6 bg-slate-50 rounded-xl border-2 border-dashed border-slate-200 text-center">
                <p class="text-slate-600 mb-2">Create the section first, then edit it for detailed content</p>
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-8 py-3 rounded-xl font-semibold">Create Section</button>
            </div>
        </form>
    </div>
</div>
@endsection
