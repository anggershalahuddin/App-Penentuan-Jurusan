@extends('dashboard.layouts.main')
@section('title', 'Centroid | Detail Centroid')
@section('container')

    {{-- ini adalah bagian Header Centroid Page - DETAIL DATA --}}
    <div class="pb-2 mb-9 border-b border-secondary flex flex-row justify-between items-end">
        <h1 class="font-semibold text-slate-700 text-3xl">Detail Centroid
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
                            class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2">Siswa</a>
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
                            class="cursor-default ms-1 text-sm font-medium {{ Request::is('dashboard/centroids/*') ? 'text-blue-600' : '' }} hover:text-blue-600 md:ms-2">Detail
                            Centroid</a>
                    </div>
                </li>

            </ol>
        </nav>
    </div>

    {{-- ini adalah bagian Form - DETAIL DATA --}}
    <div class="flex flex-col">
        <div class="relative overflow-hidden mb-4 flex flex-row bg-white rounded-lg shadow">
            <div class="h-full bg-gray-300 px-5 pt-5">
                <img src="/img/jurusan.jpg" alt="centroids" class="size-28">
            </div>
            <div class="flex flex-col py-5 px-5 w-full">
                <div class="mb-5 border-b-2 font-semibold text-xl pb-3 flex flex-row justify-between items-end">
                    <h3 class="text-red-600 text-2xl">
                        {{ $centroid->kode_centroid }} - {{ $centroid->nama_cluster }}
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
                <div class="flex flex-row mb-5 pb-4">
                    <div class=" flex flex-col gap-3 font-semibold">
                        <p>Kode Centroid</p>
                        <p>Cluster / Jurusan</p>
                        <p>Rumpun Ilmu</p>
                    </div>
                    <div class="ml-16 flex flex-col gap-3">
                        <p>: {{ $centroid->kode_centroid }}</p>
                        <p>: {{ $centroid->nama_cluster }}</p>
                        <p>: {{ $centroid->rumpun }}</p>
                    </div>
                </div>
                <div class="flex flex-row">
                    <div class="grid grid-cols-6 gap-6 mb-6">
                        @if ($centroid->student)
                            <div>
                                <label for="n1"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PAI</label>
                                <input type="number" id="n1" name="n1" disabled
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('n1') is_invalid @enderror"
                                    placeholder="" autofocus value="{{ old('n1', $centroid->student->n1) }}">
                                @error('n1')
                                    <div class="text-red-700 mt-1 text-xs">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label for="n2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    PKN</label>
                                <input type="number" id="n2" name="n2" disabled
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('n2') is_invalid @enderror"
                                    placeholder="" autofocus value="{{ old('n2', $centroid->student->n2) }}">
                                @error('n2')
                                    <div class="text-red-700 mt-1 text-xs">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label for="n3"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">B.
                                    Indonesia</label>
                                <input type="number" id="n3" name="n3" disabled
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('n3') is_invalid @enderror"
                                    placeholder="" autofocus value="{{ old('n3', $centroid->student->n3) }}">
                                @error('n3')
                                    <div class="text-red-700 mt-1 text-xs">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label for="n4" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    B. Arab</label>
                                <input type="number" id="n4" name="n4" disabled
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('n4') is_invalid @enderror"
                                    placeholder="" autofocus value="{{ old('n4', $centroid->student->n4) }}">
                                @error('n4')
                                    <div class="text-red-700 mt-1 text-xs">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label for="n5" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    MTK Wajib</label>
                                <input type="number" id="n5" name="n5" disabled
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('n5') is_invalid @enderror"
                                    placeholder="" autofocus value="{{ old('n5', $centroid->student->n5) }}">
                                @error('n5')
                                    <div class="text-red-700 mt-1 text-xs">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label for="n6"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sejarah
                                    Indonesia</label>
                                <input type="number" id="n6" name="n6" disabled
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('n6') is_invalid @enderror"
                                    placeholder="" autofocus value="{{ old('n6', $centroid->student->n6) }}">
                                @error('n6')
                                    <div class="text-red-700 mt-1 text-xs">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label for="n7"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    B. Inggris</label>
                                <input type="number" id="n7" name="n7" disabled
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('n7') is_invalid @enderror"
                                    placeholder="" autofocus value="{{ old('n7', $centroid->student->n7) }}">
                                @error('n7')
                                    <div class="text-red-700 mt-1 text-xs">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label for="n8"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seni
                                    Budaya</label>
                                <input type="number" id="n8" name="n8" disabled
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('n8') is_invalid @enderror"
                                    placeholder="" autofocus value="{{ old('n8', $centroid->student->n8) }}">
                                @error('n8')
                                    <div class="text-red-700 mt-1 text-xs">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label for="n9"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Penjaskes</label>
                                <input type="number" id="n9" name="n9" disabled
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('n9') is_invalid @enderror"
                                    placeholder="" autofocus value="{{ old('n9', $centroid->student->n9) }}">
                                @error('n9')
                                    <div class="text-red-700 mt-1 text-xs">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label for="n10"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prakarya</label>
                                <input type="number" id="n10" name="n10" disabled
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('n10') is_invalid @enderror"
                                    placeholder="" autofocus value="{{ old('n10', $centroid->student->n10) }}">
                                @error('n10')
                                    <div class="text-red-700 mt-1 text-xs">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label for="n11"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">MTK
                                    Peminatan</label>
                                <input type="number" id="n11" name="n11" disabled
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('n11') is_invalid @enderror"
                                    placeholder="" autofocus value="{{ old('n11', $centroid->student->n11) }}">
                                @error('n11')
                                    <div class="text-red-700 mt-1 text-xs">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label for="12"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Biologi</label>
                                <input type="number" id="n12" name="n12" disabled
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('n12') is_invalid @enderror"
                                    placeholder="" autofocus value="{{ old('n12', $centroid->student->n12) }}">
                                @error('n12')
                                    <div class="text-red-700 mt-1 text-xs">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label for="n13"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fisika</label>
                                <input type="number" id="n13" name="n13" disabled
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('n13') is_invalid @enderror"
                                    placeholder="" autofocus value="{{ old('n13', $centroid->student->n13) }}">
                                @error('n13')
                                    <div class="text-red-700 mt-1 text-xs">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label for="n14"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Kimia</label>
                                <input type="number" id="n14" name="n14" disabled
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('n14') is_invalid @enderror"
                                    placeholder="" autofocus value="{{ old('n14', $centroid->student->n14) }}">
                                @error('n14')
                                    <div class="text-red-700 mt-1 text-xs">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label for="n15"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ekonomi</label>
                                <input type="number" id="n15" name="n15" disabled
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('n15') is_invalid @enderror"
                                    placeholder="" autofocus value="{{ old('n15', $centroid->student->n15) }}">
                                @error('n15')
                                    <div class="text-red-700 mt-1 text-xs">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        @endif
                    </div>
                </div>
                <div class="flex flex-row gap-4 mt-5">

                    <a href="/dashboard/centroids/{{ $centroid->centroid_id }}/edit"
                        class="w-28 bg-blue-600 text-white flex items-center justify-center hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-md text-sm px-5 py-2.5 text-center">
                        EDIT DATA
                    </a>
                    <button onclick="openDeleteModalCentroid({{ $centroid->centroid_id }})"
                        class="w-28 bg-red-600 text-white flex items-center justify-center hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-md text-sm px-5 py-2.5 text-center">
                        HAPUS
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- Ini bagian DELETE MODAL --}}
    @include('dashboard.centroids.partials.delete-modal')
@endsection
