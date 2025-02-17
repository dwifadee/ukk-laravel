<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masakan;

class MasakanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $masakans = Masakan::all();

        return view('pages.masakan.tables', ['masakans' => $masakans]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.masakan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_masakan' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'status_masakan' => 'required|in:tersedia,habis',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        // Proses upload gambar
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/images', $filename); // Simpan di folder public/images
            $validated['gambar'] = $filename; // Simpan nama file ke array validasi
        }

        // Simpan data ke database
        Masakan::create($validated);

        // Redirect dengan pesan sukses
        return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan!');
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
        $masakans = Masakan::find($id);
        return view('pages.masakan.update', ['masakan' => $masakans]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_masakan' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'status_masakan' => 'required|in:tersedia,habis',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Gambar opsional
        ]);

        // Cari data masakan berdasarkan ID
        $masakan = Masakan::findOrFail($id);

        // Proses upload gambar baru jika ada
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($masakan->gambar && file_exists(storage_path('app/public/images/' . $masakan->gambar))) {
                unlink(storage_path('app/public/images/' . $masakan->gambar));
            }

            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/images', $filename); // Simpan di folder public/images
            $validated['gambar'] = $filename; // Simpan nama file ke array validasi
        }

        $masakan->update($validated);

        return redirect()->route('menu.index')->with('success', 'Menu berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $masakan = Masakan::findOrFail($id);

        if ($masakan->gambar && file_exists(storage_path('app/public/images/' . $masakan->gambar))) {
            unlink(storage_path('app/public/images/' . $masakan->gambar));
        }

        $masakan->delete();

        return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus!');
    }

}
