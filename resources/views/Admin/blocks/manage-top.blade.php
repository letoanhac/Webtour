<div class="admin-header">
    <div class="admin-user-menu">
        <div class="user-icon">
            <i class="fas fa-user-circle"></i>
        </div>
        <ul class="user-dropdown">
            <li><a href="{{ route('admin.admins.index') }}">Quản lý tài khoản quản trị viên</a></li>  
            <li><a href="{{ route('admin.logout') }}">Đăng xuất</a></li>
        </ul>
    </div>
</div>
<style>
.admin-header {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    padding: 10px 20px;
    background-color: #f1f5f9;
    position: relative;
    z-index: 10;
}

.admin-user-menu {
    position: relative;
    display: inline-block;
    cursor: pointer;
}

.admin-user-menu .user-icon {
    font-size: 30px;
    color: #1e40af;
    padding: 6px;
    border-radius: 50%;
    transition: background-color 0.3s ease;
}

.admin-user-menu:hover .user-icon {
    background-color: #e2e8f0;
}

.admin-user-menu .user-dropdown {
    display: none;
    position: absolute;
    right: 0;
    top: 40px;
    background-color: #ffffff;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    border-radius: 10px;
    padding: 8px 0;
    list-style: none;
    min-width: 200px;
    transition: all 0.2s ease;
}

.admin-user-menu:hover .user-dropdown {
    display: block;
}

.admin-user-menu .user-dropdown li {
    padding: 10px 20px;
    transition: background-color 0.2s ease;
}

.admin-user-menu .user-dropdown li:hover {
    background-color: #f1f5f9;
}

.admin-user-menu .user-dropdown li a {
    color: #1e293b;
    text-decoration: none;
    font-weight: 500;
    display: block;
}

.admin-user-menu .user-dropdown li a:hover {
    color: #1d4ed8;
}
</style>
