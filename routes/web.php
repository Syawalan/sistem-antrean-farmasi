<?php

use App\Livewire\Auth\Login;
use App\Livewire\Monitor\Display;
use App\Livewire\Patient\TakeQueue;
use App\Livewire\Admin\StaffManager;
use App\Livewire\Staff\QueueHistory;
use App\Livewire\Patient\QueueDetail;
use App\Livewire\Patient\QueueStatus;
use App\Livewire\Staff\CounterAction;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\AdminDashboard;
use App\Livewire\Patient\MedicineList;
use App\Livewire\Admin\MedicineManager;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function() {
    return view('welcome');
});

Route::get('/ambil-antrian', TakeQueue::class)->name('patient.take-queue');

Route::prefix('pasien')->group(function() {
    Route::get('/status', QueueStatus::class)->name('queue.status');
    Route::get('/detail', QueueDetail::class)->name('patient.detail');
    Route::get('/obat', MedicineList::class)->name('patient.medicine');
});

Route::get('/status-antrean', QueueStatus::class)->name('queue.status');
Route::get('/monitor', Display::class)->name('monitor');

Route::get('/login', Login::class)->name('login');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/dashboard', function () {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('staff.counter');
    })->name('dashboard');

    Route::middleware(['can:is-staff'])->group(function () {
        Route::get('/staff/panggil', CounterAction::class)->name('staff.counter');
        Route::get('/staff/riwayat', QueueHistory::class)->name('staff.history');
    });

    // --- KHUSUS ADMIN ---
    Route::middleware(['can:is-admin'])->group(function () {
        Route::get('/admin/dashboard', AdminDashboard::class)->name('admin.dashboard');
        Route::get('/admin/staff', StaffManager::class)->name('admin.staff');
        Route::get('/admin/obat', MedicineManager::class)->name('admin.medicine');
    });

});
