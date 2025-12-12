<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Contact;
use App\Models\BlogPost;
use App\Models\TeamMember;
use App\Models\Service;
use App\Mail\ContactMessageMail;
use Illuminate\Support\Facades\Mail;

class SiteController extends Controller
{
    /**
     * Safe helper to read single setting value from settings table.
     * It looks up row where 'key' = $key and returns 'value' or $default.
     */
    protected function getSettingValue(string $key, $default = null)
    {
        try {
            $val = Setting::where('key', $key)->value('value');
            return $val !== null ? $val : $default;
        } catch (\Throwable $e) {
            // If the settings table / model doesn't exist yet, return default
            return $default;
        }
    }

    /**
     * Homepage
     */
    public function index()
    {
        // example: show latest 3 blogs on home if BlogPost exists
        try {
            $blogs = BlogPost::where('is_published', 1)
                ->orderBy('published_at', 'desc')
                ->take(3)
                ->get();
        } catch (\Throwable $e) {
            $blogs = collect();
        }

        // pass settings if your home view uses them
        $homeTitle = $this->getSettingValue('hero_title', 'Ventar – Your IT Service Partner');
        $homeText  = $this->getSettingValue('hero_text', 'Ventar is an IT service providing company delivering scalable, secure and modern digital solutions.');

        return view('site.index', compact('blogs', 'homeTitle', 'homeText'));
    }

    /**
     * About page
     */
    public function about()
    {
        $aboutText = $this->getSettingValue('about_text', null);
        return view('site.about', compact('aboutText'));
    }

    /**
     * Services page
     */
    public function services()
    {
        // Fetch all services from database (Service model)
        $services = \App\Models\Service::orderBy('id', 'desc')->get();

        // Send $services to the Blade view
        return view('site.services', compact('services'));
    }


    /**
     * Our Aim page
     */
    public function aim()
    {
        $aim = $this->getSettingValue('our_aim', null);
        return view('site.aim', compact('aim'));
    }

    /**
     * Team page
     */
   public function team()
    {
        // fetch all team members (ordered by id ascending)
        $team = TeamMember::orderBy('id', 'asc')->get();

        return view('site.team', compact('team'));
    }




    /**
     * Blogs listing page
     */
    public function blogs()
    {
        try {
            $blogs = BlogPost::where('is_published', 1)
                ->orderBy('published_at', 'desc')
                ->paginate(9);
        } catch (\Throwable $e) {
            $blogs = collect();
        }

        return view('site.blogs', compact('blogs'));
    }

    /**
     * Contact page (show)
     */
    public function contact()
    {
        // Prefer settings (if present) else sensible defaults
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

        // 1) Save to database
        Contact::create($data);

        // 2) Send email to company address
        Mail::to('adinath@ventar.in')->send(new ContactMessageMail($data));

        return back()->with('success', 'Your message has been sent successfully.');
    }

}
