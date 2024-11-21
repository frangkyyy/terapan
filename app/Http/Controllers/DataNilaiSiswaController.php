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
     @param \Illuminate\Http\Request
     @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //dd($request->all());
        DataNilaiSiswa::create([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'nilai' => $request->nilai,
        ]);

        return redirect()->route('datanilaisiswa');

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
        $dat = DataNilaiSiswa::findorfail($id);
        return view('Edit-DataNilaiSiswa',compact('dat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dat = DataNilaiSiswa::findorfail($id);
        $dat->update($request->all());
        return redirect('DataNilaiSiswa')->with('toast_success','Data Berhasil Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dat = DataNilaiSiswa::findorfail($id);
        $dat->delete();
        return back();
    }
}
