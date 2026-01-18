<?php

namespace App\Livewire\Patient;

use App\Models\Counter;
use App\Models\Queue;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;

class TakeQueue extends Component
{
    public $isLoading = false;

    public function ambilNomor()
    {
        sleep(3);

        $bestCounter = Counter::withCount(['queues' => function ($q) {
            $q->where('status', 'menunggu');
        }])
            ->orderBy('queues_count', 'asc')
            ->orderBy('id', 'asc')
            ->first();

        if (!$bestCounter) {
            session()->flash('error', 'Loket belum tersedia.');
            return;
        }

        $deviceToken = session()->get('device_token') ?? (string) Str::uuid();
        session()->put('device_token', $deviceToken);

        $countToday = Queue::whereDate('created_at', Carbon::today())->count();
        $newNumber = $countToday + 1;
        $formattedNumber = "A" . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

        $newQueue = Queue::create([
            'queue_number' => $formattedNumber,
            'device_token' => $deviceToken,
            'counter_id'   => $bestCounter->id,
            'status'       => 'menunggu',
        ]);

        session()->put('my_queue_id', $newQueue->id);

        return redirect()->route('queue.status');
    }

    public function render()
    {
        return view('livewire.patient.take-queue');
    }
}
