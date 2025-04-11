<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="./index.html" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="../../dist/assets/img/AdminLTELogo.png"
              alt="AdminLTE Logo"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">AdminLTE 4</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="menu"
              data-accordion="false"
            >
              <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                    Dashboard
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">

                  <!-- Trang tổng quan -->
                  <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                      <i class="nav-icon bi bi-speedometer2"></i>
                      <p>Dashboard</p>
                    </a>
                  </li>
                
                  <!-- Quản lý sinh viên -->
                  <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                      <i class="nav-icon bi bi-person-lines-fill"></i>
                      <p>Quản lý sinh viên</p>
                    </a>
                  </li>
                
                  <!-- Quản lý lớp học -->
                  <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                      <i class="nav-icon bi bi-easel-fill"></i>
                      <p>Quản lý lớp học</p>
                    </a>
                  </li>
                
                  <!-- Quản lý môn học -->
                  <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                      <i class="nav-icon bi bi-book-half"></i>
                      <p>Quản lý môn học</p>
                    </a>
                  </li>
                
                  <!-- Quản lý điểm -->
                  <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                      <i class="nav-icon bi bi-clipboard-data"></i>
                      <p>Quản lý điểm</p>
                    </a>
                  </li>
                
                  <!-- Quản lý giảng viên -->
                  <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                      <i class="nav-icon bi bi-person-video3"></i>
                      <p>Quản lý giảng viên</p>
                    </a>
                  </li>
                
                  <!-- Tài khoản người dùng -->
                  <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                      <i class="nav-icon bi bi-people-fill"></i>
                      <p>Tài khoản người dùng</p>
                    </a>
                  </li>
                
                  <!-- Thoát -->
                  <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                      <i class="nav-icon bi bi-box-arrow-right"></i>
                      <p>Đăng xuất</p>
                    </a>
                  </li>
                
                </ul>
                
                  
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>