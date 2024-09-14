<?php

namespace App\Http\Controllers;

use App\Exports\PeriodsExport;
use App\Http\Controllers\Controller;
use App\Imports\PeriodsImport;
use App\Models\Period;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DashboardPeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('search');

        if ($query) {
            $periods = Period::where('tahun', 'like', "%{$query}%")
                ->orWhere('keterangan', 'like', "%{$query}%")
                ->orderBy('tahun', 'asc')
                ->paginate(3);
        } else {
            $periods = Period::orderBy('tahun', 'asc')->paginate(5);
        }

        if ($request->ajax()) {
            return view('dashboard.periods.partials.table', compact('periods'))->render();
        }

        return view('dashboard.periods.index', ['periods' => $periods]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.periods.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tahun' => 'required|numeric|max_digits:4|unique:period,tahun',
            'keterangan' => 'required|max:12'
        ]);
        // dd($validatedData);
        Period::create($validatedData);

        // return redirect('/dashboard/periods')->with('success', 'Data tahun pelajaran sudah ditambahkan!');
        return redirect()->route('dashboard.periods.index')->with('success', 'Data berhasil diinput!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Period $period)
    {
        // Untuk mengatur VIEW
        return view('dashboard.periods.show', [
            'period' => $period
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Period $period)
    {
        //Untuk menampilkan view
        return view(
            'dashboard.periods.edit',
            ['period' => $period]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Period $period)
    {
        //untuk proses editnya
        $rules = [
            'keterangan' => 'required|max:12'
        ];

        if ($request->tahun != $period->tahun) {
            $rules['tahun'] = 'required|numeric|unique:period,tahun';
        }

        $validatedData = $request->validate($rules);

        Period::where('id', $period->id)
            ->update($validatedData);


        return redirect('/dashboard/periods')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Period $period)
    {
        Period::destroy($period->id);

        return redirect('/dashboard/periods')->with('success', 'Data berhasil dihapus');
    }

    public function import(Request $request)
    {
        // Validasi file yang diupload
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:2048', // Maksimal 2MB
        ]);
        $importer = new PeriodsImport();

        try {
            // Proses import data dari file Excel
            Excel::import($importer, $request->file('file'));

            // Cek apakah ada data duplikat
            if (!empty($importer->duplicateEntries)) {
                $duplicates = implode(', ', $importer->duplicateEntries);
                return redirect()->route('dashboard.periods.index')->with('importError', 'Data berhasil diimport, tetapi ada duplikasi pada data: ' . $duplicates);
            }

            return redirect()->route('dashboard.periods.index')->with('success', 'Data berhasil diimport!');
        } catch (QueryException $e) {
            return redirect()->route('dashboard.periods.index')->with('importError', 'Terjadi kesalahan saat mengimport data.');
        } catch (\Exception $e) {
            return redirect()->route('dashboard.periods.index')->with('importError', 'Terjadi kesalahan saat mengimport data.');
        }
    }

    // public function export()
    // {
    //     return Excel::download(new PeriodsExport, 'periods.xlsx');
    // }
}
