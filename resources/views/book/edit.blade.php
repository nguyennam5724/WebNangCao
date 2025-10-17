@extends('layouts.app')

@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="admin-heading">Cập Nhật Sách</h2>
                </div>
            </div>

            <div class="row justify-content-center mt-4">
                <div class="col-md-6">
                    <form class="yourform" action="{{ route('book.update', $book->id) }}" method="post" autocomplete="off">
                        @csrf

                        <!-- Tên Sách -->
                        <div class="form-group">
                            <label>Tên Sách</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Nhập tên sách" name="name" value="{{ $book->name }}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Thể Loại -->
                        <div class="form-group">
                            <label>Thể Loại</label>
                            <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                <option value="">Chọn Thể Loại</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $book->category_id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tác Giả -->
                        <div class="form-group">
                            <label>Tác Giả</label>
                            <select class="form-control @error('auther_id') is-invalid @enderror" name="author_id">
                                <option value="">Chọn Tác Giả</option>
                                @foreach ($authors as $auther)
                                    <option value="{{ $auther->id }}" {{ $auther->id == $book->auther_id ? 'selected' : '' }}>
                                        {{ $auther->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('auther_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Nhà Xuất Bản -->
                        <div class="form-group">
                            <label>Nhà Xuất Bản</label>
                            <select class="form-control @error('publisher_id') is-invalid @enderror" name="publisher_id">
                                <option value="">Chọn Nhà Xuất Bản</option>
                                @foreach ($publishers as $publisher)
                                    <option value="{{ $publisher->id }}" {{ $publisher->id == $book->publisher_id ? 'selected' : '' }}>
                                        {{ $publisher->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('publisher_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Nút Cập Nhật -->
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-danger">Cập Nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<style>
   /* CSS chung cho trang admin */
#admin-content {
    padding: 40px 0;
    min-height: 100vh;
    background-color: #f8f9fa;
}

/* Tiêu đề trang */
.admin-heading {
    font-weight: 600;
    color: #212529;
    position: relative;
    padding-bottom: 12px;
    margin-bottom: 0;
    font-size: 24px;
}

.admin-heading:after {
    content: '';
    position: absolute;
    width: 50px;
    height: 2px;
    background-color: #dc3545;
    bottom: 0;
    left: 0;
}

/* Form thiết kế */
.yourform {
    background-color: white;
    border-radius: 8px;
    padding: 30px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    margin-bottom: 20px;
}

/* Nhóm form */
.form-group {
    margin-bottom: 20px;
}

/* Label */
.form-group label {
    font-weight: 500;
    color: #495057;
    margin-bottom: 8px;
    display: block;
    font-size: 14px;
}

/* Input và Select */
.form-control {
    border-radius: 4px;
    border: 1px solid #ced4da;
    padding: 10px 12px;
    font-size: 15px;
    transition: all 0.2s;
    height: auto;
}

.form-control:focus {
    border-color: #dc3545;
    box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
}

/* Thông báo lỗi */
.alert-danger {
    background-color: #fff0f2;
    border-color: #ffccd2;
    color: #dc3545;
    font-size: 13px;
    padding: 8px 12px;
    margin-top: 5px;
    border-radius: 4px;
}

/* Select với arrow icon */
select.form-control {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%23495057' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 12px center;
    background-size: 16px;
    padding-right: 36px;
}

/* Nút cập nhật/lưu */
.btn-danger {
    background-color: #dc3545;
    border-color: #dc3545;
    border-radius: 4px;
    padding: 10px 30px;
    font-weight: 500;
    letter-spacing: 0.3px;
    transition: all 0.2s;
    box-shadow: 0 2px 5px rgba(220, 53, 69, 0.2);
}

.btn-danger:hover {
    background-color: #c82333;
    border-color: #bd2130;
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
}

/* Placeholder */
::placeholder {
    color: #adb5bd;
    opacity: 1;
}

/* Responsive */
@media (max-width: 768px) {
    .yourform {
        padding: 20px;
    }
    
    .col-md-6 {
        padding: 0 15px;
    }
}
</style>
@endsection
