<?php
        session_start();
        include_once("DataProvider.php");
        if(isset($_POST['dangky']))
        {
            $firstname = $_POST['firstname'];
            $username = $_POST['user'];
            $password = $_POST['pass'];
            $Repass   = $_POST['repass'];
            $diachi = $_POST['address'];
            $sdt   = $_POST['sdt'];
            $email  = $_POST['email'];
            $sql = "INSERT INTO khachhang (`TenDN`, `MatKhau`, `HoTen`,`DiaChi`, `DienThoai`, `Email`)VALUES ('$username' , '$password' ,' $firstname' , '$diachi' ,'$sdt' , '$email' )";
            $result = DataProvider::ExecuteQuery($sql);

            if($password == $Repass)
            {
                header("location:login.php");
            }
        }
    ?>