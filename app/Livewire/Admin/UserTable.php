<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class UserTable extends Component
{
    public function render()
    {
        $users = User::where('parent_id', auth()->id())->paginate(10);  
        return view('livewire.admin.user-table', [
            'users' => $users,
        ]);
    }
}
