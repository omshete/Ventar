<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\BlogPost;
use App\Models\HomeSection;
use App\Models\Setting;
use Illuminate\Support\Str;
use Carbon\Carbon;

class VentarDemoSeeder extends Seeder
{
    public function run(): void
    {
        HomeSection::updateOrCreate(
            ['section_key' => 'hero_title'],
            ['title' => 'Ventar – Your IT Service Partner']
        );

        HomeSection::updateOrCreate(
            ['section_key' => 'hero_text'],
            ['content' => 'We build secure, responsive and beautiful IT solutions for modern businesses.']
        );

        HomeSection::updateOrCreate(
            ['section_key' => 'about'],
            ['title' => 'About Ventar', 'content' => 'Ventar is an IT service company focused on Laravel, cloud and UI/UX.']
        );

        HomeSection::updateOrCreate(
            ['section_key' => 'aim'],
            ['title' => 'Our Aim', 'content' => 'Deliver reliable digital experiences with exceptional performance and design.']
        );

        Setting::updateOrCreate(['key' => 'contact_email'], ['value' => 'info@ventar.com']);
        Setting::updateOrCreate(['key' => 'contact_phone'], ['value' => '+91-0000000000']);

        if (Service::count() === 0) {
            $services = [
                'Custom Web Applications',
                'Mobile-friendly Websites',
                'Cloud & DevOps',
                'UI/UX Design',
                'IT Consulting',
                'Maintenance & Support',
            ];

            foreach ($services as $i => $title) {
                Service::create([
                    'title' => $title,
                    'slug'  => Str::slug($title),
                    'short_description' => 'Short detail about ' . $title,
                    'description'       => 'Detailed description of ' . $title,
                    'icon'  => null,
                    'order' => $i + 1,
                ]);
            }
        }

        if (TeamMember::count() === 0) {
            TeamMember::create([
                'name' => 'Rahul Sharma',
                'designation' => 'Founder & CEO',
                'linkedin_url' => '#',
                'photo' => null,
                'order' => 1,
            ]);

            TeamMember::create([
                'name' => 'Aditi Verma',
                'designation' => 'Lead Developer',
                'linkedin_url' => '#',
                'photo' => null,
                'order' => 2,
            ]);
        }

        if (BlogPost::count() === 0) {
            $posts = [
                'Why your business needs a modern website',
                '5 tips for secure web apps',
                'Making UI delightful and usable',
            ];

            foreach ($posts as $i => $title) {
                BlogPost::create([
                    'title' => $title,
                    'slug' => Str::slug($title),
                    'excerpt' => 'Short intro about ' . $title,
                    'content' => 'Full content for ' . $title,
                    'image' => null,
                    'is_published' => true,
                    'published_at' => Carbon::now()->subDays($i),
                ]);
            }
        }
    }
}
