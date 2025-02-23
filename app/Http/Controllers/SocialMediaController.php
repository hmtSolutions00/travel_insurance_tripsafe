<?php

namespace App\Http\Controllers;

use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socialMedias = SocialMedia::latest()->paginate(10);
        return view('admin.config.social_media.index', compact('socialMedias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.social_media.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'link'  => 'required|url',
            'icon'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        $iconPath = null;
        if ($request->hasFile('icon')) {
            $iconPath = $request->file('icon')->store('social_media_icons', 'public');
        }

        SocialMedia::create([
            'name'   => $request->name,
            'link'   => $request->link,
            'icon'   => $iconPath,
            'status' => $request->status,
        ]);

        return redirect()->route('social-media.index')->with('success', 'Social Media berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $socialMedia = SocialMedia::findOrFail($id);
        return view('admin.social_media.show', compact('socialMedia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $socialMedia = SocialMedia::findOrFail($id);
        return view('admin.social_media.edit', compact('socialMedia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $socialMedia = SocialMedia::findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:255',
            'link'  => 'required|url',
            'icon'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        $iconPath = $socialMedia->icon;
        if ($request->hasFile('icon')) {
            $iconPath = $request->file('icon')->store('social_media_icons', 'public');
        }

        $socialMedia->update([
            'name'   => $request->name,
            'link'   => $request->link,
            'icon'   => $iconPath,
            'status' => $request->status,
        ]);

        return redirect()->route('social-media.index')->with('success', 'Social Media berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $socialMedia = SocialMedia::findOrFail($id);
        if ($socialMedia->icon) {
            \Storage::delete('public/' , $socialMedia->icon);
        }
        $socialMedia->delete();

        return redirect()->route('social-media.index')->with('success', 'Social Media berhasil dihapus!');
    }
}
