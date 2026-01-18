<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Models\Queue;
use App\Models\Counter;
use Livewire\Component;
use App\Models\Medicine;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AdminDashboard extends Component
{
    public function render()
    {
        $totalStaff = User::where('role', 'staff')->count();
        $patientsToday = Queue::whereDate('created_at', Carbon::today())->count();

        $activeCounters = Counter::count();

        $totalMedicines = Medicine::count();

        try {
            DB::connection()->getPdo();
            $systemStatus = 'Online';
            $isOnline = true;
        } catch (\Exception $e) {
            $systemStatus = 'Offline';
            $isOnline = false;
        }

        return view('livewire.admin.admin-dashboard', [
            'totalStaff' => $totalStaff,
            'patientsToday' => $patientsToday,
            'activeCounters' => $activeCounters,
            'totalMedicines' => $totalMedicines,
            'systemStatus' => $systemStatus,
            'isOnline' => $isOnline,
            'lastChecked' => now()->format('H:i:s')
        ]);
    }
}
