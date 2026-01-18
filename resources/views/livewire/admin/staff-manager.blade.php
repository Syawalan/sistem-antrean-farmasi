<div class="relative">

    @if (session()->has('message') || session()->has('success'))
        <div class="mb-6 p-4 bg-emerald-100 border border-emerald-200 text-emerald-700 rounded-2xl font-bold flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            {{ session('message') ?? session('success') }}
        </div>
    @endif

    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Manajemen Staff</h1>
        <button wire:click="openModal"
            class="bg-[#002B49] text-white px-6 py-3 rounded-xl hover:cursor-pointer font-bold flex items-center gap-2 hover:bg-slate-800 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                    clip-rule="evenodd" />
            </svg>
            Buat Akun Baru Staff
        </button>
    </div>

    <div class="bg-white rounded-3xl shadow-sm border border-gray-50 overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="px-8 py-5 text-sm font-bold text-gray-400 uppercase">Nama Staff</th>
                    <th class="px-8 py-5 text-sm font-bold text-gray-400 uppercase">Loket yang ditugaskan</th>
                    <th class="px-8 py-5 text-sm font-bold text-gray-400 uppercase">Status</th>
                    <th class="px-8 py-5 text-sm font-bold text-gray-400 uppercase text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @foreach ($staffs as $staff)
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-8 py-5 font-semibold text-gray-700">{{ $staff->name }}</td>
                        <td class="px-8 py-5 text-gray-500">{{ $staff->counter->name ?? 'Not Assigned' }}</td>
                        <td class="px-8 py-5">
                            <span
                                class="px-3 py-1 bg-emerald-50 text-emerald-600 rounded-full text-xs font-bold">Active</span>
                        </td>
                        <td class="px-8 py-5 text-right space-x-2">
                            <button wire:click="edit({{ $staff->id }})"
                                class="text-gray-400 hover:text-blue-500 hover:cursor-pointer">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button
                                onclick="confirm('Yakin ingin menghapus staff ini?') || event.stopImmediatePropagation()"
                                wire:click="delete({{ $staff->id }})"
                                class="text-gray-400 hover:text-red-500 hover:cursor-pointer">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if ($showModal)
        <div class="fixed inset-0 z-[60] overflow-y-auto">
            <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity"></div>
            <div class="flex items-center justify-center min-h-screen p-4">
                <div
                    class="relative z-10 bg-white rounded-[32px] shadow-2xl w-full max-w-lg overflow-hidden transform transition-all">
                    <div class="px-10 pt-10 pb-6 flex justify-between items-start">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800">
                                {{ $isEdit ? 'Edit Akun Staff' : 'Tambah Akun Staff Baru' }}</h3>
                            <p class="text-gray-400 text-sm mt-1">
                                {{ $isEdit ? 'Perbarui informasi akun staff.' : 'Masukkan detail untuk akun staff baru.' }}
                            </p>
                        </div>
                        <button wire:click="closeModal"
                            class="text-gray-400 hover:text-gray-600 text-2xl font-light hover:cursor-pointer">&times;</button>
                    </div>

                    <form wire:submit.prevent="createStaff" class="px-10 pb-10 space-y-5">

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Nama Staff</label>
                            <input type="text" wire:model="name" placeholder="Nama Staff"
                                class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-2 focus:ring-cyan-500 focus:bg-white outline-none transition-all">
                            @error('name')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Email</label>
                            <input type="email" wire:model="email" placeholder="staff@gmail.com"
                                class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-2 focus:ring-cyan-500 focus:bg-white outline-none transition-all">
                            @error('email')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">
                                Password {{ $isEdit ? '(Kosongkan jika tidak ingin diubah)' : '' }}
                            </label>
                            <input type="password" wire:model="password" placeholder="**********"
                                class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-2 focus:ring-cyan-500 focus:bg-white outline-none transition-all">
                            @error('password')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Loket yang ditugaskan</label>
                            <select wire:model="counter_id"
                                class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-2 focus:ring-cyan-500 focus:bg-white outline-none transition-all appearance-none">
                                <option value="">Pilih Loket</option>
                                @foreach ($counters as $counter)
                                    <option value="{{ $counter->id }}">{{ $counter->name }}</option>
                                @endforeach
                            </select>
                            @error('counter_id')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit"
                            class="w-full hover:cursor-pointer bg-[#30B5F9] text-white py-5 rounded-2xl font-black text-lg shadow-lg shadow-blue-100 hover:bg-blue-500 transition-all">
                            {{ $isEdit ? 'Update Akun Staff' : 'Simpan Akun Baru' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
