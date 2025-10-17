@extends("layouts.app")
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="offset-md-4 col-md-4">
                    <h2 class="admin-heading text-center">📊 Báo Cáo</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <a href="{{ route('reports.date_wise') }}" class="card-link date-wise">
                                <h5 class="card-title mb-0">📅 Báo Cáo Theo Ngày</h5>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <a href="{{ route('reports.month_wise') }}" class="card-link month-wise">
                                <h5 class="card-title mb-0">📆 Báo Cáo Theo Tháng</h5>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <a href="{{ route('reports.not_returned') }}" class="card-link not-returned">
                                <h5 class="card-title mb-0">🚨 Báo Cáo Sách Chưa Trả</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<style>
/* Thiết lập chung */
#admin-content {
    padding: 60px 0;
    background-color: #f8f9fa;
    min-height: 100vh;
}

.container {
    max-width: 1140px;
}

/* Tiêu đề trang */
.admin-heading {
    color: #2c3e50;
    font-weight: 600;
    font-size: 32px;
    margin-bottom: 40px;
    position: relative;
    padding-bottom: 15px;
    letter-spacing: 0.5px;
    text-align: center;
}

.admin-heading:after {
    content: "";
    position: absolute;
    width: 60px;
    height: 3px;
    background-color: #3498db;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
}

/* Card thiết kế */
.card {
    border: none !important;
    border-radius: 12px !important;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
    margin-bottom: 30px;
    overflow: hidden;
    width: 100% !important;
    height: 150px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #808080 !important; /* Màu xám đồng nhất cho tất cả card */
}

.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
}

/* Viền màu xanh ở hai bên card */
.card {
    position: relative;
}

.card:before, .card:after {
    content: "";
    position: absolute;
    top: 0;
    bottom: 0;
    width: 12px;
}

.card:before {
    left: 0;
}

.card:after {
    right: 0;
}

.card-body {
    padding: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.card-link {
    text-decoration: none;
    color: #fff;
    display: block;
    width: 100%;
    text-align: center;
    font-weight: 500;
    transition: all 0.3s ease;
}

.card-title {
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 0;
    position: relative;
    z-index: 1;
}

/* Icon cho từng loại báo cáo */
.card-link::before {
    font-family: "Font Awesome 5 Free";
    display: block;
    font-size: 48px;
    margin-bottom: 15px;
    font-weight: 900;
    color: #fff;
}

.date-wise::before {
    content: "\f073"; /* Calendar icon */
}

.month-wise::before {
    content: "\f133"; /* Calendar alt icon */
}

.not-returned::before {
    content: "\f0e7"; /* Exclamation icon */
}

/* Hiệu ứng hover */
.card-link:hover {
    color: #fff;
    transform: scale(1.05);
}

/* Responsive */
@media (max-width: 992px) {
    .card {
        height: 130px;
    }
    
    .card-title {
        font-size: 18px;
    }
    
    .card-link::before {
        font-size: 36px;
        margin-bottom: 10px;
    }
}

@media (max-width: 768px) {
    .admin-heading {
        font-size: 28px;
        margin-bottom: 30px;
    }
    
    .col-md-4 {
        display: flex;
        justify-content: center;
    }
    
    .card {
        width: 80% !important;
    }
}
</style>
@endsection
