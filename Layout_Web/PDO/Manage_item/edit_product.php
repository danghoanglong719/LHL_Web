 <?php

        echo $_REQUEST['edit'];
        echo $_GET['id'];
        echo $_POST['LoaiHang'];
            $link = new mysqli('localhost','root','','furniture');
            if(isset($_POST['Update'])){
                $masp = $_GET['id'];
                $MaLoai = $_POST['LoaiHang'];
                $ten = $POST['tensp'];
                $gia = $_POST['gia'];
                $mau = $_POST['mau'];
                $vatlieu = $_POST['vatlieu'];
                $mota = $_POST['mota'];

                $query = "UPDATE `sanpham` SET `MaLoai` = '$MaLoai', `TenSanPham` = '$ten', `GiaBan` = '$gia', `MauSac` = '$mau', `VatLieu` = '$vatlieu', `MoTa` = '$mota' WHERE `sanpham`.`MaSP` = $masp;";

                mysqli_query($link, $query) or die ("không thành công");
                header("location:../Manager.php");

            }
            else echo "sai rồi";
?>


<form  method="POST" >
    <table class="table table-hover">
        <thead>
            
            <tr>
                <td scope="col">Loại</td>
                <td scope="col">
                    <select name = "LoaiHang">
                        <?php
                           include_once("../DataProvider.php");
                            $sql = "SELECT TenLoai,MaLoai FROM `loaisp`";
                            $dsloai = DataProvider::ExecuteQuery($sql);
                            while($row =$dsloai ->fetch()){
                                echo "<option value='{$row['MaLoai']}'>{$row['MaLoai']}</option>" ;
                            }
                        ?>

                    </select>

                </td>
            </tr>
            <tr>
                <td scope="col">Tên SP</td>
                <td scope="col"><input type="text" name="tensp" ></td>
            </tr>
            <tr>
                <td scope="col">Giá</td>
                <td scope="col"><input type="number" name="giasp" ></td>
            </tr>
            <tr>
                <td scope="col">Màu</td>
                <td scope="col"><input type="text" name="mau" ></td>
            </tr>
            <tr>
                <td scope="col">Vật liệu</td>
                <td scope="col"><input type="text" name="vatlieu"></td>
            </tr>
            <tr>
                <td scope="col">Mô tả</td>
                <td scope="col"><textarea row = 5 name= "mota"> </textarea></td>
            </tr>
            <tr>
                <td scope="col">Hình</td> 
                <td scope="col"><input type="file" name="hinh"></td> 
            </tr>

            <tr>
                <td scope="col"></td>
                    <td scope="col"> <input type="button" name="edit" value="Sửa">
                </td>
            </tr>
        </thead>

       

    </table>
</form>

