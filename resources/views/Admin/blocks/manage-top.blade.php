<div class="admin-user-menu">
    <div class="user-icon">
        <i class="fas fa-user-circle"></i>
    </div>
    <ul class="user-dropdown">
        <li><a href="">Thêm quản trị viên</a></li>
        <li><a href="">Quản lý tài khoản</a></li>
        <li><a href="">Đăng xuất</a></li>
    </ul>
</div>

<style>
.admin-user-menu {
    position: relative;
    display: inline-block;
    float: right;
    margin-bottom: 20px;
    cursor: pointer;
}

.admin-user-menu .user-icon {
    font-size: 28px;
    color: #1e40af;
    padding: 6px 10px;
    border-radius: 50%;
    transition: background-color 0.3s ease;
}

.admin-user-menu:hover .user-icon {
    background-color: #cbd5e1;
}

.admin-user-menu .user-dropdown {
    display: none;
    position: absolute;
    right: 0;
    background: white;
    box-shadow: 0 5px 15px rgba(0,0,0,0.15);
    border-radius: 10px;
    padding: 10px 0;
    list-style: none;
    min-width: 180px;
    z-index: 1000;
}

.admin-user-menu:hover .user-dropdown {
    display: block;
}

.admin-user-menu .user-dropdown li {
    padding: 8px 20px;
    white-space: nowrap;
}

.admin-user-menu .user-dropdown li a {
    color: #334155;
    text-decoration: none;
    font-weight: 600;
    display: block;
    transition: background-color 0.2s ease;
}

.admin-user-menu .user-dropdown li:hover {
    background-color: #e2e8f0;
}

.admin-user-menu .user-dropdown li a:hover {
    color: #1e40af;
}
</style>