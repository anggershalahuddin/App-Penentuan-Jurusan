@extends('dashboard.layouts.main')
@section('title', 'Hasil')
@section('container')

    <div class="pb-2 mb-10 border-b border-secondary flex flex-row justify-between items-end">
        <h1 class="font-semibold text-slate-700 text-3xl ">Data Hasil Clusterisasi
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
                            class="cursor-default ms-1 text-sm font-medium {{ Request::is('dashboard/iterations') ? 'text-blue-600' : '' }} md:ms-2">Iterasi</a>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
    <div class="flex flex-row justify-end border-b-2 border-gray-300 pb-3 mb-5">
        {{-- Ini adalah EXPORT --}}
        <a href="{{ route('export.results') }}"
            class="flex flex-row items-center px-4 text-sm font-medium text-white bg-blue-600 border-r-2 border-blue-700 rounded-s-lg hover:bg-blue-800 focus:bg-blue-800">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5 mr-2">
                <path fill-rule="evenodd"
                    d="M10.5 3.75a6 6 0 0 0-5.98 6.496A5.25 5.25 0 0 0 6.75 20.25H18a4.5 4.5 0 0 0 2.206-8.423 3.75 3.75 0 0 0-4.133-4.303A6.001 6.001 0 0 0 10.5 3.75Zm2.25 6a.75.75 0 0 0-1.5 0v4.94l-1.72-1.72a.75.75 0 0 0-1.06 1.06l3 3a.75.75 0 0 0 1.06 0l3-3a.75.75 0 1 0-1.06-1.06l-1.72 1.72V9.75Z"
                    clip-rule="evenodd" />
            </svg>
            Export Data
        </a>
        <a href="/dashboard/iterations/proses/iterasi"
            class="bg-amber-600 hover:bg-amber-700 py-2 px-4 w-fit rounded-r-md text-white font-medium">Proses
            Perhitungan</a>

    </div>


    {{-- Ini adalah bagian Table --}}
    <div id="table-container" class="bg-white shadow-md mb-5 rounded-lg">
        <div class="overflow-x-auto rounded-lg scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-gray-100">
            @include('dashboard.iterations.partials.table-hasil')
        </div>
    </div>

    {{-- Paginate Table --}}
    {{-- @include('dashboard.iterations.partials.paginate') --}}
@endsection
