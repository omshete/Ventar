<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeStory;
use Illuminate\Http\Request;

class HomeStoryController extends Controller
{
    public function index()
    {
        $story = HomeStory::first();
        return view('admin.home.index', compact('story'));
    }

    public function edit()
    {
        $story = HomeStory::firstOrCreate([]);
        return view('admin.home.edit', compact('story'));
    }

    public function update(Request $request, HomeStory $story)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'paragraph_1'  => 'required|string',
            'paragraph_2'  => 'nullable|string',
            'paragraph_3'  => 'nullable|string',
            'side_title'   => 'required|string|max:255',
            'bullet_1'     => 'nullable|string|max:255',
            'bullet_2'     => 'nullable|string|max:255',
            'bullet_3'     => 'nullable|string|max:255',
            'bullet_4'     => 'nullable|string|max:255',
        ]);

        $story->update($data);

        return redirect()
            ->route('admin.home.our-story.index')
            ->with('success', 'Our Story content updated successfully.');
    }
}
