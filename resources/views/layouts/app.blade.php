<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Library Management System') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Bootstrap & Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <!-- Thêm CSS cho ảnh nền và logo -->
    <style>
    /* Thiết lập chung cho toàn bộ menu */
    #menubar {
        background-color: #f8f9fa; /* Màu nền nhẹ */
        border-bottom: 1px solid #dee2e6; /* Đường viền dưới nhẹ */
        padding: 0.5rem 0; /* Khoảng cách đệm trên và dưới */
    }

    /* Căn chỉnh các mục menu */
    #menubar .menu {
        justify-content: flex-start; /* Đẩy các mục menu về bên trái, bạn có thể dùng flex-end để sang phải */
        list-style: none; /* Loại bỏ dấu đầu dòng mặc định của danh sách */
        padding: 0; /* Loại bỏ khoảng đệm mặc định của danh sách */
        margin: 0; /* Loại bỏ lề mặc định của danh sách */
    }

    /* Định dạng cho từng mục menu */
    #menubar .menu li {
        margin-right: 0.5rem; /* Khoảng cách giữa các mục */
    }
     /* bỏ gạch chân liên kết */
        #menubar .menu li a {
            text-decoration: none;
        }
    /* Định dạng cho liên kết trong mục menu */
    #menubar .menu li a {
        display: block; /* Hiển thị dạng khối để dễ tùy chỉnh kích thước */
        padding: 0.5rem 1rem; /* Khoảng cách đệm trong liên kết */
        color: #343a40; /* Màu chữ */
        text-decoration: none; /* Loại bỏ gạch chân mặc định của liên kết */
        border-radius: 0.25rem; /* Bo tròn góc */
        transition: background-color 0.3s ease, color 0.3s ease; /* Hiệu ứng chuyển đổi mượt mà */
    }

    /* Hiệu ứng khi di chuột qua liên kết */
    #menubar .menu li a:hover {
        background-color: #007bff; /* Màu nền khi di chuột */
        color: #fff; /* Màu chữ khi di chuột */
    }
        /* kiểu dáng icon */
        #menubar .menu li a i {
            margin-right: 5px;
        }
        body {
            background-image: url("{{ asset('images/library-background.jpg') }}");
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
        }
        
        /* CSS cho logo - làm nhỏ hơn */
        .logo img {
            max-width: 100px;
            height: auto; /* Giữ tỷ lệ khung hình */
        }
        
        
        /* Điều chỉnh menu sang bên phải */
        /* #menubar .menu {
            justify-content: flex-end !important;
        } */
        
        /* Thêm kiểu dáng cho menu items */
        /* #menubar .menu li a {
            padding: 10px 15px;
            margin-left: 5px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        
        #menubar .menu li a:hover {
            background-color: #007bff;
            color: white;
        } */
</style>
</head>

<body>
    <!-- HEADER -->
    <header id="header">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="logo">
                <a href="#"><img src="{{ asset('images/library.png') }}" alt="Library Logo"></a>
            </div>
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Hi, {{ auth()->user()->name }}
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="{{ route('change_password') }}">🔑 Đổi mật khẩu</a>
                    <a class="dropdown-item text-danger" href="#" onclick="document.getElementById('logoutForm').submit()">🚪 Đăng xuất</a>
                </div>
                <form method="post" id="logoutForm" action="{{ route('logout') }}" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </header>
    <!-- /HEADER -->

    <!-- MENU BAR - Đã chuyển sang phải -->
    <nav id="menubar">
        <div class="container">
            <ul class="menu d-flex">
                <li><a href="{{ route('dashboard') }}">🏠 Trang chủ</a></li>
                <li><a href="{{ route('reports') }}">📊 Báo cáo</a></li>
                <li><a href="{{ route('settings') }}">⚙️ Cài đặt</a></li>
            </ul>
        </div>
    </nav>
    <!-- /MENU BAR -->

    <!-- MAIN CONTENT -->
    <main class="container py-4">
        @yield('content')
    </main>
    <!-- /MAIN CONTENT -->

    <!-- FOOTER -->
    <footer id="footer">
        <div class="container text-center">
            <span>© {{ now()->format("Y") }} Library Management System | Developed by <a href="#">Your Name</a></span>
        </div>
    </footer>
    <!-- /FOOTER -->

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>