<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brochure;
use Illuminate\Support\Facades\Storage;

class BrosurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brochures = Brochure::all();
        return view('admin.config.brosur.index', compact('brochures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.config.brosur.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'required|mimes:pdf', // Hanya menerima file PDF dengan ukuran maksimal 2MB
        ]);
    
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName(); // Menggunakan nama asli file
            $filePath = 'admin/data_brosur/' . $fileName;
    
            // Simpan file ke dalam direktori yang ditentukan
            $file->move(public_path('admin/data_brosur'), $fileName);
    
            // Simpan data ke database
            Brochure::create([
                'name' => $request->name,
                'url_file' => '/' . $filePath, // Simpan URL dengan format yang diminta
            ]);
    
            return redirect()->route('daftar.brosur.index')->with('success', 'Brosur berhasil ditambahkan.');
        }
    
        return redirect()->back()->with('error', 'Gagal mengupload brosur.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brochure $brosur)
    {
        return view('admin.brochures.show', compact('brosur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $brosur = Brochure::findOrFail($id);
        return view('admin.config.brosur.edit', compact('brosur'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $brosur = Brochure::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'file' => 'nullable|mimes:pdf|max:2048', // File opsional, hanya jika user ingin mengganti
    ]);

    $brosur->name = $request->name;

    // Jika user mengupload file baru
    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $filePath = 'admin/data_brosur/' . $fileName;

        // Hapus file lama jika ada
        if (file_exists(public_path($brosur->url_file))) {
            unlink(public_path($brosur->url_file));
        }

        // Simpan file baru
        $file->move(public_path('admin/data_brosur'), $fileName);
        $brosur->url_file = '/' . $filePath;
    }

    $brosur->save();

    return redirect()->route('daftar.brosur.index')->with('success', 'Brosur berhasil diperbarui.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $brosur = Brochure::findOrFail($id);

        // Hapus file brosur dari folder jika ada
        if (file_exists(public_path($brosur->url_file))) {
            unlink(public_path($brosur->url_file));
        }
    
        // Hapus data dari database
        $brosur->delete();
    
        return redirect()->route('daftar.brosur.index')->with('success', 'Brosur berhasil dihapus.');
    }
}
