<?php

namespace App\Livewire\Patient;

use App\Models\Queue; // Pastikan Model Queue sudah ada
use Livewire\Component;

class QueueDetail extends Component
{
    public function render()
    {
        // 1. Ambil data antrean milik pasien ini (asumsi ID disimpan di session)
        // Jika Anda menggunakan sistem token di cookie/session saat ambil nomor:
        $myQueueId = session('my_queue_id'); 
        
        $myQueue = Queue::find($myQueueId);

        // 2. Ambil Nomor yang sedang dipanggil sekarang (status 'memanggil')
        $currentCalling = Queue::where('status', 'memanggil')
            ->orderBy('updated_at', 'desc')
            ->first();

        // 3. Hitung jumlah loket/counter yang sedang aktif melayani
        $activeCounters = Queue::whereIn('status', ['memanggil', 'memproses'])
            ->distinct('counter_id') // Asumsi ada kolom counter_id
            ->count();

        return view('livewire.patient.queue-detail', [
            'myQueue' => $myQueue,
            'currentCalling' => $currentCalling ? $currentCalling->queue_number : 'A-000',
            'activeCounters' => $activeCounters
        ]);
    }
}
