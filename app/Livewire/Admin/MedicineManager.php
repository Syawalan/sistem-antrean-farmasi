<?php

namespace App\Livewire\Admin;

use App\Models\Medicine;
use Livewire\Component;

class MedicineManager extends Component
{
    public $showModal = false;
    public $isEdit = false;

    public $name, $code, $stok,$golongan, $indikasi, $harga, $medicineId;

    public function openModal()
    {
        $this->resetInputFields();
        $this->isEdit = false;
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetValidation();
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->code = '';
        $this->stok = '';
        $this->golongan ='obat bebas';
        $this->indikasi = '';
        $this->harga = '';
        $this->medicineId = null;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'code' => 'required|unique:medicines,code,' . $this->medicineId,
            'stok' => 'required|numeric|min:0',
            'golongan' => 'required|in:obat bebas,obat bebas terbatas,obat keras',
            'indikasi' => 'nullable|string',
            'harga' => 'required|numeric|min:0'
        ]);

        Medicine::updateOrCreate(['id' => $this->medicineId],[
            'name' => $this->name,
            'code' => $this->code,
            'stok' => $this->stok,
            'golongan' => $this->golongan,
            'indikasi' => $this->indikasi,
            'harga' => $this->harga
        ]);

        $this->reset();
        session()->flash('success', $this->isEdit ? 'Data obat berhasil diperbarui' : 'Obat baru berhasil disimpan!');
    }

    public function edit($id)
    {
        $medicine = Medicine::findOrFail($id);
        $this->medicineId = $id;
        $this->name = $medicine->name;
        $this->code = $medicine->code;
        $this->stok = $medicine->stok;
        $this->golongan = $medicine->golongan;
        $this->indikasi = $medicine->indikasi;
        $this->harga = (int) $medicine->harga;

        $this->isEdit = true;
        $this->showModal = true;
    }

    public function delete($id)
    {
        Medicine::find($id)->delete();
        session()->flash('success', 'Obat telah dihapus dari database.');
    }

    public function render()
    {
        return view('livewire.admin.medicine-manager', [
            'medicines' => Medicine::latest()->get()
        ]);
    }
}
