
<?php        
       session_start();
       include_once("DataProvider.php");  
       ob_start(); 
       unset($_SESSION['dangnhap']);
       header("location:home.php");
       ob_end_clean();
      

?>