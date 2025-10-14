<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Đăng ký tài khoản - VN168</title>
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #5f00ff, #ff00cc);
      color: #fff;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Poppins', sans-serif;
    }
    .register-box {
      background: rgba(255,255,255,0.1);
      padding: 40px;
      border-radius: 15px;
      width: 400px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.2);
    }
    .form-control {
      border-radius: 25px;
      border: none;
      padding: 10px 20px;
    }
    .btn {
      border-radius: 25px;
      padding: 10px 25px;
    }
    h2 { text-align: center; margin-bottom: 25px; }
  </style>
</head>
<body>

  <div class="register-box">
    <h2>Đăng ký tài khoản</h2>

    {{-- Hiển thị thông báo --}}
    @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul style="margin:0;">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    {{-- Form đăng ký --}}
    <form action="{{ url('/register') }}" method="POST">
      @csrf
      <div class="mb-3">
        <input type="text" name="hoten" class="form-control" placeholder="Họ và tên" required>
      </div>
      <div class="mb-3">
        <input type="text" name="taikhoan" class="form-control" placeholder="Tên tài khoản" required>
      </div>
      <div class="mb-3">
        <input type="email" name="email" class="form-control" placeholder="Email (không bắt buộc)">
      </div>
      <div class="mb-3">
        <input type="password" name="matkhau" class="form-control" placeholder="Mật khẩu" required>
      </div>
      <div class="mb-3">
        <input type="password" name="matkhau_confirmation" class="form-control" placeholder="Nhập lại mật khẩu" required>
      </div>
      <button type="submit" class="btn btn-light w-100">Đăng ký</button>
    </form>

    <div class="text-center mt-3">
      <a href="{{ url('/login') }}" class="text-white">Đã có tài khoản? Đăng nhập</a>
    </div>
  </div>

</body>
</html>
