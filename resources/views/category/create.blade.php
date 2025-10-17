@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="admin-heading">➕ Thêm Thể Loại</h2>
                    <hr style="border-top: 2px solid #6e6767; width: 50%;">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow-sm p-4 bg-white rounded">
                        <form class="yourform" action="{{ route('category.store') }}" method="post" autocomplete="off">
                            @csrf
                            <div class="form-group">
                                <label>📂 Tên Thể Loại</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Nhập tên thể loại" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="alert alert-danger mt-2" role="alert">
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
    </div>
@endsection
