<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LHL Furniture</title>
    <link rel="stylesheet" href="products.css">
    <link rel="stylesheet" href="../css/LHL_text.css">
    <link rel="stylesheet" type="text/css" href="home.css">
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
<script src="../js/products.js"></script>
<style>
    #detail-person
    {
        background-color:black;
        opacity:0.5;
        display:none;
        width:200px;
        
    }
    #hover:hover #detail-person{
            display:block;
    }
    #hover:hover #detail-person li {
        list-style-type:none;
    }
    #hover:hover #detail-person li a{

          color:#fff;
    }
</style>
<?php
include_once("Cart/MyCart.php");
?>
<body>
    <!--modal-search-->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="z-index: 123313123;">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <form class="form-inline d-flex justify-content-center md-form form-sm mt-0 w-100 " action="products.php" method="GET">
                    <input class="form-control form-control-sm w-100 pl-3" type="text" placeholder="Search..." aria-label="Search" style=" border:none;" name="search" id ="search">
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
                                <a class="dropdown-item" href="products.php?id=1"><span></span>SOFA</a>
                                <a class="dropdown-item" href="products.php?id=2"><span></span>CHAIR</a>
                                <a class="dropdown-item" href="products.php?id=3"><span></span>LAMP</a>
                                <a class="dropdown-item" href="products.php?id=4"><span></span>TABLE</a>
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
                                if(isset($_SESSION['dangnhap']) && isset($_SESSION['QTV'])){
                                    $dangnhap = $_SESSION['dangnhap'];
                                    $login = <<< EOD
                                    <div style="color:#fff; text-align:center;">Xin chào 
                                        <div style="text-decoration:underline; display:inline;">$dangnhap</div>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="./Manager/Manager.php"><span></span>Quản Lý</a>
                                    <a class="dropdown-item" href=""><span></span>Đổi mật khẩu</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="logoutcode.php"><span></span>Đăng xuất</a>
EOD;
    echo $login;
                                }
                                else if(isset($_SESSION['dangnhap'])){
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
    <div class="lider">
        <div class="contianer-fluid">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item">
                        <img src="https://demo.goodlayers.com/inteco/wp-content/uploads/2018/09/hp3-hero-bg.jpg" class=" ">
                    </div>
                    <div class="carousel-item">
                        <img src="../img/slider_1.webp" class=" ">
                    </div>
                    <div class="carousel-item active">
                        <img src="../img/slider_2.jpg" class="">

                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

    <!--scroll-->
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

    <!--product-owl-->
    <div class="container mt-5">
        <div class="pro-1">
            <div class="row">
                <div class="col-sm-7 col-md-7">
                    <div class="pro-2 " style=" background-color:gray">
                        <span></span>
                        <span></span>
                        <img src="http://zadora.jwsthemeswp.com/wp-content/uploads/2019/05/a1-668x380.jpg" alt="anh1" class=" img-fluid">
                        <div class="pro-3">
                            <h6>SOFA</h6>
                            <p>20 items</p>
                        </div>
                        <div class="btn-seen">
                            <a href="products.php?id=1">CHI TIẾT</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5 col-md-5">
                    <div class="pro-2"> <span></span>
                        <span></span>
                        <img src="http://zadora.jwsthemeswp.com/wp-content/uploads/2019/05/a2.jpg" alt="anh2" class=" img-fluid">
                        <div class="pro-3">
                            <h6>CHAIR</h6>
                            <p>20 items</p>
                        </div>
                        <div class="btn-seen">
                            <a href="products.php?id=2">CHI TIẾT</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-5 col-md-5">
                    <div class="pro-2"> <span></span>
                        <span></span>
                        <img src="http://zadora.jwsthemeswp.com/wp-content/uploads/2019/05/a3.jpg" alt="anh3" class=" img-fluid">
                        <div class="pro-3">
                            <h6>LAMP</h6>
                            <p>20 items</p>
                        </div>
                        <div class="btn-seen">
                            <a href="products.php?id=3">CHI TIẾT</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-7 col-md-7">
                    <div class="pro-2"> <span></span>
                        <span></span>
                        <img src="http://zadora.jwsthemeswp.com/wp-content/uploads/2019/05/a4.jpg" alt="anh4" class=" img-fluid">
                        <div class="pro-3">
                            <h6>TABLE</h6>
                            <p>20 items</p>
                        </div>
                        <div class="btn-seen">
                            <a href="products.php?id=4">CHI TIẾT</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---->
    <!--owl carousel -->
    <script>
        $(function() {
            $('.owl-carousel').owlCarousel({

                margin: 20,
                responsive: {
                    0: {
                        items: 2,
                    },
                    600: {
                        items: 2,
                    },
                    1000: {
                        items: 4,
                    }
                }
            })
        });
    </script>
    <!---->

    <!-- Button trigger modal -->

    <!-- Modal -->
    

    <!--ketthuc-product-owl-->
    <!--second-2-->
    <div class="container mt-5">
        <div class="row" style="border-bottom:1px solid #999; margin-bottom: 50px; margin-top: 70px;">
            <div class="text-left">
                <h3>Sản Phẩm Mới</h3>
            </div>
        </div>
        <div class="mt-5" id="hang">
            <div id="prev"><button type="button" id="myBtn1" class="btn"><span><</span></button></div>
            <div id="next"><button type="button" id="myBtn2" class="btn"><span>></span></button></div>
            <div class="row ">
                <div class="owl-carousel owl-theme " id="owl-1">
                    <?php
                        include_once("LaySPMoi.php");
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!--#end-->
    <script>
        $(document).ready(function() {
            $("#myBtn1").click(function() {
                $("#owl-1").owlCarousel("prev");
            });
            $("#myBtn2").click(function() {
                $("#owl-1").owlCarousel("next");
            });
            $("#myBtn3").click(function() {
                $("#owl-3").owlCarousel("prev");
            });
            $("#myBtn4").click(function() {
                $("#owl-3").owlCarousel("next");
            });
        });
    </script>
    <!--second-2-->
    <div class="container mt-5">
        <div class="row" style="border-bottom:1px solid #999; margin-bottom: 50px; margin-top: 70px;">
            <div class="text-left">
                <h3>Sản Phẩm Bán Chạy</h3>
            </div>
        </div>
        <div class="mt-5" id="hang">
            <div id="prev"><button type="button" id="myBtn3" class="btn"><span><</span></button></div>
            <div id="next"><button type="button" id="myBtn4" class="btn"><span>></span></button></div>
            <div class="row ">
                <div class="owl-carousel owl-theme " id="owl-3">
                    <?php
                        include_once("LaySPBanChay.php");
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!--#end-->
    <div class="boxbox">
        <div class="container mb-4">
            <div class="row">
                <div class="col-md-7 col-sm-8 col-12">
                    <div class="boxtext">
                        <h2 >VỀ CHÚNG TÔI</h2>
                        <hr>
                        <p>Chúng tôi tạo ra những sản phẩm bàn ghế nhẹ nhàng, tinh tế với mong muốn bạn và gia đình luôn cảm thấy vui vẻ, thoải mái và thư giãn khi sum họp bên bữa cơm gia đình, cảm xúc tự tin khi tiếp đãi Khách đến thăm nhà.</p>
                        <p>LHL Furniture luôn cam kết “Uy Tín – Chất Lượng – Dịch Vụ Tốt” để đảm bảo cho khách hàng yên tâm và hài lòng nhất.</p>
                    </div>
                </div>
                <div class="col-md-5 col-sm-4 col-6 mt-2 ">
                    <div class="box-img">
                        <img src="../img/Screenshot (148).png" alt="" class=" img-fluid">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!---->
    <div class="container-fluid" id="background-img">
        <div id="vi2"></div>
        <div class=" wrapper container">
            <div class="wrapper2">
                <div id="demo9" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" id="inner">
                        <div class="carousel-item active">
                            <div class=" h-100 "style=" color:white;">
                                <div class="mt-3">
                                    <img src="../img/LogoLHL.png" alt="Logo" class="avatar ">
                                </div>
                                <div class="card-body ">
                                    <p class=" author" style=" font-size:30px;">LHL Furniture</p>
                                    <div class="divider"></div>
                                    <p class=" text" style=" font-size:18px;color: white; line-height:1.8;">Giá trị đích thực của cái đẹp – đẹp là phải bền, bắt mắt và tối ưu</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item ">
                            <div class=" h-100 " style=" color:white; ">
                                <div class="mt-3 ">
                                    <img src="../img/LogoLHL.png" alt="Logo" class="avatar ">
                                </div>
                                <div class="card-body ">
                                    <p class=" author" style=" font-size:30px;">LHL Furniture</p>
                                    <div class="divider"></div>
                                    <p class=" text" style=" font-size:18px; line-height:1.8; ">Khi không gian sống là tác phẩm nghệ thuật</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item ">
                            <div class=" h-100 " style=" color:white; ">
                                <div class="mt-3 ">
                                    <img src="../img/LogoLHL.png" alt="Logo " class="avatar ">
                                </div>
                                <div class="card-body ">
                                    <p class=" author" style=" font-size:30px;">LHL Furniture</p>
                                    <div class="divider"></div>
                                    <p class=" text" style=" font-size:18px; line-height:1.8;"> Đột phá ý tưởng – tạo nên đẳng cấp</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---->
    <div class="container mt-4 " style=" padding: 60px; ">
        <div class=" row " id="th ">
            <div class="col-sm-5 ">
                <hr>
            </div>
            <div class="col-sm-2 text-center " style=" color:#333; font-size:20px;font-style: italic;">Thương Hiệu</div>
            <div class="col-sm-5 ">
                <hr>
            </div>
        </div>
        <div class="row mt-3 " id="aaa ">
            <div class="col-sm-2 ">
                <img src="../img/brand_1.jpg " alt=" " class=" img-fluid ">
            </div>
            <div class="col-sm-2 ">
                <img src="../img/brand_2.jpg " alt=" " class=" img-fluid ">
            </div>
            <div class="col-sm-2 ">
                <img src="../img/brand_3.jpg " alt=" " class=" img-fluid ">
            </div>
            <div class="col-sm-2 ">
                <img src="../img/brand_4.jpg " alt=" " class=" img-fluid ">
            </div>
            <div class="col-sm-2 ">
                <img src="../img/brand_5.jpg " alt=" " class=" img-fluid ">
            </div>
            <div class="col-sm-2 ">
                <img src="../img/brand_6.jpg " alt=" " class=" img-fluid ">
            </div>
        </div>
    </div>
    <!---->
    <div class="container-fluid mt-4 ">
        <div class="row ">
            <div class="col-md-4 col-12 " style=" height: 200px; ">
                <i class="fas fa-caravan " style=" font-size:50px;display:flex; align-items:center ; justify-content: center; "></i>
            </div>
            <div class="col-md-4 col-12 ">
                <i class="fas fa-pound-sign " style=" font-size:50px;display:flex; align-items:center ; justify-content: center; "></i>
            </div>
            <div class="col-md-4 col-12 ">
                <i class="fas fa-comments " style=" font-size:50px;display:flex; align-items:center ; justify-content: center; "></i>
            </div>
        </div>
    </div>
    <!---->
    <div class="container-fluid " style="background-color:rgb(24, 6, 6); border: none;padding: 10px;box-shadow: 5px 10px 8px 10px #888888; ">
        <div style="font-size: 20px; margin-left: 10px; ">
            <a href="# " style=" border-radius:100%;border: 1px solid black;padding: 5px 10px;color: white; "><i class="fab fa-twitter "></i></a>
            <a href="# " style=" border-radius:100%;border: 1px solid black;padding: 5px 10px;color: white; "><i class=" fab fa-youtube "></i></a>
            <a href="# " style=" border-radius:100%;border: 1px solid black;padding: 5px 10px;color: white; "><i class="fab fa-facebook-f "></i></a>
            <a href="# " style=" border-radius:100%;border: 1px solid black;padding: 5px 10px; color: white; "><i class=" fab fa-instagram "></i></a>
        </div>
    </div>
    <footer style="text-align: center;background-color: black ">
        <h7 style="color: white; ">Copyrights © 2020 by LHL</h7>
    </footer>
    <!---->
    <div class="button_scroll2top pos-relative " onclick="page_scroll2top() ">
        <div class="position-absolute " style="left: 50%; top: 50%;transform: translate(-50%,-50%); "><img src="../img/icon/up-circular-48.png " id="arr "></div>

        <!--owl product-->

        <script>
            $(document).ready(function() {
                var url = "detail.html";
                $("#spham").attr('href', url);
            });
        </script>


        <script src="../js/login.js "></script>
        <script src="../js/Home.js "></script>


</body>
<script>
        $(document).ready(function() {
            $(".mua").click(function(){
                $.ajax({
                    url: "./Cart/XLGioHang.php",
                    data: {
                        "ma_sp": $(this).data("masp"),
                        "so_luong": 1,
                        "hanh_dong": "them"
                    },
                    dataType: "json",
                    success: function(data){
                        $(".nb-pds").html(data.Count);
                    }
                });
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Thêm vào giỏ hàng thành công',
                    showConfirmButton: false,
                    timer: 1000
                })
            });
        });
    </script>
</html>