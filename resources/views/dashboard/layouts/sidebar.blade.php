<aside id="logo-sidebar"
    class="text-slate-500 text-sm font-medium w-72 min-h-screen bg-white border-r-2 border-border overflow-auto flex flex-col justify-between py-16 z-10"
    aria-label="Sidebar">

    {{-- Bagian Logo --}}
    <a href="/dashboard" class="">
        <img class="bg-cover w-48 ml-9 mb-14" src="/img/ma-dm.png" alt="aeon image">
    </a>

    {{-- Bagian LIST ITEM --}}
    <div class="flex flex-col h-full">

        {{-- Bagian List Item -> MENU --}}
        <div class="px-5 flex flex-col mb-10">

            {{-- CAPTION --}}
            <p class="text-caption font-medium border-b-2 border-slate-400 mb-2">
                MENU
            </p>

            <ul class="flex flex-col gap-1">

                {{-- Bagian List Item -> MENU -> DASHBOARD --}}
                <a href="/dashboard"
                    class="list-menu flex flex-row items-center {{ Request::is('dashboard') ? 'text-white bg-gradient-to-r from-blue-600 to-green-400' : 'text-slate-500' }} hover:text-white hover:bg-gradient-to-r from-blue-600 to-green-400 rounded-md px-5 py-3 transition duration-75 group cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="size-5 {{ Request::is('dashboard') ? 'text-white' : 'text-slate-500' }} group-hover:text-white">
                        <path
                            d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                        <path
                            d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                    </svg>

                    <span class="ml-4">Dashboard</span>
                </a>

                {{-- Bagian List Item -> MENU -> DATA MASTER --}}
                <li>
                    <button type="button"
                        class="w-full flex flex-row items-center {{ Request::is('dashboard/student*') || Request::is('dashboard/student*') ? 'text-blue-500' : 'text-slate-500' }} hover:text-blue-500 rounded-md px-5 py-3 transition duration-75 group"
                        aria-controls="dropdown-pages" data-collapse-toggle="dropdown-pages">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="size-5 {{ Request::is('dashboard/student*') || Request::is('dashboard/student*') ? 'text-blue-500' : 'text-slate-500' }} group-hover:text-blue-500">
                            <path fill-rule="evenodd"
                                d="M7.5 5.25a3 3 0 0 1 3-3h3a3 3 0 0 1 3 3v.205c.933.085 1.857.197 2.774.334 1.454.218 2.476 1.483 2.476 2.917v3.033c0 1.211-.734 2.352-1.936 2.752A24.726 24.726 0 0 1 12 15.75c-2.73 0-5.357-.442-7.814-1.259-1.202-.4-1.936-1.541-1.936-2.752V8.706c0-1.434 1.022-2.7 2.476-2.917A48.814 48.814 0 0 1 7.5 5.455V5.25Zm7.5 0v.09a49.488 49.488 0 0 0-6 0v-.09a1.5 1.5 0 0 1 1.5-1.5h3a1.5 1.5 0 0 1 1.5 1.5Zm-3 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"
                                clip-rule="evenodd" />
                            <path
                                d="M3 18.4v-2.796a4.3 4.3 0 0 0 .713.31A26.226 26.226 0 0 0 12 17.25c2.892 0 5.68-.468 8.287-1.335.252-.084.49-.189.713-.311V18.4c0 1.452-1.047 2.728-2.523 2.923-2.12.282-4.282.427-6.477.427a49.19 49.19 0 0 1-6.477-.427C4.047 21.128 3 19.852 3 18.4Z" />
                        </svg>
                        <span class="ml-4 flex flex-row items-center justify-between w-full">
                            <p>
                                Data Master
                            </p>
                            <svg aria-hidden="true" class="size-4" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                    </button>

                    <ul id="dropdown-pages"
                        class="{{ Request::is('dashboard/students*') || Request::is('dashboard/values*') ? '' : 'hidden' }} flex flex-col gap-1">
                        <a href="/dashboard/students"
                            class="list-menu flex flex-row items-center {{ Request::is('dashboard/students*') ? 'text-white bg-gradient-to-r from-blue-600 to-green-400' : 'text-slate-500' }} hover:text-white hover:bg-gradient-to-r from-blue-600 to-green-400 rounded-md px-5 py-2 transition duration-75 group cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-5 {{ Request::is('dashboard/students*') ? 'text-white' : 'text-slate-500' }} group-hover:text-white">
                                <path fill-rule="evenodd"
                                    d="M10.5 6a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm0 6a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm0 6a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="ml-3">Data Siswa</span>
                        </a>
                        <a href="/dashboard/values"
                            class="list-menu flex flex-row items-center {{ Request::is('dashboard/values*') ? 'text-white bg-gradient-to-r from-blue-600 to-green-400' : 'text-slate-500' }} hover:text-white hover:bg-gradient-to-r from-blue-600 to-green-400 rounded-md px-5 py-2 transition duration-75 group cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-5 {{ Request::is('dashboard/values*') ? 'text-white' : 'text-slate-500' }} group-hover:text-white">
                                <path fill-rule="evenodd"
                                    d="M10.5 6a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm0 6a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm0 6a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="ml-3">Data Nilai</span>
                        </a>
                    </ul>
                </li>

                {{-- Bagian List Item -> MENU -> K-MEANS --}}
                <li>
                    <button type="button"
                        class="button-k-means w-full flex flex-row items-center {{ Request::is('dashboard/centroids*') || Request::is('dashboard/iteration*') || Request::is('dashboard/charts*') ? 'text-blue-500' : 'text-slate-500' }} hover:text-blue-500 rounded-md px-5 py-3 transition duration-75 group"
                        aria-controls="dropdown-sales" data-collapse-toggle="dropdown-sales">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="size-5 {{ Request::is('dashboard/centroids*') || Request::is('dashboard/iteration*') || Request::is('dashboard/charts*') ? 'text-blue-500' : 'text-slate-500' }} group-hover:text-blue-500">
                            <path fill-rule="evenodd"
                                d="M2.25 2.25a.75.75 0 0 0 0 1.5H3v10.5a3 3 0 0 0 3 3h1.21l-1.172 3.513a.75.75 0 0 0 1.424.474l.329-.987h8.418l.33.987a.75.75 0 0 0 1.422-.474l-1.17-3.513H18a3 3 0 0 0 3-3V3.75h.75a.75.75 0 0 0 0-1.5H2.25Zm6.04 16.5.5-1.5h6.42l.5 1.5H8.29Zm7.46-12a.75.75 0 0 0-1.5 0v6a.75.75 0 0 0 1.5 0v-6Zm-3 2.25a.75.75 0 0 0-1.5 0v3.75a.75.75 0 0 0 1.5 0V9Zm-3 2.25a.75.75 0 0 0-1.5 0v1.5a.75.75 0 0 0 1.5 0v-1.5Z"
                                clip-rule="evenodd" />
                        </svg>

                        <span class="ml-4 flex flex-row items-center justify-between w-full">
                            <p>
                                K-Means Clustering
                            </p>
                            <svg aria-hidden="true" class="size-4" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                    </button>

                    <ul id="dropdown-sales"
                        class="{{ Request::is('dashboard/centroids*') || Request::is('dashboard/iteration*') || Request::is('dashboard/charts*') ? '' : 'hidden' }} flex flex-col gap-1">

                        <a href="/dashboard/centroids"
                            class="list-menu flex flex-row items-center {{ Request::is('dashboard/centroids*') ? 'text-white bg-gradient-to-r from-blue-600 to-green-400' : 'text-slate-500' }} hover:text-white hover:bg-gradient-to-r from-blue-600 to-green-400 rounded-md px-5 py-2 transition duration-75 group cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-5 {{ Request::is('dashboard/centroids*') ? 'text-white' : 'text-slate-500' }} group-hover:text-white">
                                <path fill-rule="evenodd"
                                    d="M10.5 6a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm0 6a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm0 6a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="ml-3">Centroid</span>
                        </a>

                        <a href="/dashboard/iterations"
                            class="list-menu flex flex-row items-center {{ Request::is('dashboard/iterations*') ? 'text-white bg-gradient-to-r from-blue-600 to-green-400' : 'text-slate-500' }} hover:text-white hover:bg-gradient-to-r from-blue-600 to-green-400 rounded-md px-5 py-2 transition duration-75 group cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-5 {{ Request::is('dashboard/iterations*') ? 'text-white' : 'text-slate-500' }} group-hover:text-white">
                                <path fill-rule="evenodd"
                                    d="M10.5 6a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm0 6a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm0 6a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="ml-3">Iterasi</span>
                        </a>

                        <a href="/dashboard/charts"
                            class="list-menu flex flex-row items-center {{ Request::is('dashboard/charts*') ? 'text-white bg-gradient-to-r from-blue-600 to-green-400' : 'text-slate-500' }} hover:text-white hover:bg-gradient-to-r from-blue-600 to-green-400 rounded-md px-5 py-2 transition duration-75 group cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-5 {{ Request::is('dashboard/charts*') ? 'text-white' : 'text-slate-500' }} group-hover:text-white">
                                <path fill-rule="evenodd"
                                    d="M10.5 6a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm0 6a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm0 6a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="ml-3">Grafik</span>
                        </a>
                    </ul>
                </li>
            </ul>
        </div>



        {{-- Bagian List Item -> MENU --}}
        <div class="px-5 flex flex-col">
            {{-- CAPTION --}}
            <p class="text-caption font-medium pl-5 border-b-2 border-border mb-2">
                OTHERS
            </p>

            <button onclick="openEditAccountModal()"
                class="flex flex-row items-center {{ Request::is('dashboard/manage-user') ? 'text-white bg-gradient-to-r from-blue-600 to-green-400' : 'text-slate-500' }} hover:text-white hover:bg-gradient-to-r from-blue-600 to-green-400 rounded-md px-5 py-3 transition duration-75 group cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="size-5 {{ Request::is('dashboard/manage-user') ? 'text-white' : 'text-slate-500' }} group-hover:text-white">
                    <path fill-rule="evenodd"
                        d="M8.25 6.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM15.75 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM2.25 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM6.31 15.117A6.745 6.745 0 0 1 12 12a6.745 6.745 0 0 1 6.709 7.498.75.75 0 0 1-.372.568A12.696 12.696 0 0 1 12 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 0 1-.372-.568 6.787 6.787 0 0 1 1.019-4.38Z"
                        clip-rule="evenodd" />
                    <path
                        d="M5.082 14.254a8.287 8.287 0 0 0-1.308 5.135 9.687 9.687 0 0 1-1.764-.44l-.115-.04a.563.563 0 0 1-.373-.487l-.01-.121a3.75 3.75 0 0 1 3.57-4.047ZM20.226 19.389a8.287 8.287 0 0 0-1.308-5.135 3.75 3.75 0 0 1 3.57 4.047l-.01.121a.563.563 0 0 1-.373.486l-.115.04c-.567.2-1.156.349-1.764.441Z" />
                </svg>
                <span class="ml-4">Manage User</span>
            </button>

            <form action="/logout" method="post">
                @csrf
                <button type="submit"
                    class="w-full flex flex-row items-center text-red-600 hover:text-white hover:bg-gradient-to-r from-red-600 to-pink-400 rounded-md px-5 py-3 transition duration-75 group cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="size-5 group-hover:text-white">
                        <path fill-rule="evenodd" transform="rotate(180 12 12)"
                            d="M16.5 3.75a1.5 1.5 0 0 1 1.5 1.5v13.5a1.5 1.5 0 0 1-1.5 1.5h-6a1.5 1.5 0 0 1-1.5-1.5V15a.75.75 0 0 0-1.5 0v3.75a3 3 0 0 0 3 3h6a3 3 0 0 0 3-3V5.25a3 3 0 0 0-3-3h-6a3 3 0 0 0-3 3V9A.75.75 0 1 0 9 9V5.25a1.5 1.5 0 0 1 1.5-1.5h6ZM5.78 8.47a.75.75 0 0 0-1.06 0l-3 3a.75.75 0 0 0 0 1.06l3 3a.75.75 0 0 0 1.06-1.06l-1.72-1.72H15a.75.75 0 0 0 0-1.5H4.06l1.72-1.72a.75.75 0 0 0 0-1.06Z"
                            clip-rule="evenodd" />
                    </svg>
                    <p class="ml-4">Sign out</p>
                </button>
            </form>
            </ul>
        </div>
    </div>
</aside>

@include('dashboard.manage-user.index')
