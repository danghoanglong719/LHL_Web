<!--cột giữa-->
<!---->
					         <table class="table table-hover">
				             <tr >
				                <th scope="col">Mã SP</th>
				                <th scope="col">Mã Loại</th>
				                <th scope="col" >Tên SP</th>
				                <th scope="col">Giá</th>
				                <th scope="col">Màu Sắc</th>
				                <th scope="col">Vật liệu</th>
								<th scope="col">Mô tả</th>
								<th scope="col">Trạng thái</th>
				                <th scope="col">Hình</th>
				                <th scope="col" colspan="2">Thao tác</th>
				            </tr>
				    <?php
						include_once("../DataProvider.php");
						$sosp1trang = 10;
						if(isset($_GET['page'])){
							$trang = $_GET['page'];
							settype($trang, "int");
						}else{
							$trang = 1;
						}
						$from = ($trang - 1) * $sosp1trang;
						$sql = "SELECT * FROM sanpham LIMIT $from, $sosp1trang";
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
									$_SESSION['Status'] =$row['Status'] ;
				                    $_SESSION['Hinh'] =$row['Hinh'] ;

				     ?>
				        <tr class="box">
				            <td ><?= $row['MaSP'] ?></td>
				            <td class="name0"><?= $row['MaLoai'] ?></td>
				            <td class="name"><?= $row['TenSanPham'] ?></td>
				            <td><?= $row['GiaBan'] ?></td>
				            <td><?= $row['MauSac'] ?></td>
				            <td><?= $row['VatLieu'] ?></td>
							<td><?= $row['MoTa'] ?></td>
							<td><?= $row['Status'] ?></td>
				            <td> <img src="../../img/<?= $row['Hinh'] ?> "style="width:80px; height=80px" /></td>
				           <td><a href="delete.php?idsp=<?= $row['MaSP'] ?> "onclick="return confirm('Bạn có chắc muốn xóa');" >Xóa</a></td>
				           <td><a href="edit_product.php?edit=<?= $row['MaSP'] ?> " >Sửa</a></td>
				        </tr>

				    <?php }?>
				   		</table>


        <?php





?>