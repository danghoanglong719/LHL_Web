<?php
include_once("../DataProvider.php");
if(isset($_SESSION['Cart'])){
    foreach($_SESSION['Cart'] as $MaSP => $SoLuong){
        $sqlSanPham = "SELECT * FROM sanpham WHERE MaSP = $MaSP";
        $rs= DataProvider::ExecuteQuery($sqlSanPham);
        $row = $rs->fetch();
        $sum = $SoLuong * $row['GiaBan'];
        $gia = number_format($row['GiaBan']);
        $chuoi = <<< EOD
        <li class="cart-products__product">
            <div class="cart-products__inner">
                <div class="cart-products__img">
                    <img src="../../img/{$row['Hinh']}">
                </div>
                <div class="cart-products__content">
                    <div class="cart-products__desc">
                        <p class="cart-products__name">{$row['TenSanPham']}</p>
                        <p class="cart-products__actions">
                            <span class="cart-products__del" data-masp={$row['MaSP']}>Xóa</span>
                        </p>
                    </div>
                    <div class="cart-products__details">
                        <div class="cart-products__prices">
                            <p class="cart-products__real-prices">{$gia}đ</p>
                        </div>
                        <div class="cart-products__qty">
                            <div class="qtty">
                                <span class="qty-decrease" data-masp={$row['MaSP']}>-</span>
                                <input type="tel" onkeydown="return validate(event)" class="qty-input" value="$SoLuong" data-masp={$row['MaSP']}>
                                <span class="qty-increase" data-masp={$row['MaSP']}>+</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </li>
EOD;
    echo $chuoi;
            }
        }
    ?>