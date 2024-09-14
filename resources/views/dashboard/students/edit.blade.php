@extends('dashboard.layouts.main')
@section('title', 'Siswa | Edit Siswa')
@section('container')

    {{-- ini adalah bagian Header Student Page - EDIT DATA --}}
    <div class="pb-2 mb-9 border-b border-secondary flex flex-row justify-between items-end">
        <h1 class="font-semibold text-slate-700 text-3xl">Edit Data Siswa
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
                        <a href="/dashboard/students"
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
                            class="cursor-default ms-1 text-sm font-medium {{ Request::is('dashboard/students/*') ? 'text-blue-600' : '' }} hover:text-blue-600 md:ms-2">Edit
                            Siswa</a>
                    </div>
                </li>

            </ol>
        </nav>
    </div>

    {{-- ini adalah bagian Form - EDIT DATA --}}
    <form method="post" action="/dashboard/students/{{ $student->id }}">
        @method('put')
        @csrf

        {{-- Form Header --}}
        <div class="flex flex-col">
            <div class="relative p-6 mb-4 bg-white rounded-lg shadow">
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b-2 sm:mb-5">
                    <h3 class="text-3xl font-semibold text-black">
                        {{ $student->nama_siswa }}
                    </h3>
                    <a href="/dashboard/students"
                        class="flex flex-row items-center text-sm gap-2 bg-slate-400 hover:bg-slate-500 text-white rounded-md py-1 px-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                        </svg>
                        <p>Kembali</p>
                    </a>
                </div>

                {{-- Form Body --}}
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="nis"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIS</label>
                        <input type="text" id="nis" name="nis"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('nis') is_invalid @enderror"
                            placeholder="No Induk" autofocus value="{{ old('nis', $student->nis) }}">
                        @error('nis')
                            <div class="text-red-700 mt-1 text-xs">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="nisn" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            NISN</label>
                        <input type="text" id="nisn" name="nisn"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('nisn') is_invalid @enderror"
                            placeholder="NISN" autofocus value="{{ old('nisn', $student->nisn) }}">
                        @error('nisn')
                            <div class="text-red-700 mt-1 text-xs">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="nama_siswa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                            Siswa</label>
                        <input type="text" id="nama_siswa" name="nama_siswa"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('nama_siswa') is_invalid @enderror"
                            placeholder="Budi Laksono" autofocus value="{{ old('nama_siswa', $student->nama_siswa) }}">
                        @error('nama_siswa')
                            <div class="text-red-700 mt-1 text-xs">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="kelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                            Kelamin</label>
                        <select id="kelamin" name="kelamin"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('kelamin') is_invalid @enderror"
                            autofocus>
                            <option disabled {{ old('kelamin', $student->kelamin) == null ? 'selected' : '' }}>Pilih Jenis
                                Kelamin</option>
                            <option value="Laki-Laki"
                                {{ old('kelamin', $student->kelamin) == 'Laki-Laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan"
                                {{ old('kelamin', $student->kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div>
                        <label for="tempat_lahir"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat
                            Lahir</label>
                        <input type="text" id="tempat_lahir" name="tempat_lahir"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  @error('tempat_lahir') is_invalid @enderror"
                            placeholder="Bogor" autofocus value="{{ old('tempat_lahir', $student->tempat_lahir) }}">
                    </div>
                    <div>
                        <label for="tgl_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                            Lahir</label>

                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input id="tgl_lahir" name="tgl_lahir" datepicker date datepicker-format="yyyy-mm-dd"
                                type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Select date" autofocus
                                value="{{ old('tempat_lahir', $student->tgl_lahir) }}">
                        </div>
                    </div>
                    <div>
                        <label for="nama_ayah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                            Ayah</label>
                        <input type="text" id="nama_ayah" name="nama_ayah"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('nama_ayah') is_invalid @enderror"
                            placeholder="" autofocus value="{{ old('nama_ayah', $student->nama_ayah) }}">
                        @error('nama_ayah')
                            <div class="text-red-700 mt-1 text-xs">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="nama_ibu" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Nama Ibu</label>
                        <input type="text" id="nama_ibu" name="nama_ibu"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('nama_ibu') is_invalid @enderror"
                            placeholder="" autofocus value="{{ old('nama_ibu', $student->nama_ibu) }}">
                        @error('nama_ibu')
                            <div class="text-red-700 mt-1 text-xs">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-6">
                    <label for="alamat"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                    <input type="alamat" id="alamat" name="alamat"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('alamat') is_invalid @enderror"
                        placeholder="" autofocus value="{{ old('alamat', $student->alamat) }}">
                    @error('alamat')
                        <div class="text-red-700 mt-1 text-xs">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="kelas"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
                        <input type="text" id="kelas" name="kelas"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('alamat') is_invalid @enderror"
                            placeholder="XII-A" autofocus value="{{ old('alamat', $student->kelas) }}">
                        @error('alamat')
                            <div class="text-red-700 mt-1 text-xs">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="periode" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Periode Kelulusan</label>
                        <input type="text" id="2019" name="periode"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('periode') is_invalid @enderror"
                            placeholder="2019" autofocus value="{{ old('periode', $student->periode) }}">
                        @error('periode')
                            <div class="text-red-700 mt-1 text-xs">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">UPDATE</button>
            </div>

    </form>
@endsection
