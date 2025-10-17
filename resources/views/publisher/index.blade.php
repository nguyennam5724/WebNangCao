@extends('layouts.app')
@section('content')
<div id="admin-content" class="py-4">
    <div class="container">
        <!-- Tiêu đề -->
        <div class="row mb-4">
            <div class="col-md-12 text-center">
                <h2 class="admin-heading fw-bold text-primary">📖 Danh Sách Nhà Xuất Bản</h2>
                <hr class="mx-auto" style="border-top: 2px solid #007bff; width: 40%; margin-top: 0.5rem;">
            </div>
        </div>
        
        <!-- Nút thêm mới -->
        <div class="row mb-4">
            <div class="col-md-12 text-end">
                <a class="btn btn-success px-4 py-2 rounded-pill shadow-sm" href="{{ route('publisher.create') }}">
                    <i class="fas fa-plus me-2"></i> Thêm Nhà Xuất Bản
                </a>
            </div>
        </div>
        
        <!-- Bảng dữ liệu -->
        <div class="row">
            <div class="col-md-12">
                <div class="message"></div>
                <div class="card border-0 shadow-sm rounded-3 bg-white">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead style="background-color: #f8f9ff;">
                                    <tr class="text-center">
                                        <th class="py-3 text-primary"># Số Thứ Tự</th>
                                        <th class="py-3 text-primary"> Tên Nhà Xuất Bản</th>
                                        <th class="py-3 text-primary"> Chỉnh Sửa</th>
                                        <th class="py-3 text-primary"> Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($publishers as $publisher)
                                        <tr class="text-center">
                                            <td class="py-3">{{ $publisher->id }}</td>
                                            <td class="py-3 text-dark">{{ $publisher->name }}</td>
                                            <td class="py-3">
                                                <a href="{{ route('publisher.edit', $publisher) }}" class="btn btn-warning px-3 py-1 rounded-pill shadow-sm">
                                                     Sửa
                                                </a>
                                            </td>
                                            <td class="py-3">
                                                <form action="{{ route('publisher.destroy', $publisher) }}" method="post"
                                                    class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger px-3 py-1 rounded-pill shadow-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                                         Xóa
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-danger fw-bold py-4">
                                                 Không có nhà xuất bản nào!
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- Phân trang -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $publishers->links('vendor/pagination/bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* CSS chung */
#admin-content {
    background-color: #f8faff;
}

.admin-heading {
    color: #007bff;
}

/* Thêm màu trắng cho col-md-12 */
.col-md-12 {
    background-color: white;
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 15px;
}

/* Bảng dữ liệu */
.table thead th {
    font-weight: 600;
    border-top: none;
    border-bottom: 2px solid #e6f0ff;
}


.table tbody td {
    vertical-align: middle;
    border-color: #f0f8ff;

}

/* Card styling */
.card {
    transition: all 0.3s ease;
    border-radius: 10px;

}


/* Nút và hiệu ứng */
.btn {
    transition: all 0.3s ease;
    font-weight: 500;
}

.btn-success {
    background-color: #28a745;
    border-color: #28a745;
    box-shadow: 0 4px 6px rgba(40, 167, 69, 0.15);
}

.btn-success:hover {
    background-color: #218838;
    border-color: #1e7e34;
    box-shadow: 0 5px 15px rgba(40, 167, 69, 0.3);
    transform: translateY(-3px);
}

.btn-warning {
    background-color: #ffc107;
    border-color: #ffc107;

}

.btn-warning:hover {
    background-color: #e0a800;
    border-color: #d39e00;
    box-shadow: 0 5px 15px rgba(255, 193, 7, 0.3);
    transform: translateY(-3px);
}

.btn-danger {
    background-color: #dc3545;
    border-color: #dc3545;
}

.btn-danger:hover {
    background-color: #c82333;
    border-color: #bd2130;
    box-shadow: 0 5px 15px rgba(220, 53, 69, 0.3);
    transform: translateY(-3px);
}

.btn:active {
    transform: translateY(1px);
}

/* Phân trang với nút tròn cho tất cả các nút */
.pagination {
    margin-bottom: 0;
    gap: 8px;
}

/* Làm cho tất cả các nút phân trang đều tròn */
.page-item .page-link {
    border-radius: 50%;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0;
    font-weight: 500;
    transition: all 0.3s ease;
}

.page-item.active .page-link {
    background-color: #007bff;
    border-color: #007bff;
    box-shadow: 0 2px 5px rgba(0, 123, 255, 0.3);
}

.page-link {
    color: #007bff;
    border: 1px solid #dee2e6;
    background-color: #fff;
}

.page-link:hover {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
    transform: translateY(-2px);
    box-shadow: 0 3px 8px rgba(0, 123, 255, 0.2);
}

/* Đặc biệt cho nút prev/next cũng tròn */
.page-item:first-child .page-link,
.page-item:last-child .page-link {
    border-radius: 50%;
    font-size: 18px;
    line-height: 1;
}

.page-item.disabled .page-link {
    color: #adb5bd;
    background-color: #f8f9fa;
    border-color: #dee2e6;
}

/* Màu nền cho các hàng trong bảng */
.table tbody tr {
    background-color: white !important;
}

/* Để đảm bảo nền trắng cho các ô của bảng */
.table tbody td {
    background-color: white !important;
    vertical-align: middle;
    border-color: #f0f8ff;
}
</style>
@endsection