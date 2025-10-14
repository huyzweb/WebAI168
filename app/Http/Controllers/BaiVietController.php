<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BaiVietController extends Controller
{
    public function index()
    {
        $baiviet = DB::table('baiviet')->orderBy('id', 'desc')->get();
        return view('auth.baiviet', compact('baiviet'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tieude' => 'required|max:255',
            'mota' => 'nullable',
            'link' => 'nullable|url',
            'hinhanh' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $hinhanh = null;
        if ($request->hasFile('hinhanh')) {
            $file = $request->file('hinhanh');
            $name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload/baiviet'), $name);
            $hinhanh = 'upload/baiviet/' . $name;
        }

        DB::table('baiviet')->insert([
            'tieude' => $request->tieude,
            'mota' => $request->mota,
            'link' => $request->link,
            'hinhanh' => $hinhanh,
            'trangthai' => 1,
            'ngaytao' => now(),
        ]);

        Session::flash('success', '✅ Thêm bài viết thành công!');
        return redirect()->route('baiviet');
    }

    public function update(Request $request, $id)
    {
        $data = [
            'tieude' => $request->tieude,
            'mota' => $request->mota,
            'link' => $request->link,
            'trangthai' => $request->trangthai,
        ];

        if ($request->hasFile('hinhanh')) {
            $file = $request->file('hinhanh');
            $name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('upload/baiviet'), $name);
            $data['hinhanh'] = 'upload/baiviet/' . $name;
        }

        DB::table('baiviet')->where('id', $id)->update($data);
        Session::flash('success', '💾 Cập nhật bài viết thành công!');
        return redirect()->route('baiviet');
    }

    public function destroy($id)
    {
        DB::table('baiviet')->where('id', $id)->delete();
        Session::flash('success', '🗑️ Đã xoá bài viết!');
        return redirect()->route('baiviet');
    }
    
}  