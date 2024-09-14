<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="./css/dashboard.css">
    <link rel="icon" href="/img/logo-dm.jpg" type="image/jpg">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>
    <title>@yield('title', 'Dashboard')</title>
</head>

<body class="font-poppins bg-white flex h-screen overflow-hidden">

    @include('dashboard.layouts.sidebar')

    @include('dashboard.layouts.navbar')

    <div class="bg-[#F6F7FB] w-[calc(100%-18rem)] mt-16 pb-10 px-7 pt-10 overflow-y-auto flex flex-col">
        @yield('container')
    </div>

    <script src="/js/dashboard.js"></script>
</body>


</html>
