<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Centroid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InformationController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');

        if ($query) {
            $students = Student::where('nama_siswa', 'like', "%{$query}%")
                ->orWhere('nis', 'like', "%{$query}%")
                ->orWhere('nisn', 'like', "%{$query}%")
                ->orderBy('periode', 'asc')
                ->get();
        } else {
            $students = Student::orderBy('periode', 'asc')->get();
        }

        if ($request->ajax()) {
            return view('homepages.partials.table-informasi', compact('students'))->render();
        }

        // $students = Student::all();
        $centroids = Centroid::with('student')->get();
        $iterationData = [];
        $isConverged = false;
        $iterationCount = 0;
        $previousAssignments = [];

        while (!$isConverged) {
            $iterationCount++;
            $newCentroids = [];
            $clusterAssignments = [];
            $isConverged = true;

            foreach ($students as $student) {
                $minDistance = null;
                $closestCluster = null;

                foreach ($centroids as $centroid) {
                    $distance = sqrt(
                        pow($student->n1 - $centroid->student->n1, 2) +
                            pow($student->n2 - $centroid->student->n2, 2) +
                            pow($student->n3 - $centroid->student->n3, 2) +
                            pow($student->n4 - $centroid->student->n4, 2) +
                            pow($student->n5 - $centroid->student->n5, 2) +
                            pow($student->n6 - $centroid->student->n6, 2) +
                            pow($student->n7 - $centroid->student->n7, 2) +
                            pow($student->n8 - $centroid->student->n8, 2) +
                            pow($student->n9 - $centroid->student->n9, 2) +
                            pow($student->n10 - $centroid->student->n10, 2) +
                            pow($student->n11 - $centroid->student->n11, 2) +
                            pow($student->n12 - $centroid->student->n12, 2) +
                            pow($student->n13 - $centroid->student->n13, 2) +
                            pow($student->n14 - $centroid->student->n14, 2) +
                            pow($student->n15 - $centroid->student->n15, 2),
                    );

                    if (is_null($minDistance) || $distance < $minDistance) {
                        $minDistance = $distance;
                        $closestCluster = $centroid->kode_centroid;
                    }
                }

                $clusterAssignments[$student->id] = $closestCluster;
            }

            // Update centroid baru berdasarkan assignments
            foreach ($centroids as $centroid) {
                $assignedStudents = $students->filter(function ($student) use ($clusterAssignments, $centroid) {
                    return $clusterAssignments[$student->id] == $centroid->kode_centroid;
                });

                if ($assignedStudents->count() > 0) {
                    $newCentroid = [];
                    for ($i = 1; $i <= 15; $i++) {
                        $newCentroid["n$i"] = round($assignedStudents->avg("n$i"), 0);
                    }
                    $newCentroids[$centroid->kode_centroid] = $newCentroid;
                } else {
                    $newCentroids[$centroid->kode_centroid] = $centroid->toArray();
                }
            }

            $iterationData = [
                'iteration' => $iterationCount,
                'centroids' => $newCentroids,
                'assignments' => $clusterAssignments,
            ];

            foreach ($students as $student) {
                if ($clusterAssignments[$student->id] !== ($previousAssignments[$student->id] ?? null)) {
                    $isConverged = false;
                    break;
                }
            }

            $previousAssignments = $clusterAssignments;

            if ($iterationCount >= 100) {
                break;
            }

            // Perbarui centroid dengan centroid baru yang sudah dihitung
            $centroids = collect($newCentroids)->map(function ($centroid, $kode) use ($centroids) {
                $originalCentroid = $centroids->firstWhere('kode_centroid', $kode);
                return (object) [
                    'kode_centroid' => $kode,
                    'nama_cluster' => $originalCentroid->nama_cluster,
                    'rumpun' => $originalCentroid->rumpun,
                    'student' => (object) $centroid,
                ];
            });
        }

        $numberOfClusters = $centroids->count();

        return view('homepages.information', ['students' => $students], compact('iterationData', 'students', 'centroids', 'numberOfClusters'));
    }
}
