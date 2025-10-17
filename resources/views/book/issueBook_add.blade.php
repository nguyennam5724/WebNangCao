@extends('layouts.app')

@section('content')
    <div id="admin-content">
        <div class="container">
            <!-- Tiêu đề trang -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="admin-heading"> Thêm Phiếu Mượn Sách</h2>
                    <hr style="border-top: 2px solid #6e6767; width: 50%;">
                </div>
            </div>

            <!-- Form thêm phiếu mượn -->
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form class="yourform shadow-lg p-4 bg-white rounded" action="{{ route('book_issue.create') }}" method="post" autocomplete="off">
                        @csrf

                        <!-- Chọn Sinh Viên -->
                        <div class="form-group mb-3">
                            <label>🎓 Chọn Sinh Viên</label>
                            <select class="form-control @error('student_id') is-invalid @enderror" name="student_id" required>
                                <option value=""> Chọn sinh viên...</option>
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                                @endforeach
                            </select>
                            @error('student_id')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Chọn Sách -->
                        <div class="form-group mb-3">
                            <label> Chọn Sách</label>
                            <select class="form-control @error('book_id') is-invalid @enderror" name="book_id" required>
                                <option value=""> Chọn sách...</option>
                                @foreach ($books as $book)
                                    <option value="{{ $book->id }}">{{ $book->name }}</option>
                                @endforeach
                            </select>
                            @error('book_id')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Nút Lưu -->
                        <button type="submit" class="btn btn-primary w-100"> Lưu Phiếu Mượn</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<style>
/* Thiết lập chung */
#admin-content {
    padding: 50px 0;
    background-color: #f8f9fa;
    min-height: 100vh;
}

.container {
    max-width: 1140px;
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
    width: 80px !important;
    margin: 0 auto 40px;
}

/* Form thêm phiếu mượn */
.yourform {
    background-color: #fff;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08) !important;
    padding: 35px !important;
    border: none;
    transition: all 0.3s ease;
}

.form-group {
    margin-bottom: 25px !important;
}

.form-group label {
    display: block;
    margin-bottom: 10px;
    color: #2c3e50;
    font-weight: 500;
    font-size: 15px;
}

.form-control {
    height: 50px;
    padding: 10px 15px;
    border: 1px solid #e9ecef;
    border-radius: 6px;
    font-size: 14px;
    transition: all 0.3s ease;
    box-shadow: none;
}

.form-control:focus {
    border-color: #3498db;
    box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.15);
    outline: none;
}

/* Dropdown styling */
select.form-control {
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%232c3e50' d='M6 8.825l4.475-4.475 1.06 1.06L6 10.945 0.465 5.41l1.06-1.06L6 8.825z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 15px center;
    padding-right: 35px;
}

/* Error messages */
.alert-danger {
    background-color: #f8d7da;
    color: #721c24;
    border-color: #f5c6cb;
    padding: 10px 15px;
    font-size: 13px;
    border-radius: 6px;
    margin-top: 8px;
}

.is-invalid {
    border-color: #dc3545;
}

/* Submit button */
.btn-primary {
    background-color: #3498db;
    border: none;
    padding: 14px 20px;
    font-weight: 500;
    font-size: 15px;
    border-radius: 6px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 10px rgba(52, 152, 219, 0.2);
    letter-spacing: 0.3px;
    margin-top: 10px;
}

.btn-primary:hover {
    background-color: #2980b9;
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(52, 152, 219, 0.3);
}

.btn-primary:active {
    transform: translateY(0);
}

/* Biểu tượng emoji */
.yourform label, .btn-primary {
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
}

/* Responsive */
@media (max-width: 768px) {
    .yourform {
        padding: 25px !important;
    }
    
    .admin-heading {
        font-size: 24px;
    }
    
    .form-control {
        height: 45px;
    }
    
    .btn-primary {
        padding: 12px 20px;
    }
}
</style>
@endsection
