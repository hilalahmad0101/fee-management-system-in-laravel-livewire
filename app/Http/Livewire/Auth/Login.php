<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $username, $password;
    public function render()
    {
        return view('livewire.auth.login')->layout('layout.login-app');
    }

    public function login()
    {
        $this->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $users = Auth::attempt(['name' => $this->username, 'password' => $this->password]);
        if (!$users) {
            session()->flash('error', 'Invalid username or password');
        } else {
            session()->flash('success', 'Login Successfully');
            return redirect(route('dashboard'));
        }
    }
}
