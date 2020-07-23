<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" type="text/css" href="products.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="../OwlCarousel2-2.3.4/src/js/owl.carousel.js">-->
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

    <!--modal-search-->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="z-index: 123313123;">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <form class="form-inline d-flex justify-content-center md-form form-sm mt-0 w-100 " action="#">
                    <input class="form-control form-control-sm w-100 pl-3" type="text" placeholder="Search..." aria-label="Search" style=" border:none;" name="search?q" id ="search">
                </form>
            </div>
        </div>
    </div>
    <!--end-->

    <!--#region Thanh công cụ-->
    <div class="container-fluid menu pl-0 pr-0">
        <nav class="navbar navbar-expand-md  navbar11 ">
            <a class="navbar-brand " href="Home.html"><img src="../img/LogoLHL.png" width="40px"></a>
            <button class="navbar-toggler btn-secondary" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <div class=" " style="margin:0px auto;">
                    <ul class="navbar-nav ">
                        <li class="nav-item">
                            <a class="nav-link ml-2" href="home.php">Trang Chủ <span></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ml-2" href="#"> <span></span>Liên Hệ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ml-2" href="#"><span></span>Trợ Giúp</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link ml-2" href="#" data-toggle="dropdown"><span></span>Sản Phẩm
                                <img src="../img/icon/arrow-204-48.png" class="icon-product"/>
                            </a>
                            <div class="dropdown-menu">
                            <?php
                                include_once("DataProvider.php");
                                $sqlSanPham = "SELECT MaLoai, TenLoai FROM loaisp";
                                $dsSanPham = DataProvider::ExecuteQuery($sqlSanPham);
                                while($row = $dsSanPham->fetch()){
                                    echo "<a class='dropdown-item' href='products.php?id={$row['MaLoai']}'><span></span>{$row['TenLoai']}</a>";
                                }
                            ?>
                            </div>
                        </li>
                        <li class="nav-item cart">
                            <a class="nav-link ml-2" href="Cart/GioHang.php"><span></span>
                                <img src="../img/icon/cart-78-32.png" width="25px"><div class="bh-nb"><div class="nb-pds">0</div></div>
                            </a>
                        </li>    
                        <li class="nav-item ">
                            <a class="nav-link ml-2" href="#" data-toggle="modal" data-target=".bd-example-modal-lg"><span></span>
                                <img src="../img/icon/search-3-48.png" width="25px"/>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link ml-2" href="#" data-toggle="dropdown"><span></span>
                                <img src="../img/icon/user-32.png" width="25px">
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
                                    <a class="dropdown-item" href="logoutcode.php"><span></span>Đăng xuất</a>
EOD;
    echo $login;
                                }
                                else{
                                    echo '<p style="color:#fff; text-align:center; opacity:0.5;" >Bạn chưa đăng nhập</p>';
                                    echo'<div class="dropdown-divider"></div>';
                                    echo '<a class="dropdown-item" href="login.php"><span></span>Đăng nhập</a>';
                                    echo '<a class="dropdown-item" href="dangky.php"><span></span>Đăng ký</a>';
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
    <!---->
    <script>
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();

            if (scroll >= 50) {
                $(".navbar11").addClass("scroll-navbar");

            } else {
                $(".navbar11").removeClass("scroll-navbar");
            }
        });
    </script>
    <!---->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div id='imm' class="mt-3">
                   
                            <?php
                                    include_once("DataProvider.php");
                                    if(isset($_GET['id']))
                                        $id= $_GET['id'];
                                    
                                    $sql = "SELECT * FROM sanpham where `MaSP` = '{$id}'" ;
                                    $result = DataProvider::ExecuteQuery($sql);
                                    
                                  while($row = $result->fetch())
                                    {
                                    ?>
                                        <img src="../img/<?= $row['Hinh'] ?> "style="width:350px;" />

                                        </div>
            </div>
            <div class="col-md-3 mt-3 border">
                <div id='imm-1' class="mt-5">
                    <div class="row">
                        <div class="">
                            <h1><?= $row['TenSanPham'] ?></h1>
                            
                        </div>
                    </div>

                    <div class="row mt-5 ">

                        <table class="table table-striped">                       
                          <tbody>
                              <th scope="row">Giá</th>
                              <td><?= number_format($row['GiaBan']) ?> đ</td>
                            </tr>
                            <tr>
                              <th scope="row">Màu Sắc</th>
                              <td><?= $row['MauSac'] ?></td>
                            </tr>
                            <tr>
                              <th scope="row">Chất liệu</th>
                              <td><?= $row['VatLieu'] ?></td>
                            </tr>

                            <tr>
                                <td><button class="mr-4">Mua Ngay</button></td>
                                <td><button>Thêm vào giỏ hàng</button></td>
                            </tr>

                          </tbody>
                        </table>
           
                    </div>

                  
                </div>
            </div>
            <div class="col-md-4 mt-3 border">
 
                            <h3> Mô tả </h3>
                            <p><?= $row['MoTa'] ?></p>
            </div>
                               
        <?php }?>                                        
                
        </div>
    </div>
    <div class="container-fluid">
        <div class="box-detail">
            
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <?php
                                    include_once("./DataProvider.php");
                                    if(isset($_GET['id']))
                                    $id= $_GET['id'];
                                    $sql = "SELECT * FROM sanpham where `Hinh` = '$id'" ;
                                    $result = DataProvider::ExecuteQuery($sql);
                                    
                                  while($row = $result->fetch())
                                    {
                                    ?>
                                         <?= $row['MoTa'] ?>
                               
                                <?php }?>  
             </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>

                </div>
            </div>
        </div>
    </div>
    <!---->
    <div class="mt-5 " style="background-color:rgb(24, 6, 6); border: none;padding: 10px;box-shadow: 5px 10px 8px 10px #888888; ">
        <div style="font-size: 20px; margin-left: 10px;">
            <a href="# " style=" border-radius:100%;border: 1px solid black;padding: 5px 10px;color: white;"><i class="fab fa-twitter "></i></a>
            <a href="# " style=" border-radius:100%;border: 1px solid black;padding: 5px 10px;color: white;"><i class=" fab fa-youtube "></i></a>
            <a href="# " style=" border-radius:100%;border: 1px solid black;padding: 5px 10px;color: white; "><i class="fab fa-facebook-f "></i></a>
            <a href="# " style=" border-radius:100%;border: 1px solid black;padding: 5px 10px; color: white;"><i class=" fab fa-instagram "></i></a>
        </div>
    </div>
    <footer style="text-align: center;background-color: black ">
        <h7 style="color: white; ">Copyrights © 2020 by LHL</h7>
    </footer>

</body>

</html>