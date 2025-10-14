<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class TinTucController extends Controller
{
    // 📄 Hiển thị danh sách tin tức
    public function index()
    {
        $tintuc = DB::table('tintuc')->orderBy('id', 'desc')->get();
        return view('auth.tintuc', compact('tintuc'));
    }

    // ➕ Thêm tin tức mới
    public function store(Request $request)
    {
        $request->validate([
            'tieude' => 'required|max:255',
            'mota' => 'nullable',
            'link' => 'nullable|url',
            'hinhanh' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $hinhanh = null;

        // Nếu có upload ảnh
        if ($request->hasFile('hinhanh')) {
            $file = $request->file('hinhanh');
            $name = time() . '_' . $file->getClientOriginalName();

            // ✅ Đảm bảo thư mục tồn tại
            $uploadPath = public_path('upload/tintuc');
            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0777, true, true);
            }

            $file->move($uploadPath, $name);
            $hinhanh = 'upload/tintuc/' . $name;
        }

        DB::table('tintuc')->insert([
            'tieude' => $request->tieude,
            'mota' => $request->mota,
            'link' => $request->link,
            'hinhanh' => $hinhanh,
            'trangthai' => 1,
            'ngaytao' => now(),
        ]);

        Session::flash('success', '✅ Thêm tin tức thành công!');
        return redirect()->route('tintuc');
    }

    // ✏️ Cập nhật tin tức
    public function update(Request $request, $id)
    {
        $data = [
            'tieude' => $request->tieude,
            'mota' => $request->mota,
            'link' => $request->link,
            'trangthai' => $request->trangthai,
        ];

        $tintuc = DB::table('tintuc')->where('id', $id)->first();

        // Nếu có ảnh mới → xóa ảnh cũ + lưu ảnh mới
        if ($request->hasFile('hinhanh')) {
            $file = $request->file('hinhanh');
            $name = time() . '_' . $file->getClientOriginalName();

            $uploadPath = public_path('upload/tintuc');
            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0777, true, true);
            }

            $file->move($uploadPath, $name);
            $data['hinhanh'] = 'upload/tintuc/' . $name;

            // 🔥 Xóa ảnh cũ nếu tồn tại
            if ($tintuc && $tintuc->hinhanh && File::exists(public_path($tintuc->hinhanh))) {
                File::delete(public_path($tintuc->hinhanh));
            }
        }

        DB::table('tintuc')->where('id', $id)->update($data);
        Session::flash('success', '💾 Cập nhật tin tức thành công!');
        return redirect()->route('tintuc');
    }

    // ❌ Xoá tin tức
    public function destroy($id)
    {
        $tintuc = DB::table('tintuc')->where('id', $id)->first();

        // Xóa ảnh kèm theo nếu có
        if ($tintuc && $tintuc->hinhanh && File::exists(public_path($tintuc->hinhanh))) {
            File::delete(public_path($tintuc->hinhanh));
        }

        DB::table('tintuc')->where('id', $id)->delete();
        Session::flash('success', '🗑️ Đã xoá tin tức thành công!');
        return redirect()->route('tintuc');
    }
}
