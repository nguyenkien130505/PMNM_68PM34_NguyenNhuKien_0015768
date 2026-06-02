<h1>Trang tạo sinh viên</h1>
<form action="/sinhvien/store" method="POST" style="width: 60%; margin: 20px auto;">
    <div style="margin-bottom: 15px;">
        <label for="hoten">Họ tên:</label><br>
        <input type="text" name="hoten" id="hoten" required style="width: 100%; padding: 8px;">
    </div>
    <div style="margin-bottom: 15px;">
        <label for="gioitinh">Giới tính:</label><br>
        <input type="text" name="gioitinh" id="gioitinh" required style="width: 100%; padding: 8px;">
    </div>
    <div style="margin-bottom: 15px;">
        <label for="mssv">MSSV:</label><br>
        <input type="text" name="mssv" id="mssv" required style="width: 100%; padding: 8px;">
    </div>
    <input type="submit" value="Nộp" style="padding: 10px 20px; background-color: #04AA6D; color: white; border: none; cursor: pointer;">
</form>