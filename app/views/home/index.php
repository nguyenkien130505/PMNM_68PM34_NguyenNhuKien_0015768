<div class="text-center py-4">
    <h1 class="page-title"><i class="fas fa-home me-2" style="color:var(--clr-primary);"></i>Trang chủ</h1>
    <p class="page-subtitle mb-4">Chào mừng bạn đến với hệ thống Quản lý Sinh viên</p>
    
    <div class="d-flex flex-wrap justify-content-center gap-3 mt-4">
        <a href="<?php echo BASE_URL; ?>sinhvien/index" class="btn-add" style="padding:14px 28px; font-size:.95rem;">
            <i class="fas fa-user-graduate"></i> Quản lý Sinh viên
        </a>
        <a href="<?php echo BASE_URL; ?>lophoc/index" class="btn-add" style="background:linear-gradient(135deg,#10b981,#059669); padding:14px 28px; font-size:.95rem;">
            <i class="fas fa-chalkboard-teacher"></i> Quản lý Lớp học
        </a>
        <?php if(isset($_SESSION['user'])): ?>
        <a href="<?php echo BASE_URL; ?>auth/logout" class="btn-add" style="background:linear-gradient(135deg,#ef4444,#dc2626); padding:14px 28px; font-size:.95rem;">
            <i class="fas fa-sign-out-alt"></i> Đăng xuất
        </a>
        <?php endif; ?>
    </div>
    
    <div class="filter-card mt-5 text-start" style="max-width:500px; margin-left:auto; margin-right:auto;">
        <h5 class="fw-bold mb-2" style="color:var(--clr-primary-dark);"><i class="fas fa-info-circle me-2"></i>Thông tin hệ thống</h5>
        <p class="mb-0" style="color:var(--clr-text-secondary); line-height:1.7;">
            <?php if(isset($_SESSION['user'])): ?>
                Người dùng hiện tại: <strong style="color:var(--clr-primary);"><?php echo htmlspecialchars($_SESSION['user']); ?></strong><br>
            <?php endif; ?>
            Chọn "Quản lý Sinh viên" để xem danh sách sinh viên hoặc "Lớp học" để quản lý lớp.
        </p>
    </div>
</div>
