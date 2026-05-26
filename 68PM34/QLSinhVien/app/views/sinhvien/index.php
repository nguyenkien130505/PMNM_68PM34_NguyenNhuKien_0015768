<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<?php
?>
<body>
    <h1>Sinh viên</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
        </tr>
        <?php $sinhviens = isset($data['sinhviens']) ? $data['sinhviens'] : ($sinhviens ?? []); ?>
        <?php foreach($sinhviens as $sinhvien): ?>
        <tr>
            <td><?php echo $sinhvien['id']; ?></td>
            <td><?php echo $sinhvien['hoten']; ?></td>
            <td><?php echo $sinhvien['gioitinh']; ?></td>
        </tr>
        <?php endforeach; ?>
</body>
</html>