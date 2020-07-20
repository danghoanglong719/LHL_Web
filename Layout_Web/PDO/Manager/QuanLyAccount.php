<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager</title>

    <link rel="stylesheet" href="../products.css">
    <link rel="stylesheet" type="text/css" href="../../css/manager.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="../../OwlCarousel2-2.3.4/src/js/owl.carousel.js">
    <link rel="stylesheet" href="../../OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="../../OwlCarousel2-2.3.4/dist/assets/owl.theme.green.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
</head>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../js/jquery/jquery-3.5.0.min.js"></script>
<script src="../../OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>



<body>
<script>
        function Notification()
        {
            return confirm('Bạn Có Chắc Muốn Thay Đổi');
        }

</script>

 <!--modal-search-->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="z-index: 123313123;">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <form class="form-inline d-flex justify-content-center md-form form-sm mt-0 w-100 " action="https://tiki.vn/">
                    <input class="form-control form-control-sm w-100 pl-3" type="text" placeholder="Search..." aria-label="Search" style=" border:none;" name="search?q">
                </form>
            </div>
        </div>
    </div>
    <!--end-->

    <!--#region Thanh công cụ-->
    <div class="container-fluid menu pl-0 pr-0">
        <nav class="navbar navbar-expand-md  navbar11 bg-dark">
            <a class="navbar-brand " href="Home.html"><img src="../../img/LogoLHL.png" width="40px"></a>
            <button class="navbar-toggler btn-secondary" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <div class=" " style="margin:0px auto;">
                    <ul class="navbar-nav ">
                        <li class="nav-item">
                            <a class="nav-link ml-2" href="../Home.php">Trang Chủ <span></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ml-2" href="#"> <span></span>Liên Hệ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ml-2" href="#"><span></span>Trợ Giúp</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link ml-2" href="#" data-toggle="dropdown"><span></span>Sản Phẩm
                                <img src="../../img/icon/arrow-204-48.png" class="icon-product"/>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="../products.php?id=1"><span></span>SOFA</a>
                                <a class="dropdown-item" href="../products.php?id=2"><span></span>CHAIR</a>
                                <a class="dropdown-item" href="../products.php?id=3"><span></span>LAMP</a>
                                <a class="dropdown-item" href="../products.php?id=4"><span></span>TABLE</a>
                            </div>
                        </li>
                        <li class="nav-item cart">
                            <a class="nav-link ml-2" href="cart.html"><span></span>
                                <img src="../../img/icon/cart-78-32.png" width="25px"><div class="bh-nb"><div class="nb-pds">0</div></div>
                            </a>
                        </li>
                      
                        <li class="nav-item ">
                            <a class="nav-link ml-2" href="#" data-toggle="modal" data-target=".bd-example-modal-lg"><span></span>
                                <img src="../../img/icon/search-3-48.png" width="25px"/>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link ml-2" href="#" data-toggle="dropdown"><span></span>
                                <img src="../../img/icon/user-32.png" width="25px">
                            </a>
                            <div class="dropdown-menu ">
                                <?php 
                                if(isset($_SESSION['dangnhap'])){
                                    $dangnhap = $_SESSION['dangnhap'];
                                    $login = <<< EOD
                                    <div style="color:#fff; text-align:center;">Xin chào 
                                        <div style="text-decoration:underline; display:inline;">$dangnhap</div>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href=""><span></span>Thông tin</a>
                                    <a class="dropdown-item" href=""><span></span>Đổi mật khẩu</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="../logoutcode.php"><span></span>Đăng xuất</a>
EOD;
    echo $login;
                                }
                                else{
                                    echo '<p style="color:#fff; text-align:center; opacity:0.5;" >Bạn chưa đăng nhập</p>';
                                    echo'<div class="dropdown-divider"></div>';
                                    echo '<a class="dropdown-item" href="../login.php"><span></span>Đăng nhập</a>';
                                    echo '<a class="dropdown-item" href="../dangky.php"><span></span>Đăng ký</a>';
                                }
                                ?>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

 <div class="">
        <div class=""><img src="https://demo.goodlayers.com/inteco/wp-content/uploads/2018/09/shutterstock_543421996.jpg" alt="" class=" img-fluid-1"></div>
    </div>

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
                        <a href="Manager.php" class="list-group-item list-group-item-action">Sản phẩm</a>
                        <a href="QuanLyAccount.php" class="list-group-item list-group-item-action">AccountUser</a>
                       
                    </div>
                </div>

                <!--cột giữa-->
    <div class="col-8" id="centercot">
         <table class="table table-hover">
             <tr>
                <th scope="col">ID</th>
                <th scope="col">Họ tên</th>
                <th scope="col">Tài khoản</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">SĐT</th>
                <th scope="col">Email</th>
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
          
           <td><a href="Manager.php?id=<?= $row['MaKH'] ?> "onclick="Notification()" >Xóa</a></td>
           <td><a href="edit.php?edit=<?= $row['MaKH'] ?> " >Sửa</a></td>

        </tr>
        
    <?php }?>
    </table>
                </div>
           
                <div class="col-md-2 col-sm-3 col-xs-12" id="rightcot">
                   
                </div>
                
                   

                </div>
            </div>
        </div>
     
        <?php


   @ include_once("DataProvider.php");
     if(isset($_GET['id']))
     {
                $user_id = $_GET['id'];
               
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

</body>

</html>
