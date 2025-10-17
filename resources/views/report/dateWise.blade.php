@extends('layouts.app')

@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <h2 class="admin-heading text-center">📚 Báo cáo phát hành sách theo ngày</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <form class="yourform mb-5" action="{{ route('reports.date_wise_generate') }}" method="post">
                        @csrf
                        <div class="form-group date-picker-container">
                            <label for="report-date" class="date-label">📅 Chọn Ngày</label>
                            <div class="date-input-wrapper">
                                <input type="date" id="report-date" name="date" class="form-control date-input"
                                       value="{{ old('date', date('Y-m-d')) }}">
                                <i class="date-icon"></i>
                            </div>
                            @error('date')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <input type="submit" class="btn btn-primary" name="search_date" value="📄 Tạo báo cáo">
                    </form>
                </div>
            </div>

            @if (!empty($books) && $books->count() > 0)
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="content-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>📖 Tên Học Sinh</th>
                                        <th>📚 Tên Sách</th>
                                        <th>📞 Số Điện Thoại</th>
                                        <th>✉️ Email</th>
                                        <th>📅 Ngày Mượn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($books as $index => $book)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $book->student->name }}</td>
                                            <td>{{ $book->book->name }}</td>
                                            <td>{{ $book->student->phone }}</td>
                                            <td>{{ $book->student->email }}</td>
                                            <td>{{ $book->issue_date->format('d M, Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p class="alert alert-info">📌 Không có bản ghi nào trong ngày này!</p>
                    </div>
                </div>
            @endif
        </div>
    </div>

<style>
/* General Settings */
#admin-content {
    padding: 60px 0;
    background-color: #f8f9fa;
    min-height: 100vh;
}

.container {
    max-width: 1240px;
}

/* Page Title */
.admin-heading {
    color: #2c3e50;
    font-weight: 600;
    font-size: 32px;
    margin-bottom: 40px;
    position: relative;
    padding-bottom: 15px;
}

.admin-heading:after {
    content: "";
    position: absolute;
    width: 100px;
    height: 4px;
    background: linear-gradient(to right, #3498db, #2980b9);
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    border-radius: 2px;
}

/* Form Styling */
.yourform {
    background-color: #fff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
}

.date-label {
    font-weight: 500;
    color: #34495e;
    font-size: 16px;
}

.date-input {
    height: 50px;
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    padding: 12px 15px;
    font-size: 16px;
    width: 100%;
    background-color: #f9f9f9;
    cursor: pointer;
}

.date-input:focus {
    border-color: #3498db;
    box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
    background-color: #fff;
}

/* Table Styling */
.content-table {
    width: 100%;
    border-collapse: separate;
    background-color: #fff;
}

.content-table th {
    padding: 18px 20px;
    text-align: left;
    font-weight: 600;
    color: #2c3e50;
}

.content-table td {
    padding: 16px 20px;
    font-size: 15px;
    color: #555;
}

.content-table tbody tr:hover {
    background-color: #f8f9fa;
}
</style>

@endsection
