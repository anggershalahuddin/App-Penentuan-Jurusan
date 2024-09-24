@extends('homepages.layouts.main')
@section('title', 'Login')
@section('container')

    <div class="flex max-h-screen items-center justify-center font-inter bg-login bg-cover">
        <div class="w-full h-screen bg-cover text-white grid grid-cols-2">

            {{-- Ini adalah Bagian Informasi --}}
            <section class="flex flex-col items-center justify-center">
                <span class="ml-36 mr-16 max-w-3xl">
                    <img src="./img/MA.png" alt="" class="w-72 mb-36 ">
                    <div class="flex flex-col gap-4">
                        <h1 class="text-3xl
                    font-bold">Aplikasi
                            Penentuan Jurusan Kuliah</h1>
                        <p class="text-justify " style="">Aplikasi ini dibuat
                            untuk melakukan klusterisasi
                            jurusan kuliah berdasarkan
                            nilai akademik siswa kelas XII, yang
                            bertujuan untuk
                            memberikan rekomendasi jurusan kuliah yang tepat bagi siswa kelas XII melalui implementasi
                            Algortima K-Means Clustering.</p>
                    </div>
                </span>
            </section>


            {{-- Ini bagian Form Login --}}
            <section class="flex justify-center items-center">
                <span
                    class="flex flex-col justify-center items-center mr-36 ml-16 pl-10 pr-7 py-10 w-2/3 h-fit rounded-xl bg-white text-black max-w-lg shadow-[0px_0px_37px_0px_rgba(3,_0,_70,_0.81)]">
                    <div class="mb-20 flex flex-col w-full justify-start">
                        <h4 class="font-semibold">Welcome</h4>
                        <h2 class="font-bold text-2xl">Log In to Your Account</h2>
                    </div>


                    {{-- Ini bagian Alert SUCCES & ERROR --}}
                    @if (session()->has('success'))
                        @include('homepages.partials.succes-alert')
                    @endif
                    @if (session()->has('loginError'))
                        @include('homepages.partials.error-alert')
                    @endif


                    {{-- Ini bagian Form --}}
                    <form action="/login" method="POST" class="w-full flex flex-col gap-4">
                        @csrf
                        <div>
                            <input required type="text" name="username" id="username" placeholder="Enter Username"
                                value="{{ old('username') }}" autofocus @error('username') is-invalid @enderror
                                class="w-full h-14 border border-black rounded-lg px-3 py-5 text-md font-base placeholder:text-base placeholder:font-base">
                            @error('username')
                                <div class="invalid-feedback text-red-700 text-sm mt-1">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="relative">
                            <input required type="password" name="password" id="password" placeholder="Enter Password"
                                class="px-3 pr-10 w-full border border-black h-14 rounded-lg text-md font-base placeholder:text-base placeholder:font-base">
                            <div class="absolute inset-y-0 right-3 flex items-center cursor-pointer">
                                <i id="toggle-password" class="fas fa-eye text-slate-500"></i>
                            </div>
                        </div>
                        <button type="submit"
                            class="h-14 text-white font-semibold bg-blue-900 rounded-lg px-3 hover:bg-blue-800 drop-shadow-xl">Log
                            In</button>
                    </form>

                    {{-- <div class="w-full mt-5 flex flex-col justify-center items-center">
                    <p class="font-semibold">Anda belum memiliki akun?</p>
                    <p class="text-sm">Hubungi Admin Aplikasi</p>
                    <a href="/register" class="font-medium text-sm text-blue-600">Register akun anda disini!!</a>
                </div> --}}
                    {{-- End Form Section --}}

                </span>
            </section>
        </div>
    </div>
@endsection
