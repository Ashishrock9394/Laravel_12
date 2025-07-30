<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Contact;
use App\Models\User;
use Livewire\WithPagination;

class ContactTable extends Component
{
    use WithPagination;
    public function render()
    {
        $userIds = User::where('parent_id', auth()->id())->pluck('id');
        $contacts = Contact::with(['user'])
            ->whereIn('user_id', $userIds)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.admin.contact-table', [
            'contacts' => $contacts,
        ]);
    }
}
