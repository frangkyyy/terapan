<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataNilaiSiswa;

class DataNilaiSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dtDataNilaiSiswa = DataNilaiSiswa::all();
        return view('DataNilaiSiswa', compact('dtDataNilaiSiswa'));
    }

    public function cetakDataNilaiSiswa()
    {
        $dtCetakDataNilaiSiswa = DataNilaiSiswa::get();
        return view('Cetak-DataNilaiSiswa', compact('dtCetakDataNilaiSiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Create-DataNilaiSiswa');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:50',
            'kelas' => 'required|string|max:100',
            'nilai' => 'required|integer|min:0|max:100', // Nilai harus berada antara 0 hingga 100
        ], [
            'nilai.min' => 'Nilai tidak boleh kurang dari 0.',
            'nilai.max' => 'Nilai tidak boleh lebih dari 100.',
            'nama.max' => 'Nama tidak boleh lebih dari 50 karakter.',
        ]);

        // Simpan data ke database
        DataNilaiSiswa::create([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'nilai' => $request->nilai,
        ]);

        return redirect()->route('datanilaisiswa')->with('success', 'Data berhasil ditambahkan.');
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
        $dat = DataNilaiSiswa::findOrFail($id);
        return view('Edit-DataNilaiSiswa', compact('dat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:50',
            'kelas' => 'required|string|max:100',
            'nilai' => 'required|integer|min:0|max:100', // Nilai harus berada antara 0 hingga 100
        ], [
            'nilai.min' => 'Nilai tidak boleh kurang dari 0.',
            'nilai.max' => 'Nilai tidak boleh lebih dari 100.',
        ]);

        // Update data di database
        $dat = DataNilaiSiswa::findOrFail($id);
        $dat->update([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'nilai' => $request->nilai,
        ]);

        return redirect()->route('datanilaisiswa')->with('success', 'Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dat = DataNilaiSiswa::findOrFail($id);
        $dat->delete();
        return back()->with('success', 'Data berhasil dihapus.');
    }
}
