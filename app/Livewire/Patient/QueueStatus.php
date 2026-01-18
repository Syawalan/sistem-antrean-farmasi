<?php

namespace App\Livewire\Patient;

use App\Models\Queue;
use Livewire\Component;

class QueueStatus extends Component
{
    public $myQueue;

    public function render()
    {
        // 1. Ambil data antrean milik pasien berdasarkan token
        // Kita tidak membatasi status di sini dulu agar bisa mendeteksi jika status berubah jadi 'selesai'
        $this->myQueue = Queue::where('device_token', session('device_token'))
            ->latest()
            ->first();

        // 2. Jika data tidak ada sama sekali atau status sudah 'selesai'/'completed'
        // Gunakan $this->redirectRoute(), bukan 'return redirect()'
        if (!$this->myQueue || $this->myQueue->status === 'selesai') {
            $this->redirectRoute('patient.take-queue', navigate: true);

            // Berikan view kosong/loading sementara proses redirect berjalan
            return view('livewire.patient.queue-status', [
                'currentNumber' => '---',
                'peopleAhead' => 0
            ]);
        }

        // 3. Logika untuk nomor saat ini di loket yang sama
        $currentQueue = Queue::whereIn('status', ['memanggil', 'memproses'])
            ->where('counter_id', $this->myQueue->counter_id)
            ->latest()
            ->first();

        // 4. Hitung jumlah orang di depan
        $peopleAhead = Queue::where('counter_id', $this->myQueue->counter_id)
            ->where('status', 'menunggu')
            ->where('id', '<', $this->myQueue->id)
            ->count();

        return view('livewire.patient.queue-status', [
            'currentNumber' => $currentQueue ? $currentQueue->queue_number : '---',
            'peopleAhead' => $peopleAhead
        ]);
    }
}
