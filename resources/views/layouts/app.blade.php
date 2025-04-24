<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Quản lý sinh viên')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .main-container {
            flex: 1;
            display: flex;
        }
        .sidebar {
            width: 220px;
            background: #343a40;
            color: #fff;
            min-height: 100%;
        }
        .sidebar a {
            color: #fff;
            padding: 10px 20px;
            display: block;
            text-decoration: none;
        }
        .sidebar a:hover {
            background: #495057;
        }
        .content {
            flex: 1;
            padding: 20px;
            background-color: #f8f9fa;
        }
        .footer {
            background: #343a40;
            color: #fff;
            padding: 1rem;
            text-align: center;
        }
        .footer img {
            height: 40px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <!-- Top Nav -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
        <a class="navbar-brand" href="#">QLSV</a>
        <div class="ms-auto">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Tài khoản
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Thông tin</a></li>
                        <li><a class="dropdown-item" href="#">Đăng xuất</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Sidebar + Content -->
    <div class="main-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <h5 class="text-center py-3">Menu</h5>
            <!-- Trong layout app.blade.php -->
          @if (auth()->user()->role === 'teacher')
          <a href="{{ route('teacher.dashboard') }}">Trang chính</a>
          <a href="{{ route('teacher.courses') }}">Khóa học của tôi</a>
          <a href="{{ route('teacher.students') }}">Học viên</a>
          <a href="{{ route('teacher.scores') }}">Chấm điểm</a>
          @elseif (auth()->user()->role === 'student')
          <a href="{{ route('student.dashboard') }}">Trang chính</a>
          <a href="{{ route('student.courses') }}">Khóa học đã đăng ký</a>
          <a href="{{ route('student.results') }}">Kết quả học tập</a>
          @endif

        </div>

        <!-- Main Content -->
        <div class="content">
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="d-flex justify-content-center align-items-center">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
            <div>
                <strong>Trường Đại học XYZ</strong><br>
                123 Đường ABC, Quận 1, TP.HCM – Hotline: 0123 456 789
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
