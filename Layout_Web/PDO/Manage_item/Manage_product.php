
<form action="post">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">MASP</th>
                <th scope="col">Loại</th>
                <th scope="col">Tên SP</th>
                <th scope="col">Giá</th>
                <th scope="col">Màu</th>
                <th scope="col">Vật liệu</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Hình</th>
                <th scope="col">Thêm</th>
                <th scope="col">Sửa</th>
                <th scope="col">Xóa</th>
            </tr>
        </thead>
        <tbody>

<?php
    include_once("DataProvider.php");

    $sqlSP = "SELECT MaSP, MaLoai, TenSanPham, GiaBan,MauSac,VatLieu, MoTa, Hinh FROM sanpham";
    $dsSP  = DataProvider::ExecuteQuery($sqlSP);

    while($row = $dsSP -> fetch()){
        $gia = number_format($row['GiaBan']);
     

        $hang = <<<EOD
         <tr>
            <td>{$row['MaSP']}</td>
            <td>{$row['MaLoai']}</td>
            <td>{$row['TenSanPham']}</td>
            <td>{$row['GiaBan']}</td>
            <td>{$row['MauSac']}</td>
             <td>{$row['VatLieu']}</td>
            <td><div  style="overflow:hidden" >{$row['MoTa']}</div></td>
            <td><img width="50px" height="50px" src="../img/{$row['Hinh']}"></td>

            <td><a href ="Manage_item/add.php?id={$row['MaSP']}"> <input type = button value=Thêm></a></td>
            <td><a href ="Manage_item/edit_product.php?id={$row['MaSP']}"> <input type = button value=Sửa></a></td>
            <td><a href ="Manage_item/delete_product.php?id={$row['MaSP']}"> <input type = button value=Xóa></a></td>
            
        </tr>

EOD;
    echo $hang;
    }

?>


        </tbody>
    </table>
</form>




                               
                             
                        