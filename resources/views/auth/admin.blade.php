<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Admin Panel - Quản lý người dùng</title>
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      display: flex;
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: #f8f9ff;
    }

    /* ==== SIDEBAR ==== */
    .sidebar {
      width: 240px;
      background: linear-gradient(135deg, #5f00ff, #b300ff);
      color: #fff;
      min-height: 100vh;
      padding-top: 30px;
      position: fixed;
    }
    .sidebar h4 {
      text-align: center;
      margin-bottom: 30px;
      font-weight: 600;
    }
    .sidebar a {
      display: block;
      padding: 12px 25px;
      color: #fff;
      text-decoration: none;
      transition: 0.3s;
    }
    .sidebar a:hover, .sidebar a.active {
      background: rgba(255,255,255,0.15);
      border-left: 4px solid #fff;
    }

    /* ==== MAIN CONTENT ==== */
    .content {
      margin-left: 250px;
      padding: 40px;
      width: calc(100% - 250px);
    }
    .card {
      border-radius: 15px;
      box-shadow: 0 3px 10px rgba(0,0,0,0.05);
    }
    .table {
      border: 1px solid #dee2e6;
      border-collapse: collapse;
    }
    .table th, .table td {
      border: 1px solid #dee2e6;
      padding: 8px;
    }
    .table th {
      background: #5f00ff;
      color: #fff;
    }
    .table tbody tr:hover {
      background-color: #f4f0ff;
    }

    .btn-gradient {
      background: linear-gradient(135deg, #7a00ff, #ff00cc);
      color: #fff;
      border: none;
      border-radius: 30px;
      padding: 8px 18px;
    }
    .btn-gradient:hover { opacity: 0.9; }
  </style>
</head>

<body>

  <!-- SIDEBAR -->
  <div class="sidebar">
    <h4><i class="bi bi-speedometer2 me-2"></i>Admin Panel</h4>

    <!-- Trang chủ -->
    <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">
      <i class="bi bi-house-door me-2"></i> Trang chủ
    </a>

    <!-- Quản lý người dùng -->
    <a href="{{ route('admin') }}" class="{{ request()->is('admin') ? 'active' : '' }}">
      <i class="bi bi-people me-2"></i> Người dùng
    </a>
    <!-- Quản lý tin tức  =-->
    <a href="{{ route('tintuc') }}" class="{{ request()->is('tintuc') ? 'active' : '' }}">
  <i class="bi bi-newspaper me-2"></i> Tin tức
</a>
    <!-- Quản lý bài viết  =-->
<a href="{{ route('baiviet') }}" class="{{ request()->is('baiviet') ? 'active' : '' }}">
  <i class="bi bi-pencil-square me-2"></i> Bài viết
</a>
     <!-- Quản lý Ebook -->
<a href="{{ route('ebook.index') }}" class="{{ request()->is('ebook*') ? 'active' : '' }}">
    <i class="bi bi-book me-2"></i> Ebook
</a>


   
    
    
    <a href="#"><i class="bi bi-globe2 me-2"></i> Thông tin số</a>
    <a href="{{ url('/logout') }}"><i class="bi bi-box-arrow-right me-2"></i> Đăng xuất</a>
  </div>

  <!-- MAIN CONTENT -->
  <div class="content">
    <h3 class="fw-bold text-primary mb-4"><i class="bi bi-people-fill me-2"></i> Quản lý người dùng</h3>

    <!-- Form thêm -->
    <div class="card p-4 mb-4">
      <h5 class="text-primary mb-3"><i class="bi bi-person-plus-fill me-2"></i> Thêm người dùng</h5>
      <form action="{{ route('admin.them') }}" method="POST">
        @csrf
        <div class="row g-3">
          <div class="col-md-4">
            <label>Họ và tên</label>
            <input type="text" name="hoten" class="form-control">
          </div>
          <div class="col-md-4">
            <label>Tài khoản</label>
            <input type="text" name="taikhoan" class="form-control">
          </div>
          <div class="col-md-4">
            <label>Mật khẩu</label>
            <input type="password" name="matkhau" class="form-control">
          </div>
          <div class="col-md-4">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
          </div>
          <div class="col-md-4">
            <label>SĐT</label>
            <input type="text" name="sdt" class="form-control">
          </div>
          <div class="col-md-2">
            <label>Quyền</label>
            <select name="quyen" class="form-select">
              <option value="admin">Admin</option>
              <option value="nguoidung">Người dùng</option>
            </select>
          </div>
          <div class="col-md-2">
            <label>Trạng thái</label>
            <select name="trangthai" class="form-select">
              <option value="Kích hoạt">Kích hoạt</option>
              <option value="Khóa">Khóa</option>
            </select>
          </div>
        </div>
        <div class="mt-3">
          <button type="submit" class="btn-gradient"><i class="bi bi-plus-lg me-2"></i> Thêm</button>
        </div>
      </form>
    </div>

    <!-- BẢNG NGƯỜI DÙNG -->
    <div class="card p-4">
      <h5 class="text-primary mb-3"><i class="bi bi-list-ul me-2"></i> Danh sách người dùng</h5>

      <table class="table table-bordered align-middle text-center">
        <thead>
          <tr>
            <th>ID</th>
            <th>Họ tên</th>
            <th>Tài khoản</th>
            <th>Email</th>
            <th>SĐT</th>
            <th>Quyền</th>
            <th>Trạng thái</th>
            <th>Ngày tạo</th>
            <th>Hành động</th>
          </tr>
        </thead>

        <tbody>
          @foreach($nguoidung as $nd)
          <tr>
            <td>{{ $nd->id }}</td>
            <td>{{ $nd->hoten }}</td>
            <td>{{ $nd->taikhoan }}</td>
            <td>{{ $nd->email }}</td>
            <td>{{ $nd->sdt }}</td>
            <td>{{ ucfirst($nd->quyen) }}</td>
            <td>{{ $nd->trangthai ? 'Kích hoạt' : 'Khóa' }}</td>
            <td>{{ $nd->ngaytao ?? '—' }}</td>
            <td>
              <!-- Nút sửa -->
              <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $nd->id }}">
                <i class="bi bi-pencil-square"></i>
              </button>

              <!-- Nút xóa -->
              <a href="{{ route('admin.xoa', $nd->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Xóa người dùng này?')">
                <i class="bi bi-trash"></i>
              </a>
            </td>
          </tr>

          <!-- Modal Sửa -->
          <div class="modal fade" id="editModal{{ $nd->id }}" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-centered">
              <div class="modal-content">
                <form action="{{ route('admin.capnhat', $nd->id) }}" method="POST">
                  @csrf
                  <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">✏️ Cập nhật người dùng #{{ $nd->id }}</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                  </div>

                  <div class="modal-body">
                    <div class="row g-3">
                      <div class="col-md-6">
                        <label>Họ và tên</label>
                        <input type="text" name="hoten" value="{{ $nd->hoten }}" class="form-control" required>
                      </div>
                      <div class="col-md-6">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ $nd->email }}" class="form-control">
                      </div>
                      <div class="col-md-6">
                        <label>Số điện thoại</label>
                        <input type="text" name="sdt" value="{{ $nd->sdt }}" class="form-control">
                      </div>
                      <div class="col-md-6">
                        <label>Mật khẩu (bỏ trống nếu không đổi)</label>
                        <input type="password" name="matkhau" class="form-control">
                      </div>
                      <div class="col-md-6">
                        <label>Quyền</label>
                        <select name="quyen" class="form-select">
                          <option value="admin" {{ $nd->quyen == 'admin' ? 'selected' : '' }}>Admin</option>
                          <option value="nguoidung" {{ $nd->quyen == 'nguoidung' ? 'selected' : '' }}>Người dùng</option>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label>Trạng thái</label>
                        <select name="trangthai" class="form-select">
                          <option value="1" {{ $nd->trangthai == 1 ? 'selected' : '' }}>Kích hoạt</option>
                          <option value="0" {{ $nd->trangthai == 0 ? 'selected' : '' }}>Khóa</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success">💾 Lưu thay đổi</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
