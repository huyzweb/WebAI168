@extends('layouts.app')

@section('content')
<section class="contact-hero">
  <div class="container py-5 text-left">
    <h1 class="fw-bold mb-3">Liên hệ với <span class="text-gradient">Chúng tôi</span></h1>
    <p class="lead mb-4">
      Hãy kết nối với chúng tôi ngay hôm nay để cùng bạn bước vào kỷ nguyên số! 
      Chúng tôi luôn sẵn sàng lắng nghe, tư vấn và đồng hành trên hành trình chuyển đổi số, 
      giúp doanh nghiệp phát triển mạnh mẽ hơn bao giờ hết.
    </p>
    <a href="#contactForm" class="btn btn-gradient px-4 py-2 fw-semibold">Bắt đầu ngay →</a>
  </div>
</section>

<section class="contact-section py-5" id="contactForm">
  <div class="container">
    <div class="row g-5 align-items-stretch">

      <!-- Cột thông tin + form liên hệ -->
      <div class="col-lg-6 col-md-12">
        <div class="info-form-box h-100 p-4 shadow-sm rounded-4 bg-white">
          <div class="row g-4">
            <div class="col-12">
              <h4 class="fw-bold mb-3">Thông tin liên hệ</h4>
              <p><i class="bi bi-envelope text-primary me-2"></i>
                <strong>Email:</strong> <a href="mailto:vienchuyendoisoquocgia@aiVN168.com" class="text-dark">vienchuyendoisoquocgia@aiVN168.com</a></p>
              <p><i class="bi bi-telephone text-primary me-2"></i>
                <strong>Phone:</strong> <a href="tel:0931454647" class="text-dark">0931.45.46.47</a></p>
              <p><i class="bi bi-geo-alt text-primary me-2"></i>
                <strong>Văn phòng:</strong><br>
                31 Nguyễn Nhạc, Tân Lợi, Buôn Ma Thuột, Đắk Lắk, Việt Nam</p>
              <p><i class="bi bi-clock text-primary me-2"></i>
                <strong>Thời gian:</strong><br>
                7h30 - 17h30 (Thứ 2 - Thứ 7)</p>
            </div>

            <div class="col-12">
              <hr class="my-3">
              <h5 class="fw-bold mb-3">Gửi tin nhắn</h5>
              <form>
                <div class="row g-3">
                  <div class="col-md-6">
                    <input type="text" class="form-control form-control-lg" placeholder="Họ">
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="form-control form-control-lg" placeholder="Tên">
                  </div>
                  <div class="col-12">
                    <input type="email" class="form-control form-control-lg" placeholder="Email">
                  </div>
                  <div class="col-12">
                    <textarea class="form-control form-control-lg" rows="4" placeholder="Nội dung tin nhắn..."></textarea>
                  </div>
                  <div class="col-12">
                    <button type="submit" class="btn btn-gradient w-100 py-3 fw-semibold">Gửi tin nhắn</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Cột bản đồ Google -->
      <div class="col-lg-6 col-md-12">
        <div class="map-box h-100 rounded-4 overflow-hidden shadow-sm">
          <iframe 
  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.325317239221!2d108.055511!3d12.698131!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3171f7dd1eb76e51%3A0xf6bd96d8061c2441!2zMzEgTmd1eeG7hW4gTmjhuqFjLCBUw6JuIEzhu5tpLCBCdeG7kW4gTWEgVGh14buZdCwgxJDDoGsgTOG6p2ssIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1696791200000!5m2!1svi!2s" 
  width="100%" height="100%" 
  style="border:0;" 
  allowfullscreen="" 
  loading="lazy" 
  referrerpolicy="no-referrer-when-downgrade">
</iframe>

        </div>
      </div>

    </div>
  </div>
</section>

<style>
.contact-section {
  background: linear-gradient(180deg, #f9f6ff 0%, #ffffff 100%);
  padding: 100px 0;
}

.contact-section .container {
  max-width: 1500px;
}

.contact-wrapper {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 30px;
}

/* === KHỐI TRẮNG CHUNG === */
.contact-card {
  background: #fff;
  border-radius: 28px;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
  padding: 50px 40px;
  flex: 1 1 32%;
  min-width: 420px;
  min-height: 500px;
  transition: all 0.3s ease;
}

.contact-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 18px 40px rgba(0, 0, 0, 0.1);
}

/* === THÔNG TIN LIÊN HỆ === */
.info-card p {
  font-size: 1.05rem;
  color: #444;
  margin-bottom: 15px;
  line-height: 1.8;
}
.info-card i {
  color: #9333ea;
  margin-right: 8px;
  font-size: 1.2rem;
}

/* === FORM LIÊN HỆ === */
.form-card input,
.form-card textarea {
  border-radius: 14px;
  border: 1px solid #ddd;
  padding: 14px 18px;
  width: 100%;
  margin-bottom: 20px;
  font-size: 1rem;
}

.form-card input:focus,
.form-card textarea:focus {
  outline: none;
  border-color: #9333ea;
  box-shadow: 0 0 0 0.25rem rgba(147, 51, 234, 0.15);
}

.btn-gradient {
  background: linear-gradient(90deg, #9333ea, #ec4899, #f97316);
  color: #fff;
  border: none;
  border-radius: 40px;
  padding: 14px 0;
  width: 100%;
  font-size: 1.1rem;
  font-weight: 600;
  transition: 0.3s;
}
.btn-gradient:hover {
  opacity: 0.9;
  transform: scale(1.03);
}

/* === GOOGLE MAP === */
.map-card iframe {
  border: none;
  width: 100%;
  height: 100%;
  border-radius: 20px;
}

/* === RESPONSIVE === */
@media (max-width: 992px) {
  .contact-card {
    flex: 1 1 90%;
  }
}

</style>
@include('partials.footer')
@endsection
