<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager</title>

    <link rel="stylesheet" href="../css/Home.css">
    <link rel="stylesheet" type="text/css" href="../css/manager.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="../OwlCarousel2-2.3.4/src/js/owl.carousel.js">
    <link rel="stylesheet" href="../OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="../OwlCarousel2-2.3.4/dist/assets/owl.theme.green.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <style type="text/css">    
        label.error {   color:red;}
        input.error {   color:red;}
    </style>
</head>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/jquery/jquery-3.5.0.min.js"></script>
<script src="../OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>



<body>
<?php
    include_once("../DataProvider.php");
    //var_dump($_GET['edit']);exit;
    if(isset($_GET['edit']) && isset($_POST['editproduct']))
    {   
        $MaLoai = $_POST['ID'];
        $TenSanPham = $_POST['TenSP'];
        $GiaBan = $_POST['GiaBan'];
        $MauSac = $_POST['MauSac'];
        $VatLieu = $_POST['VatLieu'];
        $MoTa = $_POST['MoTa'];
        $Hinh = $_POST['Hinh'];
        $id= $_GET['edit'];
        $sql = "UPDATE `sanpham` SET `MaLoai`='$MaLoai',`TenSanPham`='$TenSanPham',`GiaBan`='$GiaBan',`MauSac`='$MauSac',`VatLieu`='$VatLieu',`MoTa`='$MoTa',`Hinh`='$Hinh' where  MaSP='$id' and MaLoai ='$MaLoai' ";
        $result = DataProvider::ExecuteQuery($sql);
     
        if($result==true)
        {
            echo"thanhcong";
            header("location:Manager.php");
        }
        else{
            echo"thatbai";
        }
    }

?>
<?php
    //placeholder
    $sqlEdit = "SELECT * FROM sanpham WHERE MaSP = {$_GET['edit']}";
    $SpEdit = DataProvider::ExecuteQuery($sqlEdit);
    $row = $SpEdit->fetch();
    $mloai = $row['MaLoai'];
    $tspham = $row['TenSanPham'];
    $gban = $row['GiaBan'];
    $msac = $row['MauSac'];
    $vlieu = $row['VatLieu'];
    $mta = $row['MoTa'];
    $img = $row['Hinh'];
?>
<div class="container-fluid bg"> 
    <div class="row">
        <div class="col-md-4 col-sm-3 col-xs-12"></div>
        <div class="col-md-4 col-sm-6 col-xs-12 border border-success rounded">
            <form class="form-container" id="formEditProduct" method="POST" >
                <h3>Thay đổi thông tin sản phẩm</h3>
                <div class="form-group">
                    <div class="form-inline">
                        <label for="ipMaLoai" class="col-sm-4">Mã loại</label>
                        <input type="text" name="ID"  class="form-control col-sm-8"value="<?php echo $mloai;?>"  >
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-inline">
                        <label for="ipTenSanPham" class="col-sm-4">Tên sản phẩm</label>
                        <input type="text" name="TenSP"  class="form-control col-sm-8"value="<?php echo $tspham ;?>" >
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-inline">
                        <label for="ipGiaBan" class="col-sm-4">Giá bán</label>
                        <input type="text" name="GiaBan" class="form-control col-sm-8"value="<?php echo $gban ;?>" >
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-inline">
                        <label for="ipMauSac" class="col-sm-4">Màu sắc</label>
                        <input type="text" name="MauSac"  class="form-control col-sm-8" value="<?php echo $msac ;?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-inline">
                        <label for="ipVatLieu" class="col-sm-4">Vật liệu</label>
                        <input type="text" name="VatLieu" class="form-control col-sm-8"value="<?php echo $vlieu ;?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-inline">
                        <label for="ipMoTa" class="col-sm-4">Mô tả</label>
                        <input type="text" name="MoTa"  class="form-control col-sm-8" value="<?php echo $mta ;?>" >
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-inline">
                        <label for="ipHinh" class="col-sm-4">Hình</label>
                        <input type="file" name="Hinh"  class="form-control col-sm-8"  value="<?php echo $img ;?>">
        
                    </div>
                </div>
                <div id="myErr"></div>
                <button type="submit" class="btn btn-success btn-block" id="btnEdit" value="EditProduct" name="editproduct" onclick="return confirm('Bạn Có Chắc Muốn Thay Đổi');">Đồng Ý</button>
            </form>
        </div>
    </div>
</div>
</body>
<script>
    $(document).ready(function(){
        $('#formEditProduct').validate({
            rules: {
                "ID":{required:true},
                "TenSP":{required:true},
                "GiaBan":{required:true, digits:true,},
                image:{required:true,},
            },
            messages:{
                "ID":{required:"Không được bỏ trống",},
                "TenSP":{required:"Không được bỏ trống",},
                "GiaBan":{required:"Không được bỏ trống",digits:"Chỉ nhập số"},
            },
        });
    })
</script>
</html>