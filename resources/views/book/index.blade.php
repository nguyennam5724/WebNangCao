@extends('layouts.app')

@section('content')

    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="admin-heading">Danh Sách Sách</h2>
                </div>
                <div class="col-md-2 ms-auto text-end">
                    <a class="add-new btn btn-primary" href="{{ route('book.create') }}">Thêm Sách</a>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="message"></div>
                    
                    <table class="content-table table table-bordered text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Tên Sách</th>
                                <th>Thể Loại</th>
                                <th>Tác Giả</th>
                                <th>Nhà Xuất Bản</th>
                                <th>Trạng Thái</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($books as $index => $book)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $book->name }}</td>
                                    <td>{{ $book->category->name }}</td>
                                    <td>{{ $book->auther->name }}</td>
                                    <td>{{ $book->publisher->name }}</td>
                                    <td>
                                        @if ($book->status == 'Y')
                                            <span class='badge badge-success'>Còn Sách</span>
                                        @else
                                            <span class='badge badge-danger'>Đã Mượn</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('book.edit', $book) }}" class="btn btn-success btn-sm">Sửa</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('book.destroy', $book) }}" method="post" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm delete-book">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted">Không tìm thấy sách nào</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center">
                        {{ $books->links('vendor/pagination/bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
/* CSS chung - giữ nguyên nền */
#admin-content {
    padding: 40px 0;
    min-height: 100vh;
    background-color: #f9fafb;
}

/* Container rộng hơn */
#admin-content .container {
    max-width: 95%;
}

/* Tiêu đề */
.admin-heading {
    font-weight: 700;
    color: #1f2937;
    position: relative;
    padding-bottom: 12px;
    margin-bottom: 0;
    font-size: 28px;
}

.admin-heading:after {
    content: '';
    position: absolute;
    width: 80px;
    height: 3px;
    background-color: #3b82f6;
    bottom: 0;
    left: 0;
}

/* Nút thêm mới */
.add-new {
    border-radius: 50px;
    padding: 10px 24px;
    box-shadow: 0 4px 6px rgba(59, 130, 246, 0.25);
    transition: all 0.3s;
    font-weight: 600;
    font-size: 15px;
}

.add-new:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 12px rgba(59, 130, 246, 0.35);
}

/* Bảng dữ liệu */
.content-table {
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
    margin-bottom: 40px;
    border: none;
    width: 100%;
}

.table thead th {
    font-weight: 600;
    vertical-align: middle;
    padding: 16px;
    border-bottom: none;
    font-size: 15px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.table tbody td {
    vertical-align: middle;
    padding: 16px;
    border-color: #f0f0f0;
    font-size: 15px;
    transition: background-color 0.2s;
}

.table tbody tr:hover {
    background-color: #f1f5ff;
}

.table tbody tr:nth-child(even) {
    background-color: #f8fafc;
}

.table tbody tr:nth-child(even):hover {
    background-color: #f1f5ff;
}

/* Trạng thái sách */
.badge {
    padding: 8px 16px;
    border-radius: 50px;
    font-weight: 600;
    font-size: 13px;
    letter-spacing: 0.5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.badge-success {
    background-color: #10b981;
    color: white;
}

.badge-danger {
    background-color: #ef4444;
    color: white;
}

/* Nút trong bảng */
.btn-success, .btn-danger {
    border-radius: 50px;
    padding: 7px 18px;
    transition: all 0.2s;
    font-size: 14px;
    font-weight: 600;
    border: none;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.btn-success {
    background-color: #10b981;
}

.btn-danger {
    background-color: #ef4444;
}

.btn-success:hover, .btn-danger:hover {
    opacity: 0.9;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
}

/* Phân trang hình tròn ở giữa */
.pagination {
    margin: 0;
    gap: 8px;
}

.page-item .page-link {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    color: #3b82f6;
    border: 1px solid #e5e7eb;
    padding: 0;
    transition: all 0.2s;
    font-size: 16px;
}

.page-item.active .page-link {
    background-color: #3b82f6;
    border-color: #3b82f6;
    box-shadow: 0 4px 8px rgba(59, 130, 246, 0.4);
}

.page-link:hover {
    background-color: #3b82f6;
    color: white;
    border-color: #3b82f6;
    z-index: 1;
    box-shadow: 0 4px 8px rgba(59, 130, 246, 0.3);
}

.page-item.disabled .page-link {
    color: #9ca3af;
    background-color: #f9fafb;
    border-color: #e5e7eb;
}

/* Thông báo trống */
.text-muted {
    font-size: 16px;
    padding: 30px 0;
}

/* Mở rộng bảng trên thiết bị nhỏ */
@media (max-width: 768px) {
    .content-table {
        display: block;
        overflow-x: auto;
    }
}
</style>
@endsection
