@extends('homepages.layouts.main')
@section('title', 'Informasi')
@section('container')
    <div class="h-full w-full mb-2 pt-32 px-12 flex flex-col items-center overflow-y-auto overflow-x-hidden">
        <div class="flex flex-col items-center gap-2 mb-8 text-white">
            <h1 class="text-2xl font-semibold">PENGUMUMAN</h1>
            <h2 class="text-4xl font-semibold">Hasil Penentuan Jurusan Kuliah</h2>
        </div>

        <div class="w-full">
            {{-- Ini adalah bagian Table --}}
            <div id="table-container" class="bg-white shadow-md mb-5 rounded-t-xl">
                <div class="overflow-x-auto rounded-t-xl scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-gray-100">
                    @include('homepages.partials.table-informasi')
                </div>
            </div>
        </div>

    </div>


@endsection
