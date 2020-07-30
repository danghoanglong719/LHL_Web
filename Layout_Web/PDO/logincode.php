<?php
    include_once("DataProvider.php");
    if(isset($_POST['dangnhap']))
    {
        $radioval = $_POST['radio'];
        $username = $_POST['uname'];
        $password = md5($_POST['psw']);
        $flag = false;
        if(empty($username) || empty($password))
        {
        }
        else {
            if($radioval == "0"){
                $sql = "SELECT * FROM khachhang ";
                $result = DataProvider::ExecuteQuery($sql);
                while( $row = $result->fetch()){
                    if($username == $row['TenDN'] && $password == $row['MatKhau']){
                        $flag = true;
                        $_SESSION['dangnhap'] = $row['HoTen'];
                        $_SESSION['makh'] = $row['MaKH'];
                        $_SESSION['sdt'] = $row['DienThoai'];
                        $_SESSION['diachi'] = $row['DiaChi'];
                        if(isset($_SESSION['dangnhap']) && isset($_SESSION['Cart'])) {
                            header("location:./Cart/Giohang.php");
                        }
                        else{
                            header("location:home.php");
                        }
                    }
                }
            }
            else{
                $sql = "SELECT * FROM `admin`";
                $result = DataProvider::ExecuteQuery($sql);
                while( $row = $result->fetch()){
                    if($username == $row['TaiKhoan'] && $password == $row['MatKhau']  && $row['Status'] == 'Active'){
                        $flag = true;
                        $_SESSION['dangnhap'] = $row['HoTenAdmin'];
                        $_SESSION['sdt'] = $row['DienThoai'];
                        $_SESSION['makh'] = $row['id_admin'];
                        $_SESSION['QTV'] = $row['Level'];
                        header("location:./Manager/Manager.php");
                    }
                }
            }
        }
    }
?>