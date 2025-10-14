@extends('layouts.app')

@section('content')
<div class="container py-4">
  <h3 class="fw-bold text-primary mb-4"><i class="bi bi-pencil-square me-2"></i> Sửa Ebook</h3>

  <div class="card p-4 shadow-sm">
    <form action="{{ route('ebook.sua', $ebook->id) }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="mb-3">
        <label class="form-label">Tên Ebook</label>
        <input type="text" name="ten" class="form-control" value="{{ $ebook->ten }}" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Tác giả</label>
        <input type="text" name="tacgia" class="form-control" value="{{ $ebook->tacgia }}" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Mô tả</label>
        <textarea name="mota" class="form-control" rows="4">{{ $ebook->mota }}</textarea>
      </div>

      <div class="mb-3">
        <label class="form-label">File Ebook (PDF, DOCX...)</label><br>
        @if($ebook->file)
          <a href="{{ asset('storage/'.$ebook->file) }}" target="_blank" class="text-success">Tải file hiện tại</a><br>
        @endif
        <input type="file" name="file" class="form-control mt-2">
      </div>

      <div class="mb-3">
        <label class="form-label">Hình ảnh bìa</label><br>
        @if($ebook->hinhanh)
          <img src="{{ asset('storage/'.$ebook->hinhanh) }}" alt="Bìa Ebook" width="150" class="rounded mb-2">
        @endif
        <input type="file" name="hinhanh" class="form-control">
      </div>

      <div class="mb-3">
        <label class="form-label">Trạng thái</label>
        <select name="trangthai" class="form-select">
          <option value="1" {{ $ebook->trangthai == 1 ? 'selected' : '' }}>Hoạt động</option>
          <option value="0" {{ $ebook->trangthai == 0 ? 'selected' : '' }}>Ẩn</option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary px-4">Cập nhật Ebook</button>
      <a href="{{ route('ebook.index') }}" class="btn btn-secondary ms-2">Quay lại</a>
    </form>
  </div>
</div>
@endsection
