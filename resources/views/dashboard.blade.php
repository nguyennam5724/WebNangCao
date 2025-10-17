@extends('layouts.app')
@section('content')
<div id="admin-content" class="dashboard">
    <div class="container-fluid py-4">
        <!-- Header Section -->
        <div class="dashboard-header mb-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="dashboard-title">Dashboard</h1>
                    <p class="dashboard-subtitle">Quản lý thông tin thư viện</p>
                </div>
                <div class="col-md-6 text-end">
                    <div class="date-time">
                        <i class="fas fa-calendar-alt me-2"></i><span id="current-date"></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Cards - Hàng 1 -->
        <div class="dashboard-stats">
            <div class="row g-4 mb-4">
                <!-- Authors Card -->
                <div class="col-md-4">
                    <a href="{{ route('authors') }}" class="text-decoration-none">
                        <div class="stat-card">
                            <div class="stat-card-icon">
                                <i class="fas fa-user-edit"></i>
                            </div>
                            <div class="stat-card-info">
                                <h2 class="stat-card-number">{{ $authors }}</h2>
                                <p class="stat-card-title">Tác Giả</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Publishers Card -->
                <div class="col-md-4">
                    <a href="{{ route('publishers') }}" class="text-decoration-none">
                        <div class="stat-card">
                            <div class="stat-card-icon">
                                <i class="fas fa-building"></i>
                            </div>
                            <div class="stat-card-info">
                                <h2 class="stat-card-number">{{ $publishers }}</h2>
                                <p class="stat-card-title">Nhà Xuất Bản</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Categories Card -->
                <div class="col-md-4">
                    <a href="{{ route('categories') }}" class="text-decoration-none">
                        <div class="stat-card">
                            <div class="stat-card-icon">
                                <i class="fas fa-folder"></i>
                            </div>
                            <div class="stat-card-info">
                                <h2 class="stat-card-number">{{ $categories }}</h2>
                                <p class="stat-card-title">Thể Loại</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            
            <!-- Stats Cards - Hàng 2 -->
            <div class="row g-4">
                <!-- Books Card -->
                <div class="col-md-4">
                    <a href="{{ route('books') }}" class="text-decoration-none">
                        <div class="stat-card">
                            <div class="stat-card-icon">
                                <i class="fas fa-book"></i>
                            </div>
                            <div class="stat-card-info">
                                <h2 class="stat-card-number">{{ $books }}</h2>
                                <p class="stat-card-title">Sách</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Students Card -->
                <div class="col-md-4">
                    <a href="{{ route('students') }}" class="text-decoration-none">
                        <div class="stat-card">
                            <div class="stat-card-icon">
                                <i class="fas fa-user-graduate"></i>
                            </div>
                            <div class="stat-card-info">
                                <h2 class="stat-card-number">{{ $students }}</h2>
                                <p class="stat-card-title">Sinh Viên</p>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Issued Books Card -->
                <div class="col-md-4">
                    <a href="{{ route('book_issued') }}" class="text-decoration-none">
                        <div class="stat-card">
                            <div class="stat-card-icon">
                                <i class="fas fa-book-reader"></i>
                            </div>
                            <div class="stat-card-info">
                                <h2 class="stat-card-number">{{ $issued_books }}</h2>
                                <p class="stat-card-title">Đang Mượn</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Rest of the dashboard content goes here -->
        <div class="dashboard-content mt-4">
            <!-- Placeholder for additional content -->
        </div>
    </div>
</div>

<style>
/* Dashboard Styles */
.dashboard {
    background-color: #f8f9fa;
    min-height: 100vh;
    padding: 20px 0;
}

.dashboard-header {
    padding: 10px 15px;
    background: linear-gradient(120deg, #2c3e50, #3498db);
    border-radius: 10px;
    color: white;
    margin-bottom: 20px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.dashboard-title {
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 0;
    letter-spacing: 0.5px;
}

.dashboard-subtitle {
    font-size: 14px;
    opacity: 0.8;
    margin-bottom: 0;
}

.date-time {
    font-size: 14px;
    opacity: 0.9;
}

/* Card Styles */
.dashboard-stats {
    margin-bottom: 30px;
}

.stat-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    overflow: hidden;
    transition: all 0.3s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
    padding: 25px 20px; /* Tăng padding để thẻ to hơn */
    border-top: 5px solid transparent;
    min-height: 180px; /* Thêm chiều cao tối thiểu */
}

.stat-card:hover {
    transform: translateY(-7px);
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
}

.stat-card-icon {
    width: 70px; /* Tăng kích thước icon */
    height: 70px; /* Tăng kích thước icon */
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
    font-size: 28px; /* Tăng font size icon */
    color: white;
    transition: all 0.3s ease;
    margin: 0 auto 20px; /* Căn giữa icon */
}

.stat-card:hover .stat-card-icon {
    transform: scale(1.1);
}

.stat-card:nth-child(1) .stat-card-icon,
.stat-card:nth-child(1) {
    background: linear-gradient(45deg, #4e54c8, #8f94fb);
    border-top-color: #4e54c8;
}

.stat-card:nth-child(2) .stat-card-icon,
.stat-card:nth-child(2) {
    background: linear-gradient(45deg, #11998e, #38ef7d);
    border-top-color: #11998e;
}

.stat-card:nth-child(3) .stat-card-icon,
.stat-card:nth-child(3) {
    background: linear-gradient(45deg, #ff8008, #ffc837);
    border-top-color: #ff8008;
}

.stat-card:nth-child(4) .stat-card-icon,
.stat-card:nth-child(4) {
    background: linear-gradient(45deg, #f857a6, #ff5858);
    border-top-color: #f857a6;
}

.stat-card:nth-child(5) .stat-card-icon,
.stat-card:nth-child(5) {
    background: linear-gradient(45deg, #36d1dc, #5b86e5);
    border-top-color: #36d1dc;
}

.stat-card:nth-child(6) .stat-card-icon,
.stat-card:nth-child(6) {
    background: linear-gradient(45deg, #cb356b, #bd3f32);
    border-top-color: #cb356b;
}

.stat-card-info {
    text-align: center;
}

.stat-card-number {
    font-size: 36px; /* Tăng kích thước số */
    font-weight: 700;
    margin-bottom: 10px;
    color: white;
}

.stat-card-title {
    font-size: 16px; /* Tăng kích thước tiêu đề */
    color: rgba(255, 255, 255, 0.9);
    margin: 0;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-weight: 600; /* Tăng độ đậm */
}

/* Responsive Adjustments */
@media (max-width: 992px) {
    .stat-card {
        padding: 20px 15px;
        min-height: 160px;
    }
    
    .stat-card-number {
        font-size: 30px;
    }
    
    .stat-card-title {
        font-size: 14px;
    }
    
    .stat-card-icon {
        width: 60px;
        height: 60px;
        font-size: 24px;
    }
}

@media (max-width: 768px) {
    .row.g-4 > div {
        margin-bottom: 15px;
    }
    
    .dashboard-title {
        font-size: 22px;
    }
}
</style>

<!-- Add Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<!-- Script to display current date -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const date = new Date();
    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    document.getElementById('current-date').textContent = date.toLocaleDateString('vi-VN', options);
});
</script>
@endsection
