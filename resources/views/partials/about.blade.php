<!-- About Start -->
<div class="container-fluid bg-light about pb-5">
  <div class="container pb-5">
    <div class="row g-5">
      <!-- Left: text -->
      <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
        <div class="about-item-content bg-white rounded p-5 h-100">
          <h1 class="display-4 mb-4">Nền tảng AI & chuyển đổi số cho mọi người</h1>
          <p>VN168 xây dựng hệ sinh thái ứng dụng tích hợp AI, giúp cơ quan nhà nước, trường học
            và doanh nghiệp <b>đơn giản hoá quy trình – tăng tốc xử lý – ra quyết định dựa trên dữ liệu</b>.
          </p>
          <p>Giải pháp của chúng tôi dễ triển khai, dễ mở rộng, an toàn và phù hợp nhiều tình huống thực tế
            từ hành chính công, giáo dục – đào tạo đến sản xuất, kinh doanh và nông nghiệp số.</p>

          <p class="text-dark"><i class="fa fa-check text-primary me-3"></i>Tiết kiệm thời gian & chi phí vận hành</p>
          <p class="text-dark"><i class="fa fa-check text-primary me-3"></i>Quy trình minh bạch, theo dõi theo thời gian thực</p>
          <p class="text-dark mb-4"><i class="fa fa-check text-primary me-3"></i>Dễ tích hợp với hệ thống hiện có</p>

          <a class="btn btn-primary rounded-pill py-3 px-5" href="#">Tìm hiểu thêm</a>
        </div>
      </div>

      <!-- Right: image + counters -->
      <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.2s">
        <div class="bg-white rounded p-5 h-100">
          <div class="row g-4 justify-content-center">
            <div class="col-12">
              <div class="rounded bg-light">
                <img src="{{ asset('img/about-1.png') }}" class="img-fluid rounded w-100" alt="VN168 AI & chuyển đổi số">
              </div>
            </div>

            @foreach ([
              ['count'=>10000,'suffix'=>'+','label'=>'Người dùng hoạt động'],
              ['count'=>50,'suffix'=>'+','label'=>'Tác vụ được tự động hoá'],
              ['count'=>99.9,'suffix'=>'%','label'=>'Thời gian hoạt động'],
              ['count'=>150,'suffix'=>'+','label'=>'Tích hợp']
            ] as $item)
              <div class="col-sm-6">
                <div class="counter-item bg-light rounded p-3 h-100">
                  <div class="counter-counting">
                    <span class="text-primary fs-2 fw-bold" data-toggle="counter-up">{{ $item['count'] }}</span>
                    <span class="h1 fw-bold text-primary">{{ $item['suffix'] }}</span>
                  </div>
                  <h4 class="mb-0 text-dark">{{ $item['label'] }}</h4>
                </div>
              </div>
            @endforeach

          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- About End -->
