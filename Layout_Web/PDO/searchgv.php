<?php
	include_once("DataProvider.php");
    if(isset($_GET['search'])){
        $chuoi = $_GET['search'];
        $sql = "SELECT * FROM `sanpham` WHERE `TenSanPham` LIKE '%{$chuoi}%' GROUP BY MaSP";
        $result = DataProvider::ExecuteQuery($sql);
        while ($row = $result -> fetch()) {
            $gia = number_format($row['GiaBan']);
            $chuoi = <<< EOD
            <div class="col-md-12 box sofa">
                <div class="view-item">
                    <div class="card h-60 mb-3">
                        <div id="vi"></div>
                        <div class="row ">
                            <div class="col-md-5  ">
                                <a href="# "> <img class="card-img-top img-fluid " src="../img/{$row['Hinh']}"></a>
                            </div>
                            <div class="col-md-7">
                                <div style="text-align: center;" class="text-product">
                                    <p class=" text-center justify-content-center">{$row['MoTa']}</p>
                                </div>
                                <div style="margin-bottom: 10px;text-align: center; ">
                                    <h5>{$row['TenSanPham']}</h5>
                                    <p class=" text-center">{$gia}đ</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body col-md-12">
                            <div class="face-2">
                                <div class="buy">
                                    <a href="chitiet.php?id={$row['MaSP']}"name="xemganday">
                                        <i class="far fa-eye"></i>
                                    </a>
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