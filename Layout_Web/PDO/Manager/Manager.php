<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager</title>

    <link rel="stylesheet" href="../css/Home.css">
    <link rel="stylesheet" type="text/css" href="../css/manager.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="../OwlCarousel2-2.3.4/src/js/owl.carousel.js">
    <link rel="stylesheet" href="../OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="../OwlCarousel2-2.3.4/dist/assets/owl.theme.green.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
</head>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/jquery/jquery-3.5.0.min.js"></script>
<script src="../OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>



<body>
<script>
        function Notification()
        {
            return confirm('Bạn Có Chắc Muốn Thay Đổi');
        }

</script>

    <div id="txtFist">
        <h1>Quản lý trang web</h1>
        <div class="container-fluid " id="managerpro">
            <div class="row">
                <!--cột trái-->
                <div class="col-2" id="leftcot">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action active">
                                Quản lý
                              </a>
                        <a href="#" class="list-group-item list-group-item-action">Sản phẩm</a>
                        <a href="../QuanLyAccount.php" class="list-group-item list-group-item-action">AccountUser</a>
                       
                    </div>
                </div>

                <!--cột giữa-->
    <div class="col-8" id="centercot">
         <table class="table table-hover">
             <tr>
                <th scope="col">MaSP</th>
                <th scope="col">MaLoai</th>
                <th scope="col">TenSanPham</th>
                <th scope="col">GiaBan</th>
                <th scope="col">MauSac</th>
                <th scope="col">VatLieu</th>
                <th scope="col">MoTa</th>
                <th scope="col">Hinh</th>
            </tr>
    <?php
        include_once("../DataProvider.php");
        $sql = "SELECT * FROM sanpham";
         $result = DataProvider::ExecuteQuery($sql);
            while($row = $result->fetch())
                 {
                    $_SESSION['MaSP'] =$row['MaSP'];
                    $_SESSION['MaLoai'] =$row['MaLoai'];
                    $_SESSION['TenSanPham'] =$row['TenSanPham'];
                    $_SESSION['GiaBan'] =$row['GiaBan'];
                    $_SESSION['MauSac'] =$row['MauSac'] ;
                    $_SESSION['VatLieu'] =$row['VatLieu'];
                    $_SESSION['MoTa'] =$row['MoTa'] ;
                    $_SESSION['Hinh'] =$row['Hinh'] ;
              
     ?>
        <tr>
            <td><?= $row['MaSP'] ?></td>
            <td><?= $row['MaLoai'] ?></td>
            <td><?= $row['TenSanPham'] ?></td>
            <td><?= $row['GiaBan'] ?></td>
            <td><?= $row['MauSac'] ?></td>
            <td><?= $row['VatLieu'] ?></td>
            <td><?= $row['MoTa'] ?></td>
            <td> <img src="../../img/<?= $row['Hinh'] ?> "style="width:150px;" /></td>
           <td><a href="Manager.php?id=<?= $row['MaSP'] ?> "onclick="Notification()" >Xóa</a></td>
           <td><a href="edit.php?edit=<?= $row['MaSP'] ?> " >Sửa</a></td>

        </tr>
        
    <?php }?>
    </table>
                </div>
           
                <div class="col-md-2 col-sm-3 col-xs-12" id="rightcot">
                   <a href="ManagerAdd.php"> <input type="button" value="Thêm"></a>
        
                
                   

                </div>
            </div>
        </div>
     
        <?php


    include_once("../DataProvider.php");
     if(isset($_GET['id']))
     {
                $product_id = $_GET['id'];
               
                $sql = "DELETE FROM `sanpham` WHERE  `MaSP` = '$product_id'";
                $result = DataProvider::ExecuteQuery($sql);
                if($result==true)
                {
                     header("location:Manager.php");
                }
                else{
                    echo "that bai";
                }
     }
                

?>

</body>

</html>