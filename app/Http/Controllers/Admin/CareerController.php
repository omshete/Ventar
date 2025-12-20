<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::orderBy('sort_order')->paginate(10);
        return view('admin.careers.index', compact('careers'));
    }

    public function create()
    {
        return view('admin.careers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string',
            'location' => 'required|string|max:255',
            'type' => 'required|in:fulltime,parttime,contract,internship',
            'experience' => 'required|string|max:50',
            'icon_color' => 'required|in:bg-orange-500,bg-blue-500,bg-green-500,bg-purple-500,bg-red-500'
        ]);

        Career::create($request->all());
        return redirect()->route('admin.careers.index')->with('success', 'Career added successfully!');
    }

    public function edit(Career $career)
    {
        return view('admin.careers.edit', compact('career'));
    }

    public function update(Request $request, Career $career)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string',
            'location' => 'required|string|max:255',
            'type' => 'required|in:fulltime,parttime,contract,internship',
            'experience' => 'required|string|max:50',
            'icon_color' => 'required|in:bg-orange-500,bg-blue-500,bg-green-500,bg-purple-500,bg-red-500'
        ]);

        $career->update($request->all());
        return redirect()->route('admin.careers.index')->with('success', 'Career updated successfully!');
    }

    public function destroy(Career $career)
    {
        $career->delete();
        return redirect()->route('admin.careers.index')->with('success', 'Career deleted successfully!');
    }
}
