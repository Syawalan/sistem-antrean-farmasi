<div>
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Admin Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <div class="bg-white p-8 rounded-[24px] shadow-sm border border-gray-50 group hover:shadow-md transition-all">
            <div class="flex justify-between items-start mb-6">
                <div>
                    <p class="text-gray-400 text-xs font-bold uppercase tracking-wider">Total Staff</p>
                    <h3 class="text-4xl font-black text-gray-800 mt-2">{{ $totalStaff }}</h3>
                </div>
                <div
                    class="w-12 h-12 bg-blue-50 text-blue-500 rounded-2xl flex items-center justify-center group-hover:bg-blue-500 group-hover:text-white transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
            </div>
            <p class="text-[11px] text-gray-400 font-medium leading-relaxed">Jumlah anggota staff yang terdaftar</p>
        </div>

        <div class="bg-white p-8 rounded-[24px] shadow-sm border border-gray-50 group hover:shadow-md transition-all">
            <div class="flex justify-between items-start mb-6">
                <div>
                    <p class="text-gray-400 text-xs font-bold uppercase tracking-wider">Total Obat</p>
                    <h3 class="text-4xl font-black text-gray-800 mt-2">{{ $totalMedicines }}</h3>
                </div>
                <div
                    class="w-12 h-12 bg-emerald-50 text-emerald-500 rounded-2xl flex items-center justify-center group-hover:bg-emerald-500 group-hover:text-white transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
            </div>
            <p class="text-[11px] text-gray-400 font-medium leading-relaxed">Total jenis obat dalam stok</p>
        </div>

        <div class="bg-white p-8 rounded-[24px] shadow-sm border border-gray-50 group hover:shadow-md transition-all">
            <div class="flex justify-between items-start mb-6">
                <div>
                    <p class="text-gray-400 text-xs font-bold uppercase tracking-wider">Loket Aktif</p>
                    <h3 class="text-4xl font-black text-gray-800 mt-2">{{ $activeCounters }}</h3>
                </div>
                <div
                    class="w-12 h-12 bg-gray-50 text-gray-800 rounded-2xl flex items-center justify-center group-hover:bg-gray-800 group-hover:text-white transition-colors text-xl font-black">
                    |||</div>
            </div>
            <p class="text-[11px] text-gray-400 font-medium leading-relaxed">Loket pelayanan yang beroperasi</p>
        </div>

        <div class="bg-white p-8 rounded-[24px] shadow-sm border border-gray-50 group hover:shadow-md transition-all">
            <div class="flex justify-between items-start mb-6">
                <div>
                    <p class="text-gray-400 text-xs font-bold uppercase tracking-wider">Pasien Hari Ini</p>
                    <h3 class="text-4xl font-black text-gray-800 mt-2">{{ $patientsToday }}</h3>
                </div>
                <div
                    class="w-12 h-12 bg-indigo-50 text-indigo-500 rounded-2xl flex items-center justify-center group-hover:bg-indigo-500 group-hover:text-white transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>
                </div>
            </div>
            <p class="text-[11px] text-gray-400 font-medium leading-relaxed">Pasien yang dilayani hari ini</p>
        </div>
    </div>

    <div class="max-w-md">
        <h2 class="text-xl font-bold text-gray-800 mb-6">System Health Overview</h2>
        <div class="bg-white p-8 rounded-[24px] shadow-sm border border-gray-50">
            <div class="flex items-center gap-2 mb-4">
                <span class="font-bold text-gray-800">System Status</span>
                @if ($isOnline)
                    <span class="text-[10px] text-blue-500 font-bold uppercase flex items-center gap-1">
                        <span class="w-1.5 h-1.5 bg-blue-500 rounded-full animate-ping"></span>
                        {{ $systemStatus }}
                    </span>
                @else
                    <span class="text-[10px] text-red-500 font-bold uppercase flex items-center gap-1">
                        <span class="w-1.5 h-1.5 bg-red-500 rounded-full"></span>
                        {{ $systemStatus }}
                    </span>
                @endif
            </div>
            <div class="space-y-2 text-sm text-gray-500">
                <p>Uptime: <span class="font-semibold text-gray-800">99.9%</span></p>
                <p>Last Checked: <span class="font-semibold text-gray-800">{{ now()->diffForHumans() }}</span></p>
            </div>
        </div>
    </div>
</div>
