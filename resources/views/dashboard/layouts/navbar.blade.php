<nav
    class="bg-[#F6F7FB] h-16 fixed top-0 right-0 z-20 px-7 gap-5 border-b-2 border-secondary w-[calc(100%-18rem)] flex items-center justify-between">

    <div class=" flex items-center justify-end w-full gap-5">
        <button>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                class="size-6 text-secondary hover:text-indigoo">
                <path
                    d="M5.85 3.5a.75.75 0 0 0-1.117-1 9.719 9.719 0 0 0-2.348 4.876.75.75 0 0 0 1.479.248A8.219 8.219 0 0 1 5.85 3.5ZM19.267 2.5a.75.75 0 1 0-1.118 1 8.22 8.22 0 0 1 1.987 4.124.75.75 0 0 0 1.48-.248A9.72 9.72 0 0 0 19.266 2.5Z" />
                <path fill-rule="evenodd"
                    d="M12 2.25A6.75 6.75 0 0 0 5.25 9v.75a8.217 8.217 0 0 1-2.119 5.52.75.75 0 0 0 .298 1.206c1.544.57 3.16.99 4.831 1.243a3.75 3.75 0 1 0 7.48 0 24.583 24.583 0 0 0 4.83-1.244.75.75 0 0 0 .298-1.205 8.217 8.217 0 0 1-2.118-5.52V9A6.75 6.75 0 0 0 12 2.25ZM9.75 18c0-.034 0-.067.002-.1a25.05 25.05 0 0 0 4.496 0l.002.1a2.25 2.25 0 1 1-4.5 0Z"
                    clip-rule="evenodd" />
            </svg>
        </button>
        @auth
            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                class="flex flex-row items-center gap-2 bg-transparent">
                <img src="/img/user.png" alt="user" class="size-8 rounded-full">
                <p class="text-sm">{{ auth()->user()->nama }}</p>
                <svg class="size-2 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
            </button>

            <div id="dropdown"
                class="px-3 relative z-30 hidden bg-white hover:bg-redd text-redd hover:text-white rounded-sm shadow shadow-slate-500 w-48 text-sm">
                <ul>
                    <li>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="flex justify-start items-center text-sm py-3 gap-5 w-full">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-5 group-hover:text-white">
                                    <path fill-rule="evenodd" transform="rotate(180 12 12)"
                                        d="M16.5 3.75a1.5 1.5 0 0 1 1.5 1.5v13.5a1.5 1.5 0 0 1-1.5 1.5h-6a1.5 1.5 0 0 1-1.5-1.5V15a.75.75 0 0 0-1.5 0v3.75a3 3 0 0 0 3 3h6a3 3 0 0 0 3-3V5.25a3 3 0 0 0-3-3h-6a3 3 0 0 0-3 3V9A.75.75 0 1 0 9 9V5.25a1.5 1.5 0 0 1 1.5-1.5h6ZM5.78 8.47a.75.75 0 0 0-1.06 0l-3 3a.75.75 0 0 0 0 1.06l3 3a.75.75 0 0 0 1.06-1.06l-1.72-1.72H15a.75.75 0 0 0 0-1.5H4.06l1.72-1.72a.75.75 0 0 0 0-1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <p>Sign out</p>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>

        @endauth
    </div>
</nav>
