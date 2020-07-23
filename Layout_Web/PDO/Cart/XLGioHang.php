<?php
session_start();
include_once("MyCart.php");

$maSP = $_REQUEST["ma_sp"];
$loai = $_REQUEST["hanh_dong"];
switch($loai)
{
	case "them":
		Cart::InsertCart($maSP);
		echo Cart::Display();
		break;
}
?>