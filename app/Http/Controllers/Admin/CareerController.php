<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::orderBy('sort_order')->orderBy('id')->paginate(10);
        return view('admin.careers.index', compact('careers'));
    }

    public function create()
    {
        return view('admin.careers.create');
    }

  public function store(Request $request)
{
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'location' => 'required|string|max:255',
        'type' => 'required|string|max:100',
        'icon' => 'nullable|string|max:50',
        'sort_order' => 'nullable|integer',
        'is_active' => 'boolean',
    ]);

    // 🔥 USE ONLY EXISTING COLUMNS (from your error)
    \DB::table('careers')->insert([
        'title' => $data['title'],
        'description' => $data['description'],
        'location' => $data['location'],
        'type' => $data['type'],
        'icon' => $data['icon'] ?? 'work',
        'sort_order' => $data['sort_order'] ?? 0,
        'is_active' => $data['is_active'] ?? 1,
        'short_description' => '',  // ✅ Exists
        'experience' => '',         // ✅ Exists
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect()->route('admin.careers.index')
        ->with('success', 'Job position created!');
}




    public function edit(Career $career)
    {
        return view('admin.careers.edit', compact('career'));
    }

  public function update(Request $request, Career $career)
{
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'location' => 'required|string|max:255',
        'type' => 'required|string|max:100',
        'icon' => 'nullable|string|max:50',
        'sort_order' => 'nullable|integer',
        'is_active' => 'boolean',
    ]);

    \DB::table('careers')
        ->where('id', $career->id)
        ->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'location' => $data['location'],
            'type' => $data['type'],
            'icon' => $data['icon'] ?? 'work',
            'sort_order' => $data['sort_order'] ?? 0,
            'is_active' => $data['is_active'] ?? 1,
            'short_description' => '',
            'experience' => '',
            'updated_at' => now(),
        ]);

    return redirect()->route('admin.careers.index')
        ->with('success', 'Job position updated!');
}



    public function destroy(Career $career)
    {
        $career->delete();
        return redirect()->route('admin.careers.index')
            ->with('success', 'Job position deleted!');
    }
}
