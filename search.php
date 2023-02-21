<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
</head>
<style>
    .form{
        text-align:center;
        margin:40px;
        color:blue;
        
    }
    td {
            border: 1px solid black;
            border-collapse: collapse;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-left: 30px;
            padding-right: 30px;
        }
</style>
<body>
<form class="form" method="post" action="search.php">
  <label for="name">Mã sinh viên:</label>
  <input type="text" name="Ma_sinh_vien" id="Ma_sinh_vien">
  <input type="submit" value="Tìm kiếm">
</form>
<?php
    // Lấy tên sinh viên được nhập từ form
    include("data.php");
    $Ma_sinh_vien = $_POST['Ma_sinh_vien'];
    
    // Tìm kiếm sinh viên theo mã sinh viên
    $timkiem = array_search($Ma_sinh_vien, array_column($list_students, 'Ma_sinh_vien'));
    if ($timkiem === false) {
        echo "Không tìm thấy sinh viên nào.";
    } else {
        $result = $list_students[$timkiem];
        // Hiển thị kết quả lên bảng
        echo "<table>";
        echo "<tr><th>Tên sinh viên</th><th>Giới tính</th><th>Quê quán</th><th>Năm sinh</th><th>Nghành học</th><th>Mã sinh viên</th></tr>";
        echo "<tr><td>".$result['Ten_sinh_vien']."</td><td>".$result['Gioi_tinh']."</td><td>".$result['Que_quan']."</td><td>".$result['Nam_sinh']."</td><td>".$result['Nganh_hoc']."</td><td>".$result['Ma_sinh_vien']."</td></tr>";
        echo "</table>";
    }
?>
</body>
</html>