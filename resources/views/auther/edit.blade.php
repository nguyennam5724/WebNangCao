@extends('layouts.app')
@section('content')
<div id="admin-content" class="py-4 bg-light">
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-12 text-center">
                <h2 class="admin-heading fw-bold text-primary"> Cập Nhật Tác Giả</h2>
                <hr class="mx-auto" style="border-top: 2px solid #007bff; width: 40%; margin-top: 0.5rem;">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body p-4">
                        <form class="yourform" action="{{ route('authors.update', $auther->id) }}" method="post"
                            autocomplete="off">
                            @csrf
                            <div class="form-group mb-4">
                                <label class="form-label fw-medium mb-2"> Tên Tác Giả</label>
                                <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" 
                                    name="name" value="{{ $auther->name }}" required>
                                @error('name')
                                    <div class="alert alert-danger mt-2 py-2" role="alert">
                                        <i class="fas fa-exclamation-circle me-2"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="text-center mt-4">
                                <a href="{{ route('authors') }}" class="btn btn-outline-secondary rounded-pill px-4 me-2">
                                    <i class="fas fa-arrow-left me-1"></i> Quay Lại
                                </a>
                                <button type="submit" class="btn btn-primary rounded-pill px-4 py-2">
                                    <i class="fas fa-check me-1"></i> Cập Nhật
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* CSS chung */
.form-control:focus {
    border-color: #80bdff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

/* Tùy chỉnh form */
.form-control-lg {
    border-radius: 0.5rem;
    border: 1px solid #e2e8f0;
    padding: 0.75rem 1rem;
    transition: all 0.2s ease;
}

.form-control-lg:hover {
    border-color: #cbd5e0;
}

/* Nút và hiệu ứng */
.btn {
    transition: all 0.3s ease;
    font-weight: 500;
}

.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    box-shadow: 0 4px 6px rgba(0, 123, 255, 0.15);
}

.btn-primary:hover {
    background-color: #0069d9;
    border-color: #0062cc;
    box-shadow: 0 5px 10px rgba(0, 123, 255, 0.3);
    transform: translateY(-1px);
}

.btn-outline-secondary {
    color: #6c757d;
    border-color: #6c757d;
}

.btn-outline-secondary:hover {
    background-color: #6c757d;
    color: white;
    box-shadow: 0 5px 10px rgba(108, 117, 125, 0.2);
    transform: translateY(-1px);
}

/* Thông báo lỗi */
.alert-danger {
    background-color: #fff5f5;
    color: #e53e3e;
    border-color: #fed7d7;
    border-radius: 0.5rem;
    font-size: 0.9rem;
}
</style>
@endsection