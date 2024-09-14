@extends('dashboard.layouts.main')
@section('title', 'Centroid | Tambah Centroid')
@section('container')

    {{-- ini adalah bagian Header Centroid Page - ADD DATA --}}
    <div class="pb-2 mb-9 border-b border-secondary flex flex-row justify-between items-end">
        <h1 class="font-semibold text-slate-700 text-3xl">Tambah Data Centroid
        </h1>
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="/dashboard"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="/dashboard/centroids"
                            class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2">Centroid</a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a
                            class="cursor-default ms-1 text-sm font-medium {{ Request::is('dashboard/centroids/create') ? 'text-blue-600' : '' }} hover:text-blue-600 md:ms-2">Tambah
                            Centroid</a>
                    </div>
                </li>

            </ol>
        </nav>
    </div>


    {{-- ini adalah bagian Form - ADD DATA --}}
    <form method="post" action="/dashboard/centroids">
        {{-- method post dan action /centroids ini kalau digabung akan mengarah ke controller yang method nya store --}}
        @csrf

        <div class="relative p-6 mb-4 bg-white rounded-lg shadow-lg">

            {{-- Form Header --}}
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b-2 sm:mb-5">
                <h3 class="text-lg font-semibold text-red-500">
                    Data Centroid
                </h3>
                <a href="/dashboard/centroids"
                    class="flex flex-row items-center text-sm gap-2 bg-slate-400 hover:bg-slate-500 text-white rounded-md py-1 px-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                    </svg>
                    <p>Kembali</p>
                </a>
            </div>

            {{-- Form Body --}}
            <div class="grid gap-6 mb-8 grid-cols-4">
                <div>
                    <label for="kode_centroid" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode
                        Centroid</label>
                    <select id="kode_centroid" name="kode_centroid"
                        class="h-12 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('kode_centroid') is_invalid @enderror"
                        autofocus>
                        <option disabled {{ old('kode_centroid') == null ? 'selected' : '' }}
                            class="bg-gray-500 text-white">
                            Kode Cluster
                        </option>
                        @foreach (['C1', 'C2', 'C3', 'C4', 'C5', 'C6', 'C7', 'C8', 'C9', 'C10'] as $kode)
                            @if (!in_array($kode, $usedCentroids))
                                <option value="{{ $kode }}" {{ old('kode_centroid') == $kode ? 'selected' : '' }}>
                                    {{ $kode }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                    @error('kode_centroid')
                        <div class="text-red-700 mt-1 text-xs">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <label for="nama_cluster" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cluster /
                        Jurusan</label>
                    <input type="text" id="nama_cluster" name="nama_cluster"
                        class="h-12 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('nama_cluster') is_invalid @enderror"
                        placeholder="Nama Cluster" autofocus value="{{ old('nama_cluster') }}">
                    @error('nama_cluster')
                        <div class="text-red-700 mt-1 text-xs">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <label for="rumpun" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rumpun
                        Keilmuan</label>
                    <select id="rumpun" name="rumpun"
                        class="h-12 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('rumpun') is_invalid @enderror"
                        autofocus>
                        <option disabled {{ old('rumpun') == null ? 'selected' : '' }} class="bg-gray-500 text-white">
                            Pilih Rumpun</option>
                        <option value="SAINTEK" {{ old('rumpun') == 'SAINTEK' ? 'selected' : '' }}>SAINTEK</option>
                        <option value="SOSHUM" {{ old('rumpun') == 'SOSHUM' ? 'selected' : '' }}>SOSHUM</option>
                    </select>
                    @error('rumpun')
                        <div class="text-red-700 mt-1 text-xs">
                            {{ $message }}
                        </div>
                    @enderror

                </div>
                <div>
                    <label for="student_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nilai
                        Cluster</label>
                    <input list="students" name="student_id" id="student_id"
                        class="h-12 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('student_id') is_invalid @enderror"
                        placeholder="Pilih Data" value="{{ old('student_id') }}" />
                    <datalist id="students">
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}">{{ $student->nama_siswa }}</option>
                        @endforeach
                    </datalist>
                    @error('student_id')
                        <div class="text-red-700 mt-1 text-xs">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">TAMBAH</button>
            </div>
    </form>
@endsection
