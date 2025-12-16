<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aim;
use Illuminate\Http\Request;

class AimController extends Controller
{
    public function index()
    {
        $aims = Aim::orderBy('sort_order')->orderBy('id')->paginate(10);
        return view('admin.aim.index', compact('aims'));
    }

    public function create()
    {
        return view('admin.aim.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        Aim::create($request->all());

        return redirect()->route('admin.aim.index')
            ->with('success', 'Aim section created!');
    }

    public function edit(Aim $aim)
    {
        return view('admin.aim.edit', compact('aim'));
    }

    public function update(Request $request, Aim $aim)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $aim->update($request->all());

        return redirect()->route('admin.aim.index')
            ->with('success', 'Aim section updated!');
    }

    public function destroy(Aim $aim)
    {
        $aim->delete();
        return redirect()->route('admin.aim.index')
            ->with('success', 'Aim section deleted!');
    }
}
