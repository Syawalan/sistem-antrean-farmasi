<div class="bg-[#F8FAFC] p-4 md:p-8 pb-24" wire:poll.5s>
    <div class="max-w-5xl mx-auto">
        
        <div class="flex justify-between items-center mb-6 md:mb-10">
            <div class="hidden md:block">
                <h1 class="text-2xl font-bold text-gray-800">Status Antrean</h1>
                <p class="text-gray-500">Pantau posisi antrean Anda secara real-time</p>
            </div>
            <h1 class="md:hidden text-xl font-bold text-gray-800 mx-auto text-center">Beranda</h1>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 md:gap-8">
            
            <div class="lg:col-span-7">
                <div class="bg-gradient-to-br from-[#22D3EE] to-[#0EA5E9] rounded-[32px] p-8 md:p-12 text-white shadow-xl shadow-cyan-100 relative overflow-hidden h-full flex flex-col items-center justify-center text-center">
                    <div class="absolute top-0 left-0 w-40 h-40 bg-white opacity-10 rounded-full -ml-20 -mt-20"></div>
                    <div class="absolute bottom-0 right-0 w-32 h-32 bg-white opacity-10 rounded-full -mr-16 -mb-16"></div>

                    <p class="text-sm md:text-base font-medium tracking-widest opacity-90 uppercase mb-2">Nomor Antrean Anda</p>
                    <h2 class="text-8xl md:text-9xl font-black mb-6 tracking-tighter">
                        {{ $myQueue->queue_number }}
                    </h2>
                    
                    <div class="inline-flex items-center bg-white/20 backdrop-blur-md px-6 py-2 rounded-full text-sm md:text-base font-semibold border border-white/30">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                        </svg>
                        {{ $myQueue->status == 'waiting' ? 'Menunggu' : 'Sedang Dilayani' }} - {{ $myQueue->counter->name }}
                    </div>
                </div>
            </div>

            <div class="lg:col-span-5 flex flex-col gap-6 md:gap-8">
                
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-50 text-center flex flex-col items-center justify-center">
                        <p class="text-cyan-500 font-bold text-2xl md:text-3xl">{{ $currentNumber }}</p>
                        <p class="text-[10px] md:text-xs text-gray-400 font-bold uppercase mt-1 tracking-wider">Sekarang</p>
                    </div>
                    <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-50 text-center flex flex-col items-center justify-center">
                        <p class="text-orange-500 font-bold text-2xl md:text-3xl">{{ $peopleAhead }}</p>
                        <p class="text-[10px] md:text-xs text-gray-400 font-bold uppercase mt-1 tracking-wider">Orang Lagi</p>
                    </div>
                </div>

                @if($peopleAhead <= 3 && $myQueue->status == 'waiting')
                <div class="bg-emerald-50 border border-emerald-100 rounded-[24px] p-5 flex items-center shadow-sm animate-pulse">
                    <div class="bg-emerald-500 p-2.5 rounded-2xl mr-4 text-white shadow-lg shadow-emerald-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-emerald-900 font-bold text-sm md:text-base">Giliran Anda Sudah Dekat!</h4>
                        <p class="text-emerald-700 text-xs md:text-sm mt-0.5">Mohon bersiap di depan {{ $myQueue->counter->name }}</p>
                    </div>
                </div>
                @endif

                <div class="bg-white rounded-[24px] p-2 shadow-sm border border-gray-50">
                    <button class="w-full flex items-center p-4 hover:bg-gray-50 rounded-2xl transition-all group">
                        <div class="bg-cyan-500 p-3 rounded-xl text-white mr-4 shadow-lg shadow-cyan-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                        </div>
                        <div class="text-left flex-1">
                            <h4 class="text-gray-800 font-bold text-sm md:text-base">Timeline Perjalanan Antrean</h4>
                            <p class="text-gray-400 text-xs md:text-sm">Riwayat: Tiket Dibuat &rarr; Menunggu &rarr; Dilayani</p>
                        </div>
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>