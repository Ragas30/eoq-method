<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('pages.auth.login');
    }

    public function registerPage()
    {
        return view('pages.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:10|unique:users,username',
            'password' => 'required|string|min:8|max:10|confirmed',
            'nama_lengkap' => 'required|string|max:50',
            'email' => 'required|email|max:50|unique:pelanggan,email',
            'jenis_kelamin' => 'required|in:L,P',
            'no_telfon' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
        ]);

        DB::transaction(function () use ($request) {
            $user = User::create([
                'username' => $request->username,
                'password' => $request->password,
                'role' => 'pelanggan',
            ]);

            Pelanggan::create([
                'id_user' => $user->id,
                'nm_lengkap' => $request->nama_lengkap,
                'email' => $request->email,
                'jk' => $request->jenis_kelamin,
                'telp' => $request->no_telfon,
                'alamat' => $request->alamat,
            ]);
        });

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string|min:8',
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->route('dashboard.home');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda telah berhasil logout.');
    }
}
