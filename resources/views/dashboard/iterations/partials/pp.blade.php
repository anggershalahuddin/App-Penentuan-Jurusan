<div class="container mx-auto p-4">
    <!-- Tabel Centroids -->
    <div class="mb-6">
        <h2 class="text-md font-semibold mb-3 pb-2 border-b border-gray-600">Centroid Awal</h2>
        <table class="w-full text-sm text-left text-gray-800">
            <thead class="text-xs text-gray-800 uppercase bg-gray-300">
                <tr>
                    <th class="px-3 py-2 text-nowrap">Kode Centroid</th>
                    <th class="px-3 py-2">Nama Cluster</th>
                    <th class="px-3 py-2">Rumpun</th>
                    <th class="px-3 py-2">N1</th>
                    <th class="px-3 py-2">N2</th>
                    <th class="px-3 py-2">N3</th>
                    <th class="px-3 py-2">N4</th>
                    <th class="px-3 py-2">N5</th>
                    <th class="px-3 py-2">N6</th>
                    <th class="px-3 py-2">N7</th>
                    <th class="px-3 py-2">N8</th>
                    <th class="px-3 py-2">N9</th>
                    <th class="px-3 py-2">N10</th>
                    <th class="px-3 py-2">N11</th>
                    <th class="px-3 py-2">N12</th>
                    <th class="px-3 py-2">N13</th>
                    <th class="px-3 py-2">N14</th>
                    <th class="px-3 py-2">N15</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($centroids as $centroid)
                    <tr class="bg-white border-b hover:bg-gray-100">
                        <td class="px-3 py-2">{{ $centroid->kode_centroid }}</td>
                        <td class="px-3 py-2 text-nowrap">{{ $centroid->nama_cluster }}</td>
                        <td class="px-3 py-2 text-nowrap">{{ $centroid->rumpun }}</td>
                        <td class="px-3 py-2">{{ $centroid->student->n1 }}</td>
                        <td class="px-3 py-2">{{ $centroid->student->n2 }}</td>
                        <td class="px-3 py-2">{{ $centroid->student->n3 }}</td>
                        <td class="px-3 py-2">{{ $centroid->student->n4 }}</td>
                        <td class="px-3 py-2">{{ $centroid->student->n5 }}</td>
                        <td class="px-3 py-2">{{ $centroid->student->n6 }}</td>
                        <td class="px-3 py-2">{{ $centroid->student->n7 }}</td>
                        <td class="px-3 py-2">{{ $centroid->student->n8 }}</td>
                        <td class="px-3 py-2">{{ $centroid->student->n9 }}</td>
                        <td class="px-3 py-2">{{ $centroid->student->n10 }}</td>
                        <td class="px-3 py-2">{{ $centroid->student->n11 }}</td>
                        <td class="px-3 py-2">{{ $centroid->student->n12 }}</td>
                        <td class="px-3 py-2">{{ $centroid->student->n13 }}</td>
                        <td class="px-3 py-2">{{ $centroid->student->n14 }}</td>
                        <td class="px-3 py-2">{{ $centroid->student->n15 }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Tabel Siswa -->
    <h2 class="text-md font-semibold mb-3 pb-2 border-b border-gray-600">Hasil Iterasi ke-1</h2>
    <table class="w-full text-sm text-left text-gray-800">
        <thead class="text-xs text-gray-800 uppercase bg-gray-300">
            <tr>
                <th class="px-3 py-2">No</th>
                <th class="px-3 py-2">Nama</th>
                @for ($i = 1; $i <= 15; $i++)
                    <th class="px-3 py-2">N{{ $i }}</th>
                @endfor
                @foreach ($centroids as $centroid)
                    <th class="px-3 py-2 bg-red-300">Clus_{{ $loop->index + 1 }}</th>
                @endforeach
                <th class="px-3 py-2 bg-red-300">Jarak Terdekat</th>
                <th class="px-3 py-2 bg-red-300">Cluster</th>
                <th class="px-3 py-2 bg-red-300">Jurusan</th>
                <th class="px-3 py-2 bg-red-300">Rumpun</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr class="bg-white border-b hover:bg-gray-100">
                    <th class="px-3 py-1 text-center font-semibold text-gray-900 whitespace-nowrap">
                        {{ $students->firstItem() + $loop->index }}
                    </th>
                    <td class="px-3 py-1 text-nowrap">
                        {{ $student->nama_siswa }}
                    </td>

                    {{-- Tampilkan nilai siswa --}}
                    @for ($i = 1; $i <= 15; $i++)
                        <td class="px-3 py-1">
                            {{ $student->{'n' . $i} }}
                        </td>
                    @endfor

                    {{-- Tampilkan jarak ke tiap centroid --}}
                    @php
                        $minDistance = null;
                        $closestCluster = null;
                        $closestJurusan = null;
                        $closestRumpun = null;
                    @endphp

                    @foreach ($centroids as $centroid)
                        @php
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
                                $closestJurusan = $centroid->nama_cluster;
                                $closestRumpun = $centroid->rumpun;
                            }
                        @endphp

                        <td class="px-3 py-1">
                            {{ number_format($distance, 1) }}
                        </td>
                    @endforeach


                    {{-- Tampilkan cluster terdekat dan jaraknya --}}
                    <td class="px-3 py-1 bg-green-100">{{ number_format($minDistance, 1) }}</td>
                    <td class="px-3 py-1 bg-green-100">{{ $closestCluster }}</td>
                    <td class="px-3 py-1 bg-green-100 text-nowrap capitalize">{{ $closestJurusan }}</td>
                    <td class="px-3 py-1 bg-green-100">{{ $closestRumpun }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $students->links() }}
    </div>
</div>


{{-- //////////////////////////////////////////////// --}}
<!-- Tabel Centroids baru -->
<!-- Tabel Centroids Baru -->
<div class="mb-6">
    <h2 class="text-md font-semibold mb-3 pb-2 border-b border-gray-600">Centroid Baru</h2>
    <table class="w-full text-sm text-left text-gray-800">
        <thead class="text-xs text-gray-800 uppercase bg-gray-300">
            <tr>
                <th class="px-3 py-2 text-nowrap">Kode Centroid</th>
                <th class="px-3 py-2">Nama Cluster</th>
                <th class="px-3 py-2">Rumpun</th>
                @for ($i = 1; $i <= 15; $i++)
                    <th class="px-3 py-2">N{{ $i }}</th>
                @endfor
            </tr>
        </thead>
        <tbody>
            @foreach ($centroids as $centroid)
                @php
                    // Ambil semua siswa yang termasuk dalam cluster ini
                    $clusterStudents = $students->filter(function ($student) use ($centroid) {
                        return $student->cluster == $centroid->kode_centroid;
                    });

                    // Hitung rata-rata untuk setiap nilai (N1 - N15)
                    $newCentroidValues = [];
                    for ($i = 1; $i <= 15; $i++) {
                        $newCentroidValues[$i] = $clusterStudents->avg('n' . $i);
                    }
                @endphp
                <tr class="bg-white border-b hover:bg-gray-100">
                    <td class="px-3 py-2">{{ $centroid->kode_centroid }}</td>
                    <td class="px-3 py-2 text-nowrap">{{ $centroid->nama_cluster }}</td>
                    <td class="px-3 py-2 text-nowrap">{{ $centroid->rumpun }}</td>
                    @for ($i = 1; $i <= 15; $i++)
                        <td class="px-3 py-2">
                            {{ number_format($newCentroidValues[$i], 1) }}
                        </td>
                    @endfor
                </tr>
            @endforeach
        </tbody>
    </table>
</div>



'kode_centroid' => $kode,
'nama_cluster' => $originalCentroid->nama_cluster,
'rumpun' => $originalCentroid->rumpun,
'student' => (object) $centroid,
