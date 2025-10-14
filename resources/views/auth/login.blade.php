<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập VN168</title>
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(to bottom, #f7f0ff 0%, #e7dfff 50%, #d1d2f8 100%);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .login-box {
      background: rgba(255, 255, 255, 0.8);
      padding: 40px;
      border-radius: 20px;
      width: 380px;
      box-shadow: 0 8px 25px rgba(122, 0, 255, 0.2);
      text-align: center;
      animation: fadeIn 0.6s ease-out;
    }

    .login-box h2 {
      margin-bottom: 25px;
      color: #5f00ff;
      font-weight: 700;
    }

    input {
      width: 100%;
      padding: 10px;
      border-radius: 10px;
      border: 1px solid #ccc;
      margin-bottom: 15px;
      outline: none;
      transition: 0.3s;
    }

    input:focus {
      border-color: #7a00ff;
      box-shadow: 0 0 10px rgba(122, 0, 255, 0.3);
    }

    button {
      width: 100%;
      background: linear-gradient(135deg, #7a00ff, #b066ff);
      border: none;
      padding: 12px;
      border-radius: 10px;
      color: #fff;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s;
    }

    button:hover {
      background: linear-gradient(135deg, #b066ff, #7a00ff);
      transform: translateY(-2px);
    }

    .alert {
      background: rgba(255, 0, 0, 0.1);
      border: 1px solid #ff7b7b;
      color: #b30000;
      padding: 10px;
      border-radius: 10px;
      margin-bottom: 10px;
      font-size: 14px;
    }

    a {
      color: #7a00ff;
      text-decoration: none;
      font-weight: 500;
    }

    a:hover {
      text-decoration: underline;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>
  <div class="login-box">
    <h2>Đăng nhập VN168</h2>

    @if(session('error'))
      <div class="alert">{{ session('error') }}</div>
    @endif

    @if(session('success'))
      <div class="alert" style="background:#e8ffe8;border-color:#3cba54;color:#216e39;">{{ session('success') }}</div>
    @endif

    <form action="{{ url('/login') }}" method="POST">
      @csrf
      <input type="text" name="taikhoan" placeholder="Tài khoản" required>
      <input type="password" name="matkhau" placeholder="Mật khẩu" required>
      <button type="submit">Đăng nhập</button>
    </form>

    <p style="margin-top:15px;">Chưa có tài khoản? <a href="{{ url('/register') }}">Đăng ký ngay</a></p>
  </div>
</body>
</html>
