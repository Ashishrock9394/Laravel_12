<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ticket;
use App\Models\Query;
use App\Models\Contact;

class SuperadminController extends Controller
{
     public function dashboard()
    {
        return view('superadmin.dashboard', [
            'userCount' => User::where('user_type', 'user')->count( ),
            'adminCount' => User::where('user_type', 'admin')->count( ),
            'ticketCount' => Ticket::all()->count(),
            'queryCount' => Query::all()->count(),
            'contactCount' => Contact::all()->count(),
        ]);
    }
}
