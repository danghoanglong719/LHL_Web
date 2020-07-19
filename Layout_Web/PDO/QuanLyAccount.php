<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>

 <style>
    .exam1,.dangnhap{
            margin:50px auto;
            padding:10px;
            text-align:center;
            border:2px solid black;
        }
        table, th, td{
        border: 1px solid black;
        text-decoration:none;
        }
 </style>   
</head>
<body>
<h1 class="" style="text-align:center;">Bảng Thông Tin Khách Hàng</h1>
<div class="exam1">
    <table style="width:100%">
        <tr>
            <th>ID</th>
            <th>TÊN</th>
            <th>Tài khoản</th>
            <th>Mật Khẩu</th>
            <th>Địa Chỉ</th>
            <th>Điện Thoại</th>
            <th>email</th>
        </tr>
 
<?php
include_once("DataProvider.php");

	$sql = "SELECT * FROM khachhang";
    $result = DataProvider::ExecuteQuery($sql);
	while($row = $result->fetch())
	{
        ?>
         <tr>
             <td><?= $row['MaKH'] ?></td>
             <td><?= $row['HoTen'] ?></td>
             <td><?= $row['TenDN'] ?></td>
             <td><?= $row['MatKhau'] ?></td>
             <td><?= $row['DiaChi'] ?></td>
             <td><?= $row['DienThoai'] ?></td>
             <td><?= $row['Email'] ?></td>
         </tr>
         <?php }?>
    </table>
    </div>


</body>
</html>

