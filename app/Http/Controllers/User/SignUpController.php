<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserSignUpRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
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
        return view('user.auth.sign_up');
    }

    /**
     * Register the new user.
     *
     * @param UserSignUpRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(UserSignUpRequest $request)
    {
        if (Auth::check())
            return redirect('sites.list');

        $credentials = $request->validated();

        $user = User::create($credentials);

        if ($user) {
            Auth::login($user);
            $request->session()->regenerate();

            return redirect()->intended(route('sites.list'));
        }

        return back()
            ->withInput($request->input())
            ->withErrors([
            'register' => 'There was an error when registering.',
        ]);
    }

}
