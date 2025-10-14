<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// ===== AUTH =====
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/dashboard', [AuthController::class, 'dashboard']);
Route::get('/logout', [AuthController::class, 'logout']);

// ===== ADMIN =====
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::post('/admin/them', [AdminController::class, 'store'])->name('admin.them');
Route::get('/admin/xoa/{id}', [AdminController::class, 'destroy'])->name('admin.xoa');
Route::get('/admin/sua/{id}', [AdminController::class, 'edit'])->name('admin.sua');
Route::post('/admin/sua/{id}', [AdminController::class, 'update'])->name('admin.capnhat');
Route::post('/admin/capnhat/{id}', [AdminController::class, 'update'])->name('admin.capnhat');

// ===== TINTUC =====
use App\Http\Controllers\TinTucController;

Route::get('/tintuc', [TinTucController::class, 'index'])->name('tintuc');
Route::post('/tintuc/them', [TinTucController::class, 'store'])->name('tintuc.them');
Route::post('/tintuc/sua/{id}', [TinTucController::class, 'update'])->name('tintuc.sua');
Route::get('/tintuc/xoa/{id}', [TinTucController::class, 'destroy'])->name('tintuc.xoa');
use App\Http\Controllers\BaiVietController;

// ================== QUẢN LÝ BÀI VIẾT ==================
Route::get('/baiviet', [BaiVietController::class, 'index'])->name('baiviet');
Route::post('/baiviet/them', [BaiVietController::class, 'store'])->name('baiviet.them');
Route::post('/baiviet/capnhat/{id}', [BaiVietController::class, 'update'])->name('baiviet.capnhat');
Route::get('/baiviet/xoa/{id}', [BaiVietController::class, 'destroy'])->name('baiviet.xoa');
// ===== EBOOK =====
use App\Http\Controllers\EbookController;

// Hiển thị danh sách Ebook
Route::get('/ebook', [EbookController::class, 'index'])->name('ebook.index');

// Hiển thị form thêm Ebook
Route::get('/ebook/them', [EbookController::class, 'formThem'])->name('ebook.form');

// Xử lý submit thêm Ebook
Route::post('/ebook/them', [EbookController::class, 'them'])->name('ebook.them');

// Sửa Ebook
Route::post('/ebook/sua/{id}', [EbookController::class, 'sua'])->name('ebook.sua');

// Xóa Ebook
Route::get('/ebook/xoa/{id}', [EbookController::class, 'xoa'])->name('ebook.xoa');


// Hiển thị danh sách người dùng
Route::get('/nguoidung', [EbookController::class, 'nguoidung'])->name('nguoidung');

use App\Http\Controllers\HomeTinTucController;



// Danh sách tin tức (trang chủ)
Route::get('/home/tintuc', [HomeTinTucController::class, 'index'])->name('home.tintuc');

// Chi tiết từng tin tức
Route::get('/home/tintuc/{id}', [HomeTinTucController::class, 'show'])->name('home.tintuc.show');

use App\Http\Controllers\HomeBaiVietController;

// Trang danh sách bài viết (trang chủ)
Route::get('/home/baiviet', [HomeBaiVietController::class, 'index'])->name('home.baiviet');

// Chi tiết từng bài viết
Route::get('/home/baiviet/{id}', [HomeBaiVietController::class, 'show'])->name('home.baiviet.show');


// Trang danh sách ebook
Route::get('/home/ebook', [EbookController::class, 'index'])
    ->name('home.ebook');

// Trang chi tiết từng ebook
Route::get('/home/ebook/{id}', [EbookController::class, 'show'])
    ->name('home.ebook.show');



// Trang quản lý Ebook (Admin)
Route::get('/ebook', [EbookController::class, 'index'])->name('ebook');

// Thêm Ebook
Route::post('/ebook/them', [EbookController::class, 'them'])->name('ebook.them');

// Sửa Ebook
Route::post('/ebook/sua/{id}', [EbookController::class, 'sua'])->name('ebook.sua');

// Xóa Ebook
Route::get('/ebook/xoa/{id}', [EbookController::class, 'xoa'])->name('ebook.xoa');

// Ebook - quản lý
Route::get('/ebook', [EbookController::class, 'index'])->name('ebook.index');
Route::post('/ebook/them', [EbookController::class, 'them'])->name('ebook.them');

// Hiển thị form sửa ebook
Route::get('/ebook/sua/{id}', [EbookController::class, 'edit'])->name('ebook.edit');

// Xử lý cập nhật ebook
Route::post('/ebook/sua/{id}', [EbookController::class, 'sua'])->name('ebook.sua');

// Xóa ebook
Route::get('/ebook/xoa/{id}', [EbookController::class, 'xoa'])->name('ebook.xoa');


Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');


// Trang quản lý Ebook (Admin)
Route::get('/ebook', [EbookController::class, 'index'])->name('ebook.index');

// Thêm Ebook
Route::get('/ebook/them', [EbookController::class, 'formThem'])->name('ebook.form');
Route::post('/ebook/them', [EbookController::class, 'them'])->name('ebook.them');

// Sửa Ebook
Route::get('/ebook/sua/{id}', [EbookController::class, 'edit'])->name('ebook.edit');
Route::post('/ebook/sua/{id}', [EbookController::class, 'sua'])->name('ebook.sua');

// Xóa Ebook
Route::get('/ebook/xoa/{id}', [EbookController::class, 'xoa'])->name('ebook.xoa');


// Danh sách Ebook
Route::get('/home/ebook', [EbookController::class, 'index'])->name('home.ebook');

// Chi tiết Ebook
Route::get('/home/ebook/{id}', [EbookController::class, 'show'])->name('home.ebook.show');
Route::get('/price', function () {
    return view('home.price');
});
Route::get('/contact', function () {
    return view('home.contact');
});


Route::get('/ebook', [EbookController::class, 'index'])->name('ebook.index'); // trang admin
Route::get('/ebook/xoa/{id}', [EbookController::class, 'xoa'])->name('ebook.xoa');
Route::get('/ebook/sua/{id}', [EbookController::class, 'edit'])->name('ebook.edit');

// trang người dùng hiển thị ebook
Route::get('/home/ebook', [EbookController::class, 'homeList'])->name('home.ebook');
Route::get('/home/ebook/{id}', [EbookController::class, 'show'])->name('home.ebook.show');

