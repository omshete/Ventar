<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Contact;
use App\Models\BlogPost;
use App\Models\TeamMember;
use App\Models\Service;
use App\Models\Customer;
use App\Models\HomeStory;
use App\Models\Aim;
use App\Models\AboutUs;  // ✅ ADDED: Missing import
use App\Mail\ContactMessageMail;
use Illuminate\Support\Facades\Mail;

class SiteController extends Controller
{
    /**
     * Safe helper to read single setting value from settings table.
     */
    protected function getSettingValue(string $key, $default = null)
    {
        try {
            $val = Setting::where('key', $key)->value('value');
            return $val !== null ? $val : $default;
        } catch (\Throwable $e) {
            return $default;
        }
    }

    /**
     * HOME PAGE
     */
    public function index()
    {
        // SERVICES for home (3 cards, active only)
        try {
            $services = Service::where('is_active', 1)
                ->orderBy('sort_order', 'asc')
                ->orderBy('id', 'asc')
                ->take(3)
                ->get();
        } catch (\Throwable $e) {
            \Log::error('Home page services load error: ' . $e->getMessage());
            $services = collect();
        }

        // BLOGS for home (3 latest)
        try {
            $blogs = BlogPost::where('is_published', 1)
                ->orderBy('published_at', 'desc')
                ->take(3)
                ->get();
        } catch (\Throwable $e) {
            \Log::error('Home page blogs load error: ' . $e->getMessage());
            $blogs = collect();
        }

        // CUSTOMERS for home (Our Customers section)
        try {
            $customers = Customer::orderByDesc('created_at')
                ->take(8)
                ->get();
        } catch (\Throwable $e) {
            \Log::error('Home page customers load error: ' . $e->getMessage());
            $customers = collect();
        }

        // Hero title / text from settings table
        $homeTitle = $this->getSettingValue('hero_title', 'Ventar – Your IT Service Partner');
        $homeText  = $this->getSettingValue('hero_text', 'Ventar delivers scalable, secure, and modern digital solutions.');

        // OUR STORY
        try {
            $ourStory = HomeStory::first();
        } catch (\Throwable $e) {
            \Log::error('Home page our story load error: ' . $e->getMessage());
            $ourStory = null;
        }

        // Important: DO NOT pass a local $homeSetting here.
        // The layout (layouts.app) will use the globally shared $homeSetting
        // from AppServiceProvider, which reads the home_settings table.
        return view('site.home', compact(
            'blogs',
            'services',
            'customers',
            'homeTitle',
            'homeText',
            'ourStory'
        ));
    }

    /**
     * About page - ✅ FIXED with error handling
     */
    public function about()
    {
        try {
        // Get FIRST active about OR create default
        $about = AboutUs::where('is_active', 1)
            ->orderBy('sort_order', 'asc')
            ->orderBy('id', 'asc')
            ->first();
            
        // If no active about, get any or null
        if (!$about) {
            $about = AboutUs::orderBy('id')->first();
        }
    } catch (\Throwable $e) {
        \Log::error('About page load error: ' . $e->getMessage());
        $about = null;
    }
        
        return view('site.about', compact('about'));
    }

    /**
     * Services page
     */
    public function services()
    {
        try {
            $services = Service::where('is_active', 1)
                ->orderBy('sort_order', 'asc')
                ->orderBy('id', 'asc')
                ->get();
        } catch (\Throwable $e) {
            \Log::error('Services page load error: ' . $e->getMessage());
            $services = collect();
        }

        return view('site.services', compact('services'));
    }

    /**
     * Single service detail page
     */
    public function serviceDetail($service)
    {
        $query = Service::where('is_active', 1);

        $serviceModel = $query->where('slug', $service)->first();

        if (! $serviceModel) {
            $serviceModel = $query->where('id', $service)->firstOrFail();
        }

        return view('site.service_detail', ['service' => $serviceModel]);
    }

    /**
     * Our Aim page
     */
    public function aim()
    {
        try {
        $aim = Aim::where('is_active', 1)
            ->orderBy('sort_order')
            ->first();
        } catch (\Throwable $e) {
            \Log::error('Aim page load error: ' . $e->getMessage());
            $aim = null;
        }
        return view('site.aim', compact('aim'));
    }

    /**
     * Team page
     */
    public function team()
    {
        $team = TeamMember::orderBy('id', 'asc')->get();
        return view('site.team', compact('team'));
    }

    /**
     * Blogs listing page
     */
    public function blogs()
    {
        $blogs = BlogPost::where('is_published', 1)
            ->orderBy('published_at', 'desc')
            ->paginate(9);

        return view('site.blogs', compact('blogs'));
    }

    /**
     * Blog detail page
     */
    public function blogDetail($blog)
    {
        $query = BlogPost::where('is_published', 1);

        $blogModel = $query->where('slug', $blog)->first();

        if (! $blogModel) {
            $blogModel = $query->where('id', $blog)->firstOrFail();
        }

        return view('site.blog_detail', ['blog' => $blogModel]);
    }

    /**
     * Contact page (show)
     */
    public function contact()
    {
        $contactEmail = $this->getSettingValue('contact_email', 'hello@ventar.com');
        $contactPhone = $this->getSettingValue('contact_phone', '+91-0000000000');

        return view('site.contact', compact('contactEmail', 'contactPhone'));
    }

    /**
     * Contact form submission
     */
    public function submitContact(Request $request)
    {
        $data = $request->validate([
            'name'    => ['required', 'string', 'max:255'],
            'email'   => ['required', 'email', 'max:255'],
            'phone'   => ['nullable', 'string', 'max:50'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'min:5'],
        ]);

        Contact::create($data);

        Mail::to('adinath@ventar.in')->send(new ContactMessageMail($data));

        return back()->with('success', 'Your message has been sent successfully.');
    }
}
