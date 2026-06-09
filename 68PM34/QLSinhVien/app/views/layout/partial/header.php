<div class="header" style="display: flex; justify-content: space-between; align-items: center; padding: 0 20px;">
    <h1 style="color: white; line-height: 80px; margin: 0; flex: 1;">Quản lý sinh viên</h1>
    <div style="display: flex; gap: 15px; align-items: center;">
        <a href="/home/index" style="color: white; text-decoration: none; padding: 8px 15px; background-color: rgba(255,255,255,0.2); border-radius: 4px; font-weight: bold;">Trang chủ</a>
        <a href="/sinhvien/index" style="color: white; text-decoration: none; padding: 8px 15px; background-color: rgba(255,255,255,0.2); border-radius: 4px; font-weight: bold;">Sinh viên</a>
        <?php if(isset($_SESSION['user'])): ?>
            <span style="color: white; margin: 0 10px; font-weight: bold;">User: <?php echo htmlspecialchars($_SESSION['user']); ?></span>
            <a href="/auth/logout" style="color: white; text-decoration: none; padding: 8px 15px; background-color: #f44336; border-radius: 4px; font-weight: bold;">Đăng xuất</a>
        <?php endif; ?>
    </div>
</div>
