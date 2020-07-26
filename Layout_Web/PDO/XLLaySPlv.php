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

    if(isset($_REQUEST['ma_loai_sp']) && $_REQUEST['ma_loai_sp'] != "0" ){
        $qrloai = "MaLoai = {$_REQUEST['ma_loai_sp']}";
    }
    else {
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
                                <a href="chitiet.php?id={$row['MaSP']}"name="xemganday">
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