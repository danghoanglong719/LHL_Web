<?php
if(!isset($_SESSION['QTV'])){
    header('location:../home.php');
}
include_once("../DataProvider.php");
if(isset($_GET['idsp']))
{
    $product_id = $_GET['idsp'];

    $sql = "DELETE FROM `sanpham` WHERE  `MaSP` = '$product_id'";
    $result = DataProvider::ExecuteQuery($sql);
    if($result)
    {
        header("location:Manager.php");
    }
}
?>

<?php
    include_once("../DataProvider.php");
    if(isset($_GET['idadmin']))
    {
        $user_id = $_GET['idadmin'];

        $sql = "DELETE FROM `admin` WHERE  `id_admin` = '$user_id'";
        $result = DataProvider::ExecuteQuery($sql);
        if($result==true)
        {
            header("location:QuanLyAdmin.php");
        }
    }
?>
<?php
include_once("../DataProvider.php");
if(isset($_GET['iduser']))
{
    $user_id = $_GET['iduser'];

    $sql = "DELETE FROM `khachhang` WHERE  `MaKH` = '$user_id'";
    $result = DataProvider::ExecuteQuery($sql);
    if($result==true)
    {
        header("location:QuanLyAccount.php");
    }
}
?>
<?php
include_once("../DataProvider.php");
if(isset($_GET['idloai']))
{
    $maloai = $_GET['idloai'];

    $sql = "DELETE FROM `loaisp` WHERE  `MaLoai` = '$maloai'";
    $result = DataProvider::ExecuteQuery($sql);
    if($result==true)
    {
        header("location:QuanLyLoaiSP.php");
    }
}
?>
