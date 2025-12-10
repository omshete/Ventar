<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSection;
use Illuminate\Http\Request;

class HomeSectionController extends Controller
{
    public function index()
    {
        $sections = HomeSection::orderBy('order')
            ->orderBy('section_key')
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
            'section_key' => ['required', 'string', 'max:255', 'unique:home_sections,section_key'],
            'title'       => ['nullable', 'string', 'max:255'],
            'content'     => ['nullable', 'string'],
            'order'       => ['nullable', 'integer'],
        ]);

        HomeSection::create($data);

        return redirect()
            ->route('admin.home-sections.index')
            ->with('success', 'Section added.');
    }

    public function edit(HomeSection $home_section)
    {
        return view('admin.home_sections.edit', [
            'section' => $home_section,
        ]);
    }

    public function update(Request $request, HomeSection $home_section)
    {
        $data = $request->validate([
            'title'   => ['nullable', 'string', 'max:255'],
            'content' => ['nullable', 'string'],
            'order'   => ['nullable', 'integer'],
        ]);

        $home_section->update($data);

        return redirect()
            ->route('admin.home-sections.index')
            ->with('success', 'Section updated.');
    }

    public function destroy(HomeSection $home_section)
    {
        $home_section->delete();

        return redirect()
            ->route('admin.home-sections.index')
            ->with('success', 'Section deleted.');
    }
}
