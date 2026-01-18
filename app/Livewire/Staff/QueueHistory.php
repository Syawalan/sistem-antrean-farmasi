<?php

namespace App\Livewire\Staff;

use App\Models\Queue;
use Livewire\Component;
use Livewire\WithPagination;

class QueueHistory extends Component
{
    use WithPagination;

    public function render()
    {
        $counterId = auth()->user()->counter_id;

        $history = Queue::where('counter_id', $counterId)
            ->whereIn('status', ['selesai', 'lewati'])
            ->orderBy('updated_at', 'desc')
            ->paginate(10);

        return view('livewire.staff.queue-history', [
            'history' => $history
        ]);
    }
}
