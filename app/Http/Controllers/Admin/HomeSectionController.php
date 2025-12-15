<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSection;
use Illuminate\Http\Request;

class HomeSectionController extends Controller
{
    public function index()
    {
        // List all home sections, ordered
        $sections = HomeSection::orderBy('sort_order')
            ->orderBy('id')
            ->paginate(10);

        return view('admin.home_sections.index', compact('sections'));
    }

    public function create()
    {
        return view('admin.home_sections.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'key'        => 'required|string|max:255|unique:home_sections,key',
            'title'      => 'nullable|string|max:255',
            'content'    => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'is_active'  => 'nullable|boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        HomeSection::create($data);

        return redirect()
            ->route('admin.home-sections.index')
            ->with('success', 'Home section created.');
    }

    public function edit(HomeSection $home_section)
    {
        return view('admin.home_sections.edit', [
            'homeSection' => $home_section,  // ← Changed from 'section' to 'homeSection'
        ]);
    }


    public function update(Request $request, HomeSection $home_section)
    {
        $data = $request->validate([
            'key'        => 'required|string|max:255|unique:home_sections,key,' . $home_section->id,
            'title'      => 'nullable|string|max:255',
            'content'    => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'is_active'  => 'nullable|boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        $home_section->update($data);

        return redirect()
            ->route('admin.home_sections.index')
            ->with('success', 'Home section updated.');
    }

    public function destroy(HomeSection $home_section)
    {
        $home_section->delete();

        return redirect()
            ->route('admin.home_sections.index')
            ->with('success', 'Home section deleted.');
    }
}
