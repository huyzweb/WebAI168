<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    protected $table = 'tintuc'; // Nếu tên bảng khác với tin_tucs
    protected $fillable = [
        'tieude', 'mota', 'ngaydang', 'link', 'hinhanh', 'trangthai', 'ngaytao', 'nguoidung_id'
    ];
}
