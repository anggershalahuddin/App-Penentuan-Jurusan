<div id="DeleteModalValues"
    class="fixed z-20 right-0 inset-0 bg-black bg-opacity-50 justify-center items-center shadow-lg shadow-black hidden opacity-0 transition-opacity duration-300">
    <div
        class="bg-white text-gray-800 rounded-lg shadow-lg p-6 w-2/5 transform scale-95 transition-transform duration-300">
        <div class="flex justify-end items-center">
            <button onclick="closeDeleteModalStudent()"
                class="text-gray-600 hover:text-gray-900 hover hover:bg-gray-300 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="size-5 m-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="flex flex-col items-center -mt-5">
            <h2 class="text-lg font-bold items-center mb-3">Konfirmasi Hapus Data</h2>
            <p class="mb-6 text-center">Apakah anda yakin ingin menghapus data siswa ini?</p>
        </div>
        <div
            class="bg-[#FEECDC] rounded-lg py-4 px-6 mb-6 text-justify text-red-700 left-px flex flex-col items-center">
            <p class="font-semibold flex items-center mb-2 ">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5 mr-2">
                    <path fill-rule="evenodd"
                        d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003ZM12 8.25a.75.75 0 0 1 .75.75v3.75a.75.75 0 0 1-1.5 0V9a.75.75 0 0 1 .75-.75Zm0 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"
                        clip-rule="evenodd" />
                </svg>
                Warning
            </p>
            <p class="text-sm">Dengan menghapus data siswa ini, maka data akan hilang secara permanen</p>
        </div>
        <div class="flex text-sm justify-center">
            <button type="button" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-md mr-2"
                onclick="closeDeleteModalStudent()">Tidak, batalkan</button>
            <form id="deleteForm" action="#" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="bg-red-600 hover:bg-red-800 text-white px-4 py-2 rounded-md flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                    Ya, Konfirmasi
                </button>
            </form>
        </div>
    </div>
</div>
