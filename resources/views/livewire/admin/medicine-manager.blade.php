<div class="relative">
    @if (session()->has('success'))
        <div
            class="mb-6 p-4 bg-emerald-100 border border-emerald-200 text-emerald-700 rounded-2xl font-bold flex items-center gap-3 transition-all">
            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" />
            </svg>
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Data Obat</h1>
        <button wire:click="openModal"
            class="bg-[#002B49] text-white px-6 py-3 rounded-xl font-bold flex items-center gap-2 hover:bg-slate-800 transition-all hover:cursor-pointer">
            <i class="bi bi-plus-lg"></i> Tambah Obat Baru
        </button>
    </div>

    <div class="bg-white rounded-3xl shadow-sm border border-gray-50 overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="px-8 py-5 text-sm font-bold text-gray-400 uppercase">Obat & Kode</th>
                    <th class="px-8 py-5 text-sm font-bold text-gray-400 uppercase">Golongan</th>
                    <th class="px-8 py-5 text-sm font-bold text-gray-400 uppercase">Stok</th>
                    <th class="px-8 py-5 text-sm font-bold text-gray-400 uppercase">Harga</th>
                    <th class="px-8 py-5 text-sm font-bold text-gray-400 uppercase text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @foreach ($medicines as $med)
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-8 py-5">
                            <span class="font-bold text-gray-800 block leading-tight">{{ $med->name }}</span>
                            <span
                                class="text-xs text-gray-400 uppercase tracking-wider font-semibold">{{ $med->code }}</span>
                        </td>
                        <td class="px-8 py-5">
                            @php
                                $color = [
                                    'obat bebas' => 'bg-emerald-50 text-emerald-600',
                                    'obat bebas terbatas' => 'bg-blue-50 text-blue-600',
                                    'obat keras' => 'bg-red-50 text-red-600',
                                ][$med->golongan];
                            @endphp
                            <span
                                class="px-3 py-1 {{ $color }} rounded-full text-[10px] font-black uppercase tracking-tighter">
                                {{ $med->golongan }}
                            </span>
                        </td>
                        <td class="px-8 py-5 font-bold {{ $med->stok < 10 ? 'text-red-500' : 'text-gray-600' }}">
                            {{ $med->stok }}
                        </td>
                        <td class="px-8 py-5 text-gray-600 font-medium">
                            Rp{{ number_format($med->harga, 0, ',', '.') }}
                        </td>
                        <td class="px-8 py-5 text-right space-x-2">
                            <button wire:click="edit({{ $med->id }})"
                                class="text-gray-400 hover:text-blue-500 hover:cursor-pointer transition-colors">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button
                                onclick="confirm('Hapus obat {{ $med->name }}?') || event.stopImmediatePropagation()"
                                wire:click="delete({{ $med->id }})"
                                class="text-gray-400 hover:text-red-500 hover:cursor-pointer transition-colors">
                                <i class="bi bi-trash3"></i>
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
                    class="relative z-10 bg-white rounded-[32px] shadow-2xl w-full max-w-xl overflow-hidden transform transition-all">
                    <div class="px-10 pt-10 pb-6 flex justify-between items-start">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-800">
                                {{ $isEdit ? 'Update Data Obat' : 'Tambah Obat Baru' }}</h3>
                            <p class="text-gray-400 text-sm mt-1 uppercase tracking-widest font-bold">Medicine
                                Information</p>
                        </div>
                        <button wire:click="closeModal"
                            class="text-gray-400 hover:text-gray-600 text-2xl font-light hover:cursor-pointer">&times;</button>
                    </div>

                    <form wire:submit.prevent="save" class="px-10 pb-10 space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-1">
                                <label class="block text-sm font-bold text-gray-700 mb-2">Kode Obat</label>
                                <input type="text" wire:model="code"
                                    class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-2 focus:ring-cyan-500 outline-none">
                                @error('code')
                                    <span class="text-red-500 text-[10px] mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-span-1">
                                <label class="block text-sm font-bold text-gray-700 mb-2">Nama Obat</label>
                                <input type="text" wire:model="name" placeholder="Paracetamol"
                                    class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-2 focus:ring-cyan-500 outline-none">
                                @error('name')
                                    <span class="text-red-500 text-[10px] mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Golongan</label>
                                <select wire:model="golongan"
                                    class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-2 focus:ring-cyan-500 outline-none appearance-none">
                                    <option value="obat bebas">Obat Bebas (Hijau)</option>
                                    <option value="obat bebas terbatas">Bebas Terbatas (Biru)</option>
                                    <option value="obat keras">Obat Keras (Merah)</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Harga (Rp)</label>
                                <input type="number" wire:model="harga"
                                    class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-2 focus:ring-cyan-500 outline-none">
                                @error('harga')
                                    <span class="text-red-500 text-[10px] mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Stok</label>
                            <input type="number" wire:model="stok"
                                class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-2 focus:ring-cyan-500 outline-none">
                            @error('stok')
                                <span class="text-red-500 text-[10px] mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Indikasi (Opsional)</label>
                            <textarea wire:model="indikasi" rows="3"
                                class="w-full px-5 py-4 bg-gray-50 border border-gray-100 rounded-2xl focus:ring-2 focus:ring-cyan-500 outline-none resize-none"
                                placeholder="Kegunaan obat ini..."></textarea>
                        </div>

                        <button type="submit"
                            class="w-full bg-[#30B5F9] text-white py-5 rounded-2xl font-black text-lg shadow-lg shadow-blue-100 hover:bg-blue-500 transition-all hover:cursor-pointer mt-4 uppercase">
                            {{ $isEdit ? 'Update Medicine' : 'Simpan ke Database' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
