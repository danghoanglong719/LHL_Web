<?php
    session_start();
    include_once("../DataProvider.php");
    //var_dump($_GET['edit']);exit;
    if(isset($_GET['id']))
    {   
        $id= $_GET['id'];
        
        $sql = 
        "SELECT hoadon.MaHD, NgayDat, NoiGiao, TinhTrang,HoTenhd, Emailhd, DienThoaihd,
            SoDH, chitiethd.MaSP, SoLuong,
            hoadon.MaKH, HoTen, DiaChi, Email ,DienThoai,
            chitiethd.MaSP, MaLoai, TenSanPham, GiaBan, MauSac, VatLieu, MoTa, Status 
        FROM hoadon, chitiethd, khachhang, sanpham 
        WHERE hoadon.MaHD= $id AND hoadon.MaHD = chitiethd.MaHD AND khachhang.MaKH = hoadon.MaKH 
            AND chitiethd.MaSP = sanpham.MaSP ";
        $result = DataProvider::ExecuteQuery($sql);
        $row = $result->fetch();

        $htenMua=$row['HoTenhd'];
        $emailMua=$row['Emailhd'];
        $dthoaiMua=$row['DienThoaihd'];
        $dchiMua=$row['NoiGiao'];

        $htenDat=$row['HoTen'];
        $emailDat=$row['Email'];
        $dthoaiDat=$row['DienThoai'];
        $dchiDat=$row['DiaChi'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết hóa đơn</title>
    <link rel="stylesheet" href="cthoadon.css">
</head>

<body>
<header>
    <div class="header-container plr">
        <div class="logo">
        <a href="QuanLyHoaDon.php"><img class="icon" src="../../img/icon/icons8-back-50.png" width="35px" style="padding-top: 10px;"></a>
            <div class="text">
                Chi tiết hóa đơn
            </div>
        </div>
    </div>
</header>
<div class="main">
    <div class="bill-details">
        <div class="bill-inner">
            <h2 class="bill-details-title">Thông tin hóa đơn</h2>
            <div class="bill-details-inner">
                <table width="950px" class="" >
                    <tr>
                        <th width="100px">STT</th>
                        <th width="100px">Mã SP</th>
                        <th width="340px">Tên sản phẩm</th>
                        <th width="180px">Giá bán</th>
                        <th width="100px">Số lượng</th>
                        <th width="200px">Tổng cộng</th>
                    </tr>
                    <?php
                    $stt=1;
                    $final=0;
                    
                    $result = DataProvider::ExecuteQuery($sql);
                    while($row = $result->fetch()){
                    $maSP=$row['MaSP'];
                    $tensp=$row['TenSanPham'];
                    $gban=$row['GiaBan'];
                    $sluong=$row['SoLuong'];
                    $tcong = $gban * $sluong;
                    $tongtien = number_format($tcong);
                    $final += $tcong;
                    $chuoi=<<<EOD
                        <tr >
                            <td style="text-align:center;"> $stt </td>
                            <td style="text-align:center;"> $maSP</td>
                            <td style="text-align:center;"> $tensp</td>
                            <td style="text-align:center;"> $gban</td>
                            <td style="text-align:center;"> $sluong</td>
                            <td style="text-align:center;"> $tongtien </td>
                        </tr>
EOD;
    echo $chuoi;
    $stt++;
                    };
                    ?>
                </table>
            </div>
        </div>
    <div class="bill-total-prices">
        <div class="bill-total-prices__inner">
            <div class="prices">
                <div class="prices__total">
                    <span class="prices__text">Tổng tiền hóa đơn</span>
                    <span class="prices__value--final"><?php echo number_format($final);?>đ</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="info">
    <div class="info-mua">
        <table >
            <h2 class="bill-details-title">Thông tin người mua</h2>
            <tr height="30px">
                <td width="150px">Tên người mua: </td>
                <td >
                    <?php echo $htenMua; ?>
                </td>
            </tr>
            <tr height="30px" >
                <td >Email: </td>
                <td >
                    <?php echo $emailMua; ?>
                </td>
            </tr>       
            <tr height="30px" >
                <td >Điện thoại: </td>
                <td >
                    <?php echo $dthoaiMua; ?>
                </td>
            </tr>
            <tr height="30px" >
                <td valign="top" >Địa chỉ : </td>
                <td >
                    <?php echo $dchiMua; ?>
                </td>
            </tr>
        </table>
    </div>
    <div class="info-dat">
        <table  >
            <h2 class="bill-details-title">Thông tin tài khoản đặt hàng</h2>
            <tr height="30px" style="border-bottom: 1px solid red">
                <td width="150px">Tên người đặt: </td>
                <td >
                    <?php echo $htenDat; ?>
                </td>
            </tr>
            <tr height="30px" >
                <td >Email: </td>
                <td >
                    <?php echo $emailDat; ?>
                </td>
            </tr>       
            <tr height="30px" >
                <td >Điện thoại: </td>
                <td >
                    <?php echo $dthoaiDat; ?>
                </td>
            </tr>
            <tr height="30px" >
                <td valign="top" >Địa chỉ : </td>
                <td >
                    <?php echo $dchiDat; ?>
                </td>
            </tr>
        </table>
    </div>
</div>
</body>
<!--
<table width="1270px" >
    <tr>
        <td width="250px" ><b style="color:blue;font-size:20px" >Sản phẩm được đặt hàng </b><br><br> </td>   
        <td width="740px" align="right" >
        </td>       
    </tr>
    <tr>
        <td align="left" colspan="2" >
            <table width="880px" >
                <tr>
                    <td width="100px">STT</td>
                    <td width="100px">Mã SP</td>
                    <td width="300px">Tên sản phẩm</td>
                    <td width="180px">Giá bán</td>
                    <td width="100px">Số lượng</td>
                    <td width="200px">Tổng cộng</td>
                </tr>
                <?php
                $stt=1;
                $final=0;
                
                $result = DataProvider::ExecuteQuery($sql);
                while($row = $result->fetch()){
                $maSP=$row['MaSP'];
                $tensp=$row['TenSanPham'];
                $gban=$row['GiaBan'];
                $sluong=$row['SoLuong'];
                $tcong = $gban * $sluong;
                $tongtien = number_format($tcong);
                $final += $tcong;
                $chuoi=<<<EOD
                    <tr>
                        <td> $stt </td>
                        <td> $maSP</td>
                        <td> $tensp</td>
                        <td> $gban</td>
                        <td> $sluong</td>
                        <td> $tongtien </td>
                    </tr>
EOD;
    echo $chuoi;
    $stt++;
                };
                ?>
                <tr>
                    <td colspan="5">
                        <br><br>
                        Tổng tiền của đơn hàng là :
                        <?php
                            $finaltotal=number_format($final);
                            echo "<b>".$finaltotal."</b>";
                        ?>
                        <br><br>
                    </td>
                </tr>
            </table>
        </td>       
    </tr>

</table>
<br><br>
<table width="990px" >
    <tr>
        <td width="250px" ><b style="color:blue;font-size:20px" >Thông tin người mua</b><br><br> </td>
        <td width="740px" align="right" >
            &nbsp;
        </td>
    </tr>
    <tr height="30px" >
        <td >Tên người mua: </td>
        <td >
            <?php echo $htenMua; ?>
        </td>
    </tr>
    <tr height="30px" >
        <td >Email: </td>
        <td >
            <?php echo $emailMua; ?>
        </td>
    </tr>       
    <tr height="30px" >
        <td >Điện thoại: </td>
        <td >
            <?php echo $dthoaiMua; ?>
        </td>
    </tr>
    <tr height="30px" >
        <td valign="top" >Địa chỉ : </td>
        <td >
            <?php echo $dchiMua; ?>
        </td>
    </tr>
</table>
<table width="990px" >
    <tr>
        <td width="250px" ><b style="color:blue;font-size:20px" >Thông tin tài khoản đặt hàng</b><br><br> </td>
        <td width="740px" align="right" >
            &nbsp;
        </td>
    </tr>
    <tr height="30px" >
        <td >Tên người đặt: </td>
        <td >
            <?php echo $htenDat; ?>
        </td>
    </tr>
    <tr height="30px" >
        <td >Email: </td>
        <td >
            <?php echo $emailDat; ?>
        </td>
    </tr>       
    <tr height="30px" >
        <td >Điện thoại: </td>
        <td >
            <?php echo $dthoaiDat; ?>
        </td>
    </tr>
    <tr height="30px" >
        <td valign="top" >Địa chỉ : </td>
        <td >
            <?php echo $dchiDat; ?>
        </td>
    </tr>
</table>
<div class="main">
    <div class="bill-details">
        <div class="bill-inner">
            <h2 class="bill-details-title">Thông tin hóa đơn</h2>
            <div class="bill-details-inner">
            <table width="880px" >
                <tr>
                    <td width="100px">STT</td>
                    <td width="100px">Mã SP</td>
                    <td width="300px">Tên sản phẩm</td>
                    <td width="180px">Giá bán</td>
                    <td width="100px">Số lượng</td>
                    <td width="200px">Tổng cộng</td>
                </tr>
                <?php
                $stt=1;
                $final=0;
                
                $result = DataProvider::ExecuteQuery($sql);
                while($row = $result->fetch()){
                $maSP=$row['MaSP'];
                $tensp=$row['TenSanPham'];
                $gban=$row['GiaBan'];
                $sluong=$row['SoLuong'];
                $tcong = $gban * $sluong;
                $tongtien = number_format($tcong);
                $final += $tcong;
                $chuoi=<<<EOD
                    <tr>
                        <td> $stt </td>
                        <td> $maSP</td>
                        <td> $tensp</td>
                        <td> $gban</td>
                        <td> $sluong</td>
                        <td> $tongtien </td>
                    </tr>
EOD;
    echo $chuoi;
    $stt++;
                };
                ?>
            </div>
        </div>

    </div>
</div>
            -->