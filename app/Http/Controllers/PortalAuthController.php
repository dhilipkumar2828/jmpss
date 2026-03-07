<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class PortalAuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::guard('web')->check()) {
            return redirect()->route('home');
        }

        return view('frontend.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validateWithBag('login', [
            'login_email' => ['required', 'email'],
            'login_password' => ['required', 'string', 'min:6'],
        ]);

        $attempted = Auth::guard('web')->attempt([
            'email' => $credentials['login_email'],
            'password' => $credentials['login_password'],
        ], $request->boolean('remember'));

        if (!$attempted) {
            return back()
                ->withInput($request->only('login_email', 'remember'))
                ->with('auth_mode', 'login')
                ->withErrors([
                    'login_email' => 'These credentials do not match our records.',
                ], 'login');
        }

        $request->session()->regenerate();

        return redirect()->intended(route('home'))
            ->with('success', 'Logged in successfully.');
    }

    public function register(Request $request)
    {
        $data = $request->validateWithBag('register', [
            'register_name' => ['required', 'string', 'max:255'],
            'register_email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'register_password' => ['required', 'confirmed', Password::min(6)],
        ]);

        $user = User::create([
            'name' => $data['register_name'],
            'email' => $data['register_email'],
            'password' => $data['register_password'],
        ]);

        Auth::guard('web')->login($user);
        $request->session()->regenerate();

        return redirect()->intended(route('home'))
            ->with('success', 'Registration completed successfully.');
    }
}
