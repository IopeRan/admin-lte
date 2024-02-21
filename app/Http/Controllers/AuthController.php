<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            'username' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt($validate)) {
            $user = auth()->user();

            return redirect('/user');
        } else {
            return back()->withErrors(['message' => 'hmm...Username or Password unavailable'])->withInput();
        }
    }

    public function registration()
    {
        return view('auth.registration', [
            'title' => 'Registration'
        ]);
    }

    public function registrationProcess(Request $request)
    {
        $validated = $request->validate([
            'fullname' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);

        $validated['password'] = Hash::make($request->input('password'));

        User::create($validated);

        return redirect('/login')->with('success', 'Registration Success');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'logout success');
    }
}
