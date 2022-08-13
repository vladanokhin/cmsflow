<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignInController extends Controller
{


    /**
     *  Show the page for sing in user.
     *
     * @return View
     */
    public function show()
    {
        return view('sign_in');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|min:3|max:150',
            'password' => 'required|string|min:6|max:100'
        ]);
        $rememberMe = $request->boolean('rememberMe');

        if (Auth::attempt($credentials, $rememberMe)) {
            $request->session()->regenerate();

            return redirect()->intended(route('sites.list'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
