<?php
    include_once('../DataProvider.php');
    $sosp1trang = 10;

    $sqlrow = "SELECT MaHD FROM `hoadon`";
    $rows = DataProvider::ExecuteQuery($sqlrow);
    $count = $rows->fetchAll(PDO::FETCH_ASSOC);
    $tongsosp = count($count);
    $sotrang = ceil($tongsosp / $sosp1trang);
    
    for($i=1; $i<=$sotrang; $i++){
        echo "<a class='pt_a' href='QuanLyHoaDon.php?page=$i' value='$i'> $i</a>";
    }
?>