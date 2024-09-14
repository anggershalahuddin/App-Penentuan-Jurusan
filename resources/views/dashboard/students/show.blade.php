@extends('dashboard.layouts.main')
@section('title', 'Siswa | Detail Siswa')
@section('container')

    {{-- ini adalah bagian Header Student Page - DETAIL DATA --}}
    <div class="pb-2 mb-9 border-b border-secondary flex flex-row justify-between items-end">
        <h1 class="font-semibold text-slate-700 text-3xl">Detail Siswa
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
                            class="cursor-default ms-1 text-sm font-medium {{ Request::is('dashboard/students/*') ? 'text-blue-600' : '' }} hover:text-blue-600 md:ms-2">Detail
                            Siswa</a>
                    </div>
                </li>

            </ol>
        </nav>
    </div>

    {{-- ini adalah bagian Form - DETAIL DATA --}}
    <div class="flex flex-col">
        <div class="relative overflow-hidden mb-4 flex flex-row bg-white rounded-lg shadow">
            <div class="h-full bg-gray-300 px-5 pt-5">
                <img src="/img/siswa.jpg" alt="students" class="size-28">
            </div>
            <div class="flex flex-col py-5 px-5 w-full">
                <div class="mb-5 border-b-2 font-semibold text-xl pb-3 flex flex-row justify-between items-end">
                    <h3 class="text-red-600 text-2xl">
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
                <div class="flex flex-row">
                    <div class=" flex flex-col gap-3 font-semibold">
                        <p>No Induk</p>
                        <p>NISN</p>
                        <p>Nama Lengkap</p>
                        <p>jenis Kelamin</p>
                        <p>Tempat, Tanggal Lahir</p>
                        <p>Nama Ayah</p>
                        <p>Nama Ibu</p>
                        <p>Alamat</p>
                        <p>Kelas</p>
                        <p>Tahun Kelulusan</p>
                    </div>
                    <div class="ml-16 flex flex-col gap-3">
                        <p>: {{ $student->nis }}</p>
                        <p>: {{ $student->nisn }}</p>
                        <p>: {{ $student->nama_siswa }}</p>
                        <p>: {{ $student->kelamin }}</p>
                        <p>: {{ $student->tempat_lahir }},
                            {{ \Carbon\Carbon::parse($student->tgl_lahir)->locale('id')->translatedFormat('d F Y') }}</p>
                        <p>: {{ $student->nama_ayah }}</p>
                        <p>: {{ $student->nama_ibu }}</p>
                        <p>: {{ $student->alamat }}</p>
                        <p>: {{ $student->kelas }}</p>
                        <p>: {{ $student->periode }}</p>
                    </div>
                </div>
                <div class="flex flex-row gap-4 mt-10">
                    <a href="/dashboard/students/{{ $student->id }}/edit"
                        class="w-28 bg-blue-600 text-white flex items-center justify-center hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-md text-sm px-5 py-2.5 text-center">
                        EDIT DATA
                    </a>
                    <button type="button" onclick="openDeleteModalStudent({{ $student->id }})"
                        class="w-28 bg-red-600 text-white flex items-center justify-center hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-md text-sm px-5 py-2.5 text-center">
                        HAPUS
                    </button>
                </div>
            </div>
        </div>

        {{-- Ini bagian DELETE MODAL --}}
        @include('dashboard.students.partials.delete-modal')
    @endsection
