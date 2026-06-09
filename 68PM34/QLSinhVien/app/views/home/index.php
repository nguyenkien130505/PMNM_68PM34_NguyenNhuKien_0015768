<div style="text-align: center;">
    <h1>Trang chủ</h1>
    <p style="font-size: 18px; margin: 20px 0; color: #333;">Chào mừng bạn đến với hệ thống Quản lý sinh viên</p>
    
    <div style="margin-top: 40px;">
        <a href="/sinhvien/index" 
           style="display: inline-block; padding: 15px 30px; background-color: #2196F3; color: white; text-decoration: none; border-radius: 4px; font-weight: bold; font-size: 16px; margin-right: 15px;">
            → Quản lý sinh viên
        </a>
        <a href="/auth/logout" 
           style="display: inline-block; padding: 15px 30px; background-color: #f44336; color: white; text-decoration: none; border-radius: 4px; font-weight: bold; font-size: 16px;">
            Đăng xuất
        </a>
    </div>
    
    <div style="margin-top: 60px; padding: 20px; background-color: #f5f5f5; border-radius: 4px;">
        <h3 style="color: #333; margin-bottom: 10px;">Thông tin hệ thống</h3>
        <p style="color: #666; line-height: 1.6;">
            <?php if(isset($_SESSION['user'])): ?>
                Người dùng hiện tại: <strong><?php echo htmlspecialchars($_SESSION['user']); ?></strong><br>
            <?php endif; ?>
            Chọn "Quản lý sinh viên" để xem danh sách sinh viên hoặc quay lại trang chủ.
        </p>
    </div>
</div>