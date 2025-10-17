@extends("layouts.app")
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <h2 class="admin-heading text-center">📊 Báo Cáo Phát Hành Sách Hàng Tháng</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <form class="yourform mb-5" action="{{ route('reports.month_wise_generate') }}" method="post">
                        @csrf
                        <div class="form-group month-picker-container">
                            <label for="report-month" class="month-label">📅 Chọn Tháng</label>
                            <div class="month-input-wrapper">
                                <input type="month" id="report-month" name="month" class="form-control month-input" value="{{ date('Y-m') }}">
                                <i class="month-icon"></i>
                            </div>
                            @error('month')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <input type="submit" class="btn btn-primary" name="search_month" value="📄 Tạo Báo Cáo Hàng Tháng">
                    </form>
                </div>
            </div>
            @if ($books)
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="content-table">
                                <thead>
                                    <th>#</th>
                                    <th>🎓 Tên Sinh Viên</th>
                                    <th>📖 Tên Sách</th>
                                    <th>📞 Số Điện Thoại</th>
                                    <th>📧 Email</th>
                                    <th>📅 Ngày Mượn</th>
                                </thead>
                                <tbody>
                                @php
    $books = $books->reverse();
@endphp
                                    @forelse ($books as $book)
                                        <tr>
                                            <td>{{ $book->id }}</td>
                                            <td>{{ $book->student->name }}</td>
                                            <td>{{ $book->book->name }}</td>
                                            <td>{{ $book->student->phone }}</td>
                                            <td>{{ $book->student->email }}</td>
                                            <td>{{ $book->issue_date->format('d M, Y') }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">🚫 Không có dữ liệu!</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
