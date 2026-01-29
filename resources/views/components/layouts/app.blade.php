<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Sistem Antrean Farmasi' }}</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @livewireStyles
</head>

<body class="bg-[#e9ecef] font-sans antialiased" x-data="{ openMobileMenu: false }">

    <div class="flex h-screen overflow-hidden relative">
        @auth
            <aside class="w-72 bg-white border-r border-gray-100 hidden md:flex flex-col">
                <div class="items-center flex gap-3 py-4">
                    <h2 class="text-5xl md:px-6 md:text-3xl font-black tracking-tighter text-[#239BA7]">
                        e-Farm<span class="text-slate-800">queue</span>
                    </h2>
                </div>

                <nav class="flex-1 px-4 space-y-2 overflow-y-auto">
                    @if (auth()->user()->role === 'admin')
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest ml-3 mb-4 mt-4">Main Menu
                        </p>
                        <a href="/admin/dashboard"
                            class="flex items-center gap-4 px-4 py-3 {{ request()->is('admin/dashboard') ? 'bg-gray-100 text-gray-900' : 'text-gray-500' }} rounded-xl transition-all">
                            <i class="bi bi-building"></i>
                            <span class="font-semibold text-sm">Dashboard</span>
                        </a>
                        <a href="/admin/staff"
                            class="flex items-center gap-4 px-4 py-3 {{ request()->is('admin/staff') ? 'bg-gray-100 text-gray-900' : 'text-gray-500' }} rounded-xl transition-all">
                            <i class="bi bi-people"></i>
                            <span class="font-semibold text-sm">Manajemen Staff</span>
                        </a>
                        <a href="{{ route('admin.medicine') }}"
                            class="flex items-center gap-4 px-4 py-3 {{ request()->routeIs('admin.medicine') ? 'bg-gray-100 text-gray-900' : 'text-gray-500' }} rounded-xl transition-all">
                            <i class="bi bi-box"></i>
                            <span class="font-semibold text-sm">Data Obat</span>
                        </a>
                    @endif

                    @if (auth()->user()->role === 'staff')
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest ml-3 mb-4 mt-6">Staff Menu
                        </p>
                        <a href="/staff/panggil"
                            class="flex items-center gap-4 px-4 py-3 {{ request()->is('staff/panggil') ? 'bg-blue-50 text-[#30B5F9]' : 'text-gray-500' }} rounded-xl transition-all font-bold">
                            <i class="bi bi-megaphone-fill"></i>
                            <span class="text-sm">Panggil Antrean</span>
                        </a>
                        <a href="{{ route('staff.history') }}"
                            class="flex items-center gap-4 px-4 py-3 {{ request()->routeIs('staff.history') ? 'bg-blue-50 text-[#30B5F9]' : 'text-gray-500' }} rounded-xl transition-all font-bold">
                            <i class="bi bi-clock-history"></i>
                            <span class="text-sm">Riwayat Antrean</span>
                        </a>
                    @endif
                </nav>

                <div class="p-4 border-t">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="flex items-center gap-4 px-4 py-3 text-red-500 hover:bg-red-50 w-full rounded-xl font-bold text-sm transition-all">
                            <i class="bi bi-box-arrow-left text-lg"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </aside>

            <div x-show="openMobileMenu" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                x-transition:leave="transition ease-in duration-200" x-transition:leave-start="translate-x-0"
                x-transition:leave-end="-translate-x-full"
                class="fixed inset-0 z-50 md:hidden bg-white w-72 h-full shadow-2xl flex flex-col">

                <div class="flex items-center justify-between p-4 border-b">
                    <span class="font-black text-[#30B5F9]">e-Farmqueue</span>
                    <button @click="openMobileMenu = false" class="text-gray-500 p-2">
                        <i class="bi bi-x-lg text-xl"></i>
                    </button>
                </div>

                <div class="flex-1 overflow-y-auto p-4 space-y-2">
                    @if (auth()->user()->role === 'staff')
                        <a href="/staff/panggil"
                            class="flex items-center gap-4 px-4 py-3 {{ request()->is('staff/panggil') ? 'bg-blue-50 text-[#30B5F9]' : 'text-gray-500' }} rounded-xl font-bold">
                            <i class="bi bi-megaphone-fill"></i><span>Panggil Antrean</span>
                        </a>
                        <a href="/staff/riwayat"
                            class="flex items-center gap-4 px-4 py-3 {{ request()->is('staff/riwayat') ? 'bg-blue-50 text-[#30B5F9]' : 'text-gray-500' }} rounded-xl font-bold">
                            <i class="bi bi-megaphone-fill"></i><span>Riwayat Antrean</span>
                        </a>
                    @endif
                    @if (auth()->user()->role === 'admin')
                        <a href="/admin/dashboard"
                            class="flex items-center gap-4 px-4 py-3 {{ request()->is('admin/dashboard') ? 'bg-blue-50 text-[#30B5F9]' : 'text-gray-500' }} rounded-xl font-bold">
                            <i class="bi bi-building"></i><span>Dashboard</span>
                        </a>
                        <a href="/admin/staff"
                            class="flex items-center gap-4 px-4 py-3 {{ request()->is('admin/staff') ? 'bg-blue-50 text-[#30B5F9]' : 'text-gray-500' }} rounded-xl font-bold">
                            <i class="bi bi-people"></i><span>Manajemen Staff</span>
                        </a>
                        <a href="/admin/obat"
                            class="flex items-center gap-4 px-4 py-3 {{ request()->is('admin/obat') ? 'bg-blue-50 text-[#30B5F9]' : 'text-gray-500' }} rounded-xl font-bold">
                            <i class="bi bi-box"></i><span>Data Obat</span>
                        </a>
                    @endif
                </div>
                <div class="p-4 border-t">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="flex items-center gap-4 px-4 py-3 text-red-500 hover:bg-red-50 w-full rounded-xl font-bold text-sm transition-all">
                            <i class="bi bi-box-arrow-left text-lg"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </div>

            <div x-show="openMobileMenu" @click="openMobileMenu = false" class="fixed inset-0 bg-black/20 z-40 md:hidden"
                x-transition:opacity></div>
        @endauth

        <div class="flex-1 flex flex-col min-w-0">

            @guest
            @if(request()->routeIs(['queue.status', 'patient.detail', 'patient.medicine']))
                <nav class="hidden md:flex bg-white border-b px-10 py-4 items-center justify-between sticky top-0 z-30">
                    <h2 class="text-5xl md:px-6 md:text-3xl font-black tracking-tighter text-[#239BA7]">
                        e-Farm<span class="text-slate-800">queue</span>
                    </h2>
                    <div class="flex gap-8">
                        <a href="{{ route('queue.status') }}"
                            class="font-bold {{ request()->routeIs('queue.status') ? 'text-[#30B5F9]' : 'text-gray-500' }}">Beranda</a>
                        <a href="{{ route('patient.detail') }}" class="font-bold text-gray-500 hover:text-[#30B5F9]">Detail
                            Antrean</a>
                        <a href="{{ route('patient.medicine') }}"
                            class="font-bold text-gray-500 hover:text-[#30B5F9]">Obat</a>
                    </div>
                    <div></div>
                </nav>
            @endif
            @endguest

            <header class="md:hidden bg-white border-b px-6 py-4 flex items-center justify-between sticky top-0 z-30">
                @auth
                    <button @click="openMobileMenu = true" class="text-gray-600 p-2">
                        <i class="bi bi-list text-2xl"></i>
                    </button>
                @endauth
                <h2 class="text-xl md:px-6 md:text-3xl font-black tracking-tighter text-[#239BA7]">
                    e-Farm<span class="text-slate-800">queue</span>
                </h2>
                <div class="w-8"></div>
            </header>

            <main class="flex-1 overflow-y-auto p-4 md:p-10 bg-[#e9ecef]">
                {{ $slot }}

                <footer class="text-center mt-10 py-4 text-gray-500 text-xs">
                    &copy; {{ date('Y') }} e-Farmqueue. All rights reserved.
                </footer>
            </main>

            @guest
            @if(request()->routeIs(['queue.status', 'patient.detail', 'patient.medicine']))
                <div
                    class="md:hidden fixed bottom-0 left-0 right-0 bg-white border-t flex justify-around items-center py-3 z-50 shadow-[0_-2px_10px_rgba(0,0,0,0.05)]">
                    <a href="{{ route('queue.status') }}"
                        class="flex flex-col items-center gap-1 {{ request()->routeIs('queue.status') ? 'text-[#30B5F9]' : 'text-gray-400' }}">
                        <i class="bi bi-house-door-fill text-xl"></i>
                        <span class="text-[10px] font-bold">Beranda</span>
                    </a>
                    <a href="{{ route('patient.detail') }}" class="flex flex-col items-center gap-1 text-gray-400">
                        <i class="bi bi-ticket-perforated-fill text-xl"></i>
                        <span class="text-[10px] font-bold">Detail</span>
                    </a>
                    <a href="{{ route('patient.medicine') }}" class="flex flex-col items-center gap-1 text-gray-400">
                        <i class="bi bi-capsule text-xl"></i>
                        <span class="text-[10px] font-bold">Obat</span>
                    </a>
                </div>
            @endif
            @endguest
        </div>
    </div>

    @livewireScripts
</body>

</html>
