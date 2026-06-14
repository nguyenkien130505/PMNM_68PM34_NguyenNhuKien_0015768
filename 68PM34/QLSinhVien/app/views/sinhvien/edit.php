<div class="mb-4">
    <h1 class="page-title"><i class="fas fa-pen-to-square me-2" style="color:var(--clr-warning);"></i>Sửa thông tin Sinh viên</h1>
    <p class="page-subtitle">Chỉnh sửa thông tin sinh viên bên dưới</p>
</div>

<?php if(isset($error)): ?>
    <div class="alert alert-danger shadow-sm border-0" role="alert">
        <i class="fas fa-exclamation-triangle me-2"></i><strong>Lỗi:</strong> <?php echo htmlspecialchars($error); ?>
    </div>
<?php endif; ?>

<?php if (isset($sinhvien) && !empty($sinhvien)): ?>

<form action="<?php echo BASE_URL; ?>sinhvien/update" method="POST" style="max-width:560px;">
    <input type="hidden" name="id" value="<?php echo $sinhvien['id']; ?>">
    
    <div class="mb-3">
        <label for="hoten" class="form-label fw-semibold"><i class="fas fa-user me-1 text-muted"></i>Họ và tên</label>
        <input type="text" name="hoten" id="hoten" class="form-control" value="<?php echo htmlspecialchars($sinhvien['hoten']); ?>" required>
    </div>
    
    <div class="mb-3">
        <label for="gioitinh" class="form-label fw-semibold"><i class="fas fa-venus-mars me-1 text-muted"></i>Giới tính</label>
        <select name="gioitinh" id="gioitinh" class="form-select" required>
            <option value="Nam" <?php echo ($sinhvien['gioitinh'] == 'Nam') ? 'selected' : ''; ?>>Nam</option>
            <option value="Nữ" <?php echo ($sinhvien['gioitinh'] == 'Nữ') ? 'selected' : ''; ?>>Nữ</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="mssv" class="form-label fw-semibold"><i class="fas fa-id-card me-1 text-muted"></i>Mã số sinh viên (MSSV)</label>
        <input type="text" name="mssv" id="mssv" class="form-control" value="<?php echo isset($sinhvien['mssv']) ? htmlspecialchars($sinhvien['mssv']) : ''; ?>" required>
    </div>

    <div class="mb-4">
        <label for="malop" class="form-label fw-semibold"><i class="fas fa-chalkboard me-1 text-muted"></i>Lớp</label>
        <select name="malop" id="malop" class="form-select" required>
            <option value="">-- Chọn lớp --</option>
            <?php foreach ($lophocs as $lh): ?>
                <option value="<?php echo htmlspecialchars($lh['malop']); ?>" <?php echo (isset($sinhvien['malop']) && $sinhvien['malop'] === $lh['malop']) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($lh['malop']); ?> — <?php echo htmlspecialchars($lh['tenlop']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <div class="d-flex gap-2">
        <button type="submit" class="btn-add" style="background:linear-gradient(135deg,#f59e0b,#d97706);">
            <i class="fas fa-save me-1"></i>Lưu thay đổi
        </button>
        <a href="<?php echo BASE_URL; ?>sinhvien/index" class="btn btn-outline-secondary px-4" style="border-radius:var(--radius-sm);font-weight:600;">
            <i class="fas fa-arrow-left me-1"></i>Hủy bỏ
        </a>
    </div>
</form>

<?php else: ?>
    <div class="filter-card text-center py-4" style="background:linear-gradient(135deg,#fef2f2,#fee2e2); border-color:#fca5a5;">
        <i class="fas fa-exclamation-triangle fa-2x mb-2" style="color:#ef4444;"></i>
        <p class="mb-2 fw-semibold" style="color:#991b1b;">Không tìm thấy thông tin sinh viên để sửa!</p>
        <a href="<?php echo BASE_URL; ?>sinhvien/index" class="btn-add" style="font-size:.85rem; padding:8px 20px;">
            <i class="fas fa-arrow-left me-1"></i>Quay lại danh sách
        </a>
    </div>
<?php endif; ?>
