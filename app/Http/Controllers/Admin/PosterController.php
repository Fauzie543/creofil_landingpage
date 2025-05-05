<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Poster;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PosterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posters = Poster::latest()->paginate(10);
        return view('admin.posters.index', compact('posters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|max:2048',
            'status' => 'required|boolean',
        ]);

        $data = $request->only('name');

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('poster', 'public');
        }

        Poster::create($data);

        return redirect()->route('admin.posters.index')->with('success', 'Poster created successfully.');
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
    public function edit(Poster $poster)
    {
        return view('admin.posters.edit', compact('poster'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Poster $poster)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|max:2048',
            'status' => 'required|boolean',
        ]);

        $data = $request->only('name');

        if ($request->hasFile('photo')) {
            if ($poster->photo) {
                Storage::disk('public')->delete($poster->photo);
            }
            $data['photo'] = $request->file('photo')->store('poster', 'public');
        }

        $poster->update($data);

        return redirect()->route('admin.posters.index')->with('success', 'Poster updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Poster $poster)
    {
        if ($poster->photo) {
            Storage::disk('public')->delete($poster->photo);
        }

        $poster->delete();

        return redirect()->route('admin.posters.index')->with('success', 'Poster deleted successfully.');
    }
}