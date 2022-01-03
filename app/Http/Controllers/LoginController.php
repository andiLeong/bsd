<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LoginController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'username' => ['required',
                Rule::exists('users')->where(function ($query) {
                    return $query->where('is_admin', 1);
                }),
            ],
            'password' => 'required',
        ]);

        if (auth()->attempt($data)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }
}
