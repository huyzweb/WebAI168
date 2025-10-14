<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // Hiển thị form đăng nhập
    public function showLogin() {
        return view('auth.login');
    }

    // Hiển thị form đăng ký
    public function showRegister() {
        return view('auth.register');
    }

    // Xử lý đăng ký
    public function register(Request $request) {
        $request->validate([
            'hoten' => 'required|string|max:100',
            'taikhoan' => 'required|string|max:50|unique:nguoidung,taikhoan',
            'matkhau' => 'required|string|min:6|confirmed',
            'email' => 'nullable|email'
        ]);

        DB::table('nguoidung')->insert([
            'hoten' => $request->hoten,
            'taikhoan' => $request->taikhoan,
            'matkhau' => md5($request->matkhau),
            'email' => $request->email,
            'quyen' => 'nguoidung'
        ]);

        return redirect('/login')->with('success', 'Đăng ký thành công! Mời bạn đăng nhập.');
    }

    // Xử lý đăng nhập
    public function login(Request $request) {
        $request->validate([
            'taikhoan' => 'required',
            'matkhau' => 'required'
        ]);

        $user = DB::table('nguoidung')
                  ->where('taikhoan', $request->taikhoan)
                  ->where('matkhau', md5($request->matkhau))
                  ->first();

        if ($user) {
            Session::put('nguoidung', $user);

            if ($user->quyen === 'admin') {
                return redirect('/admin')->with('success', 'Xin chào Quản trị viên!');
            } else {
                // 👉 CHỖ NÀY MÌNH ĐÃ SỬA: chuyển về trang chủ website
                return redirect('http://127.0.0.1:8000/')->with('success', 'Đăng nhập thành công!');
            }
        }

        return back()->with('error', 'Sai tài khoản hoặc mật khẩu!');
    }

    // Trang người dùng
    public function dashboard() {
        if (!Session::has('nguoidung'))
            return redirect('/login')->with('error', 'Bạn cần đăng nhập.');

        return view('auth.dashboard');
    }

    // Trang admin
    public function adminDashboard() {
        if (!Session::has('nguoidung'))
            return redirect('/login')->with('error', 'Bạn cần đăng nhập.');

        $user = Session::get('nguoidung');
        if ($user->quyen !== 'admin')
            return redirect('/')->with('error', 'Bạn không có quyền truy cập.');

        return view('auth.admin');
    }

    // Đăng xuất
    public function logout() {
        Session::forget('nguoidung');
        return redirect('/login')->with('success', 'Đăng xuất thành công!');
    }
}
