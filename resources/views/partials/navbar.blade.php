<!-- Navbar Start -->
<header class="navbar-area sticky-top">
  <div class="container d-flex align-items-center justify-content-between py-2">

 <!-- Logo -->
<a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center me-3" style="min-width: 120px;">
  <img src="{{ asset('img/vn168.png') }}" 
       alt="VN168 Logo" 
       class="logo me-2"
       style="height: 60px; width: auto; object-fit: contain; display: block;">
</a>




   <!-- Menu -->
<nav class="navbar-menu d-none d-lg-flex align-items-center bg-light rounded-pill px-4 py-2 ms-2 shadow-sm flex-nowrap justify-content-between" style="gap: 8px;">
  <div class="d-flex align-items-center flex-nowrap" style="gap: 10px;">
    <a href="{{ url('/') }}" class="nav-link active">Trang chủ</a>
    <a href="{{ url('/about') }}" class="nav-link">Giới thiệu</a>
    <a href="{{ route('home.tintuc') }}" class="nav-link text-nowrap">Tin tức</a>
    <a href="{{ url('/projects') }}" class="nav-link">Thông tin số</a>
    <a href="{{ route('home.baiviet') }}" class="nav-link">Bài viết</a>



    <a href="{{ url('/price') }}" class="nav-link">Bảng Giá</a>
    <a href="{{ url('/contact') }}" class="nav-link">Liên hệ</a>

  </div>

  <div class="d-flex align-items-center flex-nowrap" style="gap: 8px;">
  

  <a href="{{ url('/contact') }}" class="btn btn-consult rounded-pill fw-semibold px-4">
    Liên hệ tư vấn
  </a>

   <div class="d-flex align-items-center flex-nowrap" style="gap: 8px;">
  @if(Session::has('nguoidung'))
    @php $user = Session::get('nguoidung'); @endphp

    <div class="d-flex align-items-center rounded-pill px-3 py-1 shadow-sm"
         style="background: linear-gradient(90deg, #e5d4ff, #d0bfff); color:#333; gap: 8px; white-space: nowrap;">
      <i class="bi bi-person-circle text-primary fs-5"></i>
      <span class="fw-semibold">Xin chào, {{ $user->hoten }}</span>
      <a href="{{ url('/logout') }}" 
         class="btn btn-danger btn-sm rounded-pill px-3 py-1" 
         style="font-size: 14px; background:#ff4d6d; border:none;">
        <i class="bi bi-box-arrow-right me-1"></i>Đăng xuất
      </a>
    </div>
  @else
    <a href="{{ url('/login') }}" class="btn btn-outline-primary rounded-pill px-4">
      <i class="bi bi-box-arrow-in-right me-1"></i> Đăng nhập
    </a>
  @endif
</div>






  
</div>
</nav>


    <!-- Hotline -->
    <div class="d-flex align-items-center ms-3">
      <a href="tel:+84901234567" class="btn btn-light btn-circle position-relative me-2 d-flex align-items-center justify-content-center"
         style="width:40px; height:40px; border-radius:50%;">
        <i class="fas fa-phone text-primary fs-5"></i>
        <span class="chat-dot position-absolute" style="top:-4px; right:-4px;">
          <i class="fas fa-comment-dots text-info small"></i>
        </span>
      </a>
      <div class="support-bar" style="white-space: nowrap;">
    Hỗ trợ 24/7 Hotline: 0901 234 567
</div>

    </div>

  </div>
</header>
<!-- Navbar End -->
