    <table class="w-full text-sm text-left rtl:text-right text-gray-500 rounded-lg">
        <thead class="text-xs text-gray-800 uppercase bg-gray-300">
            <tr>
                <th class="px-3 py-4">No</th>
                <th class="px-3 py-4">NIS</th>
                <th class="px-3 py-4 text-nowrap">Nama Siswa</th>
                <th class="px-3 py-4">PAI</th>
                <th class="px-3 py-4">PKN</th>
                <th class="px-3 py-4">B.Indo</th>
                <th class="px-3 py-4">B.Arab</th>
                <th class="px-3 py-4">MTK Wajib</th>
                <th class="px-3 py-4">Sj.Indo</th>
                <th class="px-3 py-4">B.Inggris</th>
                <th class="px-3 py-4">Seni Budaya</th>
                <th class="px-3 py-4">Penjaskes</th>
                <th class="px-3 py-4">Prakarya</th>
                <th class="px-3 py-4">MTK Peminatan</th>
                <th class="px-3 py-4">Biologi</th>
                <th class="px-3 py-4">Fisika</th>
                <th class="px-3 py-4">Kimia</th>
                <th class="px-3 py-4">Ekonomi</th>
                <th class="px-3 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $student)
                <tr class="bg-white border-b hover:bg-gray-100 py-4 text-gray-900">
                    <th class="px-3 py-2 text-center font-medium whitespace-nowrap">
                        {{ $students->firstItem() + $loop->index }}
                    </th>
                    <td class="px-3 py-2">
                        {{ $student->nis }}
                    </td>
                    <td class="px-3 py-2 text-nowrap">
                        {{ $student->nama_siswa }}
                    </td>
                    <td class="text-center py-2">
                        {{ $student->n1 }}
                    </td>
                    <td class="px-3 py-2">
                        {{ $student->n2 }}
                    </td>
                    <td class="px-3 py-2">
                        {{ $student->n3 }}
                    </td>
                    <td class="px-3 py-2">
                        {{ $student->n4 }}
                    </td>
                    <td class="px-3 py-2">
                        {{ $student->n5 }}
                    </td>
                    <td class="px-3 py-2">
                        {{ $student->n6 }}
                    </td>
                    <td class="px-3 py-2">
                        {{ $student->n7 }}
                    </td>
                    <td class="px-3 py-2">
                        {{ $student->n8 }}
                    </td>
                    <td class="px-3 py-2">
                        {{ $student->n9 }}
                    </td>
                    <td class="px-3 py-2">
                        {{ $student->n10 }}
                    </td>
                    <td class="px-3 py-2">
                        {{ $student->n11 }}
                    </td>
                    <td class="px-3 py-2">
                        {{ $student->n12 }}
                    </td>
                    <td class="px-3 py-2">
                        {{ $student->n13 }}
                    </td>
                    <td class="px-3 py-2">
                        {{ $student->n14 }}
                    </td>
                    <td class="px-3 py-2">
                        {{ $student->n15 }}
                    </td>
                    <td class="px-3 py-2 flex flex-row justify-center items-center">
                        <a href="/dashboard/values/{{ $student->id }}"
                            class="text-white text-xs bg-blue-600 hover:bg-blue-700 px-3 py-2 rounded-md">
                            Detail
                        </a>
                    </td>
                </tr>
            @empty
                <tr class="bg-white border-b text-gray-900">
                    <td colspan="19" class="px-3 py-4 text-center justify-center text-gray-500">
                        Tidak ada data nilai siswa ditemukan.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
