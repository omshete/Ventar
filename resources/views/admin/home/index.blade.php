@extends('admin.layouts.app')

@section('title','Home Content')

@section('content')
@if (session('success'))
    <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="mb-4 flex justify-between items-center">
    <h2 class="text-xl font-semibold">Home Content</h2>
    <a href="{{ route('admin.home.edit') }}"
       class="bg-blue-600 text-white text-sm px-6 py-2 rounded-lg hover:bg-blue-700">
        Edit Content
    </a>
</div>

<div class="bg-white rounded-xl shadow overflow-hidden p-8 text-sm max-w-2xl">
    @if($story)
        <div class="space-y-6">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Main Title</label>
                <p class="text-xl font-bold text-gray-900">{{ $story->title }}</p>
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Paragraph 1</label>
                <p class="text-gray-700 leading-relaxed">{{ $story->paragraph_1 }}</p>
            </div>
            
            @if($story->paragraph_2)
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Paragraph 2</label>
                    <p class="text-gray-700 leading-relaxed">{{ $story->paragraph_2 }}</p>
                </div>
            @endif
            
            @if($story->paragraph_3)
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Paragraph 3</label>
                    <p class="text-gray-700 leading-relaxed">{{ $story->paragraph_3 }}</p>
                </div>
            @endif
            
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Right Card Title</label>
                <p class="text-lg font-bold text-gray-900">{{ $story->side_title }}</p>
            </div>
            
            @if($story->bullet_1 || $story->bullet_2 || $story->bullet_3 || $story->bullet_4)
                <div class="grid md:grid-cols-2 gap-4">
                    @if($story->bullet_1)
                        <div><label class="block text-sm font-semibold text-slate-700 mb-1">Bullet 1</label><p class="text-gray-700">• {{ $story->bullet_1 }}</p></div>
                    @endif
                    @if($story->bullet_2)
                        <div><label class="block text-sm font-semibold text-slate-700 mb-1">Bullet 2</label><p class="text-gray-700">• {{ $story->bullet_2 }}</p></div>
                    @endif
                    @if($story->bullet_3)
                        <div><label class="block text-sm font-semibold text-slate-700 mb-1">Bullet 3</label><p class="text-gray-700">• {{ $story->bullet_3 }}</p></div>
                    @endif
                    @if($story->bullet_4)
                        <div><label class="block text-sm font-semibold text-slate-700 mb-1">Bullet 4</label><p class="text-gray-700">• {{ $story->bullet_4 }}</p></div>
                    @endif
                </div>
            @endif
        </div>
    @else
        <div class="text-center py-12 text-slate-500">
            <p>No content found. <a href="{{ route('admin.home.edit') }}" class="text-blue-600 underline font-semibold">Create now</a></p>
        </div>
    @endif
</div>

<div class="mt-6">
    <a href="{{ route('admin.home.edit') }}" class="bg-blue-600 text-white text-sm px-6 py-2 rounded-lg hover:bg-blue-700">
        Edit Home Content
    </a>
</div>
@endsection
