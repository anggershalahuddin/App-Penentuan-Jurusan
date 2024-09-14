@extends('dashboard.layouts.main')
@section('title', 'Grafik')
@section('container')

    {{-- Ini Bagian Head --}}
    <div class="pb-2 mb-10 border-b border-secondary flex flex-row justify-between items-end">
        <h1 class="font-semibold text-slate-700 text-3xl ">Grafik Hasil Clusterisasi
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
                            class="cursor-default ms-1 text-sm font-medium {{ Request::is('dashboard/charts') ? 'text-blue-600' : '' }} md:ms-2">Grafik</a>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    {{-- Bagian Chart --}}
    <div class="md:h-full grid grid-cols-[45%_55%] space-x-5 ">
        <span class="w-full h-full grid grid-rows-[55%_45%] space-y-2 ">
            <span class="pt-5 pb-2 bg-white border-gray-400 border rounded-xl shadow-md">
                <div id="refererPieChart" class="h-full w-full">
                </div>
            </span>
            <span class="pt-5 pb-2 bg-white border-gray-400 border rounded-xl shadow-md">
                <div id="rumpunPieChart" class="h-full">
                </div>
            </span>
        </span>
        <span>
            <div id="barChart" class="pt-5 px-5 pb-2 bg-white border-gray-400 border shadow-md rounded-xl w-full h-full">
            </div>
        </span>
    </div>

    @include('dashboard.charts.partials.chart')
@endsection
