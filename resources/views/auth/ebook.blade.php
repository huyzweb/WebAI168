<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Quản lý Ebook</title>
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      display: flex;
      background: #f8f9ff;
      font-family: 'Poppins', sans-serif;
    }
    .sidebar {
      width: 240px;
      background: linear-gradient(135deg, #5f00ff, #b300ff);
      color: #fff;
      min-height: 100vh;
      padding-top: 30px;
      position: fixed;
      box-shadow: 4px 0 15px rgba(0, 0, 0, 0.1);
    }
    .sidebar h4 {
      text-align: center;
      font-weight: 600;
      margin-bottom: 25px;
    }
    .sidebar a {
      display: block;
      padding: 12px 25px;
      color: #fff;
      text-decoration: none;
      transition: all 0.3s ease;
      border-left: 4px solid transparent;
    }
    .sidebar a:hover, .sidebar a.active {
      background: rgba(255, 255, 255, 0.15);
      border-left: 4px solid #fff;
    }

    .content {
      margin-left: 260px;
      padding: 40px;
      width: calc(100% - 260px);
    }

    .table th {
      background: linear-gradient(135deg, #6f00ff, #a100ff);
      color: #fff;
      text-align: center;
    }

    .btn-gradient {
      background: linear-gradient(135deg, #7a00ff, #ff00cc);
      color: #fff;
      border: none;
      border-radius: 30px;
      padding: 8px 18px;
      transition: 0.3s;
    }
    .btn-gradient:hover {
      opacity: 0.85;
      transform: translateY(-1px);
    }

    .card {
      border: none;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
      border-radius: 12px;
    }
    .modal-content {
      border-radius: 12px;
      overflow: hidden;
    }
  </style>
</head>
<body>

  <!-- SIDEBAR -->
  <div class="sidebar">
    <h4><i class="bi bi-speedometer2 me-2"></i>Admin Panel</h4>
    <a href="{{ url('/admin') }}"><i class="bi bi-house-door me-2"></i> Trang chủ</a>
    <a href="{{ route('nguoidung') }}"><i class="bi bi-people me-2"></i> Người dùng</a>
    <a href="{{ route('tintuc') }}"><i class="bi bi-newspaper me-2"></i> Tin tức</a>
    <a href="{{ route('baiviet') }}"><i class="bi bi-pencil-square me-2"></i> Bài viết</a>
    <a href="{{ route('ebook.index') }}" class="active"><i class="bi bi-book me-2"></i> Ebook</a>

    <a href="#"><i class="bi bi-globe2 me-2"></i> Thông tin số</a>
    <a href="{{ url('/logout') }}"><i class="bi bi-box-arrow-right me-2"></i> Đăng xuất</a>
  </div>
  <!-- END SIDEBAR -->

  <!-- MAIN CONTENT -->
  <div class="content">
    <h3 class="text-primary fw-bold mb-4">
      <i class="bi bi-book me-2"></i> Quản lý Ebook
    </h3>

    <!-- Form thêm Ebook -->
    <div class="card p-4 mb-4">
      <h5 class="text-primary mb-3">
        <i class="bi bi-plus-circle me-2"></i> Thêm Ebook mới
      </h5>
      <form action="{{ route('ebook.them') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row g-3">
          <div class="col-md-6">
            <label>Tên Ebook</label>
            <input type="text" name="ten" class="form-control" required>
          </div>
          <div class="col-md-6">
            <label>Tác giả</label>
            <input type="text" name="tacgia" class="form-control">
          </div>
          <div class="col-md-12">
            <label>Mô tả ngắn</label>
            <textarea name="mota" class="form-control" rows="3"></textarea>
          </div>
          <div class="col-md-6">
            <label>File Ebook (PDF)</label>
            <input type="file" name="file" class="form-control" accept=".pdf">
          </div>
          <div class="col-md-6">
            <label>Ảnh bìa</label>
            <input type="file" name="hinhanh" class="form-control" accept="image/*">
          </div>
        </div>
        <div class="mt-3">
          <button type="submit" class="btn-gradient">
            <i class="bi bi-plus-lg me-2"></i> Thêm Ebook
          </button>
        </div>
      </form>
    </div>

    <!-- Danh sách Ebook -->
    <div class="card p-4">
      <h5 class="text-primary mb-3">
        <i class="bi bi-list-ul me-2"></i> Danh sách Ebook
      </h5>
      <table class="table table-bordered text-center align-middle">
        <thead>
          <tr>
            <th>ID</th>
            <th>Ảnh bìa</th>
            <th>Tên Ebook</th>
            <th>Tác giả</th>
            <th>File</th>
            <th>Trạng thái</th>
            <th>Ngày tạo</th>
            <th>Hành động</th>
          </tr>
        </thead>
        <tbody>
          @foreach($ebooks as $ebook)
          <tr>
            <td>{{ $ebook->id }}</td>
            <td>
              @if($ebook->hinhanh)
  <img src="{{ asset('upload/ebook_covers/' . $ebook->hinhanh) }}" alt="Ảnh bìa" width="80">
@else
  <span class="text-muted">—</span>
@endif

            </td>
            <td>{{ $ebook->ten }}</td>
            <td>{{ $ebook->tacgia }}</td>
            <td>
              @if($ebook->file)
                <a href="{{ asset($ebook->file) }}" target="_blank" class="text-decoration-none text-primary">
                  <i class="bi bi-file-earmark-pdf"></i> Xem
                </a>
              @else
                <span class="text-muted">—</span>
              @endif
            </td>
            <td>{{ $ebook->trangthai ? 'Hiển thị' : 'Ẩn' }}</td>
            <td>{{ $ebook->ngaytao ?? '—' }}</td>
            <td>
              <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit{{ $ebook->id }}">
                <i class="bi bi-pencil-square"></i>
              </button>
              <a href="{{ route('ebook.xoa', $ebook->id) }}" onclick="return confirm('Xoá Ebook này?')" class="btn btn-danger btn-sm">
                <i class="bi bi-trash"></i>
              </a>
            </td>
          </tr>

          <!-- Modal sửa -->
          <div class="modal fade" id="edit{{ $ebook->id }}" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-centered">
              <div class="modal-content">
                <form action="{{ route('ebook.sua', $ebook->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">✏️ Sửa Ebook</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body">
                    <div class="row g-3">
                      <div class="col-md-6">
                        <label>Tên Ebook</label>
                        <input type="text" name="ten" class="form-control" value="{{ $ebook->ten }}">
                      </div>
                      <div class="col-md-6">
                        <label>Tác giả</label>
                        <input type="text" name="tacgia" class="form-control" value="{{ $ebook->tacgia }}">
                      </div>
                      <div class="col-md-12">
                        <label>Mô tả ngắn</label>
                        <textarea name="mota" class="form-control" rows="3">{{ $ebook->mota }}</textarea>
                      </div>
                      <div class="col-md-6">
                        <label>Ảnh bìa</label>
                        <input type="file" name="hinhanh" class="form-control">
                        @if($ebook->hinhanh)
                          <img src="{{ asset('upload/ebook_covers/' . $ebook->image) }}" alt="Ảnh bìa" width="80">

                        @endif
                      </div>
                      <div class="col-md-6">
                        <label>File Ebook</label>
                        <input type="file" name="file" class="form-control" accept=".pdf">
                        @if($ebook->file)
                          <p class="mt-2 small"><i class="bi bi-file-earmark-pdf"></i> {{ basename($ebook->file) }}</p>
                        @endif
                      </div>
                      <div class="col-md-6">
                        <label>Trạng thái</label>
                        <select name="trangthai" class="form-select">
                          <option value="1" {{ $ebook->trangthai ? 'selected' : '' }}>Hiển thị</option>
                          <option value="0" {{ !$ebook->trangthai ? 'selected' : '' }}>Ẩn</option>
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
