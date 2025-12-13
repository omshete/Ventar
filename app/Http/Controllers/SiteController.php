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
    try {
        // Fix 1: Use correct model name + published services
        $services = Service::where('is_active', 1) // Add this if you have is_active field
            ->orderBy('sort_order', 'asc')
            ->orderBy('id', 'asc')
            ->take(3)
            ->get();
        
        // Debug: Log services count
        \Log::info('Home page services count: ' . $services->count());
        
    } catch (\Throwable $e) {
        \Log::error('Services load error: ' . $e->getMessage());
        $services = collect();
    }

    try {
        $blogs = BlogPost::where('is_published', 1)
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();
    } catch (\Throwable $e) {
        $blogs = collect();
    }

    // Home settings
    $homeTitle = $this->getSettingValue('hero_title', 'Ventar – Your IT Service Partner');
    $homeText  = $this->getSettingValue('hero_text', 'Ventar delivers scalable, secure, and modern digital solutions.');

    $homeSetting = (object) [
        'site_title'        => $this->getSettingValue('site_title', 'Ventar – IT Services'),
        'logo'              => $this->getSettingValue('logo', null),
        'footer_company'    => $this->getSettingValue('footer_company', 'Ventar'),
        'footer_description'=> $this->getSettingValue('footer_description', 'Smart IT solutions.'),
        'footer_email'      => $this->getSettingValue('footer_email', 'info@ventar.com'),
        'footer_phone'      => $this->getSettingValue('footer_phone', '+91-0000000000'),
        'footer_linkedin'   => $this->getSettingValue('footer_linkedin', null),
        'footer_instagram'  => $this->getSettingValue('footer_instagram', null),
    ];

    return view('site.home', compact('blogs', 'services', 'homeTitle', 'homeText', 'homeSetting'));
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
        // ...
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
        // ...
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
