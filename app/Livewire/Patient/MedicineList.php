<?php

namespace App\Livewire\Patient;

use App\Models\Medicine;
use Livewire\Component;
use Livewire\WithPagination;

class MedicineList extends Component
{
    use WithPagination;

    public $search = '';

    // Reset halaman ke nomor 1 jika user mengetik di kolom pencarian
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $medicines = Medicine::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->where('stok', '>', 0) // Hanya tampilkan obat yang ada stoknya
            ->orderBy('name', 'asc')
            ->get(); // Gunakan ->paginate(10) jika data sangat banyak

        return view('livewire.patient.medicine-list', [
            'medicines' => $medicines
        ]);
    }
}
