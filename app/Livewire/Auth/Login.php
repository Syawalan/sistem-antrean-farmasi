<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    #[Validate('required|email', message: 'Email wajib diisi dan formatnya benar.')]
    public $email = '';

    #[Validate('required', message: 'Password tidak boleh kosong.')]
    public $password = '';

    public $role;

    public function Login()
    {
        $this->validate();

        $credentials = [
            'email' => $this->email, 
            'password' => $this->password
        ];

        if($this->role) {
            $credentials['role'] = $this->role;
        }

        if(Auth::attempt($credentials)) {
            session()->regenerate();
            return redirect()->route('dashboard');
        } else {
            session()->flash('error', 'Email, Password, atau Role Anda salah!');
        }
    }

    public function logOut() 
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}