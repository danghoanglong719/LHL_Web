<?php
    session_start();
    include_once("DataProvider.php");
    if(isset($_POST['dangky']))
    {
        $firstname = $_POST['firstname'];
        $username = $_POST['user'];
        $password = md5($_POST['pass']);
        $Repass   = md5($_POST['repass']);
        $diachi = $_POST['address'];
        $sdt   = $_POST['sdt'];
        $email  = $_POST['email'];
        $flag = false; // Username đã được sử dụng

        $sqlCheck = "SELECT TenDN FROM khachhang";
        $dsCheck = DataProvider::ExecuteQuery($sqlCheck);
        while($row = $dsCheck->fetch())
        {
            if($username == $row['TenDN']){
                $flag = true;
                break;
            }
        }
        if($flag == false){
            $sql = "INSERT INTO khachhang (`TenDN`, `MatKhau`, `HoTen`,`DiaChi`, `DienThoai`, `Email`)VALUES ('$username' , '$password' ,'$firstname' , '$diachi' ,'$sdt' , '$email' )";
            $result = DataProvider::ExecuteQuery($sql);

            if($password == $Repass)
            {
                header("location:login.php");
            }
        }
    }
?>