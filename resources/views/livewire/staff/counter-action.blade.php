<div>
    @if (session()->has('success'))
        <div class="mb-4 p-3 bg-emerald-100 text-emerald-700 rounded-xl text-sm font-bold">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="bg-white p-8 rounded-[32px] border border-gray-100 shadow-sm mb-6">
        <p class="text-sm font-bold text-gray-400 mb-2">NOMOR SAAT INI</p>
        <h3 class="text-5xl font-black text-[#30B5F9]">
            {{ $currentQueue->queue_number ?? '---' }}
        </h3>
        <p class="text-xs text-gray-400 mt-2 italic">
            Status: {{ ucfirst($currentQueue->status ?? 'Standby') }}
        </p>
    </div>
    
    <div
        class="bg-white p-12 rounded-[32px] border border-gray-100 shadow-sm flex flex-col items-center justify-center text-center">
        @if (!$currentQueue)
            <h4 class="text-xl font-bold text-gray-800 mb-6">Siap Memanggil Antrean?</h4>
            <button wire:click="panggilBerikutnya"
                class="bg-[#30B5F9] hover:bg-[#28A0DD] text-white px-10 py-5 rounded-2xl font-black text-lg shadow-lg transition-all active:scale-95">
                Panggil Antrian
            </button>
        @else
            <h4 class="text-xl font-bold text-gray-800 mb-6">Kontrol Antrean</h4>
            <div class="flex gap-4">
                @if ($currentQueue->status == 'memanggil')
                    <button wire:click="prosesResep"
                        class="bg-amber-400 hover:bg-amber-500 text-white px-8 py-4 rounded-2xl font-bold transition-all">
                        Proses Resep
                    </button>
                @endif
    
                <button wire:click="selesai"
                    class="bg-emerald-500 hover:bg-emerald-600 text-white px-8 py-4 rounded-2xl font-bold transition-all">
                    Selesai
                </button>
    
                <button wire:click="panggilBerikutnya"
                    onclick="confirm('Selesaikan antrean ini dan panggil berikutnya?') || event.stopImmediatePropagation()"
                    class="bg-gray-100 hover:bg-gray-200 text-gray-600 px-8 py-4 rounded-2xl font-bold transition-all">
                    Skip & Next
                </button>
            </div>
        @endif
    </div>
</div>
