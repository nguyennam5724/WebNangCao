@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="admin-heading">Danh Sách Sinh Viên</h2>
                </div>
                <div class="offset-md-6 col-md-2">
                    <a class="add-new" href="{{ route('student.create') }}">Thêm Sinh Viên</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="message"></div>
                    <table class="content-table">
                        <thead>
                            <th>S.No</th>
                            <th>Tên</th>
                            <th>Giới Tính</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Xem</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </thead>
                        <tbody>
                    
                            @forelse ($students as $student)
                                <tr>
                                    <td class="id">{{ $student->id }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td class="text-capitalize">{{ $student->gender }}</td>
                                    <td>{{ $student->phone }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td class="view">
                                        <button data-sid='{{ $student->id }}>'
                                            class="btn btn-primary view-btn">Xem</button>
                                    </td>
                                    <td class="edit">
                                        <a href="{{ route('student.edit', $student) }}>" class="btn btn-success">Sửa</a>
                                    </td>
                                    <td class="delete">
                                        <form action="{{ route('student.destroy', $student->id) }}" method="post"
                                            class="form-hidden">
                                            <button class="btn btn-danger delete-student">Xóa</button>
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8">No Students Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $students->links('vendor/pagination/bootstrap-4') }}
                    <div id="modal">
                        <div id="modal-form">
                            <table cellpadding="10px" width="100%">

                            </table>
                            <div id="close-btn">X</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script type="text/javascript">
        //Show shudent detail
        $(".view-btn").on("click", function() {
            var student_id = $(this).data("sid");
            $.ajax({
                url: "http://127.0.0.1:8000/student/show/"+student_id,
                type: "get",
                success: function(student) {
                    console.log(student);
                    form ="<tr><td>Họ Tên :</td><td><b>"+student['name']+"</b></td></tr><tr><td>Địa Chỉ :</td><td><b>"+student['address']+"</b></td></tr><tr><td>Giới Tính :</td><td><b>"+ student['gender']+ "</b></td></tr><tr><td>Lớp :</td><td><b>"+ student['class']+ "</b></td></tr><tr><td>Tuổi :</td><td><b>"+ student['age']+ "</b></td></tr><tr><td>SĐT :</td><td><b>"+ student['phone']+ "</b></td></tr><tr><td>Email :</td><td><b>"+ student['email']+ "</b></td></tr>";
          console.log(form);

                    $("#modal-form table").html(form);
                    $("#modal").show();
                }
            });
        });

        //Hide modal box
        $('#close-btn').on("click", function() {
            $("#modal").hide();
        });

        //delete student script
        $(".delete-student").on("click", function() {
            var s_id = $(this).data("sid");
            $.ajax({
                url: "delete-student.php",
                type: "POST",
                data: {
                    sid: s_id
                },
                success: function(data) {
                    $(".message").html(data);
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                }
            });
        });
    </script>
<style>
    /* CSS chung cho trang admin */
#admin-content {
    padding: 40px 0;
    min-height: 100vh;
    background-color: #f8f9fa;
}

/* Tiêu đề trang */
.admin-heading {
    font-weight: 600;
    color: #212529;
    position: relative;
    padding-bottom: 12px;
    margin-bottom: 0;
    font-size: 24px;
}

.admin-heading:after {
    content: '';
    position: absolute;
    width: 50px;
    height: 2px;
    background-color: #dc3545;
    bottom: 0;
    left: 0;
}

/* Nút Thêm mới */
.add-new {
    display: inline-block;
    background-color: #dc3545;
    color: #fff;
    border-radius: 4px;
    padding: 10px 20px;
    text-decoration: none;
    font-weight: 500;
    font-size: 14px;
    transition: all 0.3s ease;
    box-shadow: 0 2px 5px rgba(220, 53, 69, 0.2);
    margin-top: 5px;
}

.add-new:hover {
    background-color: #c82333;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
    color: #fff;
    text-decoration: none;
}

/* Bảng danh sách */
.content-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    margin: 25px 0;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
}

.content-table thead th {
    background-color: #343a40;
    color: #ffffff;
    font-weight: 500;
    padding: 15px;
    text-align: left;
    font-size: 14px;
    letter-spacing: 0.5px;
}

.content-table tbody td {
    padding: 14px 15px;
    border-bottom: 1px solid #f2f2f2;
    font-size: 14px;
    color: #212529;
    vertical-align: middle;
}

.content-table tbody tr:last-child td {
    border-bottom: none;
}

.content-table tbody tr {
    background-color: #ffffff;
    transition: all 0.2s ease;
}

.content-table tbody tr:hover {
    background-color: #f1f1f1;
}

.content-table tbody tr:nth-child(even) {
    background-color: #f8f9fa;
}

.content-table tbody tr:nth-child(even):hover {
    background-color: #f1f1f1;
}

/* Nút trong bảng */
.btn {
    border-radius: 4px;
    font-size: 13px;
    font-weight: 500;
    padding: 6px 12px;
    transition: all 0.2s;
    border: none;
}

.btn-primary {
    background-color: #007bff;
    color: white;
    box-shadow: 0 2px 4px rgba(0, 123, 255, 0.2);
}

.btn-primary:hover {
    background-color: #0069d9;
    transform: translateY(-1px);
    box-shadow: 0 3px 6px rgba(0, 123, 255, 0.3);
}

.btn-success {
    background-color: #28a745;
    color: white;
    box-shadow: 0 2px 4px rgba(40, 167, 69, 0.2);
}

.btn-success:hover {
    background-color: #218838;
    transform: translateY(-1px);
    box-shadow: 0 3px 6px rgba(40, 167, 69, 0.3);
}

.btn-danger {
    background-color: #dc3545;
    color: white;
    box-shadow: 0 2px 4px rgba(220, 53, 69, 0.2);
}

.btn-danger:hover {
    background-color: #c82333;
    transform: translateY(-1px);
    box-shadow: 0 3px 6px rgba(220, 53, 69, 0.3);
}

/* Phân trang */
.pagination {
    margin: 20px 0;
    justify-content: center;
}

.page-item:first-child .page-link {
    border-top-left-radius: 4px;
    border-bottom-left-radius: 4px;
}

.page-item:last-child .page-link {
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;
}

.page-link {
    color: #dc3545;
    border: 1px solid #dee2e6;
    padding: 8px 16px;
    font-size: 14px;
    transition: all 0.2s ease;
}

.page-item.active .page-link {
    background-color: #dc3545;
    border-color: #dc3545;
    color: white;
}

.page-link:hover {
    background-color: #f8f9fa;
    border-color: #dee2e6;
    color: #c82333;
}

/* Modal */
#modal {
    display: none;
    position: fixed;
    z-index: 999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
}

#modal-form {
    background-color: white;
    padding: 30px;
    width: 50%;
    max-width: 500px;
    border-radius: 8px;
    position: relative;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    margin: 10% auto;
}

#modal-form table {
    width: 100%;
    border-collapse: collapse;
}

#modal-form table tr {
    border-bottom: 1px solid #f2f2f2;
}

#modal-form table tr:last-child {
    border-bottom: none;
}

#modal-form table td {
    padding: 12px 0;
    color: #212529;
}

#modal-form table td:first-child {
    font-weight: 500;
    width: 35%;
    color: #495057;
}

#close-btn {
    position: absolute;
    top: 10px;
    right: 15px;
    background: #dc3545;
    color: white;
    border-radius: 50%;
    width: 28px;
    height: 28px;
    line-height: 28px;
    text-align: center;
    cursor: pointer;
    font-weight: bold;
    font-size: 16px;
    transition: all 0.2s ease;
}

#close-btn:hover {
    background: #c82333;
    transform: rotate(90deg);
}

/* Responsive */
@media (max-width: 768px) {
    .admin-heading {
        font-size: 20px;
    }
    
    .add-new {
        padding: 8px 16px;
        font-size: 13px;
    }
    
    .content-table thead th {
        padding: 12px 10px;
        font-size: 13px;
    }
    
    .content-table tbody td {
        padding: 12px 10px;
        font-size: 13px;
    }
    
    .btn {
        padding: 4px 8px;
        font-size: 12px;
    }
    
    #modal-form {
        width: 90%;
        padding: 20px;
    }
}
</style>
@endsection
