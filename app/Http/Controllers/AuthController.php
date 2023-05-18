<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials) || Auth::guard('dosen')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }


        return back()
            ->with([
                'error' => 'The provided credentials do not match our records.',
            ]);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

// public function profile(Request $request) {

// }
}
