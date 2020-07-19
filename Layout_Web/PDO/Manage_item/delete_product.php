<?php
	
	$link = new mysqli('localhost','root','','furniture');
	if(isset($_GET['id'])){
		$MaSP = $_GET['id'];
		$query = "DELETE FROM `sanpham` WHERE `sanpham`.`MaSP` = $MaSP";
		mysqli_query($link,$query) or die ("Xóa thất bại");
		header('location:../Manager.php');
	}
?>