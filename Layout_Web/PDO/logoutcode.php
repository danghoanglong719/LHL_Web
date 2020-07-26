
<?php        
       session_start();
       include_once("DataProvider.php");  
       ob_start(); 
       unset($_SESSION['dangnhap']);
       unset($_SESSION['xemganday']);
       if(isset($_SESSION['QTV'])){
              unset($_SESSION['QTV']);   
       };
       header("location:home.php");
       ob_end_clean();
    
       
?>
