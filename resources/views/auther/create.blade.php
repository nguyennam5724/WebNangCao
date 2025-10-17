@extends('layouts.app')

@section('content')
<div id="admin-content" class="py-4">
    <div class="container">
        <!-- Tiêu đề -->
        <div class="row mb-4">
            <div class="col-md-12 text-center">
                <h2 class="admin-heading fw-bold">📝 Thêm Tác Giả</h2>
                <hr class="mx-auto" style="border-top: 2px solid #6e6767; width: 40%; margin-top: 0.5rem;">
            </div>
        </div>

        <!-- Nút xem danh sách -->
        <div class="row mb-4">
            <div class="col-md-12 text-end">
                <a class="btn btn-primary px-4 shadow-sm" href="{{ route('authors') }}">
                    <i class="fas fa-list-ul me-2"></i>📚 Danh Sách Tác Giả
                </a>
            </div>
        </div>

        <!-- Form thêm tác giả -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 shadow-lg rounded-3">
                    <div class="card-body p-4">
                        <form class="yourform" action="{{ route('authors.store') }}" method="post" autocomplete="off">
                            @csrf
                            <div class="form-group mb-4">
                                <label class="form-label fw-bold mb-2">📌 Tên Tác Giả</label>
                                <input type="text" 
                                       class="form-control form-control-lg @error('name') is-invalid @enderror" 
                                       placeholder="Nhập tên tác giả" 
                                       name="name" 
                                       value="{{ old('name') }}" 
                                       required>
                                @error('name')
                                    <div class="alert alert-danger mt-2 p-2 rounded">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-success btn-lg px-5 py-2 shadow-sm">
                                    <i class="fas fa-check me-2"></i> Thêm Tác Giả
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection