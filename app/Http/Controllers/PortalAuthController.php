<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        $request->validateWithBag('login', [
            'login_identifier' => ['required', 'string'],
            'login_password' => ['required', 'string', 'min:6'],
        ]);

        $loginValue = $request->login_identifier;
        $field = filter_var($loginValue, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';

        $attempted = Auth::guard('web')->attempt([
            $field => $loginValue,
            'password' => $request->login_password,
        ], $request->boolean('remember'));

        if (!$attempted) {
            return back()
                ->withInput($request->only('login_identifier', 'remember'))
                ->with('auth_mode', 'login')
                ->withErrors([
                    'login_identifier' => 'These credentials do not match our records.',
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
            'register_mobile' => ['required', 'string', 'max:15', 'unique:users,mobile'],
            'register_password' => ['required', 'confirmed', Password::min(6)],
        ]);

        $user = User::create([
            'name' => $data['register_name'],
            'email' => $data['register_email'],
            'mobile' => $data['register_mobile'],
            'password' => Hash::make($data['register_password']),
        ]);

        Auth::guard('web')->login($user);
        $request->session()->regenerate();

        return redirect()->intended(route('home'))
            ->with('success', 'Registration completed successfully.');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Logged out successfully.');
    }
}
