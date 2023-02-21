<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php  
        // include("data.php"); 
        $json = file_get_contents('data.json');
        $list_students = json_decode($json,true);
    ?>
    <form action="" method="post">
        <table>
            <tr>
                <td>ID</td>
                <td><input type="text" name="ID" id=""></td>
            </tr>
            <tr>
                <td>Họ tên</td>
                <td><input type="text" name="Name" id=""></td>
            </tr>
            <tr>
                <td>Giới tính</td>
                <td><input type="text" name="Gender" id=""></td>
            </tr>
            <tr>
                <td>Quê</td>
                <td><input type="text" name="Home" id=""></td>
            </tr>
            <tr>
                <td>Ngày sinh</td>
                <td><input type="text" name="Birthday" id=""></td>
            </tr>
            <tr>
                <td>Ngành học</td>
                <td><input type="text" name="Job" id=""></td>
            </tr>

        </table>
        <tr><input type="submit" value="Xác nhận"></tr>
    </form>
    <table>
        <tr>
            <th>Mã sinh viên</th>
            <th>Họ tên</th>
            <th>Giới tính</th>
            <th>Quê</th>
            <th>Ngày sinh</th>
            <th>Ngành học</th>
            <th>Thao tác</th>
        </tr>
        <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-left: 30px;
            padding-right: 30px;
        }
        </style>
        <?php 
        foreach ($list_students as $key => $value) {
        ?>
        <tr>
            <?php foreach ($value as $title => $mainvalue) {?>
            <td><?php echo $mainvalue?></td>
            <?php }?>
            <td><button>Sửa</button> <button>Xóa</button></td>
        </tr>
        <?php }
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $getdata = [
                "Ma_sinh_vien" => $_POST["ID"],
                "Ten_sinh_vien" => $_POST["Name"],
                "Gioi_tinh" => $_POST["Gender"],
                "Que_quan" => $_POST["Home"],
                "Nam_sinh" => $_POST["Birthday"],
                "Nganh_hoc" => $_POST["Job"],
            ];
            $list_students[count($list_students)] = $getdata;
        }
        $list_students = json_encode($json);
        $fp = fopen('data.json', 'a');
        fwrite($fp, json_encode($list_students));
        fclose($fp)
        ?>
    </table>

</body>

</html>