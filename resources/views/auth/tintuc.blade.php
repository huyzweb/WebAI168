<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Quản lý Tin tức</title>
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body { display: flex; background: #f8f9ff; font-family: 'Poppins', sans-serif; }
    .sidebar {
      width: 240px; background: linear-gradient(135deg, #5f00ff, #b300ff);
      color: #fff; min-height: 100vh; padding-top: 30px; position: fixed;
    }
    .sidebar a {
      display: block; padding: 12px 25px; color: #fff; text-decoration: none;
    }
    .sidebar a:hover, .sidebar a.active {
      background: rgba(255,255,255,0.15); border-left: 4px solid #fff;
    }
    .content { margin-left: 260px; padding: 40px; width: calc(100% - 260px); }
    .table th { background: #5f00ff; color: #fff; }
    .btn-gradient {
      background: linear-gradient(135deg, #7a00ff, #ff00cc);
      color: #fff; border: none; border-radius: 30px; padding: 8px 18px;
    }
  </style>
</head>
<body>

  <div class="sidebar">
    <h4><i class="bi bi-speedometer2 me-2"></i>Admin Panel</h4>
    <a href="{{ url('/') }}"><i class="bi bi-house-door me-2"></i> Trang chủ</a>
    <a href="{{ route('admin') }}"><i class="bi bi-people me-2"></i> Người dùng</a>
    <a href="{{ route('tintuc') }}"><i class="bi bi-newspaper me-2"></i> Tin tức</a>
    <a href="{{ route('baiviet') }}" class="active"><i class="bi bi-pencil-square me-2"></i> Bài viết</a>
   <a href="{{ route('ebook.index') }}" class="active"><i class="bi bi-book me-2"></i> Ebook</a>

    <a href="#"><i class="bi bi-globe2 me-2"></i> Thông tin số</a>
    <a href="{{ url('/logout') }}"><i class="bi bi-box-arrow-right me-2"></i> Đăng xuất</a>
  </div>

  <div class="content">
    <h3 class="text-primary fw-bold mb-4"><i class="bi bi-newspaper me-2"></i> Quản lý Tin tức</h3>

    <div class="card p-4 mb-4">
      <h5 class="text-primary mb-3"><i class="bi bi-plus-circle me-2"></i> Thêm tin tức</h5>
      <form action="{{ route('tintuc.them') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row g-3">
          <div class="col-md-6">
            <label>Tiêu đề</label>
            <input type="text" name="tieude" class="form-control" required>
          </div>
          <div class="col-md-6">
            <label>Link bài viết</label>
            <input type="url" name="link" class="form-control">
          </div>
          <div class="col-md-12">
            <label>Mô tả</label>
            <textarea name="mota" class="form-control" rows="3"></textarea>
          </div>
          <div class="col-md-6">
            <label>Hình ảnh</label>
            <input type="file" name="hinhanh" class="form-control">
          </div>
        </div>
        <div class="mt-3">
          <button type="submit" class="btn-gradient"><i class="bi bi-plus-lg me-2"></i> Thêm tin</button>
        </div>
      </form>
    </div>

    <div class="card p-4">
      <h5 class="text-primary mb-3"><i class="bi bi-list-ul me-2"></i> Danh sách tin tức</h5>
      <table class="table table-bordered text-center align-middle">
        <thead>
          <tr>
            <th>ID</th>
            <th>Ảnh</th>
            <th>Tiêu đề</th>
            <th>Link</th>
            <th>Trạng thái</th>
            <th>Ngày tạo</th>
            <th>Hành động</th>
          </tr>
        </thead>
        <tbody>
          @foreach($tintuc as $tin)
          <tr>
            <td>{{ $tin->id }}</td>
            <td>
              @if($tin->hinhanh)
                <img src="{{ asset($tin->hinhanh) }}" width="80">
              @else
                <span class="text-muted">—</span>
              @endif
            </td>
            <td>{{ $tin->tieude }}</td>
            <td><a href="{{ $tin->link }}" target="_blank">{{ $tin->link }}</a></td>
            <td>{{ $tin->trangthai ? 'Hiển thị' : 'Ẩn' }}</td>
            <td>{{ $tin->ngaytao }}</td>
            <td>
              <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit{{ $tin->id }}">
                <i class="bi bi-pencil-square"></i>
              </button>
              <a href="{{ route('tintuc.xoa', $tin->id) }}" onclick="return confirm('Xoá tin này?')" class="btn btn-danger btn-sm">
                <i class="bi bi-trash"></i>
              </a>
            </td>
          </tr>

          <!-- Modal Sửa -->
          <div class="modal fade" id="edit{{ $tin->id }}" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-centered">
              <div class="modal-content">
                <form action="{{ route('tintuc.sua', $tin->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">✏️ Sửa tin tức</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body">
                    <div class="row g-3">
                      <div class="col-md-6">
                        <label>Tiêu đề</label>
                        <input type="text" name="tieude" class="form-control" value="{{ $tin->tieude }}">
                      </div>
                      <div class="col-md-6">
                        <label>Link bài viết</label>
                        <input type="url" name="link" class="form-control" value="{{ $tin->link }}">
                      </div>
                      <div class="col-md-12">
                        <label>Mô tả</label>
                        <textarea name="mota" class="form-control" rows="3">{{ $tin->mota }}</textarea>
                      </div>
                      <div class="col-md-6">
                        <label>Hình ảnh</label>
                        <input type="file" name="hinhanh" class="form-control">
                        @if($tin->hinhanh)
                          <img src="{{ asset($tin->hinhanh) }}" width="100" class="mt-2 rounded">
                        @endif
                      </div>
                      <div class="col-md-6">
                        <label>Trạng thái</label>
                        <select name="trangthai" class="form-select">
                          <option value="1" {{ $tin->trangthai ? 'selected' : '' }}>Hiển thị</option>
                          <option value="0" {{ !$tin->trangthai ? 'selected' : '' }}>Ẩn</option>
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
