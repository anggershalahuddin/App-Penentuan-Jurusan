<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" href="/img/logo-dm.jpg" type="image/jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>@yield('title', 'Home')</title>
</head>

<body class="font-poppins h-screen bg-login bg-cover overflow-hidden">

    <!-- Navigation -->
    <nav
        class="bbg-clip-padding backdrop-filter backdrop-blur-md bg-opacity-50 fixed w-full h-20 flex flex-row justify-end top-0 left-0 px-16 z-20">
        <ul class="flex flex-row items-center font-medium space-x-5 p-4">
            <li>
                <a href="/"
                    class="{{ Request::is('/') ? 'border-b-2 border-white' : '' }} text-white border-white hover:border-b-2 hover:border-white pb-2 transition ease-in-out"
                    aria-current="page">Home</a>
            </li>
            <li>
                <a href="/information"
                    class="{{ Request::is('information') ? 'border-b-2 border-white' : '' }} text-white border-white hover:border-b-2 hover:border-white pb-2 transition ease-in-out">Pengumuman</a>
            </li>
            <li>
                <a href="/login"
                    class="{{ Request::is('login') ? 'hidden' : '' }} text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center">Login</a>
            </li>
        </ul>
    </nav>
    <!-- Content -->


    <!-- Main Content -->
    @yield('container')

    <!-- Footer -->
    <footer
        class="{{ Request::is('login') || Request::is('information') ? 'hidden' : '' }} fixed bottom-0 bg-blue-900 text-white flex flex-row items-center justify-between w-full h-14 px-16">
        <div class="font-medium">
            K-MEANS CLUSTERING
        </div>
        <div>
            SISTEM PENENTUAN JURUSAN -- MA DAARUL MUGHNI
        </div>
    </footer>
</body>


</html>
