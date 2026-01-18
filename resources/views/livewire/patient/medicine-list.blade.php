<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <h2 class="text-2xl font-black text-gray-800">Daftar Obat Tersedia</h2>
        <p class="text-gray-500 text-sm">Informasi stok dan kegunaan obat di Farmasi kami.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @foreach($medicines as $med)
            <div class="bg-white p-6 rounded-[24px] border border-gray-100 shadow-sm flex gap-4">
                <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center text-[#30B5F9]">
                    <i class="bi bi-capsule text-2xl"></i>
                </div>
                <div class="flex-1">
                    <h4 class="font-bold text-gray-800">{{ $med->name }}</h4>
                    <p class="text-xs text-gray-400 mb-2">{{ $med->description }}</p>
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] font-bold px-2 py-1 bg-gray-100 text-gray-600 rounded-md">Stok: {{ $med->stok }}</span>
                        <span class="text-[10px] font-black text-[#30B5F9] uppercase tracking-tighter">Tersedia</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>