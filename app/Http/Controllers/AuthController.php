<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Jurusan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin(){
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return back()->withErrors([
                'login' => 'Wrong email or password',
            ])->withInput();
        }

        $request->session()->regenerate();

        // fallback to home if 'redirect' not present
        return redirect($request->input('redirect'));
    }

    public function showRegister(){
        $jurusans = Jurusan::all();
        return view('auth.register', ['jurusans' => $jurusans]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'nim' => 'required',
            'jurusan' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ]);

        $user = User::create([
            'name' => $request->name,
            'role' => $request->role,
            'nim' => $request->nim,
            'jurusan_id' => $request->jurusan,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('beasiswa')->with('success', 'Logout Success');
    }
}