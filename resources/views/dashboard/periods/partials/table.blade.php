<div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-5">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">No</th>
                <th scope="col" class="px-6 py-3">Tahun Lulusan</th>
                <th scope="col" class="px-6 py-3">Keterangan</th>
                <th scope="col" class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($periods as $period)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $periods->firstItem() + $loop->index }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $period->tahun }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $period->keterangan }}
                    </td>
                    <td class="px-6 py-4 flex flex-row gap-1">
                        <a href="/dashboard/periods/{{ $period->id }}"
                            class="text-white hover:text-gray-300 bg-teal-400 p-1 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </a>
                        {{-- <a href="/dashboard/periods/{{ $period->id }}/edit"
                            class="text-white hover:text-gray-300 bg-yellow-400 p-1 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </a> --}}
                        <button type="button" onclick="openDeleteModalPeriod({{ $period->id }})"
                            class="text-white hover:text-gray-300 bg-red-600 p-1 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                    </td>

                </tr>
            @endforeach

        </tbody>
    </table>
</div>


<nav class="flex flex-row items-center justify-between" aria-label="Table navigation">
    <span
        class="text-xs font-normal text-gray-900 flex items-center justify-center px-3 h-8 rounded-md leading-tight gap-2">
        Showing {{ $periods->firstItem() }} to {{ $periods->lastItem() }} of {{ $periods->total() }} entries
    </span>
    <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
        @if ($periods->onFirstPage())
            <li>
                <span
                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg">Previous</span>
            </li>
        @else
            <li>
                <a href="{{ $periods->previousPageUrl() }}"
                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-800 bg-white border border-gray-300 rounded-e-lg hover:bg-blue-50 hover:text-gray-900">Previous</a>
            </li>
        @endif

        @foreach ($periods->links()->elements[0] as $page => $url)
            @if ($page == $periods->currentPage())
                <li>
                    <span
                        class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-100">{{ $page }}</span>
                </li>
            @else
                <li>
                    <a href="{{ $url }}"
                        class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">{{ $page }}</a>
                </li>
            @endif
        @endforeach

        @if ($periods->hasMorePages())
            <li>
                <a href="{{ $periods->nextPageUrl() }}"
                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-800 bg-white border border-gray-300 rounded-e-lg hover:bg-blue-50 hover:text-gray-900">Next</a>
            </li>
        @else
            <li>
                <span
                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg">Next</span>
            </li>
        @endif
    </ul>
</nav>
