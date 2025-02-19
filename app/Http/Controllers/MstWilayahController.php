<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use Illuminate\Http\Request;

class MstWilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wilayahs= Wilayah::orderBy('name','asc')->paginate(10);
        return view('admin.pages.mst_wilayah.index', compact('wilayahs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.mst_wilayah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
                // Validasi input
            $request->validate([
                'name' => 'required|string|max:255',
                'include' => 'nullable|string',
                'exclude' => 'nullable|string',
                'status' => 'required|in:Active,Non Active',
            ]);

            // Simpan ke database
            Wilayah::create([
                'name' => $request->name,
                'include' => $request->include,
                'exclude' => $request->exclude,
                'status' => strtolower($request->status), // Simpan dalam huruf kecil untuk konsistensi
            ]);
            // Redirect dengan pesan sukses
            return redirect()->route('admin.master.wilayah.index')->with('success', 'Data Wilayah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
            // Ambil data berdasarkan ID
            $wilayah = Wilayah::findOrFail($id);
            // Kirim ke tampilan detail
            return view('admin.pages.mst_wilayah.detail', compact('wilayah'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
                // Ambil data berdasarkan ID
            $wilayah = Wilayah::findOrFail($id);

            // Kirim ke view edit
            return view('admin.pages.mst_wilayah.edit', compact('wilayah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
                // Validasi input
            $request->validate([
                'name' => 'required|string|max:255',
                'include' => 'nullable|string',
                'exclude' => 'nullable|string',
                'status' => 'required|in:Active,Non Active',
            ]);

            // Ambil data wilayah berdasarkan ID
            $wilayah = Wilayah::findOrFail($id);

            // Update data
            $wilayah->update([
                'name' => $request->name,
                'include' => $request->include,
                'exclude' => $request->exclude,
                'status' => strtolower($request->status),
            ]);

            // Redirect dengan pesan sukses
            return redirect()->route('admin.master.wilayah.index')->with('success', 'Data Wilayah berhasil diperbarui.');
            }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $wilayah = Wilayah::findOrFail($id);
        $wilayah->delete();

        return redirect()->route('admin.master.wilayah.index')->with('success', 'Data Master Wilayah berhasil dihapus.');
    }
}
