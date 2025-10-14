@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-primary">Tin tức</h2>
    <div class="row g-4">
        @foreach($tintuc as $tin)
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset($tin->hinhanh) }}" class="card-img-top" alt="{{ $tin->tieude }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $tin->tieude }}</h5>
                    <p class="card-text">{{ Str::limit($tin->mota, 100) }}</p>
                    <a href="{{ route('home.tintuc.show', $tin->id) }}" class="btn btn-primary btn-sm">Xem Thêm</a>
                    <a href="{{ $tin->link }}" target="_blank" class="btn btn-primary btn-sm">Xem chi tiết</a>



                </div>
                <div class="card-footer text-muted">
                    {{ $tin->ngaytao }} - {{ $tin->tacgia }}
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Phân trang nếu dùng paginate --}}
    {{-- {{ $tintuc->links() }} --}}
</div>
@include('partials.footer')
@endsection
