<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MangLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:mang', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
        return view('auth.mang.login');
    }

    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // Attempt to log the user in
        if (Auth::guard('mang')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // if successful, then redirect to their intended location

            return redirect()->intended(route('mang.dashboard'));


        }
        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('mang')->logout();
        return redirect('/mang');
        session()->flush();

    }
}
