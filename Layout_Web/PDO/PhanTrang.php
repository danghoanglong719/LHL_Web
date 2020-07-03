<?php
    include_once('DataProvider.php');
    $sosp1trang = 6;
    if(isset($_REQUEST['trang_ht'])){
        $trang = $_REQUEST['trang_ht'];
        settype($trang, "int");
    }else{
        $trang = 1;
    }
    $from = ($trang - 1) * $sosp1trang;

    if(isset($_REQUEST['ma_loai_sp']) && $_REQUEST['ma_loai_sp'] != "all" ){
        $qrloai = "MaLoai = {$_REQUEST['ma_loai_sp']}";
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
        echo "<a class='pt_a' href='products.php?page=$i' value='$i'>Trang $i</a> - ";
    }
?>