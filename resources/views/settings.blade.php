@extends('layouts.app')

@section('content')
    <div id="admin-content">
        <div class="container">
            <!-- Tiêu đề -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="admin-heading">⚙️ Cài đặt hệ thống</h2>
                    <hr style="border-top: 2px solid #6e6767; width: 50%;">
                </div>
            </div>

            <!-- Form chỉnh sửa cài đặt -->
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form class="yourform shadow-lg p-4 bg-white rounded" action="{{ route('settings') }}" method="post" autocomplete="off">
                        @csrf

                        <div class="form-group mb-3">
                            <label>📅 Số ngày cho phép mượn</label>
                            <input type="number" class="form-control" name="return_days" value="{{ $data->return_days }}" required placeholder="Nhập số ngày...">
                            @error('return_days')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>💰 Phí phạt (VND)</label>
                            <input type="number" class="form-control" name="fine" value="{{ $data->fine }}" required placeholder="Nhập số tiền phạt...">
                            @error('fine')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100">💾 Lưu thay đổi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
