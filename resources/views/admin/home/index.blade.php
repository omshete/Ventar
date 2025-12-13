@extends('admin.layouts.app')

@section('title','Our Story')

@section('content')
<div class="mb-4 flex justify-between items-center">
    <h2 class="text-xl font-semibold">Our Story</h2>
    <a href="{{ route('admin.home.our-story.edit') }}"
       class="bg-red-500 text-white text-sm px-4 py-2 rounded-lg">
        Edit Content
    </a>
</div>

<div class="bg-white rounded-xl shadow overflow-hidden p-8 text-sm max-w-2xl">
    @php
        $story = \App\Models\HomeStory::first();
    @endphp
    
    @if($story)
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Main Title</label>
                <p class="text-lg font-bold">{{ $story->title }}</p>
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Paragraph 1</label>
                <p>{{ $story->paragraph_1 }}</p>
            </div>
            
            @if($story->paragraph_2)
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Paragraph 2</label>
                    <p>{{ $story->paragraph_2 }}</p>
                </div>
            @endif
            
            @if($story->paragraph_3)
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Paragraph 3</label>
                    <p>{{ $story->paragraph_3 }}</p>
                </div>
            @endif
            
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Right Card Title</label>
                <p class="text-lg font-bold">{{ $story->side_title }}</p>
            </div>
            
            <div class="grid md:grid-cols-2 gap-4">
                @if($story->bullet_1)
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Bullet 1</label>
                        <p>• {{ $story->bullet_1 }}</p>
                    </div>
                @endif
                @if($story->bullet_2)
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Bullet 2</label>
                        <p>• {{ $story->bullet_2 }}</p>
                    </div>
                @endif
                @if($story->bullet_3)
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Bullet 3</label>
                        <p>• {{ $story->bullet_3 }}</p>
                    </div>
                @endif
                @if($story->bullet_4)
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Bullet 4</label>
                        <p>• {{ $story->bullet_4 }}</p>
                    </div>
                @endif
            </div>
        </div>
    @else
        <div class="text-center py-12 text-slate-500">
            <p>No Our Story content found. <a href="{{ route('admin.home.our-story.edit') }}" class="text-red-500 underline">Create now</a></p>
        </div>
    @endif
</div>

<div class="mt-6">
    <a href="{{ route('admin.home.our-story.edit') }}"
       class="bg-red-500 text-white text-sm px-4 py-2 rounded-lg">
        Edit Our Story
    </a>
</div>
@endsection
