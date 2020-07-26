<?php
session_start();
include_once("MyCart.php");

$maSP = $_REQUEST["ma_sp"];
$soluong = $_REQUEST["so_luong"];
$loai = $_REQUEST["hanh_dong"];
switch($loai)
{
	case "them":
		Cart::InsertCart($maSP,$soluong);
		break;
	case "bot":
		Cart::MinusCart($maSP,$soluong);
		break;
	case "xoa":
		Cart::DeleteCart($maSP);
		break;
	case "update":
		Cart::UpdateCart($maSP,$soluong);
		break;
}
echo Cart::Display();
?>