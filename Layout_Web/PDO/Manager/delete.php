<?php
 include_once("../DataProvider.php");
 if(isset($_GET['id']))
 {
     $product_id = $_GET['id'];
     
     $sql = "DELETE FROM `sanpham` WHERE  `MaSP` = '$product_id'";
     $result = DataProvider::ExecuteQuery($sql);
     if($result)
     {
         header("location:Manager.php");

     }
     else{
         echo "that bai";
     }
 }

?>
                            
                            <?php
    include_once("../DataProvider.php");
    if(isset($_GET['id']))
    {
        $user_id = $_GET['id'];
        
        $sql = "DELETE FROM `admin` WHERE  `id_admin` = '$user_id'";
        $result = DataProvider::ExecuteQuery($sql);
        if($result==true)
        {
            header("location:Manager.php");
        }
        else{
            echo "that bai";
        }
    }
?>
