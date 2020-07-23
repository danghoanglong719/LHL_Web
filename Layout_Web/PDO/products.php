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
<?php
include_once("./Cart/MyCart.php");
?>
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
            <a class="navbar-brand " href="home.php"><img src="../img/LogoLHL.png" width="40px"></a>
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
                                <img src="../img/icon/cart-78-32.png" width="25px"><div class="bh-nb"><div class="nb-pds">
                                    <?php 
                                        $sum = json_decode(Cart::Display());
                                        echo $sum->Count;
                                    ?></div></div>
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
    <!--mục chọn-->
    <div class="container-fluid  mt-5">
        <div class="row">
            <div class="col-md-3 col-xs-12 col-sm-4" id="col-box">
                <div class="slider-box" aria-expanded="true">
                    <div class="tittle">
                        <i class="fa fa-align-justify float-md-left"></i>
                        <span>Lọc Sản Phẩm</span>
                    </div>
                    <div></div>
                    <div class="box-muc">
                        <p data-toggle="collapse" data-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample" id="muc11">
                            Loại sản phẩm
                            <i class="fas fa-angle-right float-md-right " style="border-bottom:none;" id="tick0" name="sp"></i>
                        </p>
                        <div class="collapse show" id="collapseExample1">
                            <div class="box-muc2">
                                <div class="box-item">
                                    <label>
                                        <input  type="radio" value="0"  name="sp" class=" btn" v-model="picked" checked>
                                            <a class='sp' href='products.php?id=0'>TẤT CẢ</a>
                                        </input>
                                    </label>
                                </div>
                                <?php
                                    include_once("DataProvider.php");
                                    $sqlSanPham = "SELECT MaLoai, TenLoai FROM loaisp";
                                    $dsSanPham = DataProvider::ExecuteQuery($sqlSanPham);
                                    while($row = $dsSanPham->fetch()){
                                        $chuoi = <<< EOD
                                        <div class='box-item'>
                                            <label>
                                                <input type="radio" value="{$row['MaLoai']}"  name="sp" class=" btn">
                                                    <a class='sp' href='products.php?id={$row['MaLoai']}'>{$row['TenLoai']}</a>
                                                </input>
                                            </label>
                                        </div>
                                        
EOD;
    echo $chuoi;
}
?>
                            </div>
                        </div>
                    </div>
                    <div class="box-muc">
                        <p data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample" id="muc33">
                            Giá
                            <i class="fas fa-angle-right float-md-right " style="border-bottom:none;" id="tick2"></i>
                        </p>
                        <div class="collapse show" id="collapseExample2">
                            <div class="box-muc2">
                                <div class="box-item">
                                    <label>
                                        <input  type="radio" value="all"  name="price" class=" btn" v-model="picked" checked>
                                        <span> TẤT CẢ</span>
                                    </label>
                                </div>
                                <div class="box-item">
                                    <label>
                                <input  type="radio" value="100000" name="price"  class=" btn" v-model="picked">
                                <span> 0đ ~ 100.000đ</span>
                            </label>
                                </div>
                                <div class="box-item">
                                    <label>
                                <input  type="radio" value="1000000"  name="price" class=" btn" >
                                <span> 100.000đ ~ 1.000.000đ</span>
                            </label>
                                </div>
                                <div class="box-item">
                                    <label>
                                <input  type="radio" value="2000000" name="price" class=" btn" >
                                <span> 1.000.000đ ~ 2.000.000đ</span>
                            </label>
                                </div>
                                <div class="box-item">
                                    <label>
                                <input  type="radio" value="5000000"  name="price">
                                <span> 2.000.000đ ~ 5.000.000đ</span>
                            </label>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="box-muc ">
                        <p data-toggle="collapse" data-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample" id="muc44">
                            Mau Sắc
                            <i class="fas fa-angle-right float-md-right " style="border-bottom:none;" id="tick3"></i>
                        </p>

                        <div class="collapse show" id="collapseExample3">
                            <div class="box-muc2">
                                <div>
                                    <div class="box-item">
                                        <label>
                                <input  type="checkbox" value="">
                                <span> cam</span>
                                </label>
                                    </div>
                                    <div class="box-item">
                                        <label>
                                <input  type="checkbox" value="">
                                <span> đỏ</span>
                                </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-muc">
                        <p data-toggle="collapse" data-target="#collapseExample4" aria-expanded="false" aria-controls="collapseExample" id="muc55">
                            Vật Liệu
                            <i class="fas fa-angle-right float-md-right " style="border-bottom:none;" id="tick4"></i>
                        </p>
                        <div class="collapse show" id="collapseExample4">
                            <div class="box-muc2">
                                <div class="box-item">
                                    <label>
                                <input  type="checkbox" value="">
                                <span> Gỗ</span>
                            </label>
                                </div>
                                <div class="box-item ">
                                    <label>
                                <input  type="checkbox" value="">
                                <span> Nhựa</span>
                            </label>
                                </div>
                                <div class="box-item ">
                                    <label>
                                <input  type="checkbox" value="">
                                <span>Sắt</span>
                            </label>
                                </div>
                                <div class="box-item ">
                                    <label>
                                <input  type="checkbox" value="">
                                <span> Đồng</span>
                            </label>
                                </div>
                                <div class="box-item ">
                                    <label>
                                <input  type="checkbox" value="">
                                <span> Nhôm</span>
                            </label>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="wrapper">
                    <div class="links">
                        <ul>
                            <li class="li-list active" data-view="list-view"> <i class=" fas fa-th-list"> List View</i></li>
                            <li class="li-grid " data-view="grid-view"> <i class=" fas fa-th-large"> Grid View</i> </li>
                        </ul>
                    </div>
                    
                    <div class="view-main">
                        <div class="view-wrap list-view" style=" display:block;">
                            <div class="row" id="parent-lv">
                                <?php
                                include_once('DataProvider.php');
                                $sosp1trang = 3;
                                if(isset($_GET['page'])){
                                    $trang = $_GET['page'];
                                    settype($trang, "int");
                                }else{
                                    $trang = 1;
                                }
                                $from = ($trang - 1) * $sosp1trang;

                                if(isset($_GET['id']) && $_GET['id'] != "0" ){
                                    $qrloai = "MaLoai = {$_GET['id']}";
                                }
                                else {
                                    $qrloai = "1 = 1";
                                }
                                if(isset($_REQUEST['gia_sp']) && $_REQUEST['gia_sp'] != "all" ){
                                    $qrgia = "GiaBan <= $_REQUEST[gia_sp] ORDER BY GiaBan";
                                }
                                else {
                                    $qrgia = "1 = 1";
                                }

                                $sqlSanPham = "SELECT MaSP, MaLoai, TenSanPham, GiaBan, MoTa, Hinh FROM sanpham WHERE {$qrloai} AND {$qrgia} LIMIT $from, $sosp1trang";
                                $dsSanPham = DataProvider::ExecuteQuery($sqlSanPham);
                                while($row = $dsSanPham->fetch())
                                {
                                    $gia = number_format($row['GiaBan']);
                                    $chuoi = <<< EOD
                                    <div class="col-md-4 col-sm-5 col-7 box">
                                        <div class="view-item">
                                            <div class="card h-100 mb-3">
                                                <div id="vi"></div>
                                                <a href="# "> <img class="card-img-top img-fluid " src="../img/{$row['Hinh']}"></a>
                                                <div class="card-body col-md-12">
                                                    <div style="margin-bottom: 10px;text-align: center; ">
                                                        <h5 class="name">{$row['TenSanPham']}</h5>
                                                        <p class=" text-center" class="tien">{$gia}đ</p>
                                                    </div>
                                                    <div class="face-2">
                                                        <div class="buy">
                                                            <a href="chitiet.php?id={$row['MaSP']}">
                                                                <i class="far fa-eye"></i></a>
                                                        </div>
                                                        <div class="icon-buy  justify-content-center">
                                                            <div> <button class="mua" data-masp={$row['MaSP']}><i class="add-cart fas fa-shopping-cart "></i></button></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
EOD;
	echo $chuoi;
}
?>
                            </div>
                        </div>
                        <div class="view-wrap grid-view" style=" display:none;">
                            <div class="row" id="parent-gv">
                                <?php
                                    include_once('DataProvider.php');
                                    $sosp1trang = 3;
                                    if(isset($_GET['page'])){
                                        $trang = $_GET['page'];
                                        settype($trang, "int");
                                    }else{
                                        $trang = 1;
                                    }
                                    $from = ($trang - 1) * $sosp1trang;
    
                                    if(isset($_GET['id']) && $_GET['id'] != "0" ){
                                        $qrloai = "MaLoai = {$_GET['id']}";
                                    }
                                    else {
                                        $qrloai = "1 = 1";
                                    }
                                    if(isset($_REQUEST['gia_sp']) && $_REQUEST['gia_sp'] != "all" ){
                                        $qrgia = "GiaBan <= $_REQUEST[gia_sp] ORDER BY GiaBan";
                                    }
                                    else {
                                        $qrgia = "1 = 1";
                                    }
                                    
                                    $sqlSanPham = "SELECT MaSP, MaLoai, TenSanPham, GiaBan, MoTa, Hinh FROM sanpham WHERE {$qrloai} AND {$qrgia} LIMIT $from, $sosp1trang";
                                    $dsSanPham = DataProvider::ExecuteQuery($sqlSanPham);
                                    while($row = $dsSanPham->fetch())
                                    {   $_SESSION['SanP']= $row['TenSanPham'];
                                        $gia = number_format($row['GiaBan']);
                                        $chuoi = <<< EOD
                                        <div class="col-md-12 box sofa">
                                            <div class="view-item">
                                                <div class="card h-60 mb-3">
                                                    <div id="vi"></div>
                                                    <div class="row ">
                                                        <div class="col-md-5  ">
                                                            <a href="# "> <img class="card-img-top img-fluid " src="../img/{$row['Hinh']}"></a>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <div style="text-align: center;" class="text-product">
                                                                <p class=" text-center justify-content-center">{$row['MoTa']}</p>
                                                            </div>
                                                            <div style="margin-bottom: 10px;text-align: center; ">
                                                                <h5>{$row['TenSanPham']}</h5>
                                                                <p class=" text-center">{$gia}đ</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body col-md-12">
                                                        <div class="face-2">
                                                            <div class="buy">
                                                                <a href="chitiet.php?id={$row['MaSP']}">
                                                                 <button type="submit" name="xemganday">   <i class="far fa-eye"></i></button>
                                                                </a>
                                                            </div>
                                                            <div class="icon-buy  justify-content-center">
                                                                <div> <button class="mua" data-masp={$row['MaSP']}><i class="add-cart fas fa-shopping-cart "></i></button></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
EOD;
    echo $chuoi;
}

?>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="text-align:center">
                        <div class="col-md-12" id="phantrang">
                                <?php
                                    if(isset ($_GET['id'])){
                                        $product_id = $_GET['id'];
                                        settype($trang, "int");
                                    }
                                    else{
                                        $product_id = 0;
                                    }
                                ?>

                                <?php
                            $sosp1trang = 3;
                            if(isset($_GET['page'])){
                                $trang = $_GET['page'];
                                settype($trang, "int");
                            }else{
                                $trang = 1;
                            }
                            $from = ($trang - 1) * $sosp1trang;

                            if(isset($_GET['id']) && $_GET['id'] != "0" ){
                                $qrloai = "MaLoai = {$_GET['id']}";
                            }
                            else {
                                $qrloai = "1 = 1";
                            }
                            if(isset($_REQUEST['gia_sp']) && $_REQUEST['gia_sp'] != "all" ){
                                $qrgia = "GiaBan <= $_REQUEST[gia_sp] ORDER BY GiaBan";
                            }
                            else {
                                $qrgia = "1 = 1";
                            }
                            $sqlrow = "SELECT MaSP, MaLoai, TenSanPham, GiaBan, MoTa, Hinh FROM sanpham WHERE {$qrloai} AND {$qrgia}";
                            $rows = DataProvider::ExecuteQuery($sqlrow);
                            $count = $rows->fetchAll(PDO::FETCH_ASSOC);
                            $tongsosp = count($count);
                            $sotrang = ceil($tongsosp / $sosp1trang);
                            
                            for($i=1; $i<=$sotrang; $i++){
                                echo "<a class='pt_a' href='products.php?id=$product_id&page=$i' value='$i'> $i </a>";
                            }
?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!---->
        <script>
            $(document).ready(function() {
                var $btns = $('.btn').click(function() {
                    if (this.id == 'all') {
                        $('#parent > div').fadeIn(450);
                    } else {
                        var $el = $('.' + this.id).fadeIn(450);
                        $('#parent > div').not($el).hide();
                    }

                })
                var $search = $("#search").on('input', function() {
                    var matcher = new RegExp($(this).val(), 'ig');
                    $('.box').show().not(function() {
                        return matcher.test($(this).find('.name, .tien').text())
                    }).hide();
                })
            })
        </script>
    </div>
    <!--end mục chọn-->


    <!---->
    <div class="mt-5" style="background-color:rgb(24, 6, 6); border: none;padding: 10px;box-shadow: 5px 10px 8px 10px #888888; ">
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
    <!---->
    <!--jquery-->
    <!--list/grid-->

    <!--end-->
    <script>
        $(document).ready(function() {
            $('#muc11').click(function() {
                $('#tick0').toggleClass('slow');
            });
            $('#muc22').click(function() {
                $('#tick1').toggleClass('slow1');
            });
            $('#muc33').click(function() {
                $('#tick2').toggleClass('slow2');
            });
            $('#muc44').click(function() {
                $('#tick3').toggleClass('slow3');
            });
            $('#muc55').click(function() {
                $('#tick4').toggleClass('slow4');
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.tittle').click(function() {
                $('.box-muc').toggle(1000);
            });
            
        });

    </script>
    <script>
        $(document).ready(function() {
            $(".mua").click(function(){
                $.ajax({
                    url: "./Cart/XLGioHang.php",
                    data: {
                        "ma_sp": $(this).data("masp"), 
                        "hanh_dong": "them"
                    },
                    dataType: "json",
                    success: function(data){
                        $(".nb-pds").html(data.Count);
                        console.log(data.Count)
                    }
                });
                console.log("damua");
            });
        });
    </script>
    <!--lỗi-->
    <script>
        $(document).ready(function() {
            var box = $('.box-muc');
            if (window.matchMedia("(max-width: 655px) ").matches) {
                box.hide();
            } else {
                box.show();
            }
        });
    </script>
    <!---->
    <!--end-->
    <script>
        var li_links = document.querySelectorAll(".links ul li");
        var view_wraps = document.querySelectorAll(".view-wrap");

        li_links.forEach(function(link) {
            link.addEventListener("click", function() {
                li_links.forEach(function(item) {
                    item.classList.remove("acitve");
                })
                link.classList.add("active");
                var li_view = link.getAttribute("data-view");
                view_wraps.forEach(function(view) {
                    view.style.display = "none";
                })
                if (li_view == "list-view") {
                    document.querySelector("." + li_view).style.display = "block";
                } else {
                    document.querySelector("." + li_view).style.display = "block";
                }
            })
        })
    </script>
    <!---->
    <script src="../js/main.js"></script>
    <!--Load SP-->
    <script>
    function LaySanPham(maloai, gia, trang){
        //Xuly ListView
        $.ajax({
            url: "XLLaySPlv.php",
            data: { 
                trang_ht: trang,
                ma_loai_sp: maloai,
                gia_sp: gia
            },
            success: function(response){
                $("#parent-lv").html(response);

                $(".mua").click(function(){
					$.ajax({
						url: "./Cart/XLGioHang.php",
						data: {
							"ma_sp": $(this).data("masp"), 
							"hanh_dong": "them"
						},
						dataType: "json",
						success: function(data){
							$(".nb-pds").html(data.Count);
						}
                    });
                    console.log("damua");
				});
            }
        });

        //XuLy GridView
        $.ajax({
            url: "XLLaySPgv.php",
            data: {
                trang_ht: trang,
                ma_loai_sp: maloai,
                gia_sp: gia
            },
            success: function(response){
                $("#parent-gv").html(response);

                $(".mua").click(function(){
					$.ajax({
						url: "./Cart/XLGioHang.php",
						data: {
							"ma_sp": $(this).data("masp"), 
							"hanh_dong": "them"
						},
						dataType: "json",
						success: function(data){
							$(".nb-pds").html(data.Count);
						}
					});
				});
            }
        });
        $.ajax({
            url: "PhanTrang.php",
            data:{
                trang_ht: trang,
                ma_loai_sp: maloai,
                gia_sp: gia
            },
            success: function(data){
                $("#phantrang").html(data);
            }
        });
    }
    $(function(){
        //LaySanPham();
        /*
        $('a[class="sp"]').click(function (e) {
            var maloai = $("input[name='sp']:checked").val();
            var gia = $("input[name='price']:checked").val();
            var trang = 1;
            LaySanPham(maloai, gia, trang);
            e.stopPropagation();
        });
        */
        $("input[value='<?php echo $product_id; ?>']").prop('checked', true);

        $("input[name='sp']").change(function(){
            var maloai = $("input[name='sp']:checked").val();
            var gia = $("input[name='price']:checked").val();
            var trang = 1;
            LaySanPham(maloai, gia, trang);
        });
        $("input[name='price']").change(function(){
            var maloai = $("input[name='sp']:checked").val();
            var gia = $("input[name='price']:checked").val();
            var trang = <?php echo $trang; ?>;
            LaySanPham(maloai, gia, trang);
        });
    });

    $(function(){
        var url = "products.php";
        var choice = "";

        $('input[name="sp"]').click(function(){
            choice = "";
            $('input[name="sp"]').each(function (){
                if (this.checked)
                    if (choice.length == 0)
                        choice += '?id=' + this.val;
                    else
                        choice += '&cid=' + this.val;
            });
        });
    });
    </script>
    <script>
    $(function(){
        //$(".pt_a[value='1']").addClass('active');
        $('.pt_a').click(function() {
            console.log("changed");
            $('.pt_a').removeClass('active');
            $(this).addClass('active');
        });
    });
    </script>
</body>


</html>

</html>