<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:6',
        ]);

        // Attempt to log the user in
        if (auth()->attempt($request->only('email', 'password'))) {
            // Authentication passed
             $request->session()->regenerate();

             $user = auth()->user();

             // Check for roles if they exist
             if (isset($user->role)) {
                 if ($user->role === 'admin') {
                     return redirect()->intended(route('admin.dashboard'));
                 } elseif ($user->role === 'caregiver') {
                     return redirect()->intended(route('caregiver.dashboard'));
                 }
             }

            // Default to parent dashboard or intended page
            return redirect()->intended(route('parent.dashboard'));
        }

        // Authentication failed, redirect back with input and error message
        return redirect()->back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => 'These credentials do not match our records.']);
        }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
