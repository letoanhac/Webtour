<style>
    .admin-sidebar {
        width: 250px;
        min-height: 100vh;
        background: linear-gradient(135deg, #f0f4f8, #d9e2ec);
        box-shadow: 3px 0 10px rgba(0,0,0,0.1);
        border-radius: 0 15px 15px 0;
        padding: 30px 20px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        user-select: none;
    }

    .admin-sidebar h4 {
        color: #1e40af;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        margin-bottom: 40px;
        text-align: center;
        font-size: 18px;
    }

    .admin-sidebar ul {
        list-style: none;
        padding-left: 0;
        margin: 0;
    }

    .admin-sidebar li {
        margin-bottom: 18px;
    }

    .admin-sidebar a {
        display: block;
        text-decoration: none;
        color: #334155;
        font-weight: 600;
        font-size: 16px;
        padding: 12px 20px;
        border-radius: 12px;
        box-shadow: inset 0 0 0 0 transparent;
        transition: 
            background-color 0.3s ease, 
            color 0.3s ease,
            box-shadow 0.4s cubic-bezier(0.4, 0, 0.2, 1),
            transform 0.2s ease;
        cursor: pointer;
    }

    .admin-sidebar a:hover {
        background-color: #cbd5e1;
        color: #1e40af;
        box-shadow: inset 5px 0 0 0 #1e40af;
        transform: translateX(8px);
    }

    .admin-sidebar a.active {
        background-color: #1e40af;
        color: #f8fafc;
        box-shadow: inset 5px 0 0 0 #1e40af;
        transform: translateX(8px);
    }
</style>

<div class="admin-sidebar">
    <h4>Trang quản trị</h4>
    <ul>
        <li>
            <a href="{{ route('admin.tour.index') }}">
                Quản lý tour
            </a>
        </li>
        <li>
            <a href="{{ route('admin.booking.manage') }}">
                Quản lý tour đã đặt
            </a>
        </li>
        <li>
            <a href="{{ route('admin.usermanage.user.index') }}">
                Quản lý người dùng
            </a>
        </li>
        <li>
            <a href="{{ route('admin.report') }}">
                Theo dõi báo cáo và thống kê
            </a>
        </li>
    </ul>
</div>
