@extends('layouts.app')

@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="admin-heading">🔒 Đặt lại mật khẩu</h2>
                    <hr style="border-top: 2px solid #6e6767; width: 50%;">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form class="yourform shadow-lg p-4 bg-white rounded" action="{{ route('change_password') }}" method="post" autocomplete="off">
                        @csrf
                        
                        <div class="form-group mb-3">
                            <label>🔑 Mật khẩu hiện tại</label>
                            <input type="password" class="form-control" name="c_password" required placeholder="Nhập mật khẩu hiện tại">
                            @error('c_password')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>🆕 Mật khẩu mới</label>
                            <input type="password" class="form-control" name="password" required placeholder="Nhập mật khẩu mới">
                            @error('password')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>🔄 Xác nhận mật khẩu mới</label>
                            <input type="password" class="form-control" name="password_confirmation" required placeholder="Nhập lại mật khẩu mới">
                        </div>

                        <button type="submit" class="btn btn-primary w-100">💾 Cập nhật mật khẩu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
