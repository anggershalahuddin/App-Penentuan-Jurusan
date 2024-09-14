<!-- Tabel untuk menampilkan cluster assignments -->
<table class="w-full text-sm text-left text-gray-500">
    <thead class="text-xs text-center text-gray-800 uppercase bg-gray-300">
        <tr>
            <th class="px-1 py-3">No</th>
            <th class="px-1 py-3">Nama Siswa</th>
            @for ($i = 1; $i <= $numberOfClusters; $i++)
                <th class="px-1 py-3">C{{ $i }}</th>
            @endfor
            <th class="px-1 py-3">Jarak Terdekat</th>
            <th class="px-1 py-3">Assigned Cluster</th>
            <th class="px-1 py-3">Jurusan</th>
            <th class="px-1 py-3">Rumpun</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($iterationData['assignments'] as $studentId => $assignedCluster)
            @php
                $student = $students->find($studentId);
                $centroid = $centroids->firstWhere('kode_centroid', $assignedCluster);
                $minDistance = PHP_INT_MAX; // Initialize minimum distance to a large value
                $closestCentroid = null; // Initialize closest centroid to null
            @endphp
            <tr class="text-gray-800 bg-white hover:bg-gray-200">
                <td class="border border-gray-200 px-3 py-2 text-center text-gray-900 whitespace-nowrap">
                    {{ $loop->iteration }}
                </td>
                <td class="border border-gray-200 px-3 py-2 text-nowrap">
                    {{ $student ? $student->nama_siswa : 'Tidak Ditemukan' }}
                </td>
                @foreach ($centroids as $centroidIteration)
                    @php
                        $distance = 0;
                        foreach (range(1, 15) as $index) {
                            $key = 'n' . $index;
                            $distance += pow($student->$key - $centroidIteration->student->$key, 2);
                        }
                        $distance = sqrt($distance);
                        if ($distance < $minDistance) {
                            $minDistance = $distance;
                            $closestCentroid = $centroidIteration;
                        }
                    @endphp
                    <td class="border border-gray-200 px-3 py-2">
                        {{ number_format($distance, 1) }}
                    </td>
                @endforeach
                <td class="border border-gray-200 px-3 py-2 text-center">
                    {{ number_format($minDistance, 1) }} {{-- Display the minimum distance --}}
                </td>
                <td class="border border-gray-200 px-3 py-2 text-center">{{ $assignedCluster }}</td>
                <td class="border border-gray-200 px-3 py-2 text-nowrap">
                    {{ $closestCentroid ? $closestCentroid->nama_cluster : 'Tidak Ditemukan' }}
                </td>
                <td class="border border-gray-200 px-3 py-2">
                    {{ $closestCentroid ? $closestCentroid->rumpun : 'Tidak Ditemukan' }}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="10" class="px-6 py-4 text-center text-gray-500">
                    Tidak ada data siswa ditemukan.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
