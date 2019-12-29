<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $data = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (auth()->guard('admins')->attempt($data)) {
            if (auth()->guard('admins')->user()->role_id == 1) {
                return redirect()->route('dashboard.index');
            } elseif (auth()->guard('admins')->user()->role_id == 2) {
                return redirect()->route('userSantri.dashboard');
            }
        } else {
            return redirect()->back()->withErrors('Username dan password salah');
        }
    }

    public function logout() {
        session()->flush();
        auth()->guard('admins')->logout();
        return redirect()->route('admin.login');
    }
}
