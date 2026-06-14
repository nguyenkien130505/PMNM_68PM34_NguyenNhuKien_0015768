<div class="mb-4">
    <h1 class="page-title"><i class="fas fa-plus-circle me-2" style="color:var(--clr-success);"></i>Tạo lớp học mới</h1>
    <p class="page-subtitle">Điền thông tin bên dưới để thêm lớp học vào hệ thống</p>
</div>

<?php if(isset($error)): ?>
    <div class="alert alert-danger shadow-sm border-0" role="alert">
        <i class="fas fa-exclamation-triangle me-2"></i><strong>Lỗi:</strong> <?php echo htmlspecialchars($error); ?>
    </div>
<?php endif; ?>

<?php $old = isset($old_data) ? $old_data : []; ?>

<form action="<?php echo BASE_URL; ?>lophoc/store" method="POST" style="max-width:560px;">
    <div class="mb-3">
        <label for="malop" class="form-label fw-semibold"><i class="fas fa-hashtag me-1 text-muted"></i>Mã Lớp</label>
        <input type="text" name="malop" id="malop" class="form-control" placeholder="Nhập mã lớp..." value="<?php echo htmlspecialchars($old['malop'] ?? ''); ?>" required>
    </div>
    <div class="mb-3">
        <label for="tenlop" class="form-label fw-semibold"><i class="fas fa-chalkboard me-1 text-muted"></i>Tên Lớp</label>
        <input type="text" name="tenlop" id="tenlop" class="form-control" placeholder="Nhập tên lớp..." value="<?php echo htmlspecialchars($old['tenlop'] ?? ''); ?>" required>
    </div>
    <div class="mb-4">
        <label for="ghichu" class="form-label fw-semibold"><i class="fas fa-sticky-note me-1 text-muted"></i>Ghi chú</label>
        <textarea name="ghichu" id="ghichu" class="form-control" rows="3" placeholder="Nhập ghi chú (tuỳ chọn)..."><?php echo htmlspecialchars($old['ghichu'] ?? ''); ?></textarea>
    </div>
    <div class="d-flex gap-2">
        <button type="submit" class="btn-add" style="background:linear-gradient(135deg,#10b981,#059669);">
            <i class="fas fa-check-circle me-1"></i>Tạo lớp học
        </button>
        <a href="<?php echo BASE_URL; ?>lophoc/index" class="btn btn-outline-secondary px-4" style="border-radius:var(--radius-sm);font-weight:600;">
            <i class="fas fa-arrow-left me-1"></i>Hủy bỏ
        </a>
    </div>
</form>
