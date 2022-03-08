<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
       $this->middleware('guest')->except('logout');
    }
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

        $loginUser = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        $request->session()->put('user',$request->email);
        return response()->json([
            'status' => 200,
            'message' => 'Login successfully',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
