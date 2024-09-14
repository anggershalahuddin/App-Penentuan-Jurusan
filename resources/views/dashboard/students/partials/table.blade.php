{{-- <div class="relative shadow-md rounded-lg mb-5"> --}}
<table class="w-full text-sm text-left rtl:text-right text-gray-500 rounded-lg">

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 rounded-lg overflow-hidden">
        <thead class="text-xs text-gray-800 uppercase bg-gray-300">
            <tr>
                <th scope="col" class="px-3 py-4">No</th>
                <th scope="col" class="px-3 py-4">NIS</th>
                <th scope="col" class="px-3 py-4">NISN</th>
                <th scope="col" class="px-3 py-4 text-nowrap">Nama Siswa</th>
                <th scope="col" class="px-3 py-4">L/P</th>
                <th scope="col" class="px-2 py-4 text-nowrap">Tempat, Tgl Lahir</th>
                <th scope="col" class="px-3 py-4">Kelas</th>
                <th scope="col" class="px-3 py-4 text-nowrap">Tahun Lulus</th>
                <th scope="col" class="px-3 py-4">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $student)
                <tr class="bg-white border-b hover:bg-gray-100 text-gray-900">
                    <th scope="row" class="px-3 py-2 text-center font-medium whitespace-nowrap">
                        {{ $students->firstItem() + $loop->index }}
                    </th>
                    <td class="px-3 py-2">
                        {{ $student->nis }}
                    </td>
                    <td class="px-3 py-2">
                        {{ $student->nisn }}
                    </td>
                    <td class="px-3 py-2 text-nowrap">
                        {{ $student->nama_siswa }}
                    </td>
                    <td class="px-3 py-2">
                        {{ $student->kelamin }}
                    </td>
                    <td class="px-2 py-2 text-nowrap">
                        {{ $student->tempat_lahir }},
                        {{ \Carbon\Carbon::parse($student->tgl_lahir)->locale('id')->translatedFormat('d F Y') }}
                    </td>
                    <td class="px-3 py-2">
                        {{ $student->kelas }}
                    </td>
                    <td class="px-3 py-2">
                        {{ $student->periode }}
                    </td>
                    <td class="px-3 py-2 flex flex-row gap-1">
                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown-action{{ $student->id }}"
                            class="flex flex-row items-center px-4 py-2 text-xs font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:bg-blue-700"
                            type="button">Aksi<svg class="size-2 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdown-action{{ $student->id }}"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-32">
                            <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="/dashboard/students/{{ $student->id }}"
                                        class="block px-4 py-2 hover:bg-gray-200 font-medium">Detail
                                        Siswa</a>
                                </li>
                                <li>
                                    <button onclick="openDeleteModalStudent({{ $student->id }})"
                                        class="w-full px-4 flex justify-start py-2 hover:bg-red-200 hover:text-red-600 font-medium">
                                        Hapus Siswa
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @empty
                <tr class="bg-white border-b text-gray-900">
                    <td colspan="9" class="px-3 py-4 text-center text-gray-500">
                        Tidak ada data siswa ditemukan.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{-- </div> --}}
