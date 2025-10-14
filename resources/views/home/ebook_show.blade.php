@extends('layouts.app')

@section('content')
<section class="ebook-detail">
  <div class="container">
    <h2 class="mb-3">{{ $ebook->ten }}</h2>

    @if($ebook->hinhanh)
      <img src="{{ asset($ebook->hinhanh) }}" class="img-fluid mb-4 rounded" alt="{{ $ebook->ten }}">
    @endif

    <p>{{ $ebook->mota }}</p>

    @if($ebook->file_pdf)
      <a href="{{ asset($ebook->file_pdf) }}" target="_blank" class="btn btn-primary">
        📘 Đọc hoặc tải Ebook
      </a>
    @endif

    <div class="mt-4">
      <a href="{{ route('home.ebook') }}" class="btn btn-secondary">⬅ Quay lại danh sách</a>
    </div>
  </div>
</section>
@endsection
