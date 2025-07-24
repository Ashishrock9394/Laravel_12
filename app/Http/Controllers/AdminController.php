<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ticket;
use App\Models\Query;
use App\Models\Contact;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        $adminId = auth()->id(); 

        return view('admin.dashboard', [
            'userCount' => User::where('parent_id', $adminId)->count(),
            'ticketCount' => Ticket::where('assigned_to', $adminId)->count(),
            'queryCount' => Query::where('admin_id', $adminId)->count(),

            'contactCount' => Contact::whereIn('user_id', function ($query) use ($adminId) {
                $query->select('id')
                    ->from('users')
                    ->where('parent_id', $adminId);
            })->count(),
        ]);
    }
    public function users()
    {
        return view('admin.users');
    }
    public function tickets()
    {
        return view('admin.tickets');
    }
    public function queries()
    {
        return view('admin.queries');
    }   
    public function contacts()
    {
        return view('admin.contacts');
    }
    
}
