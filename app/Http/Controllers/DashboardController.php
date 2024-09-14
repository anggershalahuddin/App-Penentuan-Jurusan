<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Student;
use App\Models\Centroid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung total siswa, siswa laki-laki, dan perempuan
        $totalSiswa = Student::count();
        $totalSiswaLakiLaki = Student::where('kelamin', 'Laki-laki')->count();
        $totalSiswaPerempuan = Student::where('kelamin', 'Perempuan')->count();

        // Menghitung jumlah siswa per cluster/jurusan
        $clusterCounts = Result::join('centroids', 'results.kode_centroid', '=', 'centroids.kode_centroid')
            ->select('centroids.nama_cluster', Result::raw('count(results.student_id) as count'))
            ->groupBy('centroids.nama_cluster')
            ->orderBy('centroids.nama_cluster')
            ->get();

        // Menghitung jumlah siswa per rumpun
        $rumpunCounts = Result::join('centroids', 'results.kode_centroid', '=', 'centroids.kode_centroid')
            ->select('centroids.rumpun', Result::raw('count(results.student_id) as count'))
            ->groupBy('centroids.rumpun')
            ->orderBy('centroids.rumpun')
            ->get();

        // Grafik 1: Data Clustering per-jurusan
        $clusters = Result::select('kode_centroid', Result::raw('count(*) as count'))
            ->groupBy('kode_centroid')
            ->orderBy('kode_centroid')
            ->get();

        $centroids = Centroid::whereIn('kode_centroid', $clusters->pluck('kode_centroid'))->get();

        $clusterNames = $centroids->pluck('nama_cluster', 'kode_centroid')->all();
        $formattedClusterCounts = $clusters->pluck('count', 'kode_centroid')->map(function ($count, $kodeCentroid) use ($clusterNames) {
            return [
                'name' => "{$kodeCentroid} - {$clusterNames[$kodeCentroid]}",
                'value' => $count
            ];
        })->values();

        // Grafik 2: Data Clustering per-rumpun
        $rumpunClusters = Result::select('centroids.rumpun', Result::raw('count(*) as count'))
            ->join('centroids', 'results.kode_centroid', '=', 'centroids.kode_centroid')
            ->groupBy('centroids.rumpun')
            ->orderBy('centroids.rumpun')
            ->get();

        $formattedRumpunData = $rumpunClusters->map(function ($item) {
            return [
                'name' => $item->rumpun,
                'value' => $item->count
            ];
        });

        // Grafik 3: Data Clustering per-tahun
        $results = Result::with('student', 'centroid')->get()->groupBy(function ($result) {
            return $result->student->periode;
        });

        $yearlyData = [];

        foreach ($results as $year => $yearResults) {
            $clusters = $yearResults->groupBy('centroid.kode_centroid')->map(function ($items, $kode_centroid) {
                return [
                    'nama_cluster' => $kode_centroid . ' - ' . $items->first()->centroid->nama_cluster,
                    'count' => $items->count()
                ];
            });

            // Sort clusters by kode_centroid
            $clusters = $clusters->sortKeys();

            $yearlyData[$year] = $clusters;
        }

        // Format data untuk grafik
        $chartData = [
            'years' => array_keys($yearlyData),
            'series' => []
        ];

        foreach ($yearlyData as $year => $clusters) {
            foreach ($clusters as $cluster) {
                $clusterName = $cluster['nama_cluster'];
                if (!isset($chartData['series'][$clusterName])) {
                    $chartData['series'][$clusterName] = [
                        'name' => $clusterName,
                        'data' => array_fill(0, count($chartData['years']), 0) // Initialize with 0 for all years
                    ];
                }
                $chartData['series'][$clusterName]['data'][array_search($year, $chartData['years'])] = $cluster['count'];
            }
        }

        // Sort series by kode_centroid
        $chartData['series'] = collect($chartData['series'])->sortKeys()->values()->all();

        return view('dashboard.index', [
            'totalSiswa' => $totalSiswa,
            'totalSiswaLakiLaki' => $totalSiswaLakiLaki,
            'totalSiswaPerempuan' => $totalSiswaPerempuan,
            'clusterCounts' => $clusterCounts,
            'rumpunCounts' => $rumpunCounts,
            'formattedClusterCounts' => $formattedClusterCounts, // Data untuk grafik per-jurusan
            'formattedRumpunData' => $formattedRumpunData, // Data untuk grafik per-rumpun
            'chartData' => $chartData, // Data untuk grafik per-tahun
        ]);
    }
}
