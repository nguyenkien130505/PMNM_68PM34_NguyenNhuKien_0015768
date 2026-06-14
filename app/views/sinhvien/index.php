<!-- Page Header -->
<div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
    <div>
        <h1 class="page-title mb-1"><i class="fas fa-user-graduate me-2" style="color:var(--clr-primary);"></i>Danh sách Sinh viên</h1>
        <p class="page-subtitle">Quản lý toàn bộ thông tin sinh viên trong hệ thống</p>
    </div>
    <a href="<?php echo BASE_URL; ?>sinhvien/create" class="btn-add mt-2 mt-md-0">
        <i class="fas fa-plus-circle"></i> Thêm sinh viên
    </a>
</div>

<!-- Filter Bar -->
<div class="filter-card">
    <form method="GET" class="row g-3 align-items-end">
        <input type="hidden" name="offset" value="0">

        <!-- Records per page -->
        <div class="col-6 col-md-auto">
            <label for="limit"><i class="fas fa-list-ol me-1"></i>Hiển thị</label>
            <select name="limit" id="limit" class="form-select">
                <option value="5" <?php echo ($limit == 5) ? 'selected' : ''; ?>>5 bản ghi</option>
                <option value="10" <?php echo ($limit == 10) ? 'selected' : ''; ?>>10 bản ghi</option>
                <option value="20" <?php echo ($limit == 20) ? 'selected' : ''; ?>>20 bản ghi</option>
                <option value="50" <?php echo ($limit == 50) ? 'selected' : ''; ?>>50 bản ghi</option>
            </select>
        </div>

        <!-- Class filter -->
        <div class="col-6 col-md-auto">
            <label for="class_filter"><i class="fas fa-filter me-1"></i>Lớp</label>
            <select name="class_filter" id="class_filter" class="form-select">
                <option value="">Tất cả lớp</option>
                <?php if (isset($lophocs)): ?>
                    <?php foreach($lophocs as $lop): ?>
                        <option value="<?php echo htmlspecialchars($lop['malop']); ?>" <?php echo (isset($class_filter) && $class_filter == $lop['malop']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($lop['tenlop']); ?>
                        </option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>

        <!-- Sort -->
        <div class="col-6 col-md-auto">
            <label for="sort_by"><i class="fas fa-sort me-1"></i>Sắp xếp</label>
            <select name="sort_by" id="sort_by" class="form-select">
                <option value="">Mặc định</option>
                <option value="mssv_asc" <?php echo (isset($sort_by) && $sort_by == 'mssv_asc') ? 'selected' : ''; ?>>Mã SV ↑</option>
                <option value="name_asc" <?php echo (isset($sort_by) && $sort_by == 'name_asc') ? 'selected' : ''; ?>>Tên A → Z</option>
            </select>
        </div>

        <!-- Search -->
        <div class="col-12 col-md">
            <label for="searchInput"><i class="fas fa-search me-1"></i>Tìm kiếm</label>
            <?php $searchValue = isset($search) ? htmlspecialchars($search) : ''; ?>
            <input type="text" name="search" id="searchInput" class="form-control" placeholder="Nhập tên sinh viên..." value="<?php echo $searchValue; ?>">
        </div>

        <!-- Submit -->
        <div class="col-auto">
            <button type="submit" class="btn-search">
                <i class="fas fa-search me-1"></i>Tìm kiếm
            </button>
        </div>
    </form>
</div>

<!-- Stats -->
<?php if(isset($totalrecord)): ?>
<div class="stats-bar mb-3">
    <span>Tổng cộng</span>
    <span class="badge"><?php echo $totalrecord; ?></span>
    <span>sinh viên</span>
    <?php if(!empty($search)): ?>
        <span class="ms-2">• Từ khoá: <strong>"<?php echo htmlspecialchars($search); ?>"</strong></span>
    <?php endif; ?>
    <?php if(!empty($class_filter)): ?>
        <span class="ms-2">• Đang lọc theo lớp</span>
    <?php endif; ?>
</div>
<?php endif; ?>

<!-- Table -->
<div class="table-premium">
    <table class="table table-hover align-middle mb-0">
        <thead>
            <tr>
                <th class="text-center" style="width:55px;">STT</th>
                <th>MSSV</th>
                <th>Họ tên</th>
                <th>Giới tính</th>
                <th>Tên Lớp</th>
                <th class="text-center" style="width:190px;">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if (!isset($sinhviens)) $sinhviens = [];
                $currentOffset = isset($offset) ? (int)$offset : 0;
                $stt = $currentOffset;
            ?>
            
            <?php if(empty($sinhviens)): ?>
                <tr>
                    <td colspan="6">
                        <div class="empty-state">
                            <i class="fas fa-inbox d-block mb-2"></i>
                            <p class="mb-0">Không tìm thấy sinh viên nào.</p>
                        </div>
                    </td>
                </tr>
            <?php endif; ?>

            <?php foreach($sinhviens as $sinhvien): ?>
            <?php $stt++; ?>
            <tr>
                <td class="text-center fw-bold text-muted" style="font-size:0.85rem;"><?php echo $stt; ?></td>
                <td><span class="mssv-code"><?php echo isset($sinhvien['mssv']) ? htmlspecialchars($sinhvien['mssv']) : '—'; ?></span></td>
                <td class="student-name"><?php echo htmlspecialchars($sinhvien['hoten']); ?></td>
                <td>
                    <?php 
                        $gt = htmlspecialchars($sinhvien['gioitinh']);
                        $isMale = mb_stripos($gt, 'Nam') !== false && mb_stripos($gt, 'Nữ') === false;
                    ?>
                    <span class="badge-gender <?php echo $isMale ? 'male' : 'female'; ?>">
                        <i class="fas <?php echo $isMale ? 'fa-mars' : 'fa-venus'; ?>"></i><?php echo $gt; ?>
                    </span>
                </td>
                <td>
                    <?php if(isset($sinhvien['tenlop']) && $sinhvien['tenlop']): ?>
                        <span class="badge-class"><i class="fas fa-chalkboard"></i><?php echo htmlspecialchars($sinhvien['tenlop']); ?></span>
                    <?php else: ?>
                        <span class="text-muted">—</span>
                    <?php endif; ?>
                </td>
                <td class="text-center">
                    <a href="<?php echo BASE_URL; ?>sinhvien/edit?id=<?php echo $sinhvien['id']; ?>" class="btn-action btn-edit">
                        <i class="fas fa-pen-to-square"></i> Sửa
                    </a>
                    <a href="<?php echo BASE_URL; ?>sinhvien/delete?id=<?php echo $sinhvien['id']; ?>" class="btn-action btn-delete ms-1"
                       onclick="return confirm('Bạn có chắc chắn muốn xóa sinh viên này?');">
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
    $queryParams = [];
    if (isset($search) && $search !== '') $queryParams['search'] = $search;
    if (isset($class_filter) && $class_filter !== '') $queryParams['class_filter'] = $class_filter;
    if (isset($sort_by) && $sort_by !== '') $queryParams['sort_by'] = $sort_by;
    $queryString = !empty($queryParams) ? '&' . http_build_query($queryParams) : '';
?>

<?php if(isset($currentpage) && isset($totalpage) && $totalpage > 0): ?>
<div class="d-flex flex-wrap justify-content-between align-items-center mt-4">
    <div class="text-muted small mb-2 mb-md-0">
        Trang <strong><?php echo $currentpage; ?></strong> / <strong><?php echo $totalpage; ?></strong>
    </div>
    <nav aria-label="Pagination">
        <ul class="pagination mb-0">
            <!-- Prev -->
            <?php if($currentpage > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="?limit=<?php echo $limit; ?>&offset=<?php echo ($currentpage - 2) * $limit; ?><?php echo htmlspecialchars($queryString); ?>">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                </li>
            <?php else: ?>
                <li class="page-item disabled"><span class="page-link"><i class="fas fa-chevron-left"></i></span></li>
            <?php endif; ?>

            <!-- Page numbers -->
            <?php for($i = 1; $i <= $totalpage; $i++): ?>
                <li class="page-item <?php echo ($i == $currentpage) ? 'active' : ''; ?>">
                    <a class="page-link" href="?limit=<?php echo $limit; ?>&offset=<?php echo ($i - 1) * $limit; ?><?php echo htmlspecialchars($queryString); ?>">
                        <?php echo $i; ?>
                    </a>
                </li>
            <?php endfor; ?>

            <!-- Next -->
            <?php if($currentpage < $totalpage): ?>
                <li class="page-item">
                    <a class="page-link" href="?limit=<?php echo $limit; ?>&offset=<?php echo $currentpage * $limit; ?><?php echo htmlspecialchars($queryString); ?>">
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
