<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BaiViet;
use App\Models\Ebook;

class HomeBaiVietController extends Controller
{
    public function index()
    {
        // Lấy danh sách bài viết
        $baiviet = BaiViet::orderBy('id', 'desc')->get();

        // Lấy danh sách ebook
        $ebook = Ebook::orderBy('id', 'desc')->get();

        // Gắn loại và chuẩn hóa ngày
        $baiviet = $baiviet->map(function ($bv) {
            $bv->loai = 'blog';
            $bv->ngaydang = $bv->ngaydang ?? $bv->ngaytao ?? now();
            return $bv;
        });

        $ebook = $ebook->map(function ($eb) {
            $eb->loai = 'ebook';
            $eb->ngaydang = $eb->ngaydang ?? $eb->ngaytao ?? now();
            return $eb;
        });

        // Gộp dữ liệu và sắp xếp
        $tatca = $baiviet->merge($ebook)->sortByDesc('ngaydang')->values();

        return view('home.baiviet', [
            'tatca' => $tatca,
            'baiviet' => $baiviet,
            'ebook' => $ebook
        ]);
    }
}
