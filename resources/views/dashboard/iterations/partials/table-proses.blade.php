    @foreach ($iterationData as $iteration)
        <div class="mb-8 border-b-4 border-red-600">
            <h3 class="text-xl font-semibold border-b border-gray-600 mb-3 text-red-600">Iterasi
                ke-{{ $iteration['iteration'] }}</h3>

            <!-- Tabel untuk menampilkan cluster assignments -->
            <div id="table-container" class="shadow-md mb-5 rounded-lg pb-5 bg-white">
                <div class="overflow-x-auto scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-gray-100 rounded-lg">
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
                            @foreach ($iteration['assignments'] as $studentId => $assignedCluster)
                                @php
                                    $student = $students->find($studentId);
                                    $centroid = $centroids->firstWhere('kode_centroid', $assignedCluster);
                                    $minDistance = PHP_INT_MAX; // Initialize minimum distance to a large value
                                    $closestCentroid = null; // Initialize closest centroid to null
                                @endphp
                                <tr class="text-gray-800 bg-white hover:bg-gray-200">
                                    <td
                                        class="border border-gray-200 px-3 py-1 text-center text-gray-900 whitespace-nowrap">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="border border-gray-200 px-3 py-1 text-nowrap">
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
                                        <td class="border border-gray-200 px-3 py-1">
                                            {{ number_format($distance, 1) }}
                                        </td>
                                    @endforeach
                                    <td class="border border-gray-200 px-3 py-1 text-center">
                                        {{ number_format($minDistance, 1) }} {{-- Display the minimum distance --}}
                                    </td>
                                    <td class="border border-gray-200 px-3 py-1 text-center">{{ $assignedCluster }}</td>
                                    <td class="border border-gray-200 px-3 py-1 text-nowrap">
                                        {{ $closestCentroid ? $closestCentroid->nama_cluster : 'Tidak Ditemukan' }}
                                    </td>
                                    <td class="border border-gray-200 px-3 py-1">
                                        {{ $closestCentroid ? $closestCentroid->rumpun : 'Tidak Ditemukan' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Tabel untuk menampilkan centroid baru jika ada -->
            <h2 class="text-xl font-semibold border-b border-gray-600 mb-3 text-red-600">Centroid Baru</h2>
            <div id="table-container" class="shadow-md mb-5 rounded-lg pb-5 bg-white">
                <div
                    class="overflow-x-auto scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-gray-100 rounded-lg">
                    <table class="w-full text-sm text-center text-gray-500">
                        <thead class="text-xs text-center text-gray-800 uppercase bg-gray-300">
                            <tr>
                                <th class="border border-gray-300 px-1 py-3">Cluster</th>
                                <th class="border border-gray-300 px-1 py-3">Jurusan</th>
                                <th class="border border-gray-300 px-1 py-3">Rumpun</th>
                                @foreach (range(1, 15) as $index)
                                    <th class="border border-gray-300 px-1 py-3">N{{ $index }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($iteration['centroids'] as $cluster => $newCentroid)
                                @php
                                    $currentCentroid = $centroids->firstWhere('kode_centroid', $cluster);
                                @endphp
                                <tr class="text-gray-800 bg-white hover:bg-gray-200">
                                    <td class="border border-gray-300 px-1 py-2">{{ $cluster }}</td>
                                    <td class="border border-gray-300 px-1 py-2 text-left text-nowrap capitalize">
                                        {{ $currentCentroid->nama_cluster }}
                                    </td>
                                    <td class="border border-gray-300 px-1 py-2">
                                        {{ $currentCentroid->rumpun }}
                                    </td>
                                    @foreach ($newCentroid as $value)
                                        <td class="border border-gray-300 px-1 py-2">{{ $value }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endforeach
    </div>
