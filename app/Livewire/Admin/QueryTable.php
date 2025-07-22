<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Query;
use App\Models\User;
use Livewire\WithPagination;

class QueryTable extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        // Get IDs of users created by this admin
        $userIds = User::where('parent_id', auth()->id())->pluck('id');

        // Search and filter queries based on users under this admin
        $queries = Query::with('user')
            ->whereIn('user_id', $userIds)
            ->when($this->search, function ($query) {
                $query->whereHas('user', function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%');
                });
            })
            ->paginate(10);

        return view('livewire.admin.query-table', [
            'queries' => $queries,
        ]);
    }
}
