<nav class="navbar navbar-expand-lg navbar-premium py-2">
    <div class="container">
        <a class="navbar-brand" href="<?php echo BASE_URL; ?>home/index">
            <span class="brand-icon"><i class="fas fa-graduation-cap"></i></span>
            QL Sinh Viên
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav me-auto ms-lg-4 gap-1">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL; ?>home/index"><i class="fas fa-home me-1"></i>Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL; ?>sinhvien/index"><i class="fas fa-user-graduate me-1"></i>Sinh viên</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL; ?>lophoc/index"><i class="fas fa-chalkboard-teacher me-1"></i>Lớp học</a>
                </li>
            </ul>
            <div class="d-flex align-items-center gap-3 mt-3 mt-lg-0">
                <?php if(isset($_SESSION['user'])): ?>
                    <span class="user-badge">
                        <i class="fas fa-user-circle"></i>
                        <?php echo htmlspecialchars($_SESSION['user']); ?>
                    </span>
                    <a class="btn-logout text-decoration-none" href="<?php echo BASE_URL; ?>auth/logout">
                        <i class="fas fa-sign-out-alt me-1"></i>Đăng xuất
                    </a>
                <?php else: ?>
                    <a class="btn-login text-decoration-none" href="<?php echo BASE_URL; ?>auth/login">
                        <i class="fas fa-sign-in-alt me-1"></i>Đăng nhập
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>
