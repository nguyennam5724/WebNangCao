@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="admin-heading"> Danh Sách Thể Loại</h2>
                <hr style="border-top: 2px solid #6e6767; width: 50%;">
            </div>
        </div>
        <div class="row">
        <div class="offset-md-5 col-md-12">
                    <a class="add-new" href="{{ route('category.create') }}">➕ Thêm Thể Loại</a>
                </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <table class="table table-bordered table-hover shadow-sm">
                    <thead class="bg-dark text-white text-center">
                        <tr>
                            <th>#</th>
                            <th>Tên Tác Giả</th>
                            <th> Chỉnh Sửa</th>
                            <th> Xóa</th>
                        </tr>
                    </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                    <tr class="text-center align-middle">
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td class="edit">
                                            <a href="{{ route('category.edit', $category) }}" class="btn btn-warning btn-sm">✏️</a>
                                        </td>
                                        <td class="delete">
                                            <form action="{{ route('category.destroy', $category) }}" method="post" class="d-inline">
                                                @csrf
                                                <button class="btn btn-danger">🗑️</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Không có thể loại nào</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="pagination-wrapper">
                            {{ $categories->links('vendor/pagination/bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
/* CSS chung - giữ nguyên nền */
#admin-content {
    padding: 30px 0;
    min-height: 100vh;
}

/* Tiêu đề */
.admin-heading {
    font-weight: 600;
    margin-bottom: 10px;
    color: #333;
}

/* Nút thêm mới */
.add-new {
    display: inline-block;
    background-color: #4CAF50;
    color: white;
    padding: 10px 25px;
    border-radius: 50px;
    font-weight: 500;
    text-decoration: none;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s;
    margin: 20px 0 30px;
}

.add-new:hover {
    background-color: #3d8b40;
    box-shadow: 0 5px 12px rgba(0, 0, 0, 0.15);
    transform: translateY(-2px);
    text-decoration: none;
    color: white;
}

/* Bảng dữ liệu */
.table {
    border-radius: 8px;
    overflow: hidden;
    border-collapse: separate;
    border-spacing: 0;
    background: white;
}

.table thead th {
    padding: 12px;
    font-weight: 600;
    vertical-align: middle;
}

.table tbody td {
    padding: 12px;
    vertical-align: middle;
    border-top: 1px solid #f0f0f0;
}

/* Nút trong bảng */
.btn-warning {
    background-color: #FFC107;
    border: none;
    border-radius: 50px;
    padding: 6px 12px;
    color: #212529;
}

.btn-danger {
    background-color: #DC3545;
    border: none;
    border-radius: 50px;
    padding: 6px 12px;
    color: white;
}

.btn-warning:hover, .btn-danger:hover {
    opacity: 0.85;
    transform: translateY(-2px);
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
}

/* Phân trang hình tròn ở giữa */
.pagination-wrapper {
    display: flex;
    justify-content: center;
    margin-top: 30px;
}

.pagination {
    display: flex;
    padding-left: 0;
    list-style: none;
    border-radius: 0.25rem;
    gap: 8px;
}

.page-item.active .page-link {
    background-color: #007bff;
    border-color: #007bff;
}

.page-item .page-link {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    color: #007bff;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #dee2e6;
    transition: all 0.3s;
}

.page-link:hover {
    z-index: 2;
    color: #fff;
    text-decoration: none;
    background-color: #007bff;
    border-color: #007bff;
}

.page-item.disabled .page-link {
    color: #6c757d;
    pointer-events: none;
    background-color: #fff;
    border-color: #dee2e6;
}

.page-item:first-child .page-link,
.page-item:last-child .page-link {
    border-radius: 50%;
}
</style>
@endsection