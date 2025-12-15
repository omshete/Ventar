@extends('admin.layouts.app')

@section('title', 'Home Sections')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h2 class="text-2xl font-semibold text-slate-800">All Homepage Sections</h2>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
    @foreach(['hero' => 'Hero Section', 'services_intro' => 'Services Intro', 'our_story' => 'Our Story', 'blogs_intro' => 'Blogs Intro', 'customers_intro' => 'Customers Intro'] as $type => $label)
        @php $section = \App\Models\HomeSection::where('section_type', $type)->first(); @endphp
        <div class="bg-white rounded-xl shadow-lg border border-slate-100 p-6 hover:shadow-xl transition-all">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-bold text-slate-900 flex items-center gap-2">
                    <i class="fas fa-{{ $type == 'hero' ? 'rocket' : ($type == 'services_intro' ? 'cogs' : ($type == 'our_story' ? 'book' : ($type == 'blogs_intro' ? 'blog' : 'users'))) }} text-red-500"></i>
                    {{ $label }}
                </h3>
                <span class="px-2 py-1 {{ $section && $section->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }} text-xs rounded-full font-medium">
                    {{ $section && $section->is_active ? 'Active' : 'Inactive' }}
                </span>
            </div>
            @if($section && $section->title)
                <div class="text-sm text-slate-600 mb-4 truncate" title="{{ $section->title }}">{{ $section->title }}</div>
            @endif
            <div class="flex gap-2">
                <a href="{{ route('admin.home_sections.edit', $type) }}"
                   class="flex-1 bg-red-500 text-white text-center py-2 px-4 rounded-lg hover:bg-red-600 transition font-medium text-sm">
                    Edit
                </a>
                @if($section)
                    <form action="{{ route('admin.home_sections.destroy', $type) }}" method="POST" class="flex-1" onsubmit="return confirm('Delete {{ $label }}?')">
                        @csrf @method('DELETE')
                        <button class="w-full bg-slate-100 hover:bg-slate-200 text-slate-700 py-2 px-4 rounded-lg transition font-medium text-sm">Delete</button>
                    </form>
                @endif
            </div>
        </div>
    @endforeach
</div>

<div class="text-center py-12 bg-slate-50 rounded-xl border-2 border-dashed border-slate-200">
    <i class="fas fa-info-circle text-4xl text-slate-400 mb-4"></i>
    <p class="text-lg font-semibold text-slate-700 mb-2">Click any card above to edit that homepage section</p>
    <p class="text-sm text-slate-500">Each section can be customized independently</p>
</div>
@endsection
