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
            if($radioval == "0"){
                $sql = "SELECT * FROM khachhang ";
                $result = DataProvider::ExecuteQuery($sql);
                while( $row = $result->fetch()){
                    if($username == $row['TenDN'] && $password == $row['MatKhau']){ 
                        $_SESSION['dangnhap'] = $row['HoTen'];
                        if(isset($_SESSION['dangnhap']) && isset($_SESSION['Cart'])) {
                            header("location:./Cart/Giohang.php");
                        }
                        else{
                            $_SESSION['makh'] = $row['MaKH'];
                            $_SESSION['sdt'] = $row['DienThoai'];
                            $_SESSION['diachi'] = $row['DiaChi'];
                            header("location:home.php");
                        }
                    }
                }
                echo "<p style='color:red'>*Thông tin đăng nhập không đúng</p>";
            }
            else{
                $sql = "SELECT * FROM `admin`";
                $result = DataProvider::ExecuteQuery($sql);
                while( $row = $result->fetch()){
                    if($username == $row['TaiKhoan'] && $password == $row['MatKhau']  && $row['Status'] == 'Active'){
                        $_SESSION['dangnhap'] = $row['HoTenAdmin'];
                        $_SESSION['makh'] = $row['id_admin'];
                        $_SESSION['QTV'] = $row['Level'];
                        header("location:./Manager/Manager.php");
                    }
                }
            }
        }
    }
?>