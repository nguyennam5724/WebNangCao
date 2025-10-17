@extends('layouts.app')
@section('content')
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2 class="admin-heading">➕ Thêm Nhà Xuất Bản</h2>
            </div>
            <div class="offset-md-7 col-md-2">
              <a class="add-new" href="{{ route('publishers') }}">📜 Danh Sách Nhà Xuất Bản</a>
            </div>
        </div>
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <form class="yourform" action="{{ route('publisher.store') }}" method="post" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <label>🏢 Tên Nhà Xuất Bản</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                            placeholder="Nhập tên nhà xuất bản" name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary px-4 py-2">✔️ Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<style>
/* CSS chung cho trang */
#admin-content {
    background-color: #f9fafc;
    padding: 40px 0;
    min-height: 100vh;
    font-family: 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
}

.container {
    max-width: 1140px;
    margin: 0 auto;
}

/* Tiêu đề và nút */
.admin-heading {
    color: #1a73e8;
    font-weight: 600;
    font-size: 24px;
    margin: 0;
    padding-bottom: 5px;
    border-bottom: 2px solid #1a73e8;
    display: inline-block;
}

.add-new {
    background-color: #1a73e8;
    color: white;
    padding: 10px 20px;
    border-radius: 4px;
    text-decoration: none;
    font-weight: 500;
    text-transform: uppercase;
    font-size: 14px;
    letter-spacing: 0.5px;
    transition: background-color 0.3s ease;
    display: inline-block;
    text-align: center;
}

.add-new:hover {
    background-color: #0d62d0;
    color: white;
    text-decoration: none;
}

/* Form styling */
.yourform {
    background: white;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    margin-top: 30px;
}

.form-group {
    margin-bottom: 24px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: 500;
    color: #202124;
    font-size: 14px;
}

.form-control {
    width: 100%;
    height: 44px;
    border-radius: 4px;
    border: 1px solid #dadce0;
    padding: 0 12px;
    font-size: 16px;
    transition: border 0.2s ease;
    box-sizing: border-box;
}

.form-control:focus {
    border-color: #1a73e8;
    box-shadow: 0 0 0 1px #1a73e8;
    outline: none;
}

.form-control::placeholder {
    color: #80868b;
}

.isinvalid {
    border-color: #d93025;
}

.alert-danger {
    background-color: #fce8e6;
    color: #d93025;
    border-radius: 4px;
    padding: 8px 12px;
    font-size: 14px;
    margin-top: 8px;
    border: 1px solid #fadbd8;
}

/* Button styling */
.btn-danger {
    background-color: #1a73e8;
    border: none;
    color: white;
    padding: 10px 24px;
    border-radius: 4px;
    font-weight: 500;
    font-size: 14px;
    letter-spacing: 0.5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    text-transform: uppercase;
}

.btn-danger:hover {
    background-color: #0d62d0;
}

.btn-danger:active {
    background-color: #0b57b8;
}

/* Responsive */
@media (max-width: 768px) {
    .offset-md-3 {
        margin-left: 0;
    }
    
    .col-md-6 {
        width: 100%;
    }
    
    .col-md-3, .col-md-2 {
        width: 100%;
        margin-bottom: 15px;
    }
}
</style>
@endsection
