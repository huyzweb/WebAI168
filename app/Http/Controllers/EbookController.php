<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Ebook;

class EbookController extends Controller
{
    public function index() {
        $ebooks = Ebook::orderBy('id', 'desc')->get();
        return view('auth.ebook', compact('ebooks'));
    }

    public function them(Request $r) {
        $file = null;
        $img = null;
        if ($r->hasFile('file')) $file = $r->file('file')->store('uploads/ebooks', 'public');
        if ($r->hasFile('hinhanh')) $img = $r->file('hinhanh')->store('uploads/ebook_covers', 'public');
        Ebook::create([
            'ten' => $r->ten,
            'tacgia' => $r->tacgia,
            'mota' => $r->mota,
            'file' => $file,
            'hinhanh' => $img,
            'trangthai' => 1,
        ]);
        return back()->with('success', 'Thêm Ebook thành công!');
    }

    public function sua(Request $r, $id) {
        $ebook = Ebook::findOrFail($id);
        $file = $ebook->file;
        $img = $ebook->hinhanh;
        if ($r->hasFile('file')) $file = $r->file('file')->store('uploads/ebooks', 'public');
        if ($r->hasFile('hinhanh')) $img = $r->file('hinhanh')->store('uploads/ebook_covers', 'public');
        $ebook->update([
            'ten' => $r->ten,
            'tacgia' => $r->tacgia,
            'mota' => $r->mota,
            'file' => $file,
            'hinhanh' => $img,
            'trangthai' => $r->trangthai,
        ]);
        return back()->with('success', 'Cập nhật Ebook thành công!');
    }

    public function xoa($id) {
        Ebook::destroy($id);
        return back()->with('success', 'Đã xóa Ebook!');
    }
}