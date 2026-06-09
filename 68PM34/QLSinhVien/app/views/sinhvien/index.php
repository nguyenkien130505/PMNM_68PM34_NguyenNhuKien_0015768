<h1>Sinh viên</h1>

<form method="GET" style="margin-bottom: 15px;">
    <?php if(isset($limit)): ?>
        <input type="hidden" name="limit" value="<?php echo $limit; ?>">
    <?php endif; ?>
    <input type="hidden" name="offset" value="0">
    
    <?php 
        $searchValue = '';
        if (isset($search)) {
            $searchValue = htmlspecialchars($search);
        }
    ?>
    <input type="text" name="search" placeholder="Tìm kiếm theo tên..." value="<?php echo $searchValue; ?>" style="padding: 8px; width: 200px;">
    <button type="submit" style="padding: 8px 15px; background-color: #04AA6D; color: white; border: none; cursor: pointer;">Tìm</button>
</form>

<table border="1" style="border-collapse: collapse; width: 100%;">
    <tr>
        <th style="text-align: left; padding: 8px; background-color: #04AA6D; color: white;">ID</th>
        <th style="text-align: left; padding: 8px; background-color: #04AA6D; color: white;">MSSV</th>
        <th style="text-align: left; padding: 8px; background-color: #04AA6D; color: white;">Name</th>
        <th style="text-align: left; padding: 8px; background-color: #04AA6D; color: white;">Gender</th> 
        <th style="text-align: center; padding: 8px; background-color: #04AA6D; color: white; width: 150px;">Thao tác</th>
    </tr>
    
    <?php 
        if (!isset($sinhviens)) {
            $sinhviens = [];
        }
    ?>
    
    <?php foreach($sinhviens as $sinhvien): ?>
    <tr style="background-color: #f2f2f2;">
        <td style="text-align: left; padding: 8px;"><?php echo $sinhvien['id']; ?></td>
        <td style="text-align: left; padding: 8px;">
            <?php 
                if (isset($sinhvien['mssv'])) {
                    echo $sinhvien['mssv'];
                } else {
                    echo '';
                }
            ?>
        </td>
        <td style="text-align: left; padding: 8px;"><?php echo $sinhvien['hoten']; ?></td>
        <td style="text-align: left; padding: 8px;"><?php echo $sinhvien['gioitinh']; ?></td>
        
        <td style="text-align: center; padding: 8px;">
            <a href="/sinhvien/edit?id=<?php echo $sinhvien['id']; ?>" 
               style="padding: 5px 10px; background-color: #ff9800; color: white; text-decoration: none; border-radius: 4px; margin-right: 5px; font-size: 14px;">Sửa</a>
            
            <a href="/sinhvien/delete?id=<?php echo $sinhvien['id']; ?>" 
               onclick="return confirm('Bạn có chắc chắn muốn xóa sinh viên này không?');"
               style="padding: 5px 10px; background-color: #f44336; color: white; text-decoration: none; border-radius: 4px; font-size: 14px;">Xóa</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<div style="margin-top: 15px; margin-bottom: 5px; text-align: left;">
    <a href="/sinhvien/create" style="padding: 10px 15px; background-color: #2196F3; color: white; text-decoration: none; border-radius: 4px; font-weight: bold; font-size: 15px;">
        + Thêm mới sinh viên
    </a>
</div>

<div style="margin-top: 20px; text-align: center;">
    <?php 
        // Xử lý chuỗi search an toàn cho URL
        $searchParam = '';
        if (isset($search)) {
            $searchParam = '&search=' . urlencode($search);
        }
    ?>
    
    <?php if(isset($currentpage) && isset($totalpage) && $totalpage > 0): ?>
        <?php if($currentpage > 1): ?>
            <a href="?limit=<?php echo $limit; ?>&offset=<?php echo ($currentpage - 2) * $limit; ?><?php echo $searchParam; ?>" 
               style="padding: 8px 12px; background-color: #008CBA; color: white; text-decoration: none; margin-right: 5px;">← Previous</a>
        <?php endif; ?>
        
        <?php for($i = 1; $i <= $totalpage; $i++): ?>
            <?php if($i == $currentpage): ?>
                <strong style="padding: 8px 12px; background-color: #04AA6D; color: white; margin: 0 3px;"><?php echo $i; ?></strong>
            <?php else: ?>
                <a href="?limit=<?php echo $limit; ?>&offset=<?php echo ($i - 1) * $limit; ?><?php echo $searchParam; ?>" 
                   style="padding: 8px 12px; background-color: #ddd; color: black; text-decoration: none; margin: 0 3px;"><?php echo $i; ?></a>
            <?php endif; ?>
        <?php endfor; ?>
        
        <?php if($currentpage < $totalpage): ?>
            <a href="?limit=<?php echo $limit; ?>&offset=<?php echo $currentpage * $limit; ?><?php echo $searchParam; ?>" 
               style="padding: 8px 12px; background-color: #008CBA; color: white; text-decoration: none; margin-left: 5px;">Next →</a>
        <?php endif; ?>
        
        <p style="margin-top: 10px; color: #666;">Trang <?php echo $currentpage; ?> / <?php echo $totalpage; ?></p>
    <?php endif; ?>
</div>