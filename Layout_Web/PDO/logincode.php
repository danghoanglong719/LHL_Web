
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
            $sql = "SELECT * FROM khachhang ";
            $result = DataProvider::ExecuteQuery($sql);
            while( $row = $result->fetch()){
                if($username == $row['TenDN'] && $password == $row['MatKhau'] && $radioval == "0"){ 
                    $_SESSION['dangnhap'] = $row['HoTen'];
                    if(isset($_SESSION['dangnhap']) && isset($_SESSION['Cart'])) {
                        header("location:./Cart/Giohang.php");
                    }
                    else{
                        $_SESSION['makh'] = $row['MaKH'];
                        $_SESSION['sdt'] = $row['DienThoai'];
                        $_SESSION['diachi'] = $row['DiaChi'];
                        if($username == $row['TaiKhoan'] && $password == $row['MATKHAU'] && $radioval == "1" && $row['Block'] == 'Active'){

                            $_SESSION['QTV'] = $row['Lever'];
                            header("location:./Manager/Manager.php");
                        }
                        
                        header("location:home.php");
                    }
                }
                else {
                    echo '';
                }
            }
        }
    }
?>