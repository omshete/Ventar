<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSetting;
use Illuminate\Http\Request;

class ContactSettingController extends Controller
{
    public function index()
    {
        $contacts = ContactSetting::orderBy('sort_order')->orderBy('id')->paginate(10);
        return view('admin.contact-settings.index', compact('contacts'));
    }

    public function create()
    {
        return view('admin.contact-settings.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'page_title'   => 'required|string|max:255',
            'intro_text'   => 'nullable|string',
            'email_label'  => 'required|string|max:255',
            'email_value'  => 'required|email|max:255',
            'phone_label'  => 'required|string|max:255',
            'phone_value'  => 'required|string|max:255',
            'send_to_email'=> 'required|email|max:255',
            'sort_order'   => 'nullable|integer',
            'is_active'    => 'boolean',
        ]);

        ContactSetting::create($data);

        return redirect()->route('admin.contact-settings.index')
            ->with('success', 'Contact settings created!');
    }

    public function edit(ContactSetting $contactSetting)
    {
        return view('admin.contact-settings.edit', ['contact' => $contactSetting]);
    }

    public function update(Request $request, ContactSetting $contactSetting)
    {
        $data = $request->validate([
            'page_title'   => 'required|string|max:255',
            'intro_text'   => 'nullable|string',
            'email_label'  => 'required|string|max:255',
            'email_value'  => 'required|email|max:255',
            'phone_label'  => 'required|string|max:255',
            'phone_value'  => 'required|string|max:255',
            'send_to_email'=> 'required|email|max:255',
            'sort_order'   => 'nullable|integer',
            'is_active'    => 'boolean',
        ]);

        $contactSetting->update($data);

        return redirect()->route('admin.contact-settings.index')
            ->with('success', 'Contact settings updated!');
    }

    public function destroy(ContactSetting $contactSetting)
    {
        $contactSetting->delete();

        return redirect()->route('admin.contact-settings.index')
            ->with('success', 'Contact settings deleted!');
    }
}
