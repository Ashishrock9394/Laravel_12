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
        return view('admin.dashboard', [
            'userCount' => User::where('parent_id', auth()->id())->count(),
            'ticketCount' => Ticket::where('assigned_to', auth()->id())->count(),
            'queryCount' => Query::where('admin_id', auth()->id())->count(),
            'contactCount' => Contact::where('admin_id', auth()->id())->count(),
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
