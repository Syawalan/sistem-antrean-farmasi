<div class="max-w-6xl mx-auto">
    <div class="mb-8">
        <h1 class="text-3xl font-black text-gray-800">Queue History</h1>
        <p class="text-gray-400 mt-1">Daftar seluruh antrean yang telah diproses di loket ini.</p>
    </div>

    <div class="bg-white rounded-[32px] border border-gray-100 shadow-sm overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="text-gray-400 text-sm font-bold uppercase tracking-wider">
                    <th class="px-8 py-6">No. Antrian</th>
                    <th class="px-8 py-6 text-center">Status</th>
                    <th class="px-8 py-6">Dipanggil</th>
                    <th class="px-8 py-6">Selesai</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($history as $item)
                    <tr class="hover:bg-gray-50/50 transition-colors {{ $loop->even ? 'bg-gray-50/30' : '' }}">
                        <td class="px-8 py-5 font-bold text-gray-700">
                            {{ $item->queue_number }}
                        </td>
                        <td class="px-8 py-5 text-center">
                            @php
                                // Menentukan warna badge berdasarkan status
                                $statusClasses =
                                    [
                                        'selesai' => 'bg-emerald-50 text-emerald-600 border-emerald-100',
                                        'lewati' => 'bg-yellow-500 text-gray-500 border-yellow-700',
                                    ][$item->status] ?? 'bg-blue-50 text-blue-600';
                            @endphp

                            <span
                                class="px-4 py-1.5 rounded-full text-[11px] font-black uppercase tracking-wider border {{ $statusClasses }}">
                                {{ $item->status == 'tidak datang' ? 'No Show' : ($item->status == 'selesai' ? 'Completed' : 'Cancelled') }}
                            </span>
                        </td>
                        <td class="px-8 py-5 text-gray-500 text-sm font-medium">
                            {{ $item->called_at ? \Carbon\Carbon::parse($item->called_at)->format('Y-m-d H:i A') : '-' }}
                        </td>
                        <td class="px-8 py-5 text-gray-500 text-sm font-medium">
                            {{ $item->updated_at->format('Y-m-d H:i A') }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-8 py-20 text-center text-gray-400 font-medium">
                            Belum ada riwayat antrean untuk ditampilkan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="px-8 py-6 border-t border-gray-50">
            {{ $history->links() }}
        </div>
    </div>
</div>
