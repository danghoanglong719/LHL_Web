<!--cột giữa-->
				    
				         <table class="table table-hover">
				             <tr>
				                <th scope="col">Mã SP</th>
				                <th scope="col">Mã Loại</th>
				                <th scope="col">Tên SP</th>
				                <th scope="col">Giá</th>
				                <th scope="col">Màu Sắc</th>
				                <th scope="col">Vật liệu</th>
				                <th scope="col">Mô tả</th>
				                <th scope="col">Hình</th>
				                <th scope="col" colspan="2">Thao tác</th> 
				            </tr>
				    <?php
				        include_once("../DataProvider.php");
				        $sql = "SELECT * FROM sanpham";
				         $result = DataProvider::ExecuteQuery($sql);
				            while($row = $result->fetch())
				                 {
				                    $_SESSION['MaSP'] =$row['MaSP'];
				                    $_SESSION['MaLoai'] =$row['MaLoai'];
				                    $_SESSION['TenSanPham'] =$row['TenSanPham'];
				                    $_SESSION['GiaBan'] =$row['GiaBan'];
				                    $_SESSION['MauSac'] =$row['MauSac'] ;
				                    $_SESSION['VatLieu'] =$row['VatLieu'];
				                    $_SESSION['MoTa'] =$row['MoTa'] ;
				                    $_SESSION['Hinh'] =$row['Hinh'] ;
				              
				     ?>
				        <tr>
				            <td><?= $row['MaSP'] ?></td>
				            <td><?= $row['MaLoai'] ?></td>
				            <td><?= $row['TenSanPham'] ?></td>
				            <td><?= $row['GiaBan'] ?></td>
				            <td><?= $row['MauSac'] ?></td>
				            <td><?= $row['VatLieu'] ?></td>
				            <td><?= $row['MoTa'] ?></td>
				            <td> <img src="../../img/<?= $row['Hinh'] ?> "style="width:80px; height=80px" /></td>
				           <td><a href="Manager.php?id=<?= $row['MaSP'] ?> "onclick="Notification()" >Xóa</a></td>
				           <td><a href="edit_product.php?edit=<?= $row['MaSP'] ?> " >Sửa</a></td>

				        </tr>
				        
				    <?php }?>
				   		</table>

     
        <?php


    include_once("../DataProvider.php");
     if(isset($_GET['id']))
     {
                $product_id = $_GET['id'];
               
                $sql = "DELETE FROM `sanpham` WHERE  `MaSP` = '$product_id'";
                $result = DataProvider::ExecuteQuery($sql);
                if($result==true)
                {
                   @  header("location:Manager.php");
                }
                else{
                    echo "that bai";
                }
     }
                

?>