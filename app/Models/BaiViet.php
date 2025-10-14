<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaiViet extends Model
{
    use HasFactory;

    protected $table = 'baiviet'; // đúng tên bảng trong database
    protected $fillable = ['tieude', 'mota', 'hinhanh', 'ngaydang', 'loai'];
}
