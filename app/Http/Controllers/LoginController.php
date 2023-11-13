<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login', [
            'title' => 'Đăng Nhập Hệ Thống'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt([
            'name' => $request->input('name'),
            'password' => $request->input('password')
        ], $request->input('remember'))) {

            return redirect()->route('product');
        }

        Session::flash('error', 'User hoặc Password không đúng');
        return redirect()->back();
    }
}
