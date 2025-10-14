@extends('layouts.app')

@section('content')
<section class="pricing-section py-5">
  <div class="container text-center">
    <h2 class="fw-bold mb-4 display-5"><i class="bi bi-gem text-primary me-2"></i>Bảng Giá</h2>
    <p class="text-muted mb-5 fs-5 fw-semibold">Chọn gói dịch vụ phù hợp với nhu cầu của bạn</p>

    <div class="row justify-content-center g-4">

      <!-- Gói 1 -->
      <div class="col-xl-3 col-lg-4 col-md-6">
        <div class="price-card">
          <div class="icon text-primary"><i class="bi bi-stars"></i></div>
          <h4 class="title text-primary fw-bold">Trải Nghiệm</h4>
          <h1 class="price fw-bolder">0đ</h1>
          <p class="desc fw-semibold">Dành cho người dùng mới</p>
          <ul class="features fw-semibold">
            <li>Truy cập cơ bản</li>
            <li>Không giới hạn thời gian dùng thử</li>
          </ul>
          <a href="#" class="btn btn-primary-custom fw-bold">Trải nghiệm ngay</a>
        </div>
      </div>

      <!-- Gói 2 -->
      <div class="col-xl-3 col-lg-4 col-md-6">
        <div class="price-card">
          <div class="icon text-info"><i class="bi bi-people"></i></div>
          <h4 class="title text-info fw-bold">Cơ Bản</h4>
          <h1 class="price fw-bolder">50.000đ</h1>
          <p class="desc fw-semibold">Cho cá nhân hoặc nhóm nhỏ</p>
          <ul class="features fw-semibold">
            <li>5 dự án song song</li>
            <li>Hỗ trợ email</li>
            <li>5GB lưu trữ</li>
          </ul>
          <a href="#" class="btn btn-info-custom fw-bold">Đăng ký ngay</a>
        </div>
      </div>

      <!-- Gói 3 -->
      <div class="col-xl-3 col-lg-4 col-md-6">
        <div class="price-card">
          <div class="icon text-warning"><i class="bi bi-briefcase-fill"></i></div>
          <h4 class="title text-warning fw-bold">Chuyên Nghiệp</h4>
          <h1 class="price fw-bolder">200.000đ</h1>
          <p class="desc fw-semibold">Phù hợp doanh nghiệp nhỏ</p>
          <ul class="features fw-semibold">
            <li>20 dự án</li>
            <li>10GB lưu trữ</li>
            <li>Hỗ trợ chat 24/7</li>
          </ul>
          <a href="#" class="btn btn-warning-custom fw-bold">Đăng ký ngay</a>
        </div>
      </div>

      <!-- Gói 4 -->
      <div class="col-xl-3 col-lg-4 col-md-6">
        <div class="price-card">
          <div class="icon text-purple"><i class="bi bi-lightning-charge-fill"></i></div>
          <h4 class="title text-purple fw-bold">Chuyên Sâu</h4>
          <h1 class="price fw-bolder">500.000đ</h1>
          <p class="desc fw-semibold">Dành cho đội ngũ chuyên nghiệp</p>
          <ul class="features fw-semibold">
            <li>Không giới hạn dự án</li>
            <li>30GB lưu trữ</li>
            <li>API riêng</li>
          </ul>
          <a href="#" class="btn btn-purple-custom fw-bold">Đăng ký ngay</a>
        </div>
      </div>
    </div>

    <!-- Gói 5 -->
    <div class="row justify-content-center mt-5">
      <div class="col-lg-6 col-md-8">
        <div class="price-card highlight">
          <div class="icon text-danger"><i class="bi bi-gem"></i></div>
          <h4 class="title text-danger fw-bold">Thả Ga</h4>
          <h1 class="price fw-bolder">2.000.000đ</h1>
          <p class="desc fw-semibold">Trọn gói cao cấp nhất</p>
          <ul class="features fw-semibold">
            <li>Tất cả tính năng cao cấp</li>
            <li>100GB lưu trữ</li>
            <li>Hỗ trợ kỹ thuật riêng</li>
          </ul>
          <a href="#" class="btn btn-danger-custom fw-bold">Đăng ký ngay</a>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
.pricing-section {
  background: linear-gradient(180deg, #f9f8ff 0%, #ffffff 100%);
  padding: 120px 0;
}

.price-card {
  background: #fff;
  border-radius: 28px;
  padding: 70px 40px;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
  transition: all 0.4s ease;
}
.price-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
}

.icon {
  font-size: 3.2rem;
  margin-bottom: 25px;
}
.icon i {
  background: rgba(0, 0, 0, 0.04);
  padding: 25px;
  border-radius: 20px;
  transition: transform 0.3s ease;
}
.price-card:hover .icon i {
  transform: scale(1.1) rotate(-6deg);
}

.title {
  font-weight: 800;
  text-transform: uppercase;
  margin-bottom: 10px;
}
.price {
  font-size: 2.8rem;
  font-weight: 900;
  color: #111;
  margin-bottom: 10px;
}
.desc {
  color: #555;
  margin-bottom: 25px;
  font-weight: 600;
}
.features {
  list-style: none;
  padding: 0;
  color: #444;
  font-size: 1.05rem;
  margin-bottom: 40px;
  font-weight: 600;
}
.features li {
  margin: 8px 0;
}

.btn {
  border-radius: 50px;
  padding: 12px 0;
  font-weight: 700;
  font-size: 1.1rem;
  transition: all 0.3s ease;
}

.btn-primary-custom {
  background: linear-gradient(135deg, #4f46e5, #6366f1);
  color: #fff;
}
.btn-primary-custom:hover {
  background: linear-gradient(135deg, #4338ca, #4f46e5);
}

.btn-info-custom {
  background: linear-gradient(135deg, #0ea5e9, #38bdf8);
  color: #fff;
}
.btn-info-custom:hover {
  background: linear-gradient(135deg, #0284c7, #0ea5e9);
}

.btn-warning-custom {
  background: linear-gradient(135deg, #f59e0b, #fbbf24);
  color: #fff;
}
.btn-warning-custom:hover {
  background: linear-gradient(135deg, #d97706, #f59e0b);
}

.btn-purple-custom {
  background: linear-gradient(135deg, #9333ea, #a855f7);
  color: #fff;
}
.btn-purple-custom:hover {
  background: linear-gradient(135deg, #7e22ce, #9333ea);
}

.btn-danger-custom {
  background: linear-gradient(135deg, #dc2626, #ef4444);
  color: #fff;
}
.btn-danger-custom:hover {
  background: linear-gradient(135deg, #b91c1c, #dc2626);
}

.highlight {
  border: 3px solid #dc2626;
  transform: scale(1.03);
}
.highlight:hover {
  transform: scale(1.05);
}

.text-purple { color: #9333ea; }

@media (max-width: 992px) {
  .col-xl-3, .col-lg-4 {
    flex: 0 0 80%;
    max-width: 80%;
  }
}
@media (max-width: 576px) {
  .col-xl-3, .col-lg-4 {
    flex: 0 0 95%;
    max-width: 95%;
  }
}
</style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
@endsection
