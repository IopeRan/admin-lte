<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login', [
            'title' => 'Login'
        ]);
    }

    public function loginAuth(Request $request)
    {
        $validate = $request->validate([
            'fullname' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt($validate)) {
            $user = auth()->user();

            return redirect('/');
        } else {
            return back()->withErrors(['message' => 'hmm...Username or Password unavailable'])->withInput();
        }
    }
}
