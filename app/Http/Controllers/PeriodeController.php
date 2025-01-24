<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('wakasek.periode', [
            'periodes' => Periode::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function show(Periode $periode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function edit($id_periode)
    {
        $periode = Periode::findOrFail($id_periode);  // Ambil data mata pelajaran berdasarkan ID
        return view('wakasek.editperiode', compact('periode'));  // Kirim data ke view
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_periode)
    {
        $request->validate([
            'id_periode' => 'required|string|max:255',
            'tahun_akademik' => 'required|string|max:255',
            'semester' => 'required|string|max:255',
        ]);

        $periode = Periode::findOrFail($id_periode);
        $periode->update([
            'id_periode' => $request->id_periode,
            'tahun_akademik' => $request->tahun_akademik,
            'semester' => $request->semester,
        ]);

        return redirect()->route('data-mapel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Periode $periode)
    {
        //
    }
}
