<style>
    .admin-layout {
        display: flex;
        min-height: 100vh;
        width: 100%;
    }

    .admin-content {
        flex-grow: 1;
        padding: 30px;
        background-color: #fff;
        overflow-x: auto;
    }

    .admin-sidebar {
        width: 250px;
        height: 100%;
        padding: 20px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        user-select: none;
        background: #17252a;
        color: white;
    }

    .logo-section {
        margin: 15px;
        text-align: center;
        padding: 20px;
    }

    .logo-section:hover {
        
    }

    .top-icons {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-bottom: 15px;
        padding: 12px;
        background: #17252a;
    }

    .icon-item {
        width: 43px;
        height: 43px;
        border-radius: 50%;
        background: #f0f0f0;
        display: flex;
        align-items: center;
        justify-content: space-around;
        color: #3aafa9;
        font-size: 16px;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
    }

    .icon-item:hover {
        background: #e0e0e0;
        color: #333;
    }

    .notification-badge {
        position: absolute;
        width: 10px;
        height: 10px;
        background: #ef4444;
        border-radius: 50%;
        top: -5px;
        right: -5px;
    }

    .search-section {
        margin-bottom: 15px;
    }

    .search-section input {
        width: 100%;
        padding: 8px 12px;
        border: 1px solid #ddd;
        border-radius: 6px;
        background: #fff;
        color: #333;
        font-size: 13px;
    }

    .search-section input::placeholder {
        color: #999;
    }

    .menu-section {
        padding: 0;
    }

    .menu-section ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .menu-section li {
        margin-bottom: 11px;
    }

    .menu-section a {
        display: flex;
        align-items: center;
        gap: 10px;
        color: #3aafa9;
        text-decoration: none;
        padding: 8px 10px;
        transition: all 0.3s ease;
        font-size: 16px;
        font-weight: 500;
    }

    .menu-section a:hover {
        background: #2F444B;
        color: #3aafa9;
    }

    .menu-section a.active {
        background: #2F444B;
        color: #3aafa9;
    }

    .icon-box {
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        color: #666;
    }
</style>

<div class="admin-sidebar">
    <div class="logo-section">
        <a href="{{ route('home') }}">
            <img src="https://www.ivivu.com/du-lich/content/img/logo-ivivu.svg" alt="" />
        </a>
    </div>

    {{-- <div class="top-icons">
        <div class="icon-item" title="Thông báo">
            <i class="fas fa-bell"></i>
        </div>
        <div class="icon-item" title="Cài đặt">
            <i class="fas fa-cog"></i>
        </div>
        <div class="icon-item" title="Tin nhắn">
            <i class="fas fa-envelope"></i>
        </div>
    </div>

    <div class="search-section">
        <input type="text" placeholder="Search for...">
    </div> --}}

    <div class="menu-section">
        <ul>
            <li>
                <a href="{{ route('admin.tour.index') }}" class="{{ request()->routeIs('admin.tour.index') ? 'active' : '' }}">
                    <span class="icon-box"><i class="fas fa-home"></i></span>
                    <span>Quản lý Tour</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.booking.manage') }}" class="{{ request()->routeIs('admin.booking.manage') ? 'active' : '' }}">
                    <span class="icon-box"><i class="fas fa-shopping-bag"></i></span>
                    <span>Tour được đặt</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.usermanage.user.index') }}" class="{{ request()->routeIs('admin.usermanage.user.index') ? 'active' : '' }}">
                    <span class="icon-box"><i class="fas fa-wallet"></i></span>
                    <span>Quản lý tài khoản</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.admins.index') }}" class="{{ request()->routeIs('admin.admins.index') ? 'active' : '' }}">
                    <span class="icon-box"><i class="fas fa-user-tie"></i></span>
                    <span>Quản lý admin</span>
                </a>
            </li>
            <li>
                <a href="{{ route('list-chat') }}" class="{{ request()->routeIs('list-chat') ? 'active' : '' }}">
                    <span class="icon-box"><i class="fas fa-comments"></i></span>
                    <span>Phản hồi người dùng</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.report') }}" class="{{ request()->routeIs('admin.report') ? 'active' : '' }}">
                    <span class="icon-box"><i class="fas fa-chart-bar"></i></span>
                    <span>Báo cáo & thống kê</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.logout') }}">
                    <span class="icon-box"><i class="fas fa-sign-out-alt"></i></span>
                    <span>Đăng xuất</span>
                </a>
            </li>
        </ul>
    </div>
</div>
