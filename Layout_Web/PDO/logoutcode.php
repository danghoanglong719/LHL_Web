
<?php        
       session_start();
       include_once("DataProvider.php");  
       ob_start(); 
       unset($_SESSION['dangnhap']);
       unset($_SESSION['xemganday']);
       if(isset($_SESSION['QTV'])){
              unset($_SESSION['QTV']);   
       };
       if(isset($_SESSION['diachi'])){
              unset($_SESSION['diachi']);
       };
       unset($_SESSION['sdt']);
       unset($_SESSION['makh']);
       header("location:home.php");
       ob_end_clean();
    
       
?>
