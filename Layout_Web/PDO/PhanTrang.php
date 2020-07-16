<?php
    include_once('DataProvider.php');
    $sosp1trang = 3;
    if(isset($_REQUEST['trang_ht'])){
        $trang = $_REQUEST['trang_ht'];
        settype($trang, "int");
    }else{
        $trang = 1;
    }
    $from = ($trang - 1) * $sosp1trang;

    if(isset($_REQUEST['ma_loai_sp']) && $_REQUEST['ma_loai_sp'] != "0" ){
        $qrloai = "MaLoai = {$_REQUEST['ma_loai_sp']}";
        $pro_id = $_REQUEST['ma_loai_sp'];
    }
    else {
        $pro_id = "0";
        $qrloai = "1 = 1";
    }
    if(isset($_REQUEST['gia_sp']) && $_REQUEST['gia_sp'] != "all" ){
        if($_REQUEST['gia_sp']==100000){
            $preprice = 0;
        }
        elseif($_REQUEST['gia_sp']==1000000){
            $preprice = 100000;
        }
        elseif($_REQUEST['gia_sp']==2000000){
            $preprice = 1000000;
        }
        elseif($_REQUEST['gia_sp']==5000000){
            $preprice = 2000000;
        }

        $qrgia = "GiaBan <= {$_REQUEST['gia_sp']} AND GiaBan >= {$preprice} ORDER BY GiaBan";
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
        echo "<a class='pt_a' href='products.php?id=$pro_id&page=$i' value='$i'>Trang $i</a> - ";
    }
?>
