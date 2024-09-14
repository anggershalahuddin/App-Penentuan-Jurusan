<table class="w-full text-sm text-left text-gray-500 rounded-lg overflow-hidden">
    <thead class="text-xs text-center text-gray-800 uppercase bg-gray-400">
        <tr>
            <th class="px-1 py-3">No</th>
            <th class="px-1 py-3">Nama Siswa</th>
            <th class="px-1 py-3">NIS</th>
            <th class="px-1 py-3">NISN</th>
            <th class="px-1 py-3">N1</th>
            <th class="px-1 py-3">N2</th>
            <th class="px-1 py-3">N3</th>
            <th class="px-1 py-3">N4</th>
            <th class="px-1 py-3">N5</th>
            <th class="px-1 py-3">N6</th>
            <th class="px-1 py-3">N7</th>
            <th class="px-1 py-3">N8</th>
            <th class="px-1 py-3">N9</th>
            <th class="px-1 py-3">N10</th>
            <th class="px-1 py-3">N11</th>
            <th class="px-1 py-3">N12</th>
            <th class="px-1 py-3">N13</th>
            <th class="px-1 py-3">N14</th>
            <th class="px-1 py-3">N15</th>
            {{-- <th class="px-1 py-3">Assigned Cluster</th> --}}
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
                <td class="border-r border-t border-gray-200 px-3 py-2 text-center text-gray-900 whitespace-nowrap">
                    {{ $loop->iteration }}
                </td>
                <td class="border border-gray-200 px-3 py-2 text-nowrap">
                    {{ $student ? $student->nama_siswa : 'Tidak Ditemukan' }}
                </td>
                <td class="border border-gray-200 px-3 py-2">
                    {{ $student ? $student->nis : 'Tidak Ditemukan' }}
                </td>
                <td class="border border-gray-200 px-3 py-2p">
                    {{ $student ? $student->nisn : 'Tidak Ditemukan' }}
                </td>
                @for ($i = 1; $i <= 15; $i++)
                    @php
                        $key = 'n' . $i;
                    @endphp
                    <td class="border border-gray-200 px-3 py-2">
                        {{ $student ? $student->$key : 'Tidak Ditemukan' }}
                    </td>
                @endfor
                {{-- <td class="border border-gray-200 px-1 py-2 text-center">
                    {{ $assignedCluster }}
                </td> --}}
                <td class="border border-gray-200 px-3 py-2 text-nowrap">
                    {{ $centroid ? $centroid->nama_cluster : 'Tidak Ditemukan' }}
                </td>
                <td class="border border-gray-200 px-3 py-2 text-nowrap">
                    {{ $centroid ? $centroid->rumpun : 'Tidak Ditemukan' }}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="21" class="border border-gray-200 px-3 py-2 text-center text-gray-900">
                    Data tidak tersedia
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
</div>
