<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class users extends Component
{
    public $users;

    public function mount()
    {
        $this->loadUsers();
    }

    public function loadUsers()
    {
        $this->users = User::Select('id', 'username', 'email', 'role')
            ->orderBy('created_at', 'DESC')
            ->get();
    }

    public function changeRole($UserId)
    {
        $User = User::findOrFail($UserId);
        if ($User->role == 'admin') {
            $User->role = 'user';
        }else{
            $User->role = 'admin';
        }
        $User->save();
        $this->loadUsers();
    }
    public function delete($UserId)
    {
        User::findOrFail($UserId)->delete();
        $this->loadUsers(); // رفرش لیست
    }

    public function render()
    {
        return view('livewire.admin.users');
    }
}
