<?php

namespace App\Http\Controllers\Blogger\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:blogger')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login-blogger',[
            'title' => 'Blogger Login',
            'loginRoute' => 'blogger.login',
        ]);
    }

    public function login(Request $request)
    {
        $rules = [
            'email'    => 'required|email|min:5|max:191',
            'password' => 'required|string|min:4|max:255',
        ];

        //custom validation error messages.
        $messages = [
            'email.exists' => 'These credentials do not match our records.',
        ];
        //validate the request.
        $request->validate($rules, $messages);

        if (Auth::guard('blogger')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/blogger');
        }

        return redirect()
            ->back()
            ->withInput()
            ->with('error','Login failed, please try again!');
    }

    public function logout()
    {
        Auth::guard('blogger')->logout();
        return redirect('/blogger');
    }
}
