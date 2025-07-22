<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    //

    public function index()
    {
        if (auth()->check()) {
            if (auth()->user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif (auth()->user()->role === 'superadmin') {
                return redirect()->route('superadmin.dashboard');
            }
            return redirect()->route('user.dashboard');
        }

        return view('home'); // Public home page
    }

    public function about()
    {
        return view('about'); // About page
    }



}
