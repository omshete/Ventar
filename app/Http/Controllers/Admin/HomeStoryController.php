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
        $story = HomeStory::first();
        return view('admin.home.edit', compact('story'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'paragraph_1' => 'required|string',
            'paragraph_2' => 'nullable|string',
            'paragraph_3' => 'nullable|string',
            'paragraph_4' => 'nullable|string',
            'paragraph_5' => 'nullable|string',
            'paragraph_6' => 'nullable|string',
            'side_title' => 'required|string|max:255',
            'bullet_1' => 'nullable|string|max:255',
            'bullet_2' => 'nullable|string|max:255',
            'bullet_3' => 'nullable|string|max:255',
            'bullet_4' => 'nullable|string|max:255',
            'bullet_5' => 'nullable|string|max:255',
            'bullet_6' => 'nullable|string|max:255',
            'bullet_7' => 'nullable|string|max:255',
            'bullet_8' => 'nullable|string|max:255',
            'bullet_9' => 'nullable|string|max:255',
            'bullet_10' => 'nullable|string|max:255',
        ]);

        // FIXED: Better updateOrCreate logic
        HomeStory::updateOrCreate(['id' => 1], $validated);

        return redirect()->route('admin.home.index')
            ->with('success', 'Home content updated successfully!');
    }
}
