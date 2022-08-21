<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePassword extends Component
{
    public $username, $password;

    public function mount()
    {
        $users = User::findOrFail(Auth::user()->id);
        $this->username = $users->name;
    }
    public function render()
    {
        return view('livewire.admin.change-password')->layout('layout.app');
    }

    public function change()
    {
        $users = User::where('name', $this->username)->first();
        if ($users) {
            $users->password = Hash::make($this->password);
            $users->save();
            session()->flash('success', 'Password Changed Successfully');
        }
    }
}
