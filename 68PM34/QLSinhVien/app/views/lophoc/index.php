<!-- Page Header -->
<?php if (isset($_GET['error']) && $_GET['error'] == 'has_students'): ?>
    <div class="alert alert-danger shadow-sm border-0 alert-dismissible fade show" role="alert">
        <i class="fas fa-exclamation-triangle me-2"></i><strong>Không thể xóa lớp học:</strong> Vẫn còn sinh viên thuộc lớp học này. Vui lòng chuyển hoặc xóa các sinh viên trước.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
    <div>
        <h1 class="page-title mb-1"><i class="fas fa-chalkboard-teacher me-2" style="color:var(--clr-success);"></i>Danh sách Lớp học</h1>
        <p class="page-subtitle">Quản lý thông tin các lớp học trong hệ thống</p>
    </div>
    <a href="<?php echo BASE_URL; ?>lophoc/create" class="btn-add mt-2 mt-md-0" style="background:linear-gradient(135deg,#10b981,#059669);">
        <i class="fas fa-plus-circle"></i> Thêm lớp học
    </a>
</div>

<!-- Filter Bar -->
<div class="filter-card" style="background:linear-gradient(135deg,#ecfdf5,#d1fae5); border-color:#6ee7b7;">
    <form method="GET" class="row g-3 align-items-end">
        <?php if(isset($limit)): ?>
            <input type="hidden" name="limit" value="<?php echo $limit; ?>">
        <?php endif; ?>
        <input type="hidden" name="offset" value="0">
        
        <?php $searchValue = isset($search) ? htmlspecialchars($search) : ''; ?>
        <div class="col">
            <label for="searchLophoc" style="color:#065f46;"><i class="fas fa-search me-1"></i>Tìm kiếm</label>
            <input type="text" name="search" id="searchLophoc" class="form-control" style="border-color:#6ee7b7;" placeholder="Tìm mã hoặc tên lớp..." value="<?php echo $searchValue; ?>">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn-search" style="background:#10b981;">
                <i class="fas fa-search me-1"></i>Tìm
            </button>
        </div>
    </form>
</div>

<!-- Table -->
<div class="table-premium">
    <table class="table table-hover align-middle mb-0">
        <thead>
            <tr>
                <th class="text-center" style="width:55px;">STT</th>
                <th>Mã Lớp</th>
                <th>Tên Lớp</th>
                <th>Ghi chú</th>
                <th class="text-center" style="width:240px;">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if (!isset($lophocs)) $lophocs = [];
                $currentOffset = isset($offset) ? (int)$offset : 0;
                $stt = $currentOffset;
            ?>
            
            <?php if(empty($lophocs)): ?>
                <tr>
                    <td colspan="5">
                        <div class="empty-state">
                            <i class="fas fa-inbox d-block mb-2"></i>
                            <p class="mb-0">Không tìm thấy lớp học nào.</p>
                        </div>
                    </td>
                </tr>
            <?php endif; ?>

            <?php foreach($lophocs as $lophoc): ?>
            <?php $stt++; ?>
            <tr>
                <td class="text-center fw-medium text-muted"><?php echo $stt; ?></td>
                <td><code class="text-success fw-semibold"><?php echo htmlspecialchars($lophoc['malop']); ?></code></td>
                <td class="fw-medium"><?php echo htmlspecialchars($lophoc['tenlop']); ?></td>
                <td class="text-muted"><?php echo htmlspecialchars($lophoc['ghichu']); ?></td>
                <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>lophoc/danhsach?malop=<?php echo urlencode($lophoc['malop']); ?>" class="btn-action" style="background:linear-gradient(135deg,#3b82f6,#2563eb);">
                        <i class="fas fa-users"></i> Xem SV
                    </a>
                    <a href="<?php echo BASE_URL; ?>lophoc/edit?id=<?php echo $lophoc['id']; ?>" class="btn-action btn-edit ms-1">
                        <i class="fas fa-pen-to-square"></i> Sửa
                    </a>
                    <a href="<?php echo BASE_URL; ?>lophoc/delete?id=<?php echo $lophoc['id']; ?>" class="btn-action btn-delete ms-1"
                       onclick="return confirm('Bạn có chắc chắn muốn xóa lớp học này không?');">
                        <i class="fas fa-trash-can"></i> Xóa
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Pagination -->
<?php 
    $searchParam = '';
    if (isset($search)) $searchParam = '&search=' . urlencode($search);
?>

<?php if(isset($currentpage) && isset($totalpage) && $totalpage > 0): ?>
<div class="d-flex flex-wrap justify-content-between align-items-center mt-4">
    <div class="text-muted small mb-2 mb-md-0">
        Trang <strong><?php echo $currentpage; ?></strong> / <strong><?php echo $totalpage; ?></strong>
    </div>
    <nav aria-label="Pagination">
        <ul class="pagination mb-0">
            <?php if($currentpage > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="?limit=<?php echo $limit; ?>&offset=<?php echo ($currentpage - 2) * $limit; ?><?php echo $searchParam; ?>">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                </li>
            <?php else: ?>
                <li class="page-item disabled"><span class="page-link"><i class="fas fa-chevron-left"></i></span></li>
            <?php endif; ?>

            <?php for($i = 1; $i <= $totalpage; $i++): ?>
                <li class="page-item <?php echo ($i == $currentpage) ? 'active' : ''; ?>">
                    <a class="page-link" href="?limit=<?php echo $limit; ?>&offset=<?php echo ($i - 1) * $limit; ?><?php echo $searchParam; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>

            <?php if($currentpage < $totalpage): ?>
                <li class="page-item">
                    <a class="page-link" href="?limit=<?php echo $limit; ?>&offset=<?php echo $currentpage * $limit; ?><?php echo $searchParam; ?>">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </li>
            <?php else: ?>
                <li class="page-item disabled"><span class="page-link"><i class="fas fa-chevron-right"></i></span></li>
            <?php endif; ?>
        </ul>
    </nav>
</div>
<?php endif; ?>
