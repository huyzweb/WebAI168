<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="utf-8">
  <title>VN168 - Hệ sinh thái AI & Chuyển đổi số toàn diện</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="VN168, AI, chuyển đổi số, chính quyền số, doanh nghiệp số, giáo dục số" name="keywords">
  <meta content="VN168 - Nền tảng trí tuệ nhân tạo và chuyển đổi số toàn diện" name="description">
  <!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">


  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;600;700&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Libraries -->
  <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

  <!-- Bootstrap -->
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>

  

  <!-- Sections -->
  @include('partials.topbar')
  @include('partials.navbar')
  @include('partials.hero')
  @include('partials.feature')
  @include('partials.about')
  @include('partials.service')
  @include('partials.faq')
  @include('partials.blog')
  @include('partials.team')
  @include('partials.testimonial')
  @include('partials.footer')

  <!-- Back to Top -->
  <a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>

  <!-- JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
  <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
  <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
  <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
  <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>
  <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
