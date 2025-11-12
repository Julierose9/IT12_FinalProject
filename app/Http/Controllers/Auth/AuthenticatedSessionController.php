<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Show the login form
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle the login attempt
     */
    public function login(Request $request)
    {
        // Validate login fields
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        // Debug: Check if user exists
        $user = \App\Models\User::where('username', $credentials['username'])->first();
        
        if (!$user) {
            return back()->withErrors([
                'username' => 'Username not found.',
            ])->onlyInput('username');
        }

        // Debug: Check password manually
        if (!Hash::check($credentials['password'], $user->password)) {
            return back()->withErrors([
                'username' => 'Password is incorrect.',
            ])->onlyInput('username');
        }

        // Attempt login using username and password
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Redirect user based on their role
            if ($user->role === 'admin') {
                return redirect()->intended(route('admin.dashboard'));
            }

            if ($user->role === 'cashier') {
                return redirect()->intended(route('cashier.dashboard'));
            }

            // If role doesn't match any defined type
            Auth::logout();
            return redirect()->route('login')->withErrors([
                'username' => 'Unauthorized role. Please contact admin.',
            ]);
        }

        // Invalid credentials
        return back()->withErrors([
            'username' => 'Authentication failed.',
        ])->onlyInput('username');
    }

    /**
     * Handle user logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'You have been logged out successfully.');
    }
}