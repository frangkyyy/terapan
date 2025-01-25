<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\MataPelajaran;
use App\Models\Periode;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssignmentController extends Controller
{
    public function index(Request $request)
    {
        // Filter berdasarkan periode dan mata pelajaran
        $periodeId = $request->input('periode_id');
        $mataPelajaranId = $request->input('mata_pelajaran_id');

        // Ambil data assignment
        $assignments = DB::table('mata_pelajaran_siswa')
            ->join('users', 'mata_pelajaran_siswa.user_id', '=', 'users.id')
            ->join('mata_pelajaran', 'mata_pelajaran_siswa.id_mata_pelajaran', '=', 'mata_pelajaran.id_mata_pelajaran')
            ->join('periode', 'mata_pelajaran_siswa.periode_id', '=', 'periode.id_periode')
            ->when($periodeId, function ($query) use ($periodeId) {
                $query->where('mata_pelajaran_siswa.periode_id', $periodeId);
            })
            ->when($mataPelajaranId, function ($query) use ($mataPelajaranId) {
                $query->where('mata_pelajaran_siswa.id_mata_pelajaran', $mataPelajaranId);
            })
            ->select('users.name as student_name', 'mata_pelajaran.nama_mata_pelajaran', 'periode.id_periode')
            ->get();

        // Pass data periode dan mata pelajaran untuk filter
        $periodes = Periode::all();
        $mataPelajaran = MataPelajaran::all();

        return view('guru.assignments', compact('assignments', 'periodes', 'mataPelajaran'));
    }

    public function create()
    {
        $students = User::whereHas('roles', function ($query) {
            $query->where('name', 'siswa'); // Assuming 'name' is the column for role
        })->get();
        $subjects = MataPelajaran::all(); // Get all subjects
        return view('guru.assignsiswa', compact('students', 'subjects')); // Pass to view
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'mata_pelajaran_id' => 'required|exists:mata_pelajaran,id_mata_pelajaran', 
            'periode_id' => 'required|exists:periode,id_periode',
        ]);

        // Retrieve the student and subject from the request
        $student = User::find($request->user_id);
        $subject = MataPelajaran::find($request->mata_pelajaran_id);
        $periode = Periode::find($request->periode_id); 

        // Attach the student to the subject
        $student->mataPelajaran()->attach($subject->id_mata_pelajaran, ['periode_id' => $periode->id_periode]);

        // Redirect with a success message
        return redirect()->route('guru.assignStudentToSubjectForm')->with('success', 'Student successfully assigned to subject!');
    }
}
