<form action="post">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Mã KH</th>
                <th scope="col">Username</th>
                <th scope="col">Họ tên</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Điện thoại</th>
                <th scope="col">Email</th>
                <th scope="col">Thêm</th>
                <th scope="col">Sửa</th>
                <th scope="col">Xóa</th>
            </tr>
        </thead>
        <tbody>

            <?php
                include_once("../DataProvider.php");

                $sqlSP = "SELECT * FROM khachhang";
                $dsSP  = DataProvider::ExecuteQuery($sqlSP);

                while($row = $dsSP -> fetch()){
                    $hang = <<<EOD
                         <tr>
                            <td>{$row['MaKH']}</td>
                            <td>{$row['TenDN']}</td>
                            <td>{$row['HoTen']}</td>
                            <td>{$row['DiaChi']}</td>
                            <td>{$row['DienThoai']}</td>
                            <td>{$row['Email']}</td>
                           
                           
                            <td><a href ="Manage_item/add_user.php?id={$row['MaKH']}"> <input type = button value=Thêm></a></td>
                            <td><a href ="Manage_item/edit_user.php?id={$row['MaKH']}"> <input type = button value=Sửa></a></td>
                            <td><a href ="Manage_item/delete_user.php?id={$row['MaKH']}"> <input type = button value=Xóa></a></td>
                            
                        </tr>
EOD;
                    echo $hang;
                }

            ?>

        </tbody>
    </table>
</form>

