<div wire:poll.3s class="max-w-2xl mx-auto space-y-6">
    <div class="bg-white rounded-[32px] p-8 shadow-sm border border-gray-100 text-center">
        <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-4">Nomor Antrean Anda</p>
        <h1 class="text-6xl font-black text-[#30B5F9] mb-4">{{ $myQueue->queue_number ?? '---' }}</h1>
        <div class="inline-flex items-center gap-2 px-4 py-2 bg-blue-50 text-[#30B5F9] rounded-full text-xs font-bold">
            <span class="relative flex h-2 w-2">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
            </span>
            {{ strtoupper($myQueue->status ?? 'Menunggu') }}
        </div>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm">
            <p class="text-[10px] font-bold text-gray-400 uppercase">Antrean Sekarang</p>
            <p class="text-2xl font-black text-gray-800">{{ $currentCalling ?? 'A-000' }}</p>
        </div>
        <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-sm">
            <p class="text-[10px] font-bold text-gray-400 uppercase">Loket Aktif</p>
            <p class="text-2xl font-black text-gray-800">{{ $activeCounters ?? 0 }}</p>
        </div>
    </div>

    <div class="bg-white p-8 rounded-[32px] border border-gray-100 shadow-sm">
        <h3 class="font-bold text-gray-800 mb-6">Status Perjalanan Antrean</h3>
        <div class="space-y-8 relative">
            <div class="absolute left-[11px] top-2 bottom-2 w-0.5 bg-gray-100"></div>
            
            <div class="relative flex gap-4">
                <div class="w-6 h-6 rounded-full {{ $myQueue ? 'bg-emerald-500' : 'bg-gray-200' }} z-10 flex items-center justify-center border-4 border-white">
                    <i class="bi bi-check-lg text-white text-[10px]"></i>
                </div>
                <div>
                    <p class="text-sm font-bold text-gray-800">Ambil Nomor</p>
                    <p class="text-xs text-gray-400">Nomor berhasil dicetak</p>
                </div>
            </div>

            <div class="relative flex gap-4">
                <div class="w-6 h-6 rounded-full {{ in_array($myQueue->status ?? '', ['memanggil', 'memproses', 'selesai']) ? 'bg-emerald-500' : 'bg-gray-200' }} z-10 flex items-center justify-center border-4 border-white">
                    <i class="bi bi-check-lg text-white text-[10px]"></i>
                </div>
                <div>
                    <p class="text-sm font-bold text-gray-800">Panggilan Loket</p>
                    <p class="text-xs text-gray-400">Menunggu dipanggil petugas</p>
                </div>
            </div>

            <div class="relative flex gap-4">
                <div class="w-6 h-6 rounded-full {{ ($myQueue->status ?? '') == 'selesai' ? 'bg-emerald-500' : 'bg-gray-200' }} z-10 flex items-center justify-center border-4 border-white">
                    <i class="bi bi-check-lg text-white text-[10px]"></i>
                </div>
                <div>
                    <p class="text-sm font-bold text-gray-800">Selesai</p>
                    <p class="text-xs text-gray-400">Obat siap diambil</p>
                </div>
            </div>
        </div>
    </div>
</div>