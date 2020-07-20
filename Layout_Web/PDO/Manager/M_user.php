<table class="table table-hover">
             <tr>
                <th scope="col">ID</th>
                <th scope="col">Họ tên</th>
                <th scope="col">Tài khoản</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">SĐT</th>
                <th scope="col">Email</th>
                <th colspan="2">Thao tác</th>
            </tr>
    <?php
       include_once("../DataProvider.php");
        $sql = "SELECT * FROM khachhang";
         $result = DataProvider::ExecuteQuery($sql);
            while($row = $result->fetch())
                 {
                    $_SESSION['MaKH'] =$row['MaKH'];
                    $_SESSION['HoTen'] =$row['HoTen'];
                    $_SESSION['TenDN'] =$row['TenDN'];
                    $_SESSION['DiaChi'] =$row['DiaChi'];
                    $_SESSION['DienThoai'] =$row['DienThoai'] ;
                    $_SESSION['Email'] =$row['Email'];                
     ?>
        <tr>
            <td><?= $row['MaKH'] ?></td>
            <td><?= $row['HoTen'] ?></td>
            <td><?= $row['TenDN'] ?></td>
            <td><?= $row['DiaChi'] ?></td>
            <td><?= $row['DienThoai'] ?></td>
            <td><?= $row['Email'] ?></td>
          
           <td><a href="Manager.php?idu=<?= $row['MaKH'] ?> "onclick="Notification()" >Xóa</a></td>
           <td><a href="edit_user.php?edit=<?= $row['MaKH'] ?> " >Sửa</a></td>

        </tr>
        
    <?php }?>
    </table>

<?php
   @ include_once("DataProvider.php");
     if(isset($_GET['idu']))
     {
                $user_id = $_GET['idu'];
               
                $sql = "DELETE FROM `khachhang` WHERE  `MaKH` = '$user_id'";
                $result = DataProvider::ExecuteQuery($sql);
                if($result==true)
                {
                   @  header("location:Manager.php");
                }
                else{
                    echo "that bai";
                }
     }
                

?>
