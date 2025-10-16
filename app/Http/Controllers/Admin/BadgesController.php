<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BadgesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $badges = \App\Models\Badge::all();
        return view('admin.badges.index', compact('badges'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.badges.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|unique:badges,code',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'condition_type' => 'required|string|max:255',
            'condition_data' => 'nullable|json',
        ]);

        \App\Models\Badge::create($request->all());

        return redirect()->route('badges.index')->with('success', 'Badge créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $badge = \App\Models\Badge::findOrFail($id);
        return view('admin.badges.edit', compact('badge'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $badge = \App\Models\Badge::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|unique:badges,code,'.$badge->id,
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'condition_type' => 'required|string|max:255',
            'condition_data' => 'nullable|json',
        ]);

        $badge->update($request->all());

        return redirect()->route('badges.index')->with('success', 'Badge mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $badge = \App\Models\Badge::findOrFail($id);
        $badge->delete();

        return redirect()->route('badges.index')->with('success', 'Badge supprimé avec succès.');
    }
}
