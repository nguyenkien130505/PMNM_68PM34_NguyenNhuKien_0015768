<div class="mb-4">
    <h1 class="page-title"><i class="fas fa-users me-2" style="color:var(--clr-accent);"></i>Sinh viên lớp: <span style="color:var(--clr-primary);"><?php echo htmlspecialchars($malop); ?></span></h1>
    <p class="page-subtitle">Danh sách sinh viên thuộc lớp đã chọn</p>
</div>

<div class="table-premium">
    <table class="table table-hover align-middle mb-0">
        <thead>
            <tr>
                <th class="text-center" style="width:55px;">STT</th>
                <th>MSSV</th>
                <th>Họ và tên</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($sinhviens)): ?>
            <tr>
                <td colspan="3">
                    <div class="empty-state">
                        <i class="fas fa-inbox d-block mb-2"></i>
                        <p class="mb-0">Không có sinh viên nào trong lớp này.</p>
                    </div>
                </td>
            </tr>
            <?php else: ?>
                <?php $stt = 0; foreach ($sinhviens as $sv): $stt++; ?>
                <tr>
                    <td class="text-center fw-medium text-muted"><?php echo $stt; ?></td>
                    <td><code class="text-primary fw-semibold"><?php echo htmlspecialchars($sv['mssv'] ?? ''); ?></code></td>
                    <td class="fw-medium"><?php echo htmlspecialchars($sv['hoten'] ?? ''); ?></td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<div class="mt-4">
    <a href="<?php echo BASE_URL; ?>lophoc/index" class="btn btn-outline-secondary px-4" style="border-radius:var(--radius-sm);font-weight:600;">
        <i class="fas fa-arrow-left me-1"></i>Quay lại danh sách lớp
    </a>
</div>
