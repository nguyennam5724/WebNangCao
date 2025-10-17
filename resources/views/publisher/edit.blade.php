@extends('layouts.app')
@section('content')
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="admin-heading"> Chỉnh Sửa Nhà Xuất Bản</h2>
                <hr style="border-top: 2px solid #6e6767; width: 50%;">
            </div>
        </div>
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <form  class="your-form" action="{{ route('publisher.update', $publisher->id) }}" method="post" autocomplete="off">
                    @csrf
                  
                    <div class="form-group">
                        <label> Tên Nhà Xuất Bản</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name', $publisher->name) }}" required>
                        @error('name')
                            <div class="alert alert-danger mt-2" role="alert">
                                ❌ {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary px-4 py-2"> Cập Nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<style>
/* CSS chung */
#admin-content {
    background-color: #f8f9fa;
    padding: 40px 0;
    min-height: 100vh;
    font-family: 'Roboto', sans-serif;
}

/* Tiêu đề */
.admin-heading {
    color: #333;
    font-weight: 500;
    font-size: 26px;
    margin-bottom: 10px;
    letter-spacing: 0.5px;
}

hr {
    margin: 0 auto 30px;
    opacity: 0.4;
}

/* Form styling */
.your-form {
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    margin: 10px 0 30px;
}

.form-group {
    margin-bottom: 25px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: 400;
    color: #333;
    font-size: 16px;
}

.form-control {
    width: 100%;
    height: 50px;
    border-radius: 6px;
    border: 1px solid #e0e0e0;
    padding: 0 15px;
    font-size: 15px;
    transition: all 0.2s;
}

.form-control:focus {
    border-color: #4a6fdc;
    box-shadow: 0 0 0 3px rgba(74, 111, 220, 0.1);
    outline: none;
}

.is-invalid {
    border-color: #dc3545;
}

.alert-danger {
    background-color: #fff8f8;
    color: #dc3545;
    border-radius: 6px;
    padding: 10px 15px;
    font-size: 14px;
    border: none;
}

/* Button styling */
.btn-primary {
    background-color: #4a6fdc;
    border: none;
    color: white;
    font-weight: 500;
    font-size: 15px;
    letter-spacing: 0.5px;
    cursor: pointer;
    transition: all 0.3s;
    border-radius: 6px;
}

.btn-primary:hover {
    background-color: #3a5dc7;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(74, 111, 220, 0.2);
}

.btn-primary:active {
    transform: translateY(0);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .your-form {
        padding: 20px;
    }
    
    .admin-heading {
        font-size: 22px;
    }
}
</style>
@endsection
