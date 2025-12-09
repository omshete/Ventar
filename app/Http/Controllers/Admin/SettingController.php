<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        // Keys we want to manage in one screen
        $keys = [
            'contact_email',
            'contact_phone',
            'social_linkedin',
            'social_instagram',
            'social_facebook',
            'social_x',
            'logo_path',
        ];

        // Get existing settings and key them by "key" column
        $settings = Setting::whereIn('key', $keys)
            ->get()
            ->keyBy('key');

        return view('admin.settings.index', compact('settings'));
    }

    // Not used when we handle everything via the "save" method
    public function update(Request $request, Setting $setting)
    {
    }

    public function edit($id)
    {
    }

    public function store(Request $request)
    {
    }

    // Single form for all settings
    public function save(Request $request)
    {
        $data = $request->validate([
            'contact_email'    => ['nullable', 'email'],
            'contact_phone'    => ['nullable', 'string'],
            'social_linkedin'  => ['nullable', 'url'],
            'social_instagram' => ['nullable', 'url'],
            'social_facebook'  => ['nullable', 'url'],
            'social_x'         => ['nullable', 'url'],
            'logo'             => ['nullable', 'image', 'max:2048'],
        ]);

        // Save text/url settings
        foreach ($data as $key => $value) {
            if ($key === 'logo') {
                continue;
            }

            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        // Handle logo upload if present
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');

            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);

            Setting::updateOrCreate(
                ['key' => 'logo_path'],
                ['value' => 'images/' . $filename]
            );
        }

        return back()->with('success', 'Settings updated.');
    }
}
