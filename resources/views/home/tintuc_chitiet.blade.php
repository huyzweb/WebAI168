@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-primary mb-4">{{ $tin->tieude }}</h2>
    <img src="{{ asset($tin->hinhanh) }}" class="img-fluid mb-3" alt="{{ $tin->tieude }}">
    <p>{{ $tin->mota }}</p>
    <p><strong>Ngày đăng:</strong> {{ $tin->ngaytao }} | <strong>Tác giả:</strong> {{ $tin->tacgia }}</p>
    <a href="{{ route('home.tintuc') }}" class="btn btn-secondary">Quay lại</a>
</div>
@endsection
