@extends('layouts.app')

@section('content')
<div id="admin-content" class="py-4 bg-light">
    <div class="container-fluid px-4">
        <!-- Tiêu đề -->
        <div class="row mb-4">
            <div class="col-md-12 text-center">
                <h2 class="admin-heading fw-bold text-primary"> Danh Sách Tác Giả</h2>
                <hr class="mx-auto" style="border-top: 2px solid #007bff; width: 40%; margin-top: 0.5rem;">
            </div>
        </div>

        <!-- Nút Thêm -->
        <div class="row mb-4">
            <div class="col-md-12 d-flex justify-content-end">
                <a class="add-new btn btn-outline-primary px-4 rounded-pill" href="{{ route('authors.create') }}">
                    <i class="fas fa-plus-circle me-2"></i> Thêm Tác Giả
                </a>
            </div>
        </div>

        <!-- Bảng dữ liệu -->
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="bg-white text-primary border-bottom">
                                    <tr class="text-center">
                                        <th class="py-3">#</th>
                                        <th class="py-3">Tên Tác Giả</th>
                                        <th class="py-3"> Chỉnh Sửa</th>
                                        <th class="py-3"> Xóa</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    @forelse ($authors as $auther)
                                        <tr class="text-center align-middle">
                                            <td class="py-3">{{ $auther->id }}</td>
                                            <td class="py-3 fw-medium">{{ $auther->name }}</td>
                                            <td class="py-3">
                                                <a href="{{ route('authors.edit', $auther) }}" class="btn btn-outline-warning btn-sm px-3 rounded-pill">
                                                    <i class="fas fa-edit me-1"></i> Sửa
                                                </a>
                                            </td>
                                            <td class="py-3">
                                                <form action="{{ route('authors.destroy', $auther->id) }}" method="post"
                                                    class="form-hidden d-inline">
                                                    @csrf
                                                    <button class="btn btn-outline-danger btn-sm px-3 rounded-pill delete-author">
                                                        <i class="fas fa-trash-alt me-1"></i> Xóa
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-muted py-4">
                                                <i class="fas fa-info-circle me-2"></i>Không có tác giả nào.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Phân trang với CSS inline -->
                <div class="mt-4">
                    {{ $authors->links('vendor/pagination/bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* CSS để làm đẹp phân trang */
.pagination {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    margin-top: 1rem;
    margin-bottom: 1rem;
}

.pagination .page-item {
    margin: 0 0.2rem;
}

.pagination .page-item .page-link {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    border: none;
    color: #007bff;
    background-color: #fff;
    font-weight: 500;
    transition: all 0.2s ease;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
}

.pagination .page-item .page-link:hover {
    background-color: #f8f9fa;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transform: translateY(-1px);
}

.pagination .page-item.active .page-link {
    background-color: #007bff;
    color: #fff;
    box-shadow: 0 4px 8px rgba(0, 123, 255, 0.3);
}

.pagination .page-item.disabled .page-link {
    background-color: #f8f9fa;
    color: #6c757d;
    box-shadow: none;
}

/* Thêm biểu tượng Font Awesome cho nút Previous/Next */
.pagination .page-item:first-child .page-link::before {
    content: "\f053"; /* fa-chevron-left */
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
}

.pagination .page-item:last-child .page-link::before {
    content: "\f054"; /* fa-chevron-right */
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
}

/* Ẩn văn bản gốc của nút Previous/Next */
.pagination .page-item:first-child .page-link span,
.pagination .page-item:last-child .page-link span {
    display: none;
}
</style>
@endsection