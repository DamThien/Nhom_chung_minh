<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <table>
        <tr>
            <th>Mã sinh viên</th>
            <th>Họ tên</th>
            <th>Giới tính</th>
            <th>Quê</th>
            <th>Ngày sinh</th>
            <th>Ngành học</th>
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
        include("data.php");
        foreach ($list_students as $key => $value) {
        ?>
        <tr>
            <?php foreach ($value as $title => $mainvalue) {?>
            <td><?php echo $mainvalue?></td>
            <?php }?>
        </tr>
        <?php }?>
    </table>

</body>

</html>