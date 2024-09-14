@extends('dashboard.layouts.main')
@section('title', 'Nilai Siswa')
@section('container')

    {{-- ini adalah bagian Header VALUE PAGE --}}
    <div class="pb-2 mb-9 border-b border-secondary flex flex-row justify-between items-end">
        <h1 class="font-semibold text-slate-700 text-3xl ">Daftar Nilai
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
                            class="cursor-default ms-1 text-sm font-medium {{ Request::is('dashboard/values') ? 'text-blue-600' : '' }} md:ms-2">Nilai</a>
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
    </div>

    {{-- Ini adalah bagian Table --}}
    <div id="table-container"
        class="overflow-auto rounded-lg scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-gray-100 mb-5">
        <div>
            @include('dashboard.values.partials.table')
        </div>
    </div>
    {{-- Paginate Table --}}
    @include('dashboard.values.partials.paginate')

    {{-- Modal -> DELETE --}}
    @include('dashboard.values.partials.delete-modal')

    {{-- ini adalah bagian untuk menampilkan SUCCESS ALERT --}}
    @if (session()->has('success'))
        @include('dashboard.values.partials.alert-success')
    @endif

    {{-- Ini adalah bagian AJAX untuk Searching --}}
    <script>
        $(document).ready(function() {
            $("#table-search").on("keyup", function() {
                let query = $(this).val();
                $.ajax({
                    url: "{{ route('dashboard.values.index') }}",
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
