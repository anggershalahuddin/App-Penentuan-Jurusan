@extends('homepages.layouts.main')
@section('title', 'Home')
@section('container')
    <div class="flex flex-row items-center px-20 gap-10">
        <div>
            <img src="/img/logo-dm.jpg" alt="logo-dm" class="bg-cover size-40">
        </div>
        <div class="h-screen flex flex-col justify-center text-white">
            <p class="text-3xl mb-5 font-medium">Selamat Datang Di</p>
            <h1 class="text-5xl mb-3 font-bold">Sistem Penentuan Jurusan Kuliah</h1>
            <p class="text-4xl font-semibold">Madrasah Aliyah Daarul Mughni</p>
        </div>
    </div>
@endsection
