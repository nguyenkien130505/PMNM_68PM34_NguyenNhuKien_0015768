<h1>Sửa thông tin Sinh viên</h1>

<?php if (isset($sinhvien) && !empty($sinhvien)): ?>

    <form action="/sinhvien/update" method="POST" style="width: 300px; margin-top: 20px;">
        
        <input type="hidden" name="id" value="<?php echo $sinhvien['id']; ?>">
        
        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Họ và tên:</label>
            <input type="text" name="hoten" value="<?php echo $sinhvien['hoten']; ?>" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        
        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Giới tính:</label>
            <input type="text" name="gioitinh" value="<?php echo $sinhvien['gioitinh']; ?>" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 5px; font-weight: bold;">Mã số sinh viên (MSSV):</label>
            <input type="text" name="mssv" value="<?php echo isset($sinhvien['mssv']) ? $sinhvien['mssv'] : ''; ?>" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        
        <div>
            <button type="submit" style="padding: 10px 15px; background-color: #ff9800; color: white; border: none; cursor: pointer; border-radius: 4px; font-size: 16px;">
                Lưu thay đổi
            </button>
            <a href="/sinhvien/index" style="padding: 10px 15px; background-color: #ddd; color: black; text-decoration: none; border-radius: 4px; margin-left: 10px; font-size: 16px;">
                Hủy bỏ
            </a>
        </div>
    </form>

<?php else: ?>
    <p style="color: red; margin-top: 20px;">Không tìm thấy thông tin sinh viên để sửa!</p>
    <a href="/sinhvien/index" style="color: #008CBA; text-decoration: underline;">Quay lại danh sách</a>
<?php endif; ?>