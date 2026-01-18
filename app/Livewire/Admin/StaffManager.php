<?php

namespace App\Livewire\Admin;

use App\Models\Counter;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class StaffManager extends Component
{
    public $showModal = false;
    public $isEdit = false;
    public $staffId;
    public $name, $email, $password, $counter_id;

    public function openModal()
    {
        $this->resetInputFields();
        $this->isEdit = false;
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->counter_id = '';
    }

    public function edit($id)
    {
        
        $staff = User::findOrFail($id);
        $this->staffId = $id;
        $this->name = $staff->name;
        $this->email = $staff->email;
        $this->counter_id = $staff->counter_id;
        $this->password = '';

        session()->flash('success', 'Data staff berhasil diperbarui');

        $this->isEdit = true;
        $this->showModal = true;
    }

    public function createStaff()
    {
        $rule =[
            'name' => 'required',
            'email' => 'required|email|unique:users,email' . $this->staffId,
            'counter_id' => 'required|exists:counters,id'
        ];

        if(!$this->isEdit) {
            $rule = ['password' => 'required|min:6'];
        } else {
            $rule = ['password' => 'nullable|min:6'];
        }

        $this->validate($rule);

        if($this->isEdit) {
            $staff = User::find($this->staffId);

            $updateData = [
                'name' => $this->name,
                'email' => $this->email,
                'counter_id' => $this->counter_id
            ];

            if($this->password) {
                $updateData['password'] = Hash::make($this->password);
            }

            $staff->update($updateData);
            session()->flash('success', 'Berhasil memperbarui data staff');
        } else {
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'role' => 'staff',
                'counter_id' => $this->counter_id
            ]);

            session()->flash('success', 'Berhasil Manambahkan Akun Staff Baru');
        }

        $this->closeModal();
    }

    public function delete($id)
    {
        User::find($id)->delete();
        session()->flash('success', 'Akun Staff Berhasil dihapus');
    }

    public function render()
    {
        return view('livewire.admin.staff-manager', [
            'staffs' => User::where('role', 'staff')->with('counter')->get(),
            'counters' => Counter::all()
        ]);
    }
}
