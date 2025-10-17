@extends('layouts.app')

@section('content')
    <div id="admin-content">
        <div class="container">
            <!-- Tiêu đề trang -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="admin-heading">📖 Trả Sách</h2>
                    <hr style="border-top: 2px solid #6e6767; width: 50%;">
                </div>
            </div>

            <!-- Bảng thông tin trả sách -->
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="yourform shadow-lg p-4 bg-white rounded">
                        <table class="table table-bordered">
                            <tr>
                                <td><strong>👨‍🎓 Sinh viên:</strong></td>
                                <td>{{ $book->student->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>📖 Sách:</strong></td>
                                <td>{{ $book->book->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>📞 Số điện thoại:</strong></td>
                                <td>{{ $book->student->phone }}</td>
                            </tr>
                            <tr>
                                <td><strong>📧 Email:</strong></td>
                                <td>{{ $book->student->email }}</td>
                            </tr>
                            <tr>
                                <td><strong>📅 Ngày mượn:</strong></td>
                                <td>{{ $book->issue_date->format('d M, Y') }}</td>
                            </tr>
                            <tr>
                                <td><strong>📆 Hạn trả:</strong></td>
                                <td>{{ $book->return_date->format('d M, Y') }}</td>
                            </tr>

                            @if ($book->issue_status == 'Y')
                                <tr>
                                    <td><strong>✅ Trạng thái:</strong></td>
                                    <td><span class="badge bg-success">Đã trả</span></td>
                                </tr>
                                <tr>
                                    <td><strong>📆 Ngày trả:</strong></td>
                                    <td>{{ $book->return_day->format('d M, Y') }}</td>
                                </tr>
                            @else
                                @if (date('Y-m-d') > $book->return_date->format('d-m-Y'))
                                    <tr>
                                        <td><strong>⚠️ Tiền phạt:</strong></td>
                                        <td><span class="text-danger"><b>{{ number_format($fine) }} VNĐ</b></span></td>
                                    </tr>
                                @endif
                            @endif
                        </table>

                        <!-- Nếu sách chưa trả, hiển thị nút trả sách -->
                        @if ($book->issue_status == 'N')
                            <form action="{{ route('book_issue.update', $book->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-success w-100">📌 Trả Sách Ngay</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
