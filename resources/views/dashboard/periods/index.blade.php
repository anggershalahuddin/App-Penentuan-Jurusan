@extends('dashboard.layouts.main')
@section('container')
    {{-- Header --}}
    <h1 class="font-semibold text-slate-700 text-3xl pb-2 mb-9 border-b border-secondary">Daftar Tahun Kelulusan
    </h1>
    {{-- End Hero --}}

    {{-- Search - Button Action --}}
    <div class="flex flex-row justify-between items-center mb-5">
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
        <div class="flex flex-row rounded-md shadow-sm h-full" role="group">
            <a href="#"
                class="flex flex-row items-center px-4 text-sm font-medium text-white bg-blue-600 border-r-2 border-blue-950 rounded-s-lg hover:bg-blue-800 focus:bg-blue-800">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5 mr-2">
                    <path fill-rule="evenodd"
                        d="M10.5 3.75a6 6 0 0 0-5.98 6.496A5.25 5.25 0 0 0 6.75 20.25H18a4.5 4.5 0 0 0 2.206-8.423 3.75 3.75 0 0 0-4.133-4.303A6.001 6.001 0 0 0 10.5 3.75Zm2.25 6a.75.75 0 0 0-1.5 0v4.94l-1.72-1.72a.75.75 0 0 0-1.06 1.06l3 3a.75.75 0 0 0 1.06 0l3-3a.75.75 0 1 0-1.06-1.06l-1.72 1.72V9.75Z"
                        clip-rule="evenodd" />
                </svg>
                Export Data
            </a>
            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown-tambah"
                class="flex flex-row items-center px-4 text-sm font-medium text-white bg-blue-600 rounded-e-lg hover:bg-blue-800 focus:bg-blue-800"
                type="button">Tambah Siswa<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
            </button>

            <!-- Dropdown menu -->
            <div id="dropdown-tambah" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
                    <li>
                        <a href="/dashboard/periods/create"
                            class="block px-4 py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">Input
                            Data</a>
                    </li>
                    <li>
                        <button onclick="openUpdateModal()"
                            class="w-full px-4 flex justify-start py-2 hover:bg-gray-200 dark:hover:bg-gray-600 dark:hover:text-white">
                            Upload Data
                        </button>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    {{-- End Search - Button Action --}}

    {{-- Table --}}
    <div id="table-container">
        @include('dashboard.periods.partials.table')
    </div>
    {{-- End Table --}}








    <div id="UploadModal"
        class="fixed z-20 right-0 inset-0 bg-black bg-opacity-50 justify-center items-center shadow-lg shadow-black hidden opacity-0 transition-opacity duration-300">
        @include('dashboard.periods.partials.upload-modal')

    </div>

    <div id="DeleteModalPeriod"
        class="fixed z-20 right-0 inset-0 bg-black bg-opacity-50 justify-center items-center shadow-lg shadow-black hidden opacity-0 transition-opacity duration-300">
        @include('dashboard.periods.partials.delete-modal')
    </div>

    @if (session()->has('success'))
        @include('dashboard.periods.partials.alert-success')
    @endif
    {{-- End Alert Succes Section --}}

    @if (session()->has('importError'))
        @include('dashboard.periods.partials.alert-error')
    @endif


    <script>
        $(document).ready(function() {
            $("#table-search").on("keyup", function() {
                let query = $(this).val();
                $.ajax({
                    url: "{{ route('dashboard.periods.index') }}",
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
