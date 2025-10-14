<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng người dùng VN168</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #6a00f4, #ff00c3);
            color: white;
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .navbar {
            background: rgba(0,0,0,0.2);
        }
        .content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .card {
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(8px);
            color: white;
            border: none;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.3);
        }
        footer {
            text-align: center;
            padding: 10px;
            background: rgba(0,0,0,0.1);
            font-size: 14px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">VN168</a>
            <div>
                <a href="/dashboard" class="btn btn-light btn-sm me-2">Trang chủ</a>
                <a href="/logout" class="btn btn-danger btn-sm">Đăng xuất</a>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="content">
        <div class="card">
            <h2>Xin chào, {{ Session::get('nguoidung')->hoten }}</h2>
            <p class="mb-3">Chào mừng bạn đến với hệ thống VN168</p>
            <hr>
            <p><strong>Tài khoản:</strong> {{ Session::get('nguoidung')->taikhoan }}</p>
            <p><strong>Email:</strong> {{ Session::get('nguoidung')->email ?? 'Chưa cập nhật' }}</p>
            <p><strong>Quyền:</strong> {{ ucfirst(Session::get('nguoidung')->quyen) }}</p>
        </div>
    </div>

    <footer>
        © {{ date('Y') }} VN168 - Hệ sinh thái AI & Chuyển đổi số
    </footer>
</body>
</html>
