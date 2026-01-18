<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Farmasi</title>

    @vite('resources/css/app.css')
</head>

<body>
    <div
        class="w-screen min-h-screen flex flex-col items-center justify-center bg-gradient-to-b from-[#98B9F2] to-[#FBFBFB] p-6">

        <div class="w-full flex flex-col items-center justify-center">
            <div class="flex flex-col items-center max-w-2xl w-full">
                <img src="{{ asset('349044140_9656575497715700_8175528462559636296_n[1].png') }}" alt="Logo" class=" h-36 w-auto">
                <h1 class="text-center mb-2 text-2xl md:text-3xl font-bold text-[#239BA7] leading-tight">
                    Klinik Pratama Annisa Medika 1
                </h1>
                <p class="font-light text-base md:text-lg text-center text-slate-600">
                    Sistem Antrian Digital & Informasi Obat
                </p>
            </div>

            <div class="flex flex-col md:flex-row my-8 items-center justify-center gap-6 w-full">

                <a href="{{ route('patient.take-queue') }}" class="w-full max-w-[320px] group">
                    <div
                        class="flex flex-col items-center justify-center bg-white p-8 md:p-10 rounded-[30px] md:rounded-[40px] shadow-xl transition-transform duration-300 group-hover:-translate-y-2">
                        <div class="bg-cyan-500 p-6 rounded-[25px] md:rounded-[30px] shadow-lg shadow-cyan-200 mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 md:h-12 md:w-12 text-white"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <h2 class="text-xl md:text-2xl font-bold text-slate-800">Pasien</h2>
                        <p class="text-slate-500 text-center mt-2 text-sm md:text-base">Ambil antrian & info obat</p>
                    </div>
                </a>

                <a href="/login" class="w-full max-w-[320px] group">
                    <div
                        class="flex flex-col items-center justify-center bg-white p-8 md:p-10 rounded-[30px] md:rounded-[40px] shadow-xl transition-transform duration-300 group-hover:-translate-y-2">
                        <div
                            class="bg-violet-500 p-6 rounded-[25px] md:rounded-[30px] shadow-lg shadow-violet-200 mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 md:h-12 md:w-12 text-white"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h2 class="text-xl md:text-2xl font-bold text-slate-800">Petugas</h2>
                        <p class="text-slate-500 text-center mt-2 text-sm md:text-base">Kelola antrian</p>
                    </div>
                </a>

            </div>
        </div>
    </div>
</body>

</html>
