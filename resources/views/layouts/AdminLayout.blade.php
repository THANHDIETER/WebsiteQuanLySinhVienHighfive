<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Trang quản trị')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 60px;
        }
        .sidebar {
            min-height: 100vh;
            background-color: #f8f9fa;
            padding: 20px;
        }
        .sidebar a {
            display: block;
            padding: 8px 0;
            color: #333;
            text-decoration: none;
        }
        .sidebar a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Panel</a>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <aside class="col-md-2 sidebar">
                <h5>Menu</h5>
                <a href="{{ route('admin.courses.index') }}">Quản lý môn học</a>
                {{-- Thêm các menu khác tại đây --}}
            </aside>

            <!-- Main content -->
            <main class="col-md-10">
                @yield('main')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
