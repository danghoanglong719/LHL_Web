<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager</title>

    <link rel="stylesheet" href="../../css/Home.css">
    <link rel="stylesheet" type="text/css" href="../../css/manager.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="../../OwlCarousel2-2.3.4/src/js/owl.carousel.js">
    <link rel="stylesheet" href="../../OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="../../OwlCarousel2-2.3.4/dist/assets/owl.theme.green.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
</head>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../js/jquery/jquery-3.5.0.min.js"></script>
<script src="../../OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>



<body>
        

<?php
    include_once("../DataProvider.php");
    //var_dump($_GET['edit']);exit;
    if(isset($_POST['create']) )
    {
         if($_FILES['Hinh']['error'] == 0)
        {
            $MaSP = $_POST['MaSP'];
            $MaLoai = $_POST['ID'];
            $TenSanPham = $_POST['TenSP'];
            $GiaBan = $_POST['GiaBan'];
            $MauSac = $_POST['Color'];
            $VatLieu = $_POST['VatLieu'];
            $MoTa = $_POST['MoTa'];
               if(move_uploaded_file($_FILES['Hinh']["tmp_name"], "../../img/".$_FILES['Hinh']["name"]))
            {

                $sql = "INSERT INTO `sanpham`(`MaSP` ,`MaLoai`, `TenSanPham`, `GiaBan`, `MauSac`, `VatLieu`, `MoTa`, `Hinh`) VALUES ('$MaSP','$MaLoai', '$TenSanPham', '$GiaBan',' $MauSac','$VatLieu', ' $MoTa' ,'{$_FILES['Hinh']["name"]}' )";
                $result = DataProvider::ExecuteQuery($sql);
                if($result==true)
                {
                     echo "thanh cong";
                     header("location:Manager.php");
                }
                    else {
                      echo "that bai";
                    
                }

            }
        }
    }

?>


<div class="container-fluid bg"> 
            <div class="row">
                <div class="col-md-4 col-sm-3 col-xs-12"></div>
                <div class="col-md-4 col-sm-6 col-xs-12 border border-success rounded" style="padding:20px">
                    <form class="form-container " id="formLogin" method="POST" enctype="multipart/form-data">
                        <h2 align="center">Thêm Sản Phẩm</h2>
                        <div class="form-group">
                            <div class="form-inline">
                                <label for="optMaLoai" class="col-sm-4">Mã Loại</label>
                                <select id="optMaLoai" class="form-control col-sm-8">
                                    <?php
                                        include_once("../DataProvider.php");
                                        $sql = "SELECT MaLoai, TenLoai FROM loaisp";
                                        $query = DataProvider::ExecuteQuery($sql);
                                        while ($row = $query -> fetch()){
                                            echo "<option value={$row['MaLoai']}> {$row['TenLoai']} </option>";
                                        }
                                    ?>  
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-inline">
                                <label for="TenSP" class="col-sm-4">Tên Sản Phẩm</label>
                                <input type="text" name="TenSP" id="TenSP" class="form-control col-sm-8" >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-inline">
                                <label for="GiaBan" class="col-sm-4">Giá Bán</label>
                                <input type="text" name="GiaBan" id="GiaBan"class="form-control col-sm-8"  >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-inline">
                                <label for="Color" class="col-sm-4">Màu Sắc</label>
                                <input type="text" name="Color" id="Color" class="form-control col-sm-8" >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-inline">
                                <label for="VatLieu" class="col-sm-4">Vật Liệu</label>
                                <input type="text" name="VatLieu" id="VatLieu" class="form-control col-sm-8">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-inline">
                                <label for="MoTa" class="col-sm-4">Mô tả</label>
                                <input type="text" name="MoTa" id="MoTa" class="form-control col-sm-8" >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-inline">
                                <label for="Status" class="col-sm-4">Trạng thái</label>
                                <input type="text" name="Status" id="Status" class="form-control col-sm-8" placeholder="Null">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-inline">
                                <label for="Hinh" class="col-sm-4">Hình</label>
                                <input type="file" name="Hinh" id="Hinh" class="form-control col-sm-8"  >
                            </div>
                        </div>
                        <div id="myErr"></div>
                        <button type="submit" class="btn btn-success btn-block" id="btnSignUp" value="SignUp" name="create" onclick="return confirm('Bạn Có Chắc Muốn Thêm');">Đồng Ý</button>
                        
                    </form>
                </div>
                <div class="col-md-4 col-sm-3 col-xs-12"></div>
            </div>
        </div>
    </body>
</html>