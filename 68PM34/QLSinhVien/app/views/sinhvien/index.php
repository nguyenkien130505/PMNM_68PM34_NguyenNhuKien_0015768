<h1>Sinh viên</h1>
<table border="1" style="border-collapse: collapse; width: 100%;">
    <tr>
        <th style="text-align: left; padding: 8px; background-color: #04AA6D; color: white;">ID</th>
        <th style="text-align: left; padding: 8px; background-color: #04AA6D; color: white;">Name</th>
        <th style="text-align: left; padding: 8px; background-color: #04AA6D; color: white;">Age</th>
    </tr>
    <?php $sinhviens = isset($sinhviens) ? $sinhviens : []; ?>
    <?php foreach($sinhviens as $sinhvien): ?>
    <tr style="background-color: #f2f2f2;">
        <td style="text-align: left; padding: 8px;"><?php echo $sinhvien['id']; ?></td>
        <td style="text-align: left; padding: 8px;"><?php echo $sinhvien['hoten']; ?></td>
        <td style="text-align: left; padding: 8px;"><?php echo $sinhvien['gioitinh']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>