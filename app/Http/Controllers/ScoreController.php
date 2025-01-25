<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Models\User;
use App\Models\MataPelajaran;
use App\Models\Periode;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function index(Request $request)
    {
        $query = Score::with(['user', 'mataPelajaran', 'periode']);

        // Filter by periode
        if ($request->filled('id_periode')) {
            $query->where('id_periode', $request->id_periode);
        }

        // Filter by mata pelajaran
        if ($request->filled('id_mata_pelajaran')) {
            $query->where('id_mata_pelajaran', $request->id_mata_pelajaran);
        }

        // Get filtered scores
        $scores = $query->paginate(10);

        // Get all periodes and mata pelajaran for the filter dropdowns
        $periodes = Periode::all();
        $mataPelajaran = MataPelajaran::all();

        return view('guru.nilaisiswa', compact('scores', 'periodes', 'mataPelajaran'));
    }

    public function create()
    {
        $siswas = User::where('usertype', 'siswa')->get();
        $mataPelajaran = MataPelajaran::all();
        $periodes = Periode::all();
        return view('guru.nilaisiswa', compact('siswas', 'mataPelajaran'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'mata_pelajaran_id' => 'required|exists:mata_pelajaran,id_mata_pelajaran',
            'periode_id' => 'required|exists:periodes,id_periode',
            'score' => 'required|integer|min:0|max:100',
        ]);

        Score::create($request->all());

        return redirect()->back()->with('success', 'Nilai berhasil disimpan.');
    }

    public function assignStudentToSubject(Request $request)
    {
        // Validate the input
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'id_mata_pelajaran' => 'required|exists:mata_pelajaran,id_mata_pelajaran',
        ]);

        // Find the student and assign them to the selected subject
        $siswa = User::find($request->user_id);
        $mataPelajaran = MataPelajaran::find($request->id_mata_pelajaran);

        // Attach the student to the subject
        $siswa->mataPelajaran()->attach($mataPelajaran);

        return redirect()->back()->with('success', 'Siswa berhasil ditugaskan ke mata pelajaran.');
    }
}
