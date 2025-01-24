<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use App\Models\Periode;
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
    public function indexdatajadwalmapel(Request $request)
    {
//        $periodes = Periode::all(); // Ambil semua data periode
//        $mapels = MataPelajaran::all(); // Ambil semua data mata pelajaran

        // Jika ada permintaan 'periode' dari request, filter berdasarkan itu
        if ($request->has('periode')) {
            $mapels = MataPelajaran::where('id_periode', $request->input('periode'))->get();
        }

        return view('wakasek.datajadwalmapel', [
            'mapels' => MataPelajaran::all(),
            'periodes' => Periode::all(), // Ambil semua data dari tabel periode
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
            'nama_mata_pelajaran' => 'required|string|max:255',
            'pengajar' => 'required|string|max:255',
            'jam' => 'required|string|max:100|unique:mata_pelajaran,jam',
            'kelas' => 'required|string|max:255',
        ]);

        $mapel = strtoupper(substr($request->nama_mata_pelajaran, 0, 3));
        $kelas = $request->kelas;
        $dataToInsert = [];

        if ($kelas === '10') {
            $idMapels = ["{$mapel}01", "{$mapel}02"];
            $idPeriodes = ['10 Ganjil 2022/2023', '10 Genap 2022/2023'];
        } elseif ($kelas === '11') {
            $idMapels = ["{$mapel}03", "{$mapel}04"];
            $idPeriodes = ['11 Ganjil 2023/2024', '11 Genap 2023/2024'];
        } elseif ($kelas === '12') {
            $idMapels = ["{$mapel}05"];
            $idPeriodes = ['12 Ganjil 2024/2025'];
        }

        foreach ($idMapels as $index => $idMapel) {
            $dataToInsert[] = [
                'id_mata_pelajaran' => $idMapel,
                'nama_mata_pelajaran' => $request->nama_mata_pelajaran,
                'pengajar' => $request->pengajar,
                'kelas' => $kelas,
                'jam' => $request->jam,
                'id_periode' => $idPeriodes[$index],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        MataPelajaran::insert($dataToInsert);

        return redirect()->route('data-jadwalmapel')->with('success', 'Data Mata Pelajaran berhasil ditambahkan!');
    }

    public function checkMapel(Request $request)
    {
        $exists = MataPelajaran::where('nama_mata_pelajaran', $request->name)->exists();
        return response()->json(['exists' => $exists]);
    }

    public function checkJam(Request $request)
    {
        $jam = $request->query('jam');

        // Periksa apakah jam sudah ada di database
        $exists = MataPelajaran::where('jam', $jam)->exists();

        return response()->json(['exists' => $exists]);
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

        return redirect()->route('data-periode');
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
