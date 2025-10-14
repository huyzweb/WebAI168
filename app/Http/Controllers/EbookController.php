<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Ebook;

class EbookController extends Controller
{
    public function index()
    {
        $ebooks = Ebook::orderBy('id', 'desc')->get();
        return view('auth.ebook', compact('ebooks'));
    }

    public function them(Request $r)
    {
        $data = $r->validate([
            'ten' => 'required|string|max:255',
            'tacgia' => 'nullable|string|max:255',
            'mota' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx,epub|max:5120',
            'hinhanh' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Upload file ebook
        if ($r->hasFile('file')) {
            $data['file'] = $r->file('file')->store('uploads/ebooks', 'public');
        }

        // Upload hình bìa ebook
        if ($r->hasFile('hinhanh')) {
            $data['hinhanh'] = $r->file('hinhanh')->store('uploads/ebook_covers', 'public');
        }

        // Trạng thái mặc định
        $data['trangthai'] = 1;

        Ebook::create($data);

        return back()->with('success', 'Thêm Ebook thành công!');
    }

    public function sua(Request $r, $id)
    {
        $ebook = Ebook::findOrFail($id);

        $data = $r->validate([
            'ten' => 'required|string|max:255',
            'tacgia' => 'nullable|string|max:255',
            'mota' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx,epub|max:5120',
            'hinhanh' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'trangthai' => 'required|integer',
        ]);

        if ($r->hasFile('file')) {
            $data['file'] = $r->file('file')->store('uploads/ebooks', 'public');
        }

        if ($r->hasFile('hinhanh')) {
            $data['hinhanh'] = $r->file('hinhanh')->store('uploads/ebook_covers', 'public');
        }

        $ebook->update($data);

        return back()->with('success', 'Cập nhật Ebook thành công!');
    }

    public function xoa($id)
    {
        Ebook::destroy($id);
        return back()->with('success', 'Đã xóa Ebook!');
    }

    public function edit($id)
    {
        $ebook = Ebook::findOrFail($id);
        return view('auth.ebook_edit', compact('ebook'));
    }
    public function homeList()
{
    $ebooks = Ebook::orderBy('id', 'desc')->get();
    return view('home.ebook', compact('ebooks'));
}

public function show($id)
{
    $ebook = Ebook::findOrFail($id);
    return view('home.ebook-detail', compact('ebook'));
}

}
