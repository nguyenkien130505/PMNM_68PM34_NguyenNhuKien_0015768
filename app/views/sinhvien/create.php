<div class="mb-4">
    <h1 class="page-title"><i class="fas fa-user-plus me-2" style="color:var(--clr-primary);"></i>Tạo sinh viên mới</h1>
    <p class="page-subtitle">Điền thông tin bên dưới để thêm sinh viên vào hệ thống</p>
</div>

<?php if(isset($error)): ?>
    <div class="alert alert-danger shadow-sm border-0" role="alert">
        <i class="fas fa-exclamation-triangle me-2"></i><strong>Lỗi:</strong> <?php echo htmlspecialchars($error); ?>
    </div>
<?php endif; ?>

<?php $old = isset($old_data) ? $old_data : []; ?>

<form action="<?php echo BASE_URL; ?>sinhvien/store" method="POST" style="max-width:560px;">
    <div class="mb-3">
        <label for="hoten" class="form-label fw-semibold"><i class="fas fa-user me-1 text-muted"></i>Họ tên</label>
        <input type="text" name="hoten" id="hoten" class="form-control" placeholder="Nhập họ và tên..." value="<?php echo htmlspecialchars($old['hoten'] ?? ''); ?>" required>
    </div>
    <div class="mb-3">
        <label for="gioitinh" class="form-label fw-semibold"><i class="fas fa-venus-mars me-1 text-muted"></i>Giới tính</label>
        <select name="gioitinh" id="gioitinh" class="form-select" required>
            <option value="">-- Chọn giới tính --</option>
            <option value="Nam" <?php echo (isset($old['gioitinh']) && $old['gioitinh'] === 'Nam') ? 'selected' : ''; ?>>Nam</option>
            <option value="Nữ" <?php echo (isset($old['gioitinh']) && $old['gioitinh'] === 'Nữ') ? 'selected' : ''; ?>>Nữ</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="mssv" class="form-label fw-semibold"><i class="fas fa-id-card me-1 text-muted"></i>MSSV</label>
        <input type="text" name="mssv" id="mssv" class="form-control" placeholder="Nhập mã số sinh viên..." value="<?php echo htmlspecialchars($old['mssv'] ?? ''); ?>" required>
    </div>
    <div class="mb-4">
        <label for="malop" class="form-label fw-semibold"><i class="fas fa-chalkboard me-1 text-muted"></i>Lớp</label>
        <select name="malop" id="malop" class="form-select" required>
            <option value="">-- Chọn lớp --</option>
            <?php foreach ($lophocs as $lh): ?>
                <option value="<?php echo htmlspecialchars($lh['malop']); ?>" <?php echo (isset($old['malop']) && $old['malop'] === $lh['malop']) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($lh['malop']); ?> — <?php echo htmlspecialchars($lh['tenlop']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="d-flex gap-2">
        <button type="submit" class="btn-add"><i class="fas fa-check-circle me-1"></i>Tạo sinh viên</button>
        <a href="<?php echo BASE_URL; ?>sinhvien/index" class="btn btn-outline-secondary px-4" style="border-radius:var(--radius-sm);font-weight:600;">
            <i class="fas fa-arrow-left me-1"></i>Quay lại
        </a>
    </div>
</form>
