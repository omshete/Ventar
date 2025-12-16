<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeHero;
use Illuminate\Http\Request;

class HomeHeroController extends Controller
{
    public function index()
    {
        $heroes = HomeHero::orderBy('sort_order')->orderBy('id')->paginate(10);
        return view('admin.home-hero.index', compact('heroes'));
    }

    public function create()
    {
        return view('admin.home-hero.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'         => 'required|string|max:255',
            'description'   => 'nullable|string',
            'button_label'  => 'required|string|max:255',
            'button_link'   => 'required|string|max:255',
            'card1_title'   => 'required|string|max:255',
            'card1_text'    => 'required|string|max:255',
            'card2_title'   => 'required|string|max:255',
            'card2_text'    => 'required|string|max:255',
            'card3_title'   => 'required|string|max:255',
            'card3_text'    => 'required|string|max:255',
            'card4_title'   => 'required|string|max:255',
            'card4_text'    => 'required|string|max:255',
            'sort_order'    => 'nullable|integer',
            'is_active'     => 'boolean',
        ]);

        HomeHero::create($data);

        return redirect()->route('admin.home-hero.index')
            ->with('success', 'Home hero section created!');
    }

    public function edit(HomeHero $homeHero)
    {
        return view('admin.home-hero.edit', ['hero' => $homeHero]);
    }

    public function update(Request $request, HomeHero $homeHero)
    {
        $data = $request->validate([
            'title'         => 'required|string|max:255',
            'description'   => 'nullable|string',
            'button_label'  => 'required|string|max:255',
            'button_link'   => 'required|string|max:255',
            'card1_title'   => 'required|string|max:255',
            'card1_text'    => 'required|string|max:255',
            'card2_title'   => 'required|string|max:255',
            'card2_text'    => 'required|string|max:255',
            'card3_title'   => 'required|string|max:255',
            'card3_text'    => 'required|string|max:255',
            'card4_title'   => 'required|string|max:255',
            'card4_text'    => 'required|string|max:255',
            'sort_order'    => 'nullable|integer',
            'is_active'     => 'boolean',
        ]);

        $homeHero->update($data);

        return redirect()->route('admin.home-hero.index')
            ->with('success', 'Home hero section updated!');
    }

    public function destroy(HomeHero $homeHero)
    {
        $homeHero->delete();

        return redirect()->route('admin.home-hero.index')
            ->with('success', 'Home hero section deleted!');
    }
}
