<div class="relative">
    <div wire:loading.remove wire:target="ambilNomor">
        <div
            class="flex flex-col items-center justify-center p-6">
            <div class="max-w-md w-full">
                <div class="bg-white rounded-[32px] p-8 shadow-xl shadow-gray-200/50 border border-gray-50 text-center">
                    <div
                        class="w-20 h-20 bg-cyan-100 text-cyan-600 rounded-3xl flex items-center justify-center mx-auto mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                        </svg>
                    </div>

                    <h1 class="text-2xl font-bold text-gray-800 mb-2">Ambil Antrean</h1>
                    <p class="text-gray-500 mb-8">Silakan tekan tombol di bawah untuk mendapatkan nomor antrean atau melihat daftar obat yang tersedia.</p>
                    
                    <button wire:click="ambilNomor"
                        class="w-full bg-gradient-to-r from-cyan-500 to-blue-600 text-white rounded-2xl py-4 font-bold text-lg shadow-lg shadow-cyan-200 hover:scale-[1.02] active:scale-[0.98] hover:cursor-pointer transition-all">
                        Ambil Nomor Sekarang
                    </button>
                    
                    <a href="{{ route('patient.medicine') }}">
                        <button class="w-full bg-white text-blue-600 mt-4 border border-cyan-500 rounded-2xl py-4 font-bold text-lg shadow-lg shadow-cyan-200 hover:scale-[1.02] active:scale-[0.98] hover:cursor-pointer transition-all">
                            Daftar Obat
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div wire:loading wire:target="ambilNomor" class="fixed inset-0 z-50">
        <div class="min-h-screen bg-white flex flex-col items-center justify-center p-6 text-center">
            <div class="max-w-xs w-full flex flex-col items-center">
                <div class="bg-[#30B5F9] p-5 rounded-[28px] mb-8 shadow-lg shadow-blue-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-slate-600 mb-8">Generating device token automatically</h2>
                <div class="w-12 h-12 border-4 border-blue-50 border-t-[#30B5F9] rounded-full animate-spin"></div>
            </div>
        </div>
    </div>
</div>

