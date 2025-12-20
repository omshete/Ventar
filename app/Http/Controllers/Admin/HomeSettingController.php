<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSetting;
use Illuminate\Http\Request;

class HomeSettingController extends Controller
{
    // Single settings screen (used by admin.home_settings.index)
    public function index()
    {
        // always work with row id = 1 (create if not exists)
        $homeSetting = HomeSetting::firstOrCreate(['id' => 1]);

        return view('admin.home_settings.edit', compact('homeSetting'));
    }

    // Optional edit route (admin.home_settings.edit)
    public function edit(HomeSetting $home_setting)
    {
        return view('admin.home_settings.edit', [
            'homeSetting' => $home_setting,
        ]);
    }

    // Update footer values
    public function update(Request $request, HomeSetting $home_setting)
    {
        $data = $request->validate([
            'footer_company'      => 'nullable|string|max:255',
            'footer_description'  => 'nullable|string',
            'footer_email'        => 'nullable|email|max:255',
            'footer_phone'        => 'nullable|string|max:255',
            'footer_address'      => 'nullable|string|max:255',
            'footer_x'            => 'nullable|string|max:255',
            'footer_linkedin'     => 'nullable|string|max:255',
            'footer_facebook'     => 'nullable|string|max:255',
            'footer_instagram'    => 'nullable|string|max:255',
            'footer_quick_links' => 'nullable|string|max:1000',
        ]);

        $home_setting->update($data);

        return redirect()
            ->route('admin.home_settings.index')
            ->with('success', 'Footer settings updated.');
    }
}
