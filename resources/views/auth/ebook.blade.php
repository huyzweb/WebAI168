<form action="{{ url('ebook/them') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div>
    <label>Tên Ebook:</label>
    <input type="text" name="ten" required>
  </div>
  <div>
    <label>Tác giả:</label>
    <input type="text" name="tacgia">
  </div>
  <div>
    <label>Mô tả:</label>
    <textarea name="mota"></textarea>
  </div>
  <div>
    <label>File Ebook (PDF):</label>
    <input type="file" name="file" accept=".pdf,.doc,.docx,.epub">
  </div>
  <div>
    <label>Hình ảnh bìa:</label>
    <input type="file" name="hinhanh" accept="image/*">
  </div>
  <button type="submit">Thêm Ebook</button>
</form>

<!-- Hiển thị danh sách -->
<table border="1">
  <tr>
    <th>Tên</th>
    <th>Tác giả</th>
    <th>Mô tả</th>
    <th>File</th>
    <th>Hình ảnh</th>
  </tr>
  @foreach($ebooks as $e)
  <tr>
    <td>{{ $e->ten }}</td>
    <td>{{ $e->tacgia }}</td>
    <td>{{ $e->mota }}</td>
    <td>
      @if($e->file)
      <a href="{{ asset('storage/'.$e->file) }}" target="_blank">Tải về</a>
      @endif
    </td>
    <td>
      @if($e->hinhanh)
      <img src="{{ asset('storage/'.$e->hinhanh) }}" alt="cover" width="80">
      @endif
    </td>
  </tr>
  @endforeach
</table>
