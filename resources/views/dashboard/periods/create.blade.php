@extends('dashboard.layouts.main')

@section('container')
    <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
        <!-- Modal header -->
        <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                Tambah Data Siswa
            </h3>
            <a href="/dashboard/periods"
                class="flex flex-row items-center text-sm gap-2 bg-slate-400 hover:bg-slate-500 text-white rounded-md py-1 px-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
                <p>Kembali</p>
            </a>

        </div>
        <!-- End header -->

        <!-- Modal body -->
        <form method="post" action="/dashboard/periods">
            {{-- method post dan action /periods ini kalau digabung akan mengarah ke controller yang method nya store --}}

            @csrf
            <div class="grid gap-4 mb-4 sm:grid-row-2 md:grid-cols-2">
                <div>
                    <label for="tahun" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun
                        Pelajaran</label>
                    <input type="text" name="tahun" id="tahun"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5
                            @error('tahun') is_invalid @enderror"
                        placeholder="cth : 2019" autofocus value="{{ old('tahun') }}">
                    @error('tahun')
                        <div class="text-red-700 mt-1 text-xs">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun
                        Pelajaran</label>
                    <input type="text" name="keterangan" id="keterangan"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5
                            @error('keterangan') is_invalid @enderror"
                        placeholder="cth : Madani 14" autofocus value="{{ old('keterangan') }}">
                    @error('keterangan')
                        <div class="text-red-700 mt-1 text-xs">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            </div>
            <button type="submit"
                class="mt-5 text-white bg-blue-600 hover:bg-blue-700 inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-md text-sm px-3 py-2.5 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5 mr-2">
                    <path fill-rule="evenodd"
                        d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z"
                        clip-rule="evenodd" />
                </svg>
                Simpan </button>
        </form>
        <!-- End Modal body -->

    </div>
@endsection()
