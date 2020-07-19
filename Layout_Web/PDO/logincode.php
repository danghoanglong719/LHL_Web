
<?php        
 
    include_once("DataProvider.php");
   if(isset($_POST['dangnhap']))
   {
       $username = $_POST['uname'];
       $password = $_POST['psw'];
       if(empty($username) || empty($password))
       {
           echo '<p>Xin Nhập Đầy Đủ</P>';
       }
       else {
           $sql = "SELECT * FROM khachhang ";
           $result = DataProvider::ExecuteQuery($sql);
      while( $row = $result->fetch()){
               if($username == $row['TenDN'] && $password == $row['MatKhau']){  
                $_SESSION['dangnhap'] =$row['HoTen'];
                
                    header("location:home.php");
                    }
                    else {
                        echo '';
                    }
                    
             
       
       }
       }
   }
  

?>