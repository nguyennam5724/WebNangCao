@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="admin-heading">➕ Thêm Sinh Viên</h2>
                </div>
                <div class="offset-md-7 col-md-2">
                    <a class="add-new" href="{{ route('students') }}">📋 Danh Sách Sinh Viên</a>
                </div>
            </div>
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <form class="yourform" action="{{ route('student.store') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label>🎓 Họ Và Tên</label>
                            <input type="text" class="form-control" placeholder="Nhập tên sinh viên" name="name"
                                value="{{ old('name') }}" required>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>🏠 Địa Chỉ</label>
                            <input type="text" class="form-control" placeholder="Nhập địa chỉ" name="address"
                                value="{{ old('address') }}" required>
                            @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>⚧ Giới Tính</label>
                            <select name="gender" class="form-control">
                                <option value="male" selected>Nam</option>
                                <option value="female">Nữ</option>
                            </select>
                            @error('gender')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>🏫 Lớp</label>
                            <input type="text" class="form-control" placeholder="Nhập lớp học" name="class"
                                value="{{ old('class') }}" required>
                            @error('class')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>🎂 Tuổi</label>
                            <input type="number" class="form-control" placeholder="Nhập tuổi" name="age"
                                value="{{ old('age') }}" required>
                            @error('age')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>📞 Số Điện Thoại</label>
                            <input type="tel" class="form-control" placeholder="Nhập số điện thoại" name="phone"
                                value="{{ old('phone') }}" required>
                            @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>📧 Email</label>
                            <input type="email" class="form-control" placeholder="Nhập email" name="email"
                                value="{{ old('email') }}" required>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">✔️ Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<style>
/* Cài đặt chung */
#admin-content {
    padding: 40px 0;
    background-color: #f8f9fa;
    min-height: 100vh;
}

/* Tiêu đề */
.admin-heading {
    color: #2c3e50;
    font-size: 24px;
    font-weight: 600;
    position: relative;
    padding-bottom: 10px;
}

.admin-heading:after {
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    height: 3px;
    width: 50px;
    background-color: #007bff;
}

/* Nút Danh Sách Sinh Viên */
.add-new {
    background-color: #007bff;
    color: white;
    padding: 8px 16px;
    border-radius: 5px;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
}

.add-new:hover {
    background-color: #0056b3;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Form thiết kế */
.yourform {
    background-color: white;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    font-weight: 500;
    color: #2c3e50;
}

.form-control {
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ddd;
    font-size: 14px;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #007bff;
    outline: 0;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
}

/* Dropdown */
select.form-control {
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%232c3e50' d='M6 8.825l4.475-4.475 1.06 1.06L6 10.945 0.465 5.41l1.06-1.06L6 8.825z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 15px center;
    padding-right: 30px;
}

/* Thông báo lỗi */
.alert-danger {
    background-color: #f8d7da;
    color: #721c24;
    padding: 8px 12px;
    border-radius: 4px;
    margin-top: 5px;
    font-size: 13px;
    border: 1px solid #f5c6cb;
}

/* Nút submit */
.btn-primary {
    background: linear-gradient(135deg, #007bff, #0056b3);
    border: none;
    color: white;
    padding: 12px 25px;
    border-radius: 5px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    cursor: pointer;
    transition: all 0.3s ease;
    width: 100%;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #0056b3, #004494);
    box-shadow: 0 4px 8px rgba(0, 123, 255, 0.3);
    transform: translateY(-2px);
}

/* Responsive */
@media (max-width: 768px) {
    .col-md-3, .offset-md-7.col-md-2 {
        width: 100%;
        margin-bottom: 15px;
    }

    .add-new {
        width: 100%;
        text-align: center;
    }

    .yourform {
        padding: 20px;
    }
}
</style>
@endsection
