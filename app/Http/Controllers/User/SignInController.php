<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserSignInRequest;

class SignInController extends Controller
{
    /**
     *  Show the page for sing in user.
     *
     * @return View
     */
    public function show()
    {
        return view('user.auth.sign_in');
    }

    /**
     * User login.
     *
     * @param UserSignInRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(UserSignInRequest $request)
    {
        $credentials = $request->validated();
        $rememberMe = $request->boolean('rememberMe');

        if (Auth::attempt($credentials, $rememberMe)) {
            $request->session()->regenerate();
            return redirect()->intended(route('sites.list'));
        }

        return back()
            ->withInput($request->input())
            ->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
