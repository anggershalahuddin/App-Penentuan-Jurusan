<nav class="flex flex-row items-center justify-between" aria-label="Table navigation">
    <span
        class="text-xs font-normal text-gray-900 flex items-center justify-center px-3 h-8 rounded-md leading-tight gap-2">
        Showing {{ $students->firstItem() }} to {{ $students->lastItem() }} of {{ $students->total() }} entries
    </span>
    <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
        {{-- First Page Link --}}
        @if ($students->onFirstPage())
            <li>
                <span
                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg">First</span>
            </li>
        @else
            <li>
                <a href="{{ $students->url(1) }}"
                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-800 bg-white border border-gray-300 rounded-l-lg hover:bg-blue-50 hover:text-gray-900">First</a>
            </li>
        @endif

        {{-- Previous Page Link --}}
        @if ($students->onFirstPage())
            <li>
                <span
                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300">Previous</span>
            </li>
        @else
            <li>
                <a href="{{ $students->previousPageUrl() }}"
                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-800 bg-white border border-gray-300 hover:bg-blue-50 hover:text-gray-900">Previous</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($students->getUrlRange(max(1, $students->currentPage() - 1), min($students->lastPage(), $students->currentPage() + 1)) as $page => $url)
            @if ($page == $students->currentPage())
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

        {{-- Next Page Link --}}
        @if ($students->hasMorePages())
            <li>
                <a href="{{ $students->nextPageUrl() }}"
                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-800 bg-white border border-gray-300 hover:bg-blue-50 hover:text-gray-900">Next</a>
            </li>
        @else
            <li>
                <span
                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300">Next</span>
            </li>
        @endif

        {{-- Last Page Link --}}
        @if ($students->currentPage() == $students->lastPage())
            <li>
                <span
                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg">Last</span>
            </li>
        @else
            <li>
                <a href="{{ $students->url($students->lastPage()) }}"
                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-800 bg-white border border-gray-300 rounded-r-lg hover:bg-blue-50 hover:text-gray-900">Last</a>
            </li>
        @endif
    </ul>


</nav>
