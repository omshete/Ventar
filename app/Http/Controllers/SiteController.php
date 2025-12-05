<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\BlogPost;
use App\Models\TeamMember;
use App\Models\HomeSection;
use App\Models\Setting;

class SiteController extends Controller
{
    public function home()
    {
        $services = Service::orderBy('order')->limit(6)->get();
        $blogs    = BlogPost::where('is_published', true)
                        ->orderByDesc('published_at')
                        ->limit(3)->get();
        $heroTitle = HomeSection::where('section_key', 'hero_title')->first();
        $heroText  = HomeSection::where('section_key', 'hero_text')->first();

        return view('site.home', compact('services', 'blogs', 'heroTitle', 'heroText'));
    }

    public function services()
    {
        $services = Service::orderBy('order')->get();
        return view('site.services', compact('services'));
    }

    public function about()
    {
        $about = HomeSection::where('section_key', 'about')->first();
        return view('site.about', compact('about'));
    }

    public function aim()
    {
        $aim = HomeSection::where('section_key', 'aim')->first();
        return view('site.aim', compact('aim'));
    }

    public function team()
    {
        $team = TeamMember::orderBy('order')->get();
        return view('site.team', compact('team'));
    }

    public function blogs()
    {
        $blogs = BlogPost::where('is_published', true)
                    ->orderByDesc('published_at')
                    ->paginate(6);
        return view('site.blogs', compact('blogs'));
    }

    public function blogDetail(string $slug)
    {
        $blog = BlogPost::where('slug', $slug)
                    ->where('is_published', true)
                    ->firstOrFail();
        return view('site.blog_detail', compact('blog'));
    }

    public function contact()
    {
        $email = Setting::getValue('contact_email', 'info@ventar.com');
        $phone = Setting::getValue('contact_phone', '+91-0000000000');
        return view('site.contact', compact('email', 'phone'));
    }
}
