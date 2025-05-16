<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LandingContent;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class LandingContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $landingContent = LandingContent::latest()->get();
        return view('admin.landing.index', compact('landingContent'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.landing.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('landing', 'public');
        }

        LandingContent::create($data);

        return redirect()->route('admin.landing.index')->with('success', 'Konten berhasil ditambahkan.');
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
         $landingContent = LandingContent::findOrFail($id);
        return view('admin.landing.edit', compact('landingContent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $landingContent = LandingContent::findOrFail($id);

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($landingContent->image && Storage::disk('public')->exists($landingContent->image)) {
                Storage::disk('public')->delete($landingContent->image);
            }

            $data['image'] = $request->file('image')->store('landing', 'public');
        }

        $landingContent->update($data);

        return redirect()->route('admin.landing.index')->with('success', 'Konten berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $landingContent = LandingContent::findOrFail($id);

        if ($landingContent->image && Storage::disk('public')->exists($landingContent->image)) {
            Storage::disk('public')->delete($landingContent->image);
        }

        $landingContent->delete();

        return redirect()->route('admin.landing.index')->with('success', 'Konten berhasil dihapus.');
    }
}