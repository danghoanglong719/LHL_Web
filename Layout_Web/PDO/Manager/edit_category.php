<?php
 session_start();
 if(!isset($_SESSION['QTV'])){
    header('location:../home.php');
}
?>
<?php
    include_once("../DataProvider.php");
    //var_dump($_GET['edit']);exit;
    if(isset($_GET['edit']) && isset($_POST['editcategory']))
    {
        $MaLoai = $_POST['MaLoai'];
        $TenLoai = $_POST['TenLoai'];
        $id= $_GET['edit'];
        $sql = "UPDATE `loaisp` SET `MaLoai`='$MaLoai',`TenLoai`='$TenLoai' where  MaLoai='$id' ";
        $result = DataProvider::ExecuteQuery($sql);

        if($result==true)
        {
            header("location:QuanLyLoaiSP.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin</title>

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
    //placeholder
    $sqlEdit = "SELECT * FROM loaisp WHERE MaLoai = {$_GET['edit']}";
    $SpEdit = DataProvider::ExecuteQuery($sqlEdit);
    $row = $SpEdit->fetch();
    $mloai = $row['MaLoai'];
    $tloai = $row['TenLoai'];
?>
<div class="container-fluid bg">
    <div class="row">
        <div class="col-md-4 col-sm-3 col-xs-12"></div>
        <div class="col-md-4 col-sm-6 col-xs-12 border border-success rounded">
            <form class="form-container mt-3 mb-3" id="formEditProduct" method="POST" >
                <h3>Thay đổi loại sản phẩm</h3>
                <div class="form-group">
                    <div class="form-inline">
                        <label for="MaLoai" class="col-sm-4">Mã loại</label>
                        <input type="text" name="MaLoai"  class="form-control col-sm-8"value="<?php echo $mloai;?>"  >
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-inline">
                        <label for="TenLoai" class="col-sm-4">Tên loại</label>
                        <input type="text" name="TenLoai"  class="form-control col-sm-8"value="<?php echo $tloai ;?>" >
                    </div>
                </div>
                <div id="myErr"></div>
                <button type="submit" class="btn btn-success btn-block" id="btnEdit" value="EditCategory" name="editcategory" onclick="return confirm('Bạn Có Chắc Muốn Thay Đổi');">Đồng Ý</button>
            </form>
        </div>
    </div>
</div>
</body>
<script>
    $(document).ready(function(){
        $('#formEditProduct').validate({
            rules: {
                "ipMaLoai":{required:true},
                "ipTenLoai":{required:true}
            },
            messages:{
                "ipMaLoai":{required:"Không được bỏ trống",},
                "ipTenLoai":{required:"Không được bỏ trống",},
            },
        });
    })
</script>
</html>