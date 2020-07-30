<?php
 session_start();
 if(!isset($_SESSION['QTV'])){
    header('location:../home.php');
}
?>
<?php
    include_once("../DataProvider.php");
    if(isset($_POST['addcategory']) )
    {
        $TenLoai = $_POST['TenLoai'];
        $sql = "INSERT INTO `loaisp`(`TenLoai`) VALUES ('$TenLoai')";
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
<div class="container-fluid bg">
            <div class="row">
                <div class="col-md-4 col-sm-3 col-xs-12 mt-4"></div>
                <div class="col-md-4 col-sm-6 col-xs-12 border border-success rounded mt-4" style="padding:20px">
                    <form class="form-container mt-1" id="formAddCatagory" method="POST" enctype="multipart/form-data">
                        <h2 style="text-align:center">Thêm Loại</h2>
                        <div class="form-group">
                            <div class="form-inline">
                                <label for="TenLoai" class="col-sm-4">Tên Loại</label>
                                <input type="text" name="TenSP" id="TenLoai" class="form-control col-sm-8" >
                            </div>
                        </div>
                        <div id="myErr"></div>
                        <button type="submit" class="btn btn-success btn-block" id="btnAddCatagory" value="AddCategory" name="addcategory" onclick="return confirm('Bạn Có Chắc Muốn Thêm');">Đồng Ý</button>

                    </form>
                </div>
                <div class="col-md-4 col-sm-3 col-xs-12 mt-4"></div>
            </div>
        </div>
    </body>
</html>