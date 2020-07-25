<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>


    <link rel="stylesheet" href="../products.css">
    <link rel="stylesheet" href="cart.css">
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


<?php
include_once("MyCart.php");
?>
<body>
 <!--modal-search-->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="z-index: 123313123;">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <form class="form-inline d-flex justify-content-center md-form form-sm mt-0 w-100 " action="../products.php">
                    <input class="form-control form-control-sm w-100 pl-3" type="text" placeholder="Search..." aria-label="Search" style=" border:none;" name="search" id="search">
                </form>
            </div>
        </div>
    </div>
    <!--end-->

    <!--#region Thanh công cụ-->
    <div class="container-fluid menu pl-0 pr-0">
        <nav class="navbar navbar-expand-md  navbar11">
            <a class="navbar-brand " href="../home.php"><img src="../../img/LogoLHL.png" width="40px"></a>
            <button class="navbar-toggler btn-secondary" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <div class=" " style="margin:0px auto;">
                    <ul class="navbar-nav ">
                        <li class="nav-item">
                            <a class="nav-link ml-2" href="../home.php">Trang Chủ <span></span></a>
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
                            <a class="nav-link ml-2" href="GioHang.php"><span></span>
                                <img src="../../img/icon/cart-78-32.png" width="25px"><div class="bh-nb"><div class="nb-pds">
                                    <?php 
                                        $sum = json_decode(Cart::Display());
                                        echo $sum->Count; 
                                    ?></div></div>
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
                                if(isset($_SESSION['dangnhap']) && isset($_SESSION['QTV'])){
                                    $dangnhap = $_SESSION['dangnhap'];
                                    $login = <<< EOD
                                    <div style="color:#fff; text-align:center;">Xin chào 
                                        <div style="text-decoration:underline; display:inline;">$dangnhap</div>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="../Manager/Manager.php"><span></span>Quản Lý</a>
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
<div class="main">
    <div class="cart-products">
        <div class="cart-inner">
            <h2 class="cart-products-title">GIỎ HÀNG CỦA BẠN</h2>
            <div class="cart-products-inner">
                <ul class="cart-products__products">
                    <?php
                    if(isset($_SESSION['Cart']) && $sum->Count >0){
                        include_once("DisplayGioHang.php");
                    }
                    else{
                        echo '<div class="empty">';
                        echo '<p class="empty__note">Không có sản phẩm nào trong giỏ hàng của bạn.</p>';
                        echo '<a href="../home.php" class="empty__btn">Tiếp tục mua sắm</a>';
                        echo '</div>';
                    }
                    ?>
                </ul>
            </div>
        </div>
        <?php
            $sum = json_decode(Cart::Display());
            if(isset($_SESSION['Cart']) && $sum->Count >0){
            echo '<div class="cart-total-prices">';
            echo '<div class="cart-total-prices__inner">';
            echo '  <div class="prices">';
            echo '    <div class="prices__total">';
            echo '      <span class="prices__text">Thành tiền</span>';
            echo '      <span class="prices__value--final">';
                            $totalfinal = json_decode(Cart::Display()); 
                            echo number_format($totalfinal->TongTien);
                            echo'đ';
            echo '      </span>';
            echo '    </div>';
            echo '  </div>';
            
                if(isset($_SESSION["dangnhap"]) && $totalfinal->TongTien > 0){
                    echo "<a href='Payment.php' class='cart__submit'>Tiến hành đặt hàng</a>";
                }
                else if(!isset($_SESSION["dangnhap"]) && $totalfinal->TongTien > 0){
                    echo "<a href='../login.php' class='cart__submit'>Tiến hành đặt hàng</a>";
                }
                else{
                    echo "<div class='cart__submit err' value='0'>Tiến hành đặt hàng</div>";
                }
            }
            echo '</div>';
            echo '</div>';
        ?>
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
<script>
    $(document).ready(function() {
        $(".err").click(function(){
            Swal.fire({
                icon: 'error',
                title: 'Giỏ hàng rỗng',
            })
        });
        $('.qty-input').change(function(){
            $.ajax({
                url: "XLGioHang.php",
                data: {
                    "ma_sp": $(this).data("masp"),
                    "so_luong": $(this).val(),
                    "hanh_dong": "update"
                },
                dataType: "json",
                success: function(data){
                    $(".nb-pds").html(data.Count);
                    $('.prices__value--final').html(number_format(data.TongTien)+' đ');
                }
            });
        });
        $(".qty-increase").click(function(){
            $.ajax({
                url: "XLGioHang.php",
                data: {
                    "ma_sp": $(this).data("masp"),
                    "so_luong": 1, 
                    "hanh_dong": "them"
                },
                dataType: "json",
                success: function(data){
                    $(".nb-pds").html(data.Count);
                    $('.prices__value--final').html(number_format(data.TongTien)+' đ');
                }
            });
            var text = Number($(this).parent().find(".qty-input").val())+Number(1);
            $(this).parent().find(".qty-input").val(text);
        });
        $(".qty-decrease").click(function(){
            if($(this).parent().find(".qty-input").val() > 1 ){
                $.ajax({
                    url: "XLGioHang.php",
                    data: {
                        "ma_sp": $(this).data("masp"),
                        "so_luong": 1,
                        "hanh_dong": "bot"
                    },
                    dataType: "json",
                    success: function(data){
                        $(".nb-pds").html(data.Count);
                        $('.prices__value--final').html(number_format(data.TongTien)+' đ');
                    }
                });
                var text = Number($(this).parent().find(".qty-input").val())-Number(1);
                $(this).parent().find(".qty-input").val(text);
            }
        });
        $('.cart-products__del').click(function(){
            $.ajax({
                url: "XLGioHang.php",
                data: {
                    "ma_sp": $(this).data("masp"),
                    "hanh_dong": "xoa"
                },
                dataType: "json",
                success: function(data){
                    $(".nb-pds").html(data.Count);
                    $('.prices__value--final').html(number_format(data.TongTien)+' đ');
                    LaySPGioHang();
                }
            });
        });
	});
</script>
<script>
function validate(e) {
    var charCode = e.keyCode? e.keyCode : e.charCode
    if (!(charCode >= 48 && charCode <= 57)) {
        if(!(charCode>=37 && charCode<=40))
            if(charCode!=8 && charCode!=46)
            return false;
    }
}
function number_format (number, decimals, dec_point, thousands_sep) {
    // Strip all characters but numerical ones.
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}
</script>

</html>