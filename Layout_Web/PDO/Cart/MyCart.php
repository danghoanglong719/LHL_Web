<?php
class Cart
{
	public static function InsertCart($id)
	{
		if(isset($_SESSION["Cart"][$id]))
			$_SESSION["Cart"][$id]++;
		else
			$_SESSION["Cart"][$id] = 1;
	}
	
	public static function DeleteCart($id)
	{
		if(isset($_SESSION["Cart"][$id]))
			unset($_SESSION["Cart"][$id]);
	}
	
	public static function UpdateCart($id, $quantity)
	{
		if(isset($_SESSION["Cart"][$id]))
			$_SESSION["Cart"][$id] = $quantity;
	}
	
	public static function Display()
	{
		@include_once("../DataProvider.php");
		@include_once("./DataProvider.php");
		$sum = 0;
        $somh = 0;
		$count = 0;
		$totalfinal = 0;
		if(isset($_SESSION['Cart'])){
			foreach($_SESSION['Cart'] as $MaSP => $SoLuong)
			{
				$rs= DataProvider::ExecuteQuery("SELECT GiaBan FROM sanpham WHERE MaSP = $MaSP");
				$row = $rs->fetch();
                $sum += $SoLuong * $row['GiaBan'];
				$count += $SoLuong;
				$totalfinal += $sum;
			}
			$somh = count($_SESSION['Cart']);
		}
		$result = array(
			"SoMH" => $somh,
            "TongTien" => $sum,
			"Count" => $count,
			"TotalFinal" => $totalfinal
		);

		return json_encode($result);
	}
}
?>