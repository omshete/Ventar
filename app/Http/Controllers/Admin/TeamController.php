<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $team = TeamMember::orderBy('order')->paginate(10);
        return view('admin.team.index', compact('team'));
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'         => 'required|string|max:255',
            'designation'  => 'nullable|string|max:255',
            'linkedin_url' => 'nullable|url',
            'order'        => 'nullable|integer',
            'photo'       => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $filename = time().'_'.$request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('uploads/team'), $filename);
            $data['photo'] = $filename;
        }

        TeamMember::create($data);

        return redirect()->route('admin.team.index')
            ->with('success','Team member created.');
    }

    public function edit(TeamMember $team)
    {
        return view('admin.team.edit', ['member' => $team]);
    }

    public function update(Request $request, TeamMember $team)
    {
        $data = $request->validate([
            'name'         => 'required|string|max:255',
            'designation'  => 'nullable|string|max:255',
            'linkedin_url' => 'nullable|url',
            'order'        => 'nullable|integer',
            'photo'       => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $filename = time().'_'.$request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('uploads/team'), $filename);
            $data['photo'] = $filename;
        }

        $team->update($data);

        return redirect()->route('admin.team.index')
            ->with('success','Team member updated.');
    }

    public function destroy(TeamMember $team)
    {
        $team->delete();
        return redirect()->route('admin.team.index')
            ->with('success','Team member deleted.');
    }
}
