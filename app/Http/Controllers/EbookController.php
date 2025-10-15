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
        try {
            $filePath = null;
            $imgPath = null;

            // ✅ Lưu file PDF
            if ($r->hasFile('file')) {
                $filePath = $r->file('file')->store('uploads/ebooks', 'public');
            }

            // ✅ Lưu ảnh bìa
            if ($r->hasFile('hinhanh')) {
                $imgPath = $r->file('hinhanh')->store('uploads/ebook_covers', 'public');
            }

            // ✅ Tạo Ebook mới
            Ebook::create([
                'ten'       => $r->ten,
                'tacgia'    => $r->tacgia,
                'mota'      => $r->mota,
                'file'      => $filePath,
                'hinhanh'   => $imgPath,
                'trangthai' => 1,
            ]);

            return redirect()->back()->with('success', '✅ Thêm Ebook thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '❌ Lỗi khi thêm Ebook: ' . $e->getMessage());
        }
    }

   
    public function sua(Request $r, $id)
    {
        try {
            $ebook = Ebook::findOrFail($id);

            $filePath = $ebook->file;
            $imgPath  = $ebook->hinhanh;

            //  Upload file mới nếu có
            if ($r->hasFile('file')) {
                if ($filePath && Storage::disk('public')->exists($filePath)) {
                    Storage::disk('public')->delete($filePath);
                }
                $filePath = $r->file('file')->store('uploads/ebooks', 'public');
            }

            //  Upload ảnh mới nếu có
            if ($r->hasFile('hinhanh')) {
                if ($imgPath && Storage::disk('public')->exists($imgPath)) {
                    Storage::disk('public')->delete($imgPath);
                }
                $imgPath = $r->file('hinhanh')->store('uploads/ebook_covers', 'public');
            }

            //  Cập nhật dữ liệu
            $ebook->update([
                'ten'       => $r->ten,
                'tacgia'    => $r->tacgia,
                'mota'      => $r->mota,
                'file'      => $filePath,
                'hinhanh'   => $imgPath,
                'trangthai' => $r->trangthai ?? 1,
            ]);

            return redirect()->back()->with('success', '✅ Cập nhật Ebook thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '❌ Lỗi khi cập nhật: ' . $e->getMessage());
        }
    }

    /**
     * Xóa Ebook
     */
    public function xoa($id)
    {
        try {
            $ebook = Ebook::findOrFail($id);

            //  Xóa file vật lý nếu có
            if ($ebook->file && Storage::disk('public')->exists($ebook->file)) {
                Storage::disk('public')->delete($ebook->file);
            }
            if ($ebook->hinhanh && Storage::disk('public')->exists($ebook->hinhanh)) {
                Storage::disk('public')->delete($ebook->hinhanh);
            }

            $ebook->delete();

            return redirect()->back()->with('success', '🗑️ Đã xóa Ebook thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '❌ Lỗi khi xóa Ebook: ' . $e->getMessage());
        }
        
    }
    
}
