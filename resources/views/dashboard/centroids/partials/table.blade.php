    <table class="w-full text-sm text-left rtl:text-right text-gray-500 rounded-lg bg-white">
        <thead class="text-xs
        text-gray-800 uppercase bg-gray-300">
            <tr>
                <th class="px-3 py-4">No</th>
                <th class="px-3 py-4">Kode</th>
                <th class="px-3 py-4 text-nowrap">Cluster Jurusan</th>
                <th class="px-3 py-4 text-nowrap">Rumpun Ilmu</th>
                <th class="px-2 py-4">PAI</th>
                <th class="px-2 py-4">PKN</th>
                <th class="px-2 py-4">B.Indo</th>
                <th class="px-2 py-4">B.Arab</th>
                <th class="px-2 py-4">MTK Wajib</th>
                <th class="px-2 py-4">Sj.Indo</th>
                <th class="px-2 py-4">B.Inggris</th>
                <th class="px-2 py-4">Seni Budaya</th>
                <th class="px-2 py-4">Penjaskes</th>
                <th class="px-2 py-4">Prakarya</th>
                <th class="px-2 py-4">MTK Peminatan</th>
                <th class="px-2 py-4">Biologi</th>
                <th class="px-2 py-4">Fisika</th>
                <th class="px-2 py-4">Kimia</th>
                <th class="px-2 py-4">Ekonomi</th>
                <th class="px-2 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($centroids as $centroid)
                <tr class="bg-white border-b hover:bg-gray-100">
                    <td class="px-3 py-2 text-center font-medium text-gray-900 whitespace-nowrap">
                        {{ $centroids->firstItem() + $loop->index }}
                    </td>
                    <td class="px-3 py-2">
                        {{ $centroid->kode_centroid }}
                    </td>
                    <td class="text-left px-3 py-2 text-nowrap">
                        {{ $centroid->nama_cluster }}
                    </td>
                    <td class="px-3 py-2">
                        {{ $centroid->rumpun }}
                    </td>
                    @if ($centroid->student)
                        <td class="px-2 py-2 text-center">
                            {{ $centroid->student->n1 }}
                        </td>
                        <td class="px-2 py-2 text-center">
                            {{ $centroid->student->n2 }}
                        </td>
                        <td class="px-2 py-2 text-center">
                            {{ $centroid->student->n3 }}
                        </td>
                        <td class="px-2 py-2 text-center">
                            {{ $centroid->student->n4 }}
                        </td>
                        <td class="px-2 py-2 text-center">
                            {{ $centroid->student->n5 }}
                        </td>
                        <td class="px-2 py-2 text-center">
                            {{ $centroid->student->n6 }}
                        </td>
                        <td class="px-2 py-2 text-center">
                            {{ $centroid->student->n7 }}
                        </td>
                        <td class="px-2 py-2 text-center">
                            {{ $centroid->student->n8 }}
                        </td>
                        <td class="px-2 py-2 text-center">
                            {{ $centroid->student->n9 }}
                        </td>
                        <td class="px-2 py-2 text-center">
                            {{ $centroid->student->n10 }}
                        </td>
                        <td class="px-2 py-2 text-center">
                            {{ $centroid->student->n11 }}
                        </td>
                        <td class="px-2 py-2 text-center">
                            {{ $centroid->student->n12 }}
                        </td>
                        <td class="px-2 py-2 text-center">
                            {{ $centroid->student->n13 }}
                        </td>
                        <td class="px-2 py-2 text-center">
                            {{ $centroid->student->n14 }}
                        </td>
                        <td class="px-2 py-2 text-center">
                            {{ $centroid->student->n15 }}
                        </td>
                    @endif
                    <td class="px-2 py-2 flex flex-row gap-1">
                        <button id="dropdownDefaultButton"
                            data-dropdown-toggle="dropdown-action{{ $centroid->centroid_id }}"
                            class="flex flex-row items-center px-4 py-2 text-xs font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-800 focus:bg-blue-800"
                            type="button">Aksi<svg class="size-2 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdown-action{{ $centroid->centroid_id }}"
                            class="top-0 z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-32">
                            <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="/dashboard/centroids/{{ $centroid->centroid_id }}"
                                        class="block px-4 py-2 hover:bg-gray-200">Detail
                                        Data</a>
                                </li>
                                <li>
                                    <button onclick="openDeleteModalCentroid({{ $centroid->centroid_id }})"
                                        class="w-full px-4 flex justify-start py-2 hover:bg-red-200 hover:text-red-600">
                                        Hapus Data
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @empty
                <tr class="bg-white border-b text-gray-900">
                    <td colspan="21" class="px-6 py-4 text-center text-gray-500">
                        Tidak ada data centroid ditemukan.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
