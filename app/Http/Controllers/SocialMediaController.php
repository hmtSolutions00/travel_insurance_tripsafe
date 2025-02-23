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
        return view('admin.config.social_media.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->link);
        $request->validate([
            'name'  => 'required|string|max:255',
            'link_sosmed'  => 'required',
            'icon'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

      
            $arrName = [];
            $tambahsocialmedia = new SocialMedia();
            $tambahsocialmedia->name = $request->name;
            $tambahsocialmedia->link=$request->link_sosmed; 
            $tambahsocialmedia->icon=$request->icon;
            $tambahsocialmedia->status=$request->status;

            if ($request->file('icon')) {
                if ($request->hasfile('icon')) {
                    $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('icon')->getClientOriginalName());
                    $request->file('icon')->move(public_path('admin/social_media_icons'), $filename);
                    $tambahsocialmedia->icon = $filename;
                }
                                }
                    if (!$tambahsocialmedia->save()) {
                                if (count($arrName) > 1) {
                                    foreach ($arrName as $path) {
                                        unlink(public_path() . $path);
                                    }
                        }
                    }

        return redirect()->route('social.media.index')->with('success', 'Social Media berhasil ditambahkan!');
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
        return view('admin.config.social_media.edit', compact('socialMedia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $socialMedia = SocialMedia::findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:255',
            'link'  => 'required',
            'icon'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        if ($request->file('icon')) {
            if ($request->hasfile('icon')) {
                $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('icon')->getClientOriginalName());
                $request->file('icon')->move(public_path('admin/social_media_icons'), $filename);
                $socialMedia->update(['icon' => $filename]);
            }
                            }

        $socialMedia->update([
            'name'   => $request->name,
            'link'   => $request->link,
            'status' => $request->status,
        ]);

        return redirect()->route('social.media.index')->with('success', 'Social Media berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $socialMedia = SocialMedia::findOrFail($id);

    // Hapus file icon jika ada
    if ($socialMedia->icon) {
        $filePath = public_path('admin/social_media_icons/' . $socialMedia->icon);

        // Cek apakah file benar-benar ada sebelum menghapusnya
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }

    // Hapus data dari database
    $socialMedia->delete();

    return redirect()->route('social.media.index')->with('success', 'Social Media berhasil dihapus!');
        
}
}
