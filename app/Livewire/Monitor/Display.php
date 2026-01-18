<?php

namespace App\Livewire\Monitor;

use App\Models\Counter;
use Livewire\Component;

class Display extends Component
{
    public function render()
    {
        $activeQueues = Counter::with(['queues' => function($query) {
            $query->whereIn('status', ['memanggil', 'memproses'])
                ->latest();
        }])->get();



        return view('livewire.monitor.display', [
            'activeQueues' => $activeQueues
        ]);
    }
}
