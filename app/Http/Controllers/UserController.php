<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User; 
use App\Models\Ticket;
use App\Models\Contact;
use App\Models\Query;

class UserController extends Controller
{
    public function loginPage()
    {
        return view('login');
    }

    public function signupPage()
    {
        return view('signup');
    }

    public function signup(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|min:6|confirmed',
        ]);

        try {
            $user = new User();
            $user->name = $request->first_name . ' ' . $request->last_name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->user_type = $request->input('user_type', 'user');
            $user->parent_id = $request->input('parent_id');

            $user->save();

            Auth::login($user);

            return $this->redirectByUserType($user->user_type, 'registration');

        } catch (\Exception $e) {
            return back()->withInput()
                        ->with('error', 'Signup failed. Please try again.');
        }
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return $this->redirectByUserType(Auth::user()->user_type, 'login');
        }

        return back()->with('error', 'Invalid email or password')->withInput();

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'You have been logged out successfully.');
    }

    private function redirectByUserType($type, $context = 'login')
    {
        $message = ucfirst($type) . " $context successful";

        return match ($type) {
            'superadmin' => redirect()->route('superadmin.dashboard')->with('success', $message),
            'admin'      => redirect()->route('admin.dashboard')->with('success', $message),
            default      => redirect()->route('user.dashboard')->with('success', $message),
        };
    }
    public function userProfile()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    public function createTicketPage()
    {
        return view('user.create-ticket');
    }

    public function createTicket(Request $request)
    {   
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
        $ticket = new Ticket();
        $ticket->user_id = Auth::id();
        $ticket->subject = $request->subject;
        $ticket->message = $request->message;
        $ticket->status = 'open';   

        $ticket->save();
        // Logic to create a ticket
        // This is just a placeholder for the actual implementation
        return redirect('/view-tickets')->with('success', 'Ticket created successfully.');
    }   

    public function viewTickets()
    {
        $tickets = Ticket::where('user_id', Auth::id())->get();
        return view('user.view-tickets', compact('tickets'));
    }

    public function contactStore(Request $request){

        if(!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to contact us.');
        }

        $request->validate([
            'contactName' => 'required|string|max:255',
            'contactEmail' => 'required|email|max:255',
            'contactMessage' => 'required|string',
        ]);

        $contact = new Contact();
        $contact->user_id = Auth::id();
        $contact->name = $request->contactName;
        $contact->email = $request->contactEmail;
        $contact->message = $request->contactMessage;

        $contact->save();

        return redirect()->back()->with('success', 'Your message has been sent successfully.');

    }

}
