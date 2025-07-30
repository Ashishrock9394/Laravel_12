<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class UserTable extends Component
{
    use WithPagination;

    public $search = '';

    protected $updatesQueryString = ['search']; // Optional: enables URL query string

    // Reset pagination when search term updates
    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = User::where('parent_id', auth()->id());

        if (!empty($this->search)) {
            $query->where(function ($subquery) {
                $subquery->where('name', 'like', '%' . $this->search . '%')
                         ->orWhere('email', 'like', '%' . $this->search . '%');
            });
        }

        $users = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('livewire.admin.user-table', [
            'users' => $users,
        ]);
    }
}
