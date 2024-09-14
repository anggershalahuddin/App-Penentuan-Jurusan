<?php

namespace App\Http\Controllers;

use App\Models\Centroid;
use App\Models\Result;
use Illuminate\Http\Request;

class DashboardChartController extends Controller
{
    /**
     * Display the page with all charts.
     */
    public function index()
    {
        // Grafik 1: Data Clustering per-jurusan
        $clusters = Result::select('kode_centroid', Result::raw('count(*) as count'))
            ->groupBy('kode_centroid')
            ->orderBy('kode_centroid')
            ->get();

        $centroids = Centroid::whereIn('kode_centroid', $clusters->pluck('kode_centroid'))->get();

        $clusterNames = $centroids->pluck('nama_cluster', 'kode_centroid')->all();
        $clusterCounts = $clusters->pluck('count', 'kode_centroid')->map(function ($count, $kodeCentroid) use ($clusterNames) {
            return [
                'name' => "{$kodeCentroid} - {$clusterNames[$kodeCentroid]}",
                'value' => $count
            ];
        })->values();

        // Grafik 2: Data Clustering per-rumpun
        $rumpunClusters = Result::select('centroids.rumpun', Result::raw('count(*) as count'))
            ->join('centroids', 'results.kode_centroid', '=', 'centroids.kode_centroid')
            ->groupBy('centroids.rumpun') // Kelompokkan hanya berdasarkan rumpun
            ->orderBy('centroids.rumpun')
            ->get();

        $rumpunData = $rumpunClusters->map(function ($item) {
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
                    'nama_cluster' => $kode_centroid . ' - ' . $items->first()->centroid->nama_cluster, // Gabungkan kode_cluster dan nama_cluster
                    'count' => $items->count()
                ];
            });

            // Sort clusters by kode_centroid (assuming C1, C2, etc.)
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
                $clusterName = $cluster['nama_cluster']; // Gabungkan kode_cluster dan nama_cluster
                if (!isset($chartData['series'][$clusterName])) {
                    $chartData['series'][$clusterName] = [
                        'name' => $clusterName,
                        'data' => array_fill(0, count($chartData['years']), 0) // Initialize with 0 for all years
                    ];
                }
                $chartData['series'][$clusterName]['data'][array_search($year, $chartData['years'])] = $cluster['count'];
            }
        }

        // Sort series by kode_centroid (to ensure correct order)
        $chartData['series'] = collect($chartData['series'])->sortKeys()->values()->all();
        // dd($chartData);
        return view('dashboard.charts.index', [
            'clusterCounts' => $clusterCounts,
            'rumpunData' => $rumpunData,
            'chartData' => $chartData
        ]);
    }
}