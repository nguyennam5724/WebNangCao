@extends('layouts.app')

@section('content')
    <div id="admin-content">
        <div class="container">
            <!-- Tiêu đề trang -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="admin-heading">📌 Quản Lý Mượn Sách</h2>
                    <hr style="border-top: 2px solid #6e6767; width: 50%;">
                </div>
            </div>

            <!-- Nút thêm sách mượn -->
            <div class="row mb-3">
                <div class="offset-md-6 col-md-6 text-right">
                    <a class="btn btn-primary" href="{{ route('book_issue.create') }}"> Thêm Mượn Sách</a>
                </div>
            </div>

            <!-- Bảng danh sách sách đã mượn -->
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover table-bordered text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th> Sinh viên</th>
                                <th> Sách</th>
                                <th> Số điện thoại</th>
                                <th> Email</th>
                                <th>Ngày mượn</th>
                                <th>Hạn trả</th>
                                <th> Trạng thái</th>
                                <th> Chỉnh sửa</th>
                                <th> Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($books as $book)
                                <tr style="@if (date('Y-m-d') > $book->return_date->format('Y-m-d') && $book->issue_status == 'N') background:rgba(255,0,0,0.2) @endif">
                                    <td>{{ $book->id }}</td>
                                    <td>{{ $book->student->name }}</td>
                                    <td>{{ $book->book->name }}</td>
                                    <td>{{ $book->student->phone }}</td>
                                    <td>{{ $book->student->email }}</td>
                                    <td>{{ $book->issue_date->format('d M, Y') }}</td>
                                    <td>{{ $book->return_date->format('d M, Y') }}</td>
                                    <td>
                                        @if ($book->issue_status == 'Y')
                                            <span class="badge badge-success">Đã trả</span>
                                        @else
                                            <span class="badge badge-danger">
                                                Đang mượn
                                                @if (date('Y-m-d') > $book->return_date->format('Y-m-d'))
                                                    - Quá hạn {{ now()->diffInDays($book->return_date) }} ngày
                                                @endif
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('book_issue.edit', $book->id) }}" class="btn btn-warning btn-sm">✏️ Chỉnh sửa</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('book_issue.destroy', $book) }}" method="post" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">🗑 Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10">❌ Không có sách nào đang mượn</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Phân trang -->
                    {{ $books->links('vendor/pagination/bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>

<style>
    /* Thiết lập chung */
#admin-content {
    padding: 40px 0;
    background-color: #f8f9fa;
    min-height: 100vh;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
}

/* Tiêu đề trang */
.admin-heading {
    color: #2c3e50;
    font-weight: 600;
    font-size: 28px;
    margin-bottom: 10px;
    letter-spacing: 0.5px;
}

hr {
    border-top: 2px solid #e9ecef !important;
    width: 100px !important;
    margin: 0 auto 30px;
}

/* Nút thêm mượn sách */
.btn-primary {
    background-color: #3498db;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    font-weight: 500;
    transition: all 0.3s ease;
    box-shadow: 0 2px 5px rgba(52, 152, 219, 0.2);
}

.btn-primary:hover {
    background-color: #2980b9;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(52, 152, 219, 0.3);
}

/* Bảng danh sách */
.table {
    background-color: #fff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
    border: none;
    margin-bottom: 30px;
}

.table th, .table td {
    vertical-align: middle;
    padding: 15px 10px;
    border-color: #edf2f7;
}

.thead-dark {
    background-color: #2c3e50 !important;
    color: #fff;
}

.thead-dark th {
    border: none;
    font-weight: 500;
    text-transform: uppercase;
    font-size: 13px;
    letter-spacing: 0.5px;
}

.table tbody tr {
    transition: all 0.3s ease;
}

.table tbody tr:hover {
    background-color: #f8f9fa;
}

/* Trạng thái */
.badge {
    padding: 8px 12px;
    font-weight: 500;
    border-radius: 4px;
    font-size: 12px;
}

.badge-success {
    background-color: #2ecc71;
    color: #fff;
}

.badge-danger {
    background-color: #e74c3c;
    color: #fff;
}

/* Hàng quá hạn */
.overdue {
    background-color: rgba(231, 76, 60, 0.1) !important;
}

/* Nút hành động */
.btn-warning {
    background-color: #f39c12;
    border: none;
    color: #fff;
    transition: all 0.3s ease;
}

.btn-warning:hover {
    background-color: #e67e22;
    transform: translateY(-2px);
    box-shadow: 0 2px 5px rgba(243, 156, 18, 0.3);
}

.btn-danger {
    background-color: #e74c3c;
    border: none;
    transition: all 0.3s ease;
}

.btn-danger:hover {
    background-color: #c0392b;
    transform: translateY(-2px);
    box-shadow: 0 2px 5px rgba(231, 76, 60, 0.3);
}

.btn-sm {
    padding: 6px 10px;
    font-size: 12px;
    border-radius: 4px;
}

/* Phân trang */
.pagination {
    justify-content: center;
    margin-top: 20px;
}

.pagination .page-item.active .page-link {
    background-color: #3498db;
    border-color: #3498db;
}

.pagination .page-link {
    color: #3498db;
    border-radius: 4px;
    margin: 0 3px;
}

.pagination .page-link:hover {
    background-color: #edf2f7;
}

/* Thông báo không có sách */
.table td[colspan="10"] {
    padding: 30px;
    font-size: 16px;
    color: #7f8c8d;
}

/* Biểu tượng emoji */
.table th, .btn, .badge {
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
}

/* Responsive */
@media (max-width: 768px) {
    .table {
        font-size: 14px;
    }
    
    .admin-heading {
        font-size: 24px;
    }
    
    .offset-md-6.col-md-6 {
        margin-left: 0;
        text-align: center !important;
        margin-bottom: 20px;
    }
    
    .btn {
        padding: 8px 15px;
        font-size: 13px;
    }
}
</style>
@endsection
