<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSection;
use Illuminate\Http\Request;

class HomeSectionController extends Controller
{
    public function index()
    {
        $sections = HomeSection::orderBy('section_key')->paginate(10);
        return view('admin.home_sections.index', compact('sections'));
    }

    public function edit(HomeSection $home_section)
    {
        return view('admin.home_sections.edit', ['section' => $home_section]);
    }

    public function update(Request $request, HomeSection $home_section)
    {
        $data = $request->validate([
            'title'   => ['nullable','string'],
            'content' => ['nullable','string'],
            'order'   => ['nullable','integer'],
        ]);

        $home_section->update($data);

        return redirect()->route('admin.home-sections.index')
            ->with('success','Section updated.');
    }
}
