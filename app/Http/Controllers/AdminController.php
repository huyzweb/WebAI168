<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index()
    {
        if (!Session::has('nguoidung') || Session::get('nguoidung')->quyen !== 'admin') {
            return redirect('/login')->with('error', 'Bạn không có quyền truy cập!');
        }

        $nguoidung = DB::table('nguoidung')->orderByDesc('id')->get();
        return view('auth.admin', compact('nguoidung'));
    }

    // ✅ HÀM THÊM NGƯỜI DÙNG
    public function store(Request $request)
    {
        $request->validate([
            'hoten' => 'required|string|max:100',
            'taikhoan' => 'required|string|max:50|unique:nguoidung,taikhoan',
            'matkhau' => 'required|string|min:6',
            'email' => 'nullable|email',
            'sdt' => 'nullable|string|max:20',
            'quyen' => 'required',
            'trangthai' => 'required'
        ]);

        DB::table('nguoidung')->insert([
            'hoten' => $request->hoten,
            'taikhoan' => $request->taikhoan,
            'matkhau' => md5($request->matkhau),
            'email' => $request->email,
            'sdt' => $request->sdt,
            'quyen' => $request->quyen,
            'trangthai' => $request->trangthai,
            'ngaytao' => now()
        ]);

        return redirect()->route('admin')->with('success', 'Thêm người dùng thành công!');
    }

    public function destroy($id)
    {
        DB::table('nguoidung')->where('id', $id)->delete();
        return redirect()->route('admin')->with('success', 'Đã xóa người dùng thành công!');
    }
    public function edit($id)
{
    $nguoidung = DB::table('nguoidung')->where('id', $id)->first();
    return view('auth.sua', compact('nguoidung'));
}

public function update(Request $request, $id)
{
    $data = [
        'hoten' => $request->hoten,
        'email' => $request->email,
        'sdt' => $request->sdt,
        'quyen' => $request->quyen,
        'trangthai' => $request->trangthai,
    ];

    if (!empty($request->matkhau)) {
        $data['matkhau'] = md5($request->matkhau);
    }

    DB::table('nguoidung')->where('id', $id)->update($data);

    return redirect()->route('admin')->with('success', 'Cập nhật người dùng thành công!');
}



}
