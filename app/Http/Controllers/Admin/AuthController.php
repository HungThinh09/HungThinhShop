<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AuthRequest;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return view('admin.index', [
                'title' => 'Admin HTH',
                'tieude' => 'Trang quản trị ',
            ]);
        }
        return redirect()->route('login');
    }

    public function login()
    {

        return view('admin.auth.login', [
            'title' => "Đăng nhập hệ thống"
        ]);
    }

    public function logon(AuthRequest $req)
    {
        if (auth::attempt([
            'user' => $req->user,
            'password' => $req->password,
        ])) {
            return redirect()->route('admin');
        } else {
            return redirect()->route('login')->with('error', 'Tài khoản hoặc password không đúng');
        }
    }

    public function logout()
    {
        auth::logout();
        return redirect()->route('login');
    }
}
