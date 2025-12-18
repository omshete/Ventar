<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $abouts = AboutUs::orderBy('sort_order')->paginate(10);
        return view('admin.about-us.index', compact('abouts'));
    }

    public function create()
    {
        return view('admin.about-us.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'sort_order' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->only('title', 'content', 'sort_order', 'is_active');
        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('about-us', 'public');
        }

        AboutUs::create($data);

        return redirect()->route('admin.about-us.index')
            ->with('success', 'About Us section created!');
    }

    public function edit(AboutUs $aboutUs)
    {
        return view('admin.about-us.edit', compact('aboutUs'));
    }

    public function update(Request $request, $about_u)
{
    $aboutUs = AboutUs::findOrFail($about_u);
    
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required',
        'sort_order' => 'nullable|integer',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $data = $request->only('title', 'content', 'sort_order', 'is_active');
    
    if ($request->hasFile('image')) {
        if ($aboutUs->image) {
            \Storage::disk('public')->delete($aboutUs->image);
        }
        $data['image'] = $request->file('image')->store('about-us', 'public');
    }

    $aboutUs->update($data);

    return redirect()->route('admin.about-us.index')
        ->with('success', 'About Us updated successfully!');
}

    public function destroy(AboutUs $aboutUs)
    {
        if ($aboutUs->image) {
            \Storage::disk('public')->delete($aboutUs->image);
        }
        $aboutUs->delete();

        return redirect()->route('admin.about-us.index')
            ->with('success', 'About Us section deleted!');
    }
}
