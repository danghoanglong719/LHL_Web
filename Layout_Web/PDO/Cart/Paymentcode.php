<?php
if(!isset($_SESSION["Cart"]))
{
	header("location: ../home.php");
}
try{
	$dsn = "mysql:host=localhost;dbname=furniture";
	$dbh = new PDO($dsn, "root", "");
	$dbh->query("SET NAMES utf8");
    $dbh->beginTransaction();
    if(isset($_POST['payment']) && isset($_SESSION['dangnhap'])){

        $name = $_POST['name'];
        $telephone = $_POST['telephone'];
        $tinh = $_POST['tinh'];
        $quan = $_POST['quan'];
        $phuong = $_POST['phuong'];
        $diachi = $_POST['diachi'];

        $FinalAddress = $diachi .", ". $phuong .", ". $quan .", ". $tinh;
        $makh = $_SESSION['makh'];
        //Insert
        $sqlHD = "INSERT INTO `hoadon` (`MaHD`, `NgayDat`, `NoiGiao`, `MaKH`, `TinhTrang`, HoTenhd, Emailhd, DienThoaihd)
                                VALUES (NULL, now(), '$FinalAddress', '$makh', 'Mới đặt', '$name',NULL,'$telephone');";
        $dbh->query($sqlHD);
        $maHd = $dbh->lastInsertId();

        foreach($_SESSION['Cart'] as $MaSP => $SoLuong)
        {
            $sqlCTHD = "INSERT INTO `chitiethd` (`SoDH`, `MaSP`, `MaHD`, `SoLuong`) VALUES (NULL, '{$MaSP}', '{$maHd}', '{$SoLuong}');";
            $dbh->query($sqlCTHD);
        }
        $dbh->commit();
        unset($_SESSION['Cart']);
        header("location: ../home.php");

    }
}catch(Exception $ex){
	$dbh->rollBack();
}
finally{
	$dbh = null;
}
?>