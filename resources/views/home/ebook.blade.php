@extends('layouts.app')

@section('content')
<style>
/* ======= EBOOK STYLE ======= */
section.ebook {
  padding: 70px 0;
  background: #fff;
  font-family: "Inter", sans-serif;
}

.ebook .container {
  max-width: 1150px;
  margin: 0 auto;
  padding: 0 20px;
  text-align: center;
}

.ebook h2 {
  font-size: 32px;
  font-weight: 700;
  color: #111;
  margin-bottom: 40px;
}

/* Lưới card */
.ebook .row {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
  gap: 30px;
}

/* Card */
.ebook .card {
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

.ebook .card:hover {
  transform: translateY(-6px);
  box-shadow: 0 8px 24px rgba(108,99,255,0.25);
}

/* Ảnh */
.ebook .card-img-top {
  width: 100%;
  height: 220px;
  object-fit: contain;
  background: #f7f7ff;
  padding: 12px;
}

/* Nội dung */
.ebook .card-body {
  padding: 18px 22px 25px;
  flex-grow: 1;
}

.ebook .card-title {
  font-size: 18px;
  font-weight: 600;
  color: #111;
  margin-bottom: 10px;
}

.ebook .card-text {
  font-size: 14px;
  color: #555;
  margin-bottom: 10px;
}

.ebook .author {
  font-size: 13px;
  color: #888;
  margin-bottom: 10px;
}

.ebook .btn-download {
  background: #6c63ff;
  color: #fff;
  border: none;
  padding: 8px 18px;
  border-radius: 10px;
  font-size: 14px;
  transition: all 0.3s ease;
}

.ebook .btn-download:hover {
  background: #5848e5;
}

/* Responsive */
@media (max-width: 768px) {
  .ebook h2 { font-size: 26px; }
  .ebook .row { gap: 20px; }
  .ebook .card-img-top { height: 180px; }
}
</style>

<section class="ebook">
  <div class="container">
    <h2>Kho Ebook</h2>

    <div class="row">
      @foreach($ebook as $item)
      <div class="card">
        @if($item->hinhanh)
          <img src="{{ asset($item->hinhanh) }}" class="card-img-top" alt="{{ $item->ten }}">
        @endif
        <div class="card-body">
          <h5 class="card-title">{{ $item->ten }}</h5>
          <p class="author">Tác giả: {{ $item->tacgia }}</p>
          <p class="card-text">{{ Str::limit($item->mota, 120) }}</p>

          @if($item->file)
          <a href="{{ asset($item->file) }}" class="btn btn-download" target="_blank">📘 Xem Ebook</a>
          @endif
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endsection
