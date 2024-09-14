@extends('dashboard.layouts.main')
@section('title', 'Daftar Siswa')
@section('container')

    {{-- ini adalah bagian Header Student Page --}}
    <div class="pb-2 mb-9 border-b border-secondary flex flex-row justify-between items-end">
        <h1 class="font-semibold text-slate-700 text-3xl ">Daftar Siswa
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
                        <a
                            class="cursor-default ms-1 text-sm font-medium {{ Request::is('dashboard/students') ? 'text-blue-600' : '' }} md:ms-2">Siswa</a>
                    </div>
                </li>

            </ol>
        </nav>
    </div>


    {{-- Ini adalah Bagian Action -> Search & Add Data --}}
    <div class="flex flex-row justify-between items-center mb-5">

        {{-- Ini adalah SEARCH --}}
        <div class="relative">
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="text" id="table-search"
                class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-400 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Cari siswa">
        </div>

        {{-- Ini adalah EXPORT & ADD Data --}}
        <div class="flex flex-row rounded-md shadow-sm h-full" role="group">

            {{-- Ini adalah EXPORT --}}
            <a href="{{ route('export.students') }}"
                class="flex flex-row items-center px-4 text-sm font-medium text-white bg-blue-600 border-r-2 border-blue-700 rounded-s-lg hover:bg-blue-700 focus:bg-blue-700">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5 mr-2">
                    <path fill-rule="evenodd"
                        d="M10.5 3.75a6 6 0 0 0-5.98 6.496A5.25 5.25 0 0 0 6.75 20.25H18a4.5 4.5 0 0 0 2.206-8.423 3.75 3.75 0 0 0-4.133-4.303A6.001 6.001 0 0 0 10.5 3.75Zm2.25 6a.75.75 0 0 0-1.5 0v4.94l-1.72-1.72a.75.75 0 0 0-1.06 1.06l3 3a.75.75 0 0 0 1.06 0l3-3a.75.75 0 1 0-1.06-1.06l-1.72 1.72V9.75Z"
                        clip-rule="evenodd" />
                </svg>
                Export Data
            </a>

            {{-- Ini adalah ADD DATA --}}
            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown-tambah"
                class="flex flex-row items-center px-4 text-sm font-medium text-white bg-blue-600 rounded-e-lg hover:bg-blue-700 focus:bg-blue-700"
                type="button">Tambah Siswa<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
            </button>
            <div id="dropdown-tambah" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
                    <li>
                        <a href="/dashboard/students/create" class="block px-4 py-2 hover:bg-gray-200 font-medium">Input
                            Data</a>
                    </li>
                    <li>
                        <button onclick="openUploadModal()"
                            class="w-full px-4 flex justify-start py-2 hover:bg-gray-200 font-medium">
                            Upload Data
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    {{-- Ini adalah bagian Table --}}
    <div id="table-container"
        class="overflow-auto rounded-lg scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-gray-100 mb-5">
        @include('dashboard.students.partials.table')
    </div>
    {{-- Paginate Table --}}
    @include('dashboard.students.partials.paginate')

    {{-- Modal -> Upload & Delete --}}
    @include('dashboard.students.partials.upload-modal')
    @include('dashboard.students.partials.delete-modal')

    {{-- ini adalah bagian untuk menampilkan SUCCESS ALERT & ERROR ALERT --}}
    @if (session()->has('success'))
        @include('dashboard.students.partials.alert-success')
    @endif
    @if (session()->has('importError'))
        @include('dashboard.students.partials.alert-error')
    @endif

    {{-- Ini adalah bagian AJAX untuk Searching --}}
    <script>
        $(document).ready(function() {
            $("#table-search").on("keyup", function() {
                let query = $(this).val();
                $.ajax({
                    url: "{{ route('dashboard.students.index') }}",
                    type: "GET",
                    data: {
                        search: query,
                    },
                    success: function(data) {
                        $("#table-container").html(data);
                    },
                });
            });
        });
    </script>
@endsection
