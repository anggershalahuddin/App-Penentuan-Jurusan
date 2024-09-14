<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Imports\StudentsImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\QueryException;

class DashboardStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('search');
        // dd($query);
        if ($query) {


            $students = Student::where('nama_siswa', 'like', "%{$query}%")
                ->orWhere('nis', 'like', "%{$query}%")
                ->orWhere('nisn', 'like', "%{$query}%")
                ->orderBy('nis', 'asc')
                ->orderBy('periode', 'asc')
                ->paginate(10);
        } else {
            $students = Student::orderBy('nis', 'asc')->paginate(10);
        }

        if ($request->ajax()) {
            return view('dashboard.students.partials.table', compact('students'))->render();
        }

        return view('dashboard.students.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nis' => 'required|numeric|min_digits:10|max_digits:10|unique:students,nis',
            'nisn' => 'required|numeric|min_digits:10|max_digits:10|unique:students,nisn',
            'nama_siswa' => 'required',
            'kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'nama_ayah' => 'nullable',
            'nama_ibu' => 'nullable',
            'alamat' => 'nullable',
            'kelas' => 'required',
            'periode' => 'required|numeric|max_digits:4',
            'n1' => 'required|numeric|max_digits:2',
            'n2' => 'required|numeric|max_digits:2',
            'n3' => 'required|numeric|max_digits:2',
            'n4' => 'required|numeric|max_digits:2',
            'n5' => 'required|numeric|max_digits:2',
            'n6' => 'required|numeric|max_digits:2',
            'n7' => 'required|numeric|max_digits:2',
            'n8' => 'required|numeric|max_digits:2',
            'n9' => 'required|numeric|max_digits:2',
            'n10' => 'required|numeric|max_digits:2',
            'n11' => 'required|numeric|max_digits:2',
            'n12' => 'required|numeric|max_digits:2',
            'n13' => 'required|numeric|max_digits:2',
            'n14' => 'required|numeric|max_digits:2',
            'n15' => 'required|numeric|max_digits:2',
        ]);
        // dd($validatedData);

        Student::create($validatedData);

        return redirect()->route('dashboard.students.index')->with('success', 'Siswa berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        // Untuk mengatur VIEW
        // dd($student);

        return view('dashboard.students.show', [
            'student' => $student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //Untuk menampilkan view
        return view(
            'dashboard.students.edit',
            ['student' => $student]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //untuk proses editnya
        $rules = [
            'nis' => 'required|numeric|min_digits:10|max_digits:10|unique:students,nis,' . $student->id,
            'nisn' => 'required|numeric|min_digits:10|max_digits:10|unique:students,nisn,' . $student->id,
            'nama_siswa' => 'required',
            'kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'nama_ayah' => 'nullable',
            'nama_ibu' => 'nullable',
            'alamat' => 'nullable',
            'kelas' => 'required',
            'periode' => 'required|numeric|max_digits:4',

        ];

        // Jika `nis` atau `nisn` yang baru tidak sama dengan yang ada di database, perbarui validasinya
        if ($request->nis != $student->nis) {
            $rules['nis'] = 'required|numeric|min_digits:10|max_digits:10|unique:students,nis';
        }

        if ($request->nisn != $student->nisn) {
            $rules['nisn'] = 'required|numeric|min_digits:10|max_digits:10|unique:students,nisn';
        }

        $validatedData = $request->validate($rules);

        Student::where('id', $student->id)
            ->update($validatedData);


        return redirect('/dashboard/students')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        Student::destroy($student->id);

        return redirect('/dashboard/students')->with('success', 'Data berhasil dihapus');
    }

    public function import(Request $request)
    {
        // Validasi file yang diupload
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:2048', // Maksimal 2MB
        ]);

        $importer = new StudentsImport();

        try {
            // Proses import data dari file Excel
            Excel::import($importer, $request->file('file'));

            // Cek apakah ada data duplikat
            if (!empty($importer->duplicateEntries)) {
                $duplicates = collect($importer->duplicateEntries)
                    ->map(function ($entry) {
                        return "NIS: {$entry['nis']}, NISN: {$entry['nisn']}, Nama: {$entry['nama_siswa']}";
                    })
                    ->implode('; ');

                return redirect()->route('dashboard.students.index')->with('importError', 'Data tidak diimport karena terdapat duplikasi data');
            }

            return redirect()->route('dashboard.students.index')->with('success', 'Data berhasil diimport!');
        } catch (QueryException $e) {
            return redirect()->route('dashboard.students.index')->with('importError', 'Terjadi kesalahan saat mengimport data.');
        } catch (\Exception $e) {
            return redirect()->route('dashboard.students.index')->with('importError', 'Terjadi kesalahan saat mengimport data.');
        }
    }

    public function downloadTemplate()
    {
        $filePath = public_path('files/template.xlsx');
        return response()->download($filePath);
    }
}
