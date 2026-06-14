<div class="mb-4">
    <h1 class="page-title"><i class="fas fa-pen-to-square me-2" style="color:var(--clr-warning);"></i>Sửa thông tin Lớp học</h1>
    <p class="page-subtitle">Chỉnh sửa thông tin lớp học bên dưới</p>
</div>

<?php if(isset($error)): ?>
    <div class="alert alert-danger shadow-sm border-0" role="alert">
        <i class="fas fa-exclamation-triangle me-2"></i><strong>Lỗi:</strong> <?php echo htmlspecialchars($error); ?>
    </div>
<?php endif; ?>

<?php if (isset($lophoc) && !empty($lophoc)): ?>

<form action="<?php echo BASE_URL; ?>lophoc/update" method="POST" style="max-width:560px;">
    <input type="hidden" name="id" value="<?php echo $lophoc['id']; ?>">
    
    <div class="mb-3">
        <label for="malop" class="form-label fw-semibold"><i class="fas fa-hashtag me-1 text-muted"></i>Mã Lớp</label>
        <input type="text" name="malop" id="malop" class="form-control" value="<?php echo htmlspecialchars($lophoc['malop']); ?>" required>
    </div>
    
    <div class="mb-3">
        <label for="tenlop" class="form-label fw-semibold"><i class="fas fa-chalkboard me-1 text-muted"></i>Tên Lớp</label>
        <input type="text" name="tenlop" id="tenlop" class="form-control" value="<?php echo htmlspecialchars($lophoc['tenlop']); ?>" required>
    </div>

    <div class="mb-4">
        <label for="ghichu" class="form-label fw-semibold"><i class="fas fa-sticky-note me-1 text-muted"></i>Ghi chú</label>
        <textarea name="ghichu" id="ghichu" class="form-control" rows="3"><?php echo isset($lophoc['ghichu']) ? htmlspecialchars($lophoc['ghichu']) : ''; ?></textarea>
    </div>
    
    <div class="d-flex gap-2">
        <button type="submit" class="btn-add" style="background:linear-gradient(135deg,#f59e0b,#d97706);">
            <i class="fas fa-save me-1"></i>Lưu thay đổi
        </button>
        <a href="<?php echo BASE_URL; ?>lophoc/index" class="btn btn-outline-secondary px-4" style="border-radius:var(--radius-sm);font-weight:600;">
            <i class="fas fa-arrow-left me-1"></i>Hủy bỏ
        </a>
    </div>
</form>

<?php else: ?>
    <div class="filter-card text-center py-4" style="background:linear-gradient(135deg,#fef2f2,#fee2e2); border-color:#fca5a5;">
        <i class="fas fa-exclamation-triangle fa-2x mb-2" style="color:#ef4444;"></i>
        <p class="mb-2 fw-semibold" style="color:#991b1b;">Không tìm thấy thông tin lớp học để sửa!</p>
        <a href="<?php echo BASE_URL; ?>lophoc/index" class="btn-add" style="font-size:.85rem; padding:8px 20px; background:linear-gradient(135deg,#10b981,#059669);">
            <i class="fas fa-arrow-left me-1"></i>Quay lại danh sách
        </a>
    </div>
<?php endif; ?>
