<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="#">
            <span class="align-middle">KTX Admin</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Quản lý hệ thống
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
                    <i class="align-middle" data-feather="sliders"></i> 
                    <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-header">
                Quản lý Ký túc xá
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.rooms.index') }}">
                    <i class="align-middle" data-feather="home"></i> 
                    <span class="align-middle">Phòng</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.beds.index') }}">
                    <i class="align-middle" data-feather="grid"></i>
                    <span class="align-middle">Giường</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="#">
                    <i class="align-middle" data-feather="user-check"></i> 
                    <span class="align-middle">Hồ sơ đăng ký</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="#">
                    <i class="align-middle" data-feather="users"></i> 
                    <span class="align-middle">Sinh viên lưu trú</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="#">
                    <i class="align-middle" data-feather="file-text"></i> 
                    <span class="align-middle">Lịch sử hoạt động</span>
                </a>
            </li>

        </ul>
    </div>
</nav>
