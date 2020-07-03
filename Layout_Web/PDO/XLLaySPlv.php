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
        if(isset($_GET['id'])){
            $qrloai = "MaLoai = {$_GET['id']}";
        }
        $qrloai = "1 = 1";
    }
    if(isset($_REQUEST['gia_sp']) && $_REQUEST['gia_sp'] != "all" ){
        $qrgia = "GiaBan <= $_REQUEST[gia_sp] ORDER BY GiaBan";
    }
    else {
        $qrgia = "1 = 1";
    }

    $sqlSanPham = "SELECT MaSP, MaLoai, TenSanPham, GiaBan, MoTa, Hinh FROM sanpham WHERE {$qrloai} AND {$qrgia} LIMIT $from, $sosp1trang";
    echo $sqlSanPham;
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
                                <a href="#"><i class="far fa-eye"></i></a>
                            </div>
                            <div class="icon-buy  justify-content-center">
                                <div> <a href="# "><i class="add-cart fas fa-shopping-cart "></i></a></div>
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