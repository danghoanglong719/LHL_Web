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
    <!-- Modal -->
    
<?php
	include_once("nav.php");
?>

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
    <!--main-->
    <div id="txtFist">
        <h1>Quản lý trang web</h1>
        <div class="container-fluid " id="managerpro">

            <div class="row">
                <!--cột trái-->
                <div class="col-md-3 col-sm-3 col-xs-12" id="leftcot">

                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action active">
                                Quản lý
                              </a>
                       <div class="form-check list-group-item list-group-item-action">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="optradio" checked="checked">Sản phẩm
                          </label>
                        </div>
                        <div class="form-check list-group-item list-group-item-action">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="optradio">Khách hàng
                          </label>
                        </div>
                        <div class="form-check list-group-item list-group-item-action">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="optradio" >Đơn hàng
                          </label>
                        </div>
                        <div class="form-check list-group-item list-group-item-action">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="optradio">Thống kê
                          </label>
                        </div>


                    </div>


                   

                </div>

                <!--cột giữa-->
                <div class="col-md-8 col-sm-3 col-xs-12" id="centercot">
                	<!-- Hiển thị cần quản lý-->
                	<?php
                		include_once("Manage_item/Manage_product.php");
                        include_once("Manage_item/Manage_User.php");
                	?>

                </div>
                <!--Cột phải-->
                <div class="col-md-1 col-sm-3 col-xs-12" id="rightcot">
                    
                   

                </div>
            </div>
        </div>




        <!--Cuối trang-->
        <div class="container-fluid mt-1 " style="border:1px solid black;background-color:white; border: none;padding: 10px;box-shadow: 5px 10px 8px 10px #888888; ">
            <div class="jumbotron mb-0 mt-2">
                <div class="row ">
                    <div class="col-sm-4 col-xs-12 ">
                        <h7> THÔNG TIN</h7>
                        <ul class="let ">
                            <li>
                                <a href="# ">Tài khoản</a>
                            </li>
                            <li> <a href="# ">khanh toán</a></li>
                            <li> <a href="# ">Liên hệ</a></li>
                            <li> <a href="# ">Giới thiệu</a></li>
                            <li> <a href="# ">Hỗ trợ</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-2 col-xs-12 ">
                        <h7>CHÍNH SÁCH</h7>
                        <ul class="let ">
                            <li><a href="# ">Vận chuyển</a></li>
                            <li> <a href="# ">Tuyển dụng</a></li>
                            <li> <a href="# ">Đối tác</a></li>
                            <li> <a href="# ">Trợ giúp</a></li>
                            <li> <a href="# ">Khuyến mãi</a>
                            </li>
                    </div>
                    <div class="col-sm-3 col-xs-12 ">
                        <a href="# "><i class="fab fa-twitter "></i></a>
                        <a href="# "><i class="fab fa-youtube "></i></a>
                        <a href="# "><i class="fab fa-facebook-f "></i></a>
                        <a href="# "><i class="fab fa-instagram "></i></a>

                    </div>
                    <div class="col-sm-3 col-xs-12 ">
                        <h7>CHÍNH SÁCH</h7>


                    </div>


                </div>
            </div>
        </div>
        <footer style="text-align: center;background-color: black ">
            <h7 style="color: white; ">Copyrights © 2020 by LHL</h7>
        </footer>
        <div class="button_scroll2top pos-relative " onclick="page_scroll2top() ">
            <div class="position-absolute " style="left: 50%; top: 50%;transform: translate(-50%,-50%); "><img src="../img/icon/up-circular-48.png " id="arr "></div>

            <!--owl product-->
            <script src="../js/login.js "></script>
            <script src="../js/Home.js "></script>



</body>

</html>