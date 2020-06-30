<?php
class DataProvider 
{
	public static function ExecuteQuery($sql)
	{
		try{
			$dsn = "mysql:host=localhost;dbname=furniture";
			$dbh = new PDO($dsn, "root", "");
			$dbh->query("SET NAMES utf8");
			$result = $dbh->query($sql);
		}catch(Exception $ex){
			echo "Lỗi: ";
		}
		finally{
			$dbh = null;
		}

		return $result;
	}
}
?>