<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeSettingController extends Controller
{
    /**
     * List all settings (logo, email, phone, socials etc.).
     */
    public function index()
    {
        $settings = Setting::orderBy('key')->paginate(20);

        return view('admin.home_settings.index', compact('settings'));
    }

    /**
     * Show add form.
     */
    public function create()
    {
        return view('admin.home_settings.create');
    }

    /**
     * Store new setting.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'key'   => ['required', 'string', 'max:255', 'unique:settings,key'],
            'value' => ['nullable', 'string'],
        ]);

        Setting::create($data);

        return redirect()
            ->route('admin.home_settings.index')
            ->with('success', 'Setting created.');
    }

    /**
     * Show edit form.
     *
     * Route model binding: parameter {home_setting}
     */
    public function edit(Setting $home_setting)
    {
        $setting = $home_setting;

        return view('admin.home_settings.edit', compact('setting'));
    }

    /**
     * Update existing setting.
     */
    public function update(Request $request, Setting $home_setting)
    {
        $setting = $home_setting;

        $data = $request->validate([
            'key'   => ['required', 'string', 'max:255', 'unique:settings,key,' . $setting->id],
            'value' => ['nullable', 'string'],
        ]);

        $setting->update($data);

        return redirect()
            ->route('admin.home-setting.index')
            ->with('success', 'Setting updated.');
    }

    /**
     * Delete a setting.
     */
    public function destroy(Setting $home_setting)
    {
        $home_setting->delete();

        return redirect()
            ->route('admin.home_settings.index')
            ->with('success', 'Setting deleted.');
    }

}
