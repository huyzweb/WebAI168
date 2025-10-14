<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NguoiDung extends Model
{
    protected $table = 'nguoidung';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'hoten', 'taikhoan', 'matkhau', 'email', 'sdt', 'quyen', 'trangthai'
    ];
}
