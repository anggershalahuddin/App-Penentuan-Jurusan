@extends('dashboard.layouts.main')

@section('container')
    {{-- Ini Bagian Head --}}
    <div class="pb-2 mb-10 border-b border-secondary flex flex-row justify-between items-end">
        <h1 class="font-semibold text-slate-700 text-3xl ">Dashboard
        </h1>
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a
                        class="inline-flex items-center text-sm font-medium {{ Request::is('dashboard') ? 'text-blue-600' : 'text-gray-700' }}">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Dashboard
                    </a>
                </li>
            </ol>
        </nav>
    </div>

    <div class="w-full flex flex-col gap-5">
        {{-- Hero Section --}}
        @auth()
            <div class="flex flex-col gap-2 bg-hero bg-cover px-6 py-6 rounded-xl shadow-gray-400 shadow-lg">
                <h2 class="text-xl font-medium">Selamat Datang</h2>
                <h1 class="font-semibold text-3xl">{{ auth()->user()->nama }}</h1>
            </div>
        @endauth
        {{-- End Hero Section --}}

        {{-- Modal Siswa --}}
        <div class="bg-white shadow-lg rounded-lg p-5 flex flex-col">
            <h1 class="font-semibold text-xl mb-5 w-fit py-1 border-b border-gray-600">
                Jumlah Siswa Keseluruhan</h1>
            <div class="grid grid-cols-3 space-x-5">
                <div
                    class="flex flex-row justify-between items-center px-5 py-2 rounded-lg bg-gradient-to-r from-blue-300 to-purple-300 hover:scale-105 ease-in duration-75">
                    <span class="flex flex-col justify-between">
                        <p class="font-semibold text-5xl">{{ $totalSiswa }}</p>
                        <p class="font-medium text-lg">Jumlah Siswa</p>
                    </span>
                    <img src="/img/student.svg" alt="student" class="p-3 w-24">
                </div>
                <div
                    class="flex flex-row justify-between items-center px-4 rounded-lg bg-gradient-to-r from-blue-300 to-purple-300 hover:scale-105 ease-in duration-75">
                    <span class="flex flex-col justify-between">
                        <p class="font-semibold text-5xl">{{ $totalSiswaLakiLaki }}</p>
                        <p class="font-medium text-lg">Siswa Laki-laki</p>
                    </span>
                    <img src="/img/student-male.svg" alt="student-male" class="p-3 w-24">
                </div>
                <div
                    class="flex flex-row justify-between items-center px-4 rounded-lg bg-gradient-to-r from-blue-300 to-purple-300 hover:scale-105 ease-in duration-75">
                    <span class="flex flex-col justify-between">
                        <p class="font-semibold text-5xl">{{ $totalSiswaPerempuan }}</p>
                        <p class="font-medium text-lg">Siswa Perempuan</p>
                    </span>
                    <img src="/img/student-female.svg" alt="student-female" class="p-3 w-24">
                </div>
            </div>
        </div>

        <div class="w-full">

            <div class="grid grid-cols-[70%_30%] space-x-5 min-h-56">

                {{-- Modal Siswa per-jurusan --}}
                <div class="bg-white shadow-lg rounded-lg p-5 flex flex-col space-y-5">
                    <h2 class="font-semibold text-xl w-fit py-1 border-b border-gray-600">Jumlah Siswa Per-Jurusan</h2>
                    <div class="grid grid-cols-4 gap-5">
                        @foreach ($clusterCounts as $cluster)
                            <div
                                class="flex flex-row justify-between items-center px-3 py-2 rounded-lg bg-gradient-to-tl from-blue-400 to-green-300 hover:scale-105 ease-in duration-75">
                                <span class="flex flex-col justify-between gap-3 text-xs py-2">
                                    <p class="font-medium text-3xl">{{ $cluster->count }} <span class="text-lg">Siswa</span>
                                    </p>
                                    <p
                                        class="font-medium text-xs bg-gradient-to-tl from-yellow-200 to-white rounded-md px-2 py-1">
                                        {{ $cluster->nama_cluster }}
                                    </p>
                                </span>
                                <img src="/img/university.svg" alt="university" class="w-12 ml-2 rounded-md">
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Modal Siswa per-rumpun --}}
                <div class="bg-white shadow-lg rounded-lg p-5 flex flex-col space-y-5">
                    <h2 class="font-semibold text-xl w-fit py-1 border-b border-gray-600">Jumlah Siswa Per-Rumpun</h2>
                    <div class="flex flex-col h-full justify-around">
                        @foreach ($rumpunCounts as $rumpun)
                            <div
                                class="flex flex-row justify-between items-center px-3 py-2 rounded-lg bg-gradient-to-tl from-red-300 to-yellow-200 hover:scale-105 ease-in duration-75">
                                <span class="flex flex-col justify-between gap-2 py-2">
                                    <p class="font-medium text-3xl">{{ $rumpun->count }} <span class="text-lg">Siswa</span>
                                    </p>
                                    <p
                                        class="font-medium text-sm  bg-gradient-to-tl from-blue-400 to-green-300 rounded-md px-2 py-1">
                                        {{ $rumpun->rumpun }}</p>
                                </span>
                                <img src="/img/student.svg" alt="student" class="p-3 w-24">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{-- Bagian Chart --}}
        <div
            class="h-[700px] grid grid-cols-[45%_55%] space-x-5 shadow-lg bg-gradient-to-r from-gray-50 to-white p-2 rounded-lg">
            <span class="w-full h-full grid grid-rows-[55%_45%] space-y-5 ">
                <span class="pt-5 pb-2 border-4 border-gray-500 bg-white rounded-lg">
                    <div id="barChart" class="h-full">
                    </div>
                </span>
                <span class="pt-5 pb-2 border-4 border-gray-500 bg-white rounded-lg">
                    <div id="rumpunPieChart" class="h-full">
                    </div>
                </span>
            </span>
            <span class="pt-5 pb-2 border-4 border-gray-500 bg-white rounded-lg">
                <div id="refererPieChart" class="h-full">
                </div>
            </span>
        </div>

        @include('dashboard.layouts.chart')

        {{-- Usage Information --}}
        {{-- <div class="bg-blue-500 pl-3 rounded-xl shadow-gray-400 shadow-lg">
            <div class="flex flex-col bg-white px-6 py-4 rounded-xl">
                <h3 class="font-medium text-lg border-b-2 border-slate-300 pb-2">
                    Petunjuk Penggunaan Aplikasi:
                </h3>
                <div class="flex flex-row gap-5 pt-3">
                    <span>
                        <p class="mt-3 font-semibold underline underline-offset-4">A. Menu Data Master</p>
                        <ul class="list-disc pl-4 text-sm mt-2 text-justify">

                            <li>Masuk ke menu "Data Master"</li>
                            <li>Lalu ke menu "Data Siswa" untuk menginputkan/ mengupload data siswa</li>
                            <li>Setelah mendaftarkan siswa ke dalam aplikasi, lengkapi nilai-nilai siswa tersebut di
                                menu "Data Nilai Siswa"</li>
                        </ul>
                    </span>
                    <span class="border-2 border-gray-300"></span>
                    <span>
                        <p class="mt-3 font-semibold underline underline-offset-4">B. Menu K-Means Clustering</p>
                        <ul class="list-disc pl-4 text-sm mt-2 text-justify">
                            <li>
                                Masuk ke menu K-Means Clustering
                            </li>
                            <li>
                                Langkah yang pertama adalah setting centroid sebagai parameter pada proses clustering
                                yang
                                akan dilakukan
                            </li>
                            <li>
                                Setelah mengatur centroid, klik tombol "Proses Iterasi"
                            </li>
                            <li>
                                Selanjutnya akan diarahkan ke halman menu "Hasil Iterasi untuk melihat hasil perhitungan
                                dan
                                clusterisasi jurusan"
                            </li>
                            <li>
                                Grafik hasil proses iterasi akan di tampilkan pada menu "Grafik K-Means"
                            </li>
                        </ul>
                    </span>
                </div>
            </div> --}}
        {{-- End Usage Information --}}
    </div>
    </div>
@endsection
