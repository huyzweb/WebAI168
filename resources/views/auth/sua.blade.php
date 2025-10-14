<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Sửa người dùng - VN168 Admin</title>
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
  <div class="card shadow p-4">
    <h3 class="text-primary mb-4">✏️ Cập nhật thông tin người dùng</h3>

    <form action="{{ route('admin.capnhat', $nguoidung->id) }}" method="POST">
      @csrf
      <div class="row g-3">
        <div class="col-md-6">
          <label>Họ và tên</label>
          <input type="text" name="hoten" class="form-control" value="{{ $nguoidung->hoten }}">
        </div>
        <div class="col-md-6">
          <label>Email</label>
          <input type="email" name="email" class="form-control" value="{{ $nguoidung->email }}">
        </div>
        <div class="col-md-6">
          <label>Số điện thoại</label>
          <input type="text" name="sdt" class="form-control" value="{{ $nguoidung->sdt }}">
        </div>
        <div class="col-md-6">
          <label>Mật khẩu (để trống nếu không đổi)</label>
          <input type="password" name="matkhau" class="form-control">
        </div>
        <div class="col-md-6">
          <label>Quyền</label>
          <select name="quyen" class="form-select">
            <option value="admin" {{ $nguoidung->quyen == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="nguoidung" {{ $nguoidung->quyen == 'nguoidung' ? 'selected' : '' }}>Người dùng</option>
          </select>
        </div>
        <div class="col-md-6">
          <label>Trạng thái</label>
          <select name="trangthai" class="form-select">
            <option value="1" {{ $nguoidung->trangthai == 1 ? 'selected' : '' }}>Kích hoạt</option>
            <option value="0" {{ $nguoidung->trangthai == 0 ? 'selected' : '' }}>Khóa</option>
          </select>
        </div>
      </div>

      <div class="mt-4">
        <button type="submit" class="btn btn-primary">💾 Lưu thay đổi</button>
        <a href="{{ route('admin') }}" class="btn btn-secondary">⬅️ Quay lại</a>
      </div>
    </form>
  </div>
</div>
</body>
</html>
