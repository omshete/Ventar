<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $abouts = AboutUs::orderBy('sort_order')->orderBy('id')->paginate(10);
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
            'content' => 'required|string',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        AboutUs::create($request->all());

        return redirect()->route('admin.about-us.index')
            ->with('success', 'About Us section created!');
    }

    public function edit(AboutUs $aboutUs)
    {
        return view('admin.about-us.edit', compact('aboutUs'));
    }

    public function update(Request $request, AboutUs $aboutUs)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $aboutUs->update($request->all());

        return redirect()->route('admin.about-us.index')
            ->with('success', 'About Us section updated!');
    }

    public function destroy(AboutUs $aboutUs)
    {
        $aboutUs->delete();
        return redirect()->route('admin.about-us.index')
            ->with('success', 'About Us section deleted!');
    }
}
