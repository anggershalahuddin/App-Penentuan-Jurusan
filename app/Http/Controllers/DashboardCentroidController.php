<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Centroid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardCentroidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('search');

        if ($query) {
            $centroids = Centroid::where('kode_centroid', 'like', "%{$query}%")
                ->orWhere('nama_cluster', 'like', "%{$query}%")
                ->orWhere('rumpun', 'like', "%{$query}%")
                ->orderBy('kode_centroid', 'asc')
                ->paginate(10);
        } else {
            $centroids = Centroid::orderBy('kode_centroid', 'asc')->paginate(10);
        }

        if ($request->ajax()) {
            return view('dashboard.centroids.partials.table', compact('centroids'))->render();
        }

        return view('dashboard.centroids.index', ['centroids' => $centroids]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil kode centroid yang sudah ada di database
        $usedCentroids = Centroid::pluck('kode_centroid')->toArray();

        // Ambil student_id yang sudah ada di tabel centroid
        $usedStudentIds = Centroid::pluck('student_id')->toArray();

        // Ambil data semua siswa yang belum digunakan sebagai centroid
        $students = Student::select('id', 'nama_siswa')
            ->whereNotIn('id', $usedStudentIds)
            ->distinct()
            ->get();

        // Mengirimkan data students dan usedCentroids ke view
        return view('dashboard.centroids.create', compact('students', 'usedCentroids'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_centroid' => 'required|string|uppercase|unique:centroids,kode_centroid',
            'nama_cluster' => 'required|string|max:255',
            'rumpun' => 'required|string|max:255',
            'student_id' => 'required|exists:students,id',
        ]);

        Centroid::create($validatedData);

        return redirect()->route('dashboard.centroids.index')->with('success', 'Centroid berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Centroid $centroid)
    {
        return view('dashboard.centroids.show', [
            'centroid' => $centroid
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Centroid $centroid)
    {
        // Ambil data student_id yang sudah digunakan oleh cluster lain, kecuali cluster saat ini
        $usedStudentIds = Centroid::where('centroid_id', '!=', $centroid->centroid_id)
            ->pluck('student_id');

        // Ambil data students yang tidak digunakan oleh cluster lain, dan termasuk student_id yang sedang dipilih
        $students = Student::select('id', 'nama_siswa')
            ->whereNotIn('id', $usedStudentIds)
            ->orWhere('id', $centroid->student_id) // Pastikan student_id yang dipilih tetap ditampilkan
            ->distinct()
            ->get();

        // Ambil kode_centroid yang sudah dipilih di luar data yang sedang diedit
        $allKodeCentroids = ['C1', 'C2', 'C3', 'C4', 'C5', 'C6', 'C7', 'C8', 'C9', 'C10'];
        $usedKodeCentroids = Centroid::where('centroid_id', '!=', $centroid->centroid_id)
            ->pluck('kode_centroid')
            ->toArray();

        // Ambil kode_centroid yang tidak dipilih
        $availableKodeCentroids = array_diff($allKodeCentroids, $usedKodeCentroids);

        return view('dashboard.centroids.edit', [
            'students' => $students,
            'kodeCentroids' => $availableKodeCentroids,
            'centroid' => $centroid
        ]);
    }





    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Centroid $centroid)
    {
        $rules = [
            'kode_centroid' => 'required|string|uppercase|max:2',
            'nama_cluster' => 'required|string|max:255',
            'rumpun' => 'required|string|max:255',
            'student_id' => 'required|exists:students,id',
        ];

        $validatedData = $request->validate($rules);

        // Update data centroid
        $centroid->update($validatedData);

        return redirect('/dashboard/centroids')->with('success', 'Data berhasil diupdate!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Centroid $centroid)
    {
        Centroid::destroy($centroid->centroid_id);

        return redirect('/dashboard/centroids')->with('success', 'Data berhasil dihapus');
    }
}
