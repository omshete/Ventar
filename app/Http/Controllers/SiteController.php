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
use App\Models\AboutUs;
use App\Models\ContactSetting;
use App\Models\HomeHero;
use App\Models\Career;
use App\Mail\ContactMessageMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

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

        // Fallback hero title / text from settings table
        $homeTitle = $this->getSettingValue('hero_title', 'Ventar – Your IT Service Partner');
        $homeText  = $this->getSettingValue('hero_text', 'Ventar delivers scalable, secure, and modern digital solutions.');

        // Optional: dynamic Home Hero from DB (if you created HomeHero)
        $hero = null;
        try {
            $hero = HomeHero::where('is_active', 1)
                ->orderBy('sort_order')
                ->orderBy('id')
                ->first();
            if ($hero) {
                // if hero exists, override text used in the view
                $homeTitle = $hero->title;
                $homeText  = $hero->description ?? $homeText;
            }
        } catch (\Throwable $e) {
            \Log::error('Home page hero load error: ' . $e->getMessage());
            $hero = null;
        }

        // OUR STORY
        try {
            $ourStory = HomeStory::first();
        } catch (\Throwable $e) {
            \Log::error('Home page our story load error: ' . $e->getMessage());
            $ourStory = null;
        }

        // The layout uses shared $homeSetting from AppServiceProvider (home_settings table)
        return view('site.home', compact(
            'blogs',
            'services',
            'customers',
            'homeTitle',
            'homeText',
            'ourStory',
            'hero'
        ));
    }

    /**
     * About page
     */
    public function about()
    {
        try {
            // Get FIRST active about
            $about = AboutUs::where('is_active', 1)
                ->orderBy('sort_order', 'asc')
                ->orderBy('id', 'asc')
                ->first();

            // If no active about, get any record (or null if none)
            if (! $about) {
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
     * Contact page (show) - UPDATED WITH CAREERS
     */
    public function contact()
    {
        try {
            $contacts = ContactSetting::where('is_active', true)
                ->orderBy('sort_order', 'asc')
                ->get();
            
            // NEW: Load active career for contact page right card
            $career = \App\Models\Career::where('is_active', true)
                ->orderBy('sort_order')
                ->first();
        } catch (\Throwable $e) {
            \Log::error('Contact page load error: ' . $e->getMessage());
            $contacts = collect();
            $career = null;
        }
        
        return view('site.contact', compact('contacts', 'career'));
    }

    /**
     * NEW: Careers page
     */
    public function careers()
    {
        try {
            $careers = \App\Models\Career::where('is_active', true)
                ->orderBy('sort_order')
                ->get();
        } catch (\Throwable $e) {
            \Log::error('Careers page load error: ' . $e->getMessage());
            $careers = collect();
        }
        
        return view('site.careers', compact('careers'));
    }

 /**
 * Careers application - DEBUG VERSION
 */
public function apply(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'portfolio' => 'nullable|url|max:500',
            'cover_letter' => 'nullable|string|max:2000',
            'job_title' => 'required|string|max:255',
            'job_location' => 'required|string|max:255',
            'job_type' => 'required|string|max:100',
        ]);

        try {
            // Send email to adinath@ventar.in
            Mail::raw($this->buildApplicationEmail($request->all()), function ($message) {
                $message->to('adinath@ventar.in')
                        ->subject('🆕 New Job Application: ' . request('job_title'))
                        ->from(config('mail.from.address', 'noreply@ventar.in'), 'Ventar Careers');
            });

            Log::info('Job application received from ' . $request->email, $request->all());

            return response()->json([
                'success' => true,
                'message' => 'Application sent successfully to adinath@ventar.in!'
            ]);

        } catch (\Exception $e) {
            Log::error('Job application failed: ' . $e->getMessage(), $request->all());
            
            return response()->json([
                'success' => false,
                'message' => 'Failed to send application. Please try again later.'
            ], 500);
        }
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
