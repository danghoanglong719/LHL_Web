<?php
    include_once("DataProvider.php");
    if(isset($_GET['search'])){
        $chuoi = $_GET['search'];
        $sql = "SELECT * FROM `sanpham` WHERE `TenSanPham` LIKE '%{$chuoi}%' GROUP BY MaSP";
        $result = DataProvider::ExecuteQuery($sql);
        while ($row = $result -> fetch()) {
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
                                    <a href="chitiet.php?id={$row['MaSP']}" name="xemganday">
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
	}
?>