<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;


class DashboardValueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $query = $request->input('search');

        if ($query) {
            $students = Student::where('nama_siswa', 'like', "%{$query}%")
                ->orWhere('nis', 'like', "%{$query}%")
                ->orderBy('periode', 'asc')
                ->paginate(10);
        } else {
            $students = Student::orderBy('nis', 'asc')->paginate(10);
        }

        if ($request->ajax()) {
            return view('dashboard.values.partials.table', compact('students'))->render();
        }

        return view('dashboard.values.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        // dd($student);
        // Data sudah tersedia di $students
        return view('dashboard.values.show', ['student' => $student]);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //Untuk menampilkan view
        return view(
            'dashboard.values.edit',
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
        ];

        $validatedData = $request->validate($rules);

        Student::where('id', $student->id)
            ->update($validatedData);


        return redirect('/dashboard/values')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
