@extends('layouts.app')

@section('content')
<div class="p-6">
  {{-- Header --}}
  <h2 class="text-xl font-semibold mb-4 flex items-center gap-2 text-gray-800">
    📚 Quản lý Ebook
  </h2>

  {{-- Form thêm Ebook --}}
  <div class="bg-white p-6 rounded-xl shadow-sm mb-6">
    <form method="POST" action="{{ route('ebook.store') }}" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-4">
      @csrf
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Tên Ebook</label>
        <input type="text" name="ten" class="w-full border rounded-lg p-2 focus:ring focus:ring-purple-300" required>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Tác giả</label>
        <input type="text" name="tacgia" class="w-full border rounded-lg p-2 focus:ring focus:ring-purple-300">
      </div>

      <div class="md:col-span-2">
        <label class="block text-sm font-medium text-gray-700 mb-1">Mô tả</label>
        <textarea name="mota" rows="3" class="w-full border rounded-lg p-2 focus:ring focus:ring-purple-300"></textarea>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">File Ebook (PDF)</label>
        <input type="file" name="file" class="w-full text-sm border rounded-lg p-2 bg-gray-50">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Hình ảnh bìa</label>
        <input type="file" name="hinhanh" class="w-full text-sm border rounded-lg p-2 bg-gray-50">
      </div>

      <div class="md:col-span-2 flex justify-start mt-2">
        <button type="submit" class="bg-gradient-to-r from-purple-600 to-pink-500 text-white px-5 py-2 rounded-lg shadow hover:opacity-90 transition">
          + Thêm Ebook
        </button>
      </div>
    </form>
  </div>

  {{-- Danh sách Ebook --}}
  <div class="bg-white p-6 rounded-xl shadow-sm">
    <h3 class="text-lg font-semibold mb-4 text-gray-800 flex items-center gap-2">
      📖 Danh sách Ebook
    </h3>
    <div class="overflow-x-auto">
      <table class="min-w-full text-sm text-left border-collapse">
        <thead>
          <tr class="bg-purple-700 text-white">
            <th class="p-3">ID</th>
            <th class="p-3">Ảnh bìa</th>
            <th class="p-3">Tên Ebook</th>
            <th class="p-3">Tác giả</th>
            <th class="p-3">Mô tả</th>
            <th class="p-3">File</th>
            <th class="p-3">Ngày tạo</th>
            <th class="p-3 text-center">Hành động</th>
          </tr>
        </thead>
        <tbody>
          @forelse($ebooks as $ebook)
            <tr class="border-b hover:bg-purple-50 transition">
              <td class="p-3">{{ $ebook->id }}</td>
              <td class="p-3">
                @if($ebook->hinhanh)
                  <img src="{{ asset('upload/ebook_covers/'.$ebook->hinhanh) }}" alt="cover" class="w-12 rounded-md">
                @else
                  <span class="text-gray-400">Không có</span>
                @endif
              </td>
              <td class="p-3 font-medium">{{ $ebook->ten }}</td>
              <td class="p-3">{{ $ebook->tacgia ?? '—' }}</td>
              <td class="p-3 truncate max-w-[300px]">{{ $ebook->mota ?? '—' }}</td>
              <td class="p-3">
                @if($ebook->file)
                  <a href="{{ asset('upload/ebook_files/'.$ebook->file) }}" target="_blank" class="text-purple-600 hover:underline">Tải về</a>
                @else
                  <span class="text-gray-400">Không có</span>
                @endif
              </td>
              <td class="p-3 text-gray-500">{{ $ebook->created_at ? $ebook->created_at->format('Y-m-d H:i') : '—' }}</td>
              <td class="p-3 flex justify-center gap-2">
  {{-- Nút chỉnh sửa --}}
  <a href="{{ route('ebook.edit', $ebook->id) }}" class="p-2 rounded bg-yellow-500 hover:bg-yellow-600 text-white">
    <i class="fa fa-edit"></i>
  </a>

  {{-- Nút xóa --}}
  <form method="POST" action="{{ route('ebook.destroy', $ebook->id) }}">
    @csrf
    @method('DELETE')
    <button onclick="return confirm('Xóa Ebook này?')" class="p-2 rounded bg-red-500 hover:bg-red-600 text-white">
      <i class="fa fa-trash"></i>
    </button>
  </form>
</td>

            </tr>
          @empty
            <tr>
              <td colspan="8" class="text-center p-4 text-gray-400">Chưa có Ebook nào</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
