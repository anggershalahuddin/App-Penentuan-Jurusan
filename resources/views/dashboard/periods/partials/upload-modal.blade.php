<div
    class="bg-white text-gray-800 rounded-lg shadow-lg p-6 w-2/5 transform scale-95 transition-transform duration-300 relative">

    <!-- Tombol silang untuk menutup modal -->
    <button id="closeModalButton" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
        &times;
    </button>

    <!-- Konten modal -->
    <form action="{{ route('dashboard.periods.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col gap-4">
            <label for="file"
                class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg id="uploadIcon" class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                    </svg>
                    <p id="uploadText" class="mb-2 text-sm text-gray-500 dark:text-gray-400">Click to upload or drag
                        and drop</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">XLS, XLSX, or CSV (MAX. 200kb)</p>
                </div>
                <input id="file" name="file" type="file" class="hidden" />
            </label>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-sm py-2 px-4 rounded-md">
                Upload
            </button>
        </div>
    </form>
</div>
