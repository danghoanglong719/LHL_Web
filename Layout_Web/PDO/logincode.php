
<?php        
 
    include_once("DataProvider.php");
   if(isset($_POST['dangnhap']))
   {
       $radioval = $_POST['radio'];
       $username = $_POST['uname'];
       $password = $_POST['psw'];
       if(empty($username) || empty($password))
       {
           echo '<p>Xin Nhập Đầy Đủ</P>';
       }
       else {
           $sql = "SELECT * FROM khachhang , admin ";
           $result = DataProvider::ExecuteQuery($sql);
      while( $row = $result->fetch()){
               if($username == $row['TenDN'] && $password == $row['MatKhau'] && $radioval == "0"){  
                $_SESSION['dangnhap'] =$row['HoTen'];
           
                    header("location:home.php");
                    }
                    else {
                        if($username == $row['TaiKhoan'] && $password == $row['MATKHAU'] && $radioval == "1" && $row['Block'] == 'Active'){

                            $_SESSION['QTV'] =$row['Lever'];
                            header("location:./Manager/Manager.php");
                        }
                    }
                    
             
       
       }
       }
   }
  

?>