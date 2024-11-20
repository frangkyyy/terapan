<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class MataPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('wakasek.index', [
            'mapels' => MataPelajaran::all(),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexdatamapel()
    {
        return view('wakasek.datamapel', [
            'mapels' => MataPelajaran::all(),
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexdatajadwalmapel()
    {
        return view('wakasek.datajadwalmapel', [
            'mapels' => MataPelajaran::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indextambahdatamapel()
    {
        return view('wakasek.tambahmapel', [
            'mapels' => MataPelajaran::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_mata_pelajaran' => 'required|string|max:255|unique:mata_pelajaran,id_mata_pelajaran',
            'nama_mata_pelajaran' => 'required|string|max:255',
            'pengajar' => 'required|string|max:255',
            'jam' => 'required|string|max:100',
            'kelas' => 'required|string|max:255',
        ]);

        MataPelajaran::create([
            'id_mata_pelajaran' => $request->id_mata_pelajaran,
            'nama_mata_pelajaran' => $request->nama_mata_pelajaran,
            'pengajar' => $request->pengajar,
            'kelas' => $request->kelas,
            'jam' => $request->jam,
            'id_periode' => 'GNP2425', // Menambahkan id_periode secara otomatis
        ]);

        return redirect()->route('data-mapel')->with('success', 'Data Mata Pelajaran berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MataPelajaran  $mataPelajaran
     * @return \Illuminate\Http\Response
     */
    public function show(MataPelajaran $mataPelajaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MataPelajaran  $mataPelajaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id_mata_pelajaran)
    {
        $mapel = MataPelajaran::findOrFail($id_mata_pelajaran);  // Ambil data mata pelajaran berdasarkan ID
        return view('wakasek.editmapel', compact('mapel'));  // Kirim data ke view
    }

    public function editjadwalmapel($id_mata_pelajaran)
    {
        $mapel = MataPelajaran::findOrFail($id_mata_pelajaran);  // Ambil data mata pelajaran berdasarkan ID
        return view('wakasek.editjadwalmapel', compact('mapel'));  // Kirim data ke view
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MataPelajaran  $mataPelajaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_mata_pelajaran)
    {
        $request->validate([
            'pengajar' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
        ]);

        $mapel = MataPelajaran::findOrFail($id_mata_pelajaran);
        $mapel->update([
            'pengajar' => $request->pengajar,
            'kelas' => $request->kelas,
        ]);

        return redirect()->route('data-mapel');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MataPelajaran  $mataPelajaran
     * @return \Illuminate\Http\Response
     */
    public function updatejadwalmapel(Request $request, $id_mata_pelajaran)
    {
        $request->validate([
            'jam' => 'required|string|max:255',
        ]);

        $mapel = MataPelajaran::findOrFail($id_mata_pelajaran);
        $mapel->update([
            'jam' => $request->jam,
        ]);

        return redirect()->route('data-jadwalmapel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MataPelajaran  $mataPelajaran
     * @return \Illuminate\Http\Response
     */
    public function hapusdatamapel($id_mata_pelajaran)
    {
        $mapel = MataPelajaran::findOrFail($id_mata_pelajaran);
        $mapel->delete();

        return redirect()->route('list-mapel')->with('success', 'Pengajuan Beasiswa deleted successfully.');
    }
}
