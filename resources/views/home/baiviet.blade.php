@extends('layouts.app')

@section('content')
<style>
/* ======= KHO TRI THỨC ======= */
section.baiviet {
  padding: 70px 0;
  background: #fff;
  font-family: "Inter", sans-serif;
}

.baiviet .container {
  max-width: 1150px;
  margin: 0 auto;
  padding: 0 20px;
  text-align: center;
}

.baiviet h2 {
  font-size: 32px;
  font-weight: 700;
  color: #111;
  margin-bottom: 40px;
}

/* Lưới card */
.baiviet .row {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
  gap: 30px;
}

/* Card */
.baiviet .card {
  border: none;
  border-radius: 18px;
  background: #fff;
  box-shadow: 0 4px 16px rgba(108,99,255,0.1);
  overflow: hidden;
  text-align: left;
  transition: all 0.3s ease;
  display: flex;
  flex-direction: column;
  height: 100%;
}

.baiviet .card:hover {
  transform: translateY(-6px);
  box-shadow: 0 8px 24px rgba(108,99,255,0.25);
}

/* Ảnh bài viết */
.baiviet .card-img-wrapper {
  width: 100%;
  height: 220px;
  overflow: hidden;
  background: #f7f7ff;
}

.baiviet .card-img-wrapper img {
  width: 100%;
  height: 100%;
  object-fit: contain;
  background: #fff;
  transition: all 0.3s ease;
  padding: 10px;
}

.baiviet .card:hover .card-img-wrapper img {
  transform: scale(1.05);
}

/* Nội dung */
.baiviet .card-body {
  padding: 18px 22px 25px;
  flex-grow: 1;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.baiviet .tag {
  display: inline-block;
  background: #eef3ff;
  color: #6c63ff;
  font-size: 13px;
  font-weight: 500;
  padding: 4px 10px;
  border-radius: 8px;
  margin-bottom: 10px;
}

.baiviet .card-title {
  font-size: 17px;
  font-weight: 600;
  color: #111;
  margin-bottom: 10px;
}

.baiviet .card-text {
  font-size: 14px;
  color: #555;
  flex-grow: 1;
}

/* Footer */
.baiviet .card-footer {
  font-size: 13px;
  color: #777;
  background: transparent;
  border-top: none;
  padding: 10px 22px 20px;
}

.baiviet .card-footer a {
  color: #6c63ff;
  font-weight: 500;
  text-decoration: none;
}

.baiviet .card-footer a:hover {
  text-decoration: underline;
}

/* Responsive */
@media (max-width: 768px) {
  .baiviet h2 { font-size: 26px; }
  .baiviet .row { gap: 20px; }
  .baiviet .card-img-wrapper { height: 180px; }
}
</style>

<section class="baiviet">
  <div class="container">
    <h2>Kho tri thức</h2>

    <!-- Lưới bài viết và ebook -->
    <div class="row">
      @foreach($baiviet as $bv)
      <div class="card">
        @if($bv->hinhanh)
        <div class="card-img-wrapper">
          <img src="{{ asset($bv->hinhanh) }}" alt="{{ $bv->tieude }}">
        </div>
        @endif
        <div class="card-body">
          @if($bv->loai)
          <span class="tag">{{ ucfirst($bv->loai) }}</span>
          @endif
          <h5 class="card-title">{{ $bv->tieude }}</h5>
          <p class="card-text">{{ Str::limit($bv->mota, 100) }}</p>
        </div>
        <div class="card-footer text-muted">
          @if($bv->link)
            @if($bv->loai == 'ebook')
              📘 <a href="{{ $bv->link }}" target="_blank">Tải Ebook</a>
            @else
              🔗 <a href="{{ $bv->link }}" target="_blank">Xem chi tiết</a>
            @endif
          @endif
          <div>{{ $bv->ngaydang ? \Carbon\Carbon::parse($bv->ngaydang)->format('Y-m-d') : '' }}</div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@include('partials.footer')
@endsection
