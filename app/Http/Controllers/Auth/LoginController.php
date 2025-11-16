<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->boolean('remember');

        // Find user by email
        $user = \App\Models\User::where('email', $credentials['email'])->first();

        // Case 1: User not found
        if (!$user) {
            throw ValidationException::withMessages([
                'email' => 'The provided email does not exist.',
            ]);
        }

        // Case 2: Wrong password
        if (!Hash::check($credentials['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => 'The password is incorrect.',
            ]);
        }

        // Case 3: Role check
        if (!in_array($user->role, ['admin', 'cashier'])) {
            throw ValidationException::withMessages([
                'email' => 'Your account role is not authorized. Contact admin.',
            ]);
        }

        // Case 4: Login success
        Auth::login($user, $remember);
        $request->session()->regenerate();

        // Redirect based on role
        return redirect()->intended(
            $user->role === 'admin' ? route('admin.dashboard') : route('cashier.dashboard')
        );
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logged out successfully.');
    }
}