<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ebook extends Model
{
    use HasFactory;

    // ✅ Tên bảng trong database
    protected $table = 'ebooks';

    // ✅ Các cột được phép ghi
    protected $fillable = [
        'ten',
        'tacgia',
        'mota',
        'file',
        'hinhanh',
        'trangthai',
        'ngaytao',
    ];

    // ✅ Tắt timestamps mặc định (created_at, updated_at)
    public $timestamps = false;

    // ✅ (Tùy chọn) Nếu cột ngày tạo là datetime, định dạng nó cho dễ đọc
    protected $casts = [
        'ngaytao' => 'datetime:Y-m-d H:i:s',
    ];

    // ✅ (Tùy chọn) Scope lọc Ebook đang hiển thị
    public function scopeHienThi($query)
    {
        return $query->where('trangthai', 1);
    }
}
