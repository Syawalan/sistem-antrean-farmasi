<?php

namespace App\Livewire\Staff;

use App\Livewire\Monitor\Display;
use App\Models\Counter;
use App\Models\Queue;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CounterAction extends Component
{
    public $currentQueue;

    public function render()
    {
        $counterId = auth()->user()->counter_id;

        $waitingList = Queue::where('counter_id', $counterId)
            ->where('status', 'menunggu')
            ->orderBy('id', 'asc')
            ->get();

        $this->currentQueue = Queue::where('counter_id', $counterId)
            ->whereIn('status', ['memanggil', 'memproses'])
            ->first();

        return view('livewire.staff.counter-action', [
            'waitingList' => $waitingList,
            'waitingCount' => Queue::where('counter_id', $counterId)
                               ->where('status', 'menunggu') 
                               ->count(),
            'counterName' => auth()->user()->counter->name ?? 'Belum ditugaskan'
        ]);
    }

    public function panggilBerikutnya()
    {
        $counterId = auth()->user()->counter_id;

        if($this->currentQueue) {
            $this->currentQueue->update(['status' => 'selesai']);
        }

        $next = Queue::where('counter_id', $counterId)
            ->where('status', 'menunggu')
            ->orderBy('id', 'asc')
            ->first();

        if($next) {
            $next->update([
                'status' => 'memanggil',
                'called_at' => now()
            ]);

            $this->dispatch('play-voice',
                number: $next->queue_number,
                counter: auth()->user()->counter_id    
            )->to(Display::class);

            session()->flash('success', 'Memanggil nomor ' . $next->queue_number);
        } else {
            session()->flash('info', 'Tidak ada antrean tersisa.');
        }
    }

    public function prosesResep()
    {
        if($this->currentQueue){
            $this->currentQueue->update(['status' => 'memproses']);
            session()->flash('success', 'Status: Sedang memproses resep.');
        }
    }

    public function selesai()
    {
        if ($this->currentQueue) {
            $this->currentQueue->update(['status' => 'selesai']);
            $this->currentQueue = null;
            session()->flash('success', 'Antrean selesai.');
        }
    }
}
