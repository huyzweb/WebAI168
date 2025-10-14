<!-- Blog Start -->
<div class="container-fluid blog py-5">
  <div class="container py-5">
    <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
      <h4 class="text-primary">Giá trị cốt lõi</h4>
      <h1 class="display-5 mb-3">Các nguyên tắc tạo dựng tương lai</h1>
      <p class="mb-0">Các nguyên tắc cốt lõi này định hình tương lai VN168 – nền tảng phát triển bền vững.</p>
    </div>

    <div class="row g-4 justify-content-center">
      @foreach ([
        ['icon'=>'fa-globe', 'img'=>'kn.png','cat'=>'Kỳ Nguyên','desc'=>'Đại diện cho sự khởi đầu của thời kỳ công nghệ và AI, là nền tảng cốt lõi của xã hội hiện đại.'],
        ['icon'=>'fa-bolt', 'img'=>'as.png','cat'=>'Ánh Sáng','desc'=>'Biểu tượng của sự chiếu sáng và đổi mới, mang lại năng lượng sáng tạo cho mọi lĩnh vực.'],
        ['icon'=>'fa-brain', 'img'=>'tt.png','cat'=>'Trí Tuệ','desc'=>'Tượng trưng cho trí tuệ nhân tạo – kết nối tri thức để kiến tạo tương lai.']
      ] as $index => $item)
      <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="{{ $index * 0.2 + 0.2 }}s">
        <div class="blog-item position-relative overflow-hidden text-center p-0">
          
          <!-- Ảnh -->
          <div class="blog-img">
            <img src="{{ asset('img/'.$item['img']) }}" class="img-fluid w-100 rounded-top" alt="{{ $item['cat'] }}">
          </div>

          <!-- Nội dung -->
          <div class="blog-body p-4">
            <div class="icon-float-blog mx-auto mb-3">
              <i class="fa {{ $item['icon'] }} fa-lg"></i>
            </div>
            <h5 class="text-gradient fw-bold mb-3">{{ $item['cat'] }}</h5>
            <p class="mb-4">{{ $item['desc'] }}</p>
            <a href="#" class="btn btn-primary rounded-pill py-2 px-4">Tìm hiểu thêm</a>
          </div>

        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
<!-- Blog End -->
