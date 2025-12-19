@extends('layouts.app')

@section('title', 'Blogs')

@section('content')
<section id="hero" class="min-h-screen flex items-center text-slate-900 py-24"
         style="background: radial-gradient(circle at top left, #ffe1c2 0, #ffe9d4 30%, #fde7d7 55%, #fbe5d5 75%, #f8ddc7 100%);">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-20">
            <h1 class="text-5xl md:text-7xl font-black text-slate-900 mb-6 scroll-animate">Latest Blogs</h1>
            <p class="text-xl text-slate-700 max-w-2xl mx-auto scroll-animate">Stay updated with latest IT trends and insights</p>
        </div>

        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3 scroll-animate">
            @forelse($blogs as $blog)
                <article class="group bg-white/90 rounded-3xl shadow-xl p-8 hover:shadow-2xl transition-all duration-500 hover:-translate-y-3 cursor-pointer border border-orange-100">
                    
                    {{-- 👇 DYNAMIC GOOGLE MATERIAL ICON FOR BLOGS 👇 --}}
                    <div class="w-15 h-15 bg-orange-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-lg text-white border-4 border-orange-500">
                        <span class="material-icons text-2xl">
                            @php
                                $title = strtolower($blog->title ?? '');
                                $icon = 'article'; // Default blog icon
                                
                                // Tech & Development
                                if (str_contains($title, 'react') || str_contains($title, 'javascript')) $icon = 'code';
                                elseif (str_contains($title, 'laravel') || str_contains($title, 'php')) $icon = 'developer_mode';
                                elseif (str_contains($title, 'web') || str_contains($title, 'website')) $icon = 'web';
                                elseif (str_contains($title, 'api') || str_contains($title, 'backend')) $icon = 'storage';
                                
                                // Design & UI/UX
                                elseif (str_contains($title, 'design') || str_contains($title, 'ui') || str_contains($title, 'ux')) $icon = 'design_services';
                                elseif (str_contains($title, 'css') || str_contains($title, 'tailwind')) $icon = 'palette';
                                
                                // Mobile & Apps
                                elseif (str_contains($title, 'mobile') || str_contains($title, 'app')) $icon = 'smartphone';
                                elseif (str_contains($title, 'android') || str_contains($title, 'ios')) $icon = 'phone_android';
                                
                                // Cloud & DevOps
                                elseif (str_contains($title, 'cloud') || str_contains($title, 'aws')) $icon = 'cloud';
                                elseif (str_contains($title, 'devops') || str_contains($title, 'docker')) $icon = 'build';
                                
                                // AI & Data
                                elseif (str_contains($title, 'ai') || str_contains($title, 'artificial')) $icon = 'smart_toy';
                                elseif (str_contains($title, 'data') || str_contains($title, 'analytics')) $icon = 'analytics';
                                
                                // Marketing & SEO
                                elseif (str_contains($title, 'seo') || str_contains($title, 'marketing')) $icon = 'campaign';
                                elseif (str_contains($title, 'social') || str_contains($title, 'media')) $icon = 'share';
                                
                                // Security
                                elseif (str_contains($title, 'security') || str_contains($title, 'cyber')) $icon = 'security';
                                
                                // Tutorial & Guide
                                elseif (str_contains($title, 'tutorial') || str_contains($title, 'guide')) $icon = 'school';
                                
                                echo $icon;
                            @endphp
                        </span>
                    </div>
                    {{-- 👆 DYNAMIC GOOGLE MATERIAL ICON FOR BLOGS 👆 --}}
                    
                    <h3 class="text-2xl font-bold text-slate-900 mb-4 leading-tight">{{ Str::limit($blog->title, 60) }}</h3>
                    <p class="text-slate-700 mb-6 leading-relaxed">{{ Str::limit(strip_tags($blog->content), 100) }}</p>
                    <div class="text-sm text-slate-500 mb-4">
                        {{ optional($blog->published_at)->format('d M Y') }}
                    </div>
                    <a href="{{ route('blogs.show', $blog->slug ?? $blog->id) }}" class="text-orange-500 font-semibold hover:underline flex items-center gap-2 text-lg">
                        Read More <span>→</span>
                    </a>
                </article>
            @empty
                <div class="col-span-full text-center py-20">
                    <div class="w-24 h-24 bg-orange-400 rounded-full flex items-center justify-center mx-auto mb-8 text-4xl border-4 border-white shadow-lg">✨</div>
                    <p class="text-xl text-slate-700">No blogs published yet...</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
