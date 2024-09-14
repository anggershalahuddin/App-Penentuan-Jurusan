<!-- Modal -->
<div id="editAccountModal"
    class="fixed z-30 right-0 inset-0 bg-black bg-opacity-60 flex items-center justify-center hidden opacity-0 transition-opacity duration-300">
    <div class="bg-white rounded-lg w-2/6 overflow-hidden transform transition-transform duration-300 scale-95">
        <div class="flex justify-between items-center p-2 border-b border-gray-600 bg-gray-400">
            <div class="flex flex-row justify-between items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                    <path fill-rule="evenodd"
                        d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                        clip-rule="evenodd" />
                </svg>
                <h2 class="text-sm font-semibold">Pengaturan Akun</h2>
            </div>
            <button onclick="closeEditAccountModal()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <form action="{{ route('update.account') }}" method="POST" class="px-12 py-6">
            @csrf
            <div class="w-full flex items-center justify-center mb-4">
                <img src="/img/user.png" alt="user" class="size-28 rounded-full">
            </div>
            <div class="mb-4 flex flex-row justify-between space-x-5 items-center">
                <label class="block text-xs font-medium text-gray-700 text-nowrap w-32">Nama
                    Akun</label>
                <input type="text" name="nama" value="{{ old('nama', Auth::user()->nama) }}"
                    class="block text-xs w-full px-3 py-2 border border-gray-400 rounded-sm" required>
            </div>
            <div class="mb-4 flex flex-row justify-between space-x-5 items-center">
                <label class="block text-xs font-medium text-gray-700 text-nowrap w-32">Username</label>
                <!-- Input yang ditampilkan dan disabled -->
                <input type="text" value="{{ old('username', Auth::user()->username) }}"
                    class="block text-xs w-full px-3 py-2 border border-gray-400 rounded-sm bg-gray-100 text-gray-500 cursor-not-allowed"
                    disabled>
                <!-- Input hidden untuk mengirimkan nilai ke server -->
                <input type="hidden" name="username" value="{{ old('username', Auth::user()->username) }}">
            </div>

            <div class="mb-4 flex flex-row justify-between space-x-5 items-center">
                <label class="block text-xs font-medium text-gray-700 text-nowrap w-32">No
                    Telepon</label>
                <input type="text" name="no_telp" value="{{ old('no_telp', Auth::user()->no_telp) }}"
                    class="block text-xs w-full px-3 py-2 border border-gray-400 rounded-sm" required>
            </div>
            <div class="mb-4 flex flex-row justify-between space-x-5 items-center">
                <label class="block text-xs font-medium text-gray-700 text-nowrap w-32">Password</label>
                <input type="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah"
                    class="block text-xs w-full px-3 py-2 border border-gray-400 rounded-sm">
            </div>
            <div class="mb-4 flex flex-row justify-between space-x-5 items-center">
                <label class="block text-xs font-medium text-gray-700 text-nowrap w-32">Role</label>
                <select name="role" class="block text-xs w-full px-3 py-2 border border-gray-400 rounded-sm"
                    required>
                    <option value="1" {{ Auth::user()->role == 1 ? 'selected' : '' }}>Admin</option>
                    <option value="0" {{ Auth::user()->role == 0 ? 'selected' : '' }}>User</option>
                </select>
            </div>
            <div class="flex justify-end space-x-3">
                <button type="button" onclick="closeEditAccountModal()"
                    class="text-sm px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-sm">Batal</button>
                <button type="submit"
                    class="text-sm px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-sm">Simpan</button>
            </div>
        </form>
    </div>
</div>


{{-- @if (session()->has('error'))
    @include('dashboard.manage-user.partials.alert-error')
@endif --}}
