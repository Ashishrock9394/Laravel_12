<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
}
