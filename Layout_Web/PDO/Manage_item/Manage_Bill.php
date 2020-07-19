<form action="post">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Mã đơn hàng</th>
                <th scope="col">Ngày đặt</th>
                <th scope="col">Nơi giao</th>
                <th scope="col">MaKH</th>
                <th scope="col">Tình trạng</th>
                <th scope="col">Thêm</th>
                <th scope="col">Sửa</th>
                <th scope="col">Xóa</th>
            </tr>
        </thead>
        <tbody>

<?php
    include_once("../DataProvider.php");

    $sqlSP = "SELECT MaSP, MaLoai, TenSanPham, GiaBan,MauSac,VatLieu, MoTa, Hinh FROM sanpham";
    $dsSP  = DataProvider::ExecuteQuery($sqlSP);

        while($row = $dsSP -> fetch()){
                $gia = number_format($row['GiaBan']);
             

                $hang = <<<EOD
                 <tr>
                    <td>{$row['MaHD']}</td>
                    <td>{$row['NgayDat']}</td>
                    <td>{$row['NoiGiao']}</td>
                    <td>{$row['MaKH']}</td>
                    <td>{$row['TinhTrang']}</td>
            
                    <td><a href ="Manage_item/add_bill.php?id={$row['MaHD']}"> <input type = button value=Thêm></a></td>
                    <td><a href ="Manage_item/edit_bill.php?id={$row['MaHD']}"> <input type = button value=Sửa></a></td>
                    <td><a href ="Manage_item/delete_bill.php?id={$row['MaHD']}"> <input type = button value=Xóa></a></td>
                    
                </tr>
EOD;
        echo $hang;
        
    }

?>


        </tbody>
    </table>
</form>
