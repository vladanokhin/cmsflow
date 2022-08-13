<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignUpController extends Controller
{
    /**
     * Show the page for registration a new user.
     *
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function show()
    {
        return view('sign_up');
    }

    /**
     * Register the new user.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        if (Auth::check())
            return redirect('sites.list');

        $credentials = $request->validate([
            'name' => 'required||string|min:3|max:100',
            'email' => 'required|unique:users,email|email|min:3|max:150',
            'password' => 'required|string|min:6|max:100'
        ]);

        $user = User::create($credentials);

        if ($user) {
            Auth::login($user, true);
            $request->session()->regenerate();

            return redirect()->intended(route('sites.list'));
        }

        return back()->withErrors([
            'register' => 'There was an error when registering.',
        ]);
    }

}
