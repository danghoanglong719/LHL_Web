<?php
    session_start();
    if(!isset($_SESSION['QTV'])){
        header('location:../home.php');
    }
    include_once("../DataProvider.php");


    if(isset($_POST['EditUser']))
    {
        $id  = $_GET['edit'];
        $firstname = $_POST['firstname'];
        $username = $_POST['user'];
        $password = md5($_POST['pass']);
        $Repass   = md5($_POST['repass']);
        $diachi = $_POST['address'];
        $sdt   = $_POST['sdt'];
        $email  = $_POST['email'];

        if($password == $Repass)
        {
            $sql = "UPDATE `khachhang` SET `TenDN` = '$username', `MatKhau` = '$password', `HoTen` = '$firstname', `DiaChi` = '$diachi', `DienThoai` = '$sdt', `Email` = '$email' WHERE `khachhang`.`MaKH` = '$id'";
            $result = DataProvider::ExecuteQuery($sql);

            header("location:QuanLyAccount.php");
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sửa thông tin</title>
        <!--<link rel="stylesheet" type="text/css" href="../../css/SignUp.css">-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="../../OwlCarousel2-2.3.4/src/js/owl.carousel.js">
        <link rel="stylesheet" href="../../OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="../../OwlCarousel2-2.3.4/dist/assets/owl.theme.green.min.css">
        <style type="text/css">
            label.error {   color:red;}
            input.error {   color:red;}
        </style>
    </head>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../js/jquery/jquery-3.5.0.min.js"></script>
    <script src="../../OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
    <script src="../../js/jQueryValidation1.19.1/jquery.validate.js"></script>

    <body>

<?php
    //placeholder
    $sqlEdit = "SELECT * FROM khachhang WHERE MaKH = {$_GET['edit']}";
    $UserEdit = DataProvider::ExecuteQuery($sqlEdit);
    $row = $UserEdit->fetch();
    $hten = $row['HoTen'];
    $tdnhap = $row['TenDN'];
    $mkhau = $row['MatKhau'];
    $dchi = $row['DiaChi'];
    $dthoai = $row['DienThoai'];
    $phremail = $row['Email'];
?>
        <div class="container-fluid ">
            <div class="row">
                <div class="col-md-4 col-sm-3 col-xs-12 mt-4"></div>
                <div class="col-md-4 col-sm-6 col-xs-12 border border-success rounded mt-4" >
                    <form class="form-container mt-3 mb-3" id="formLogin" method="POST">
                        <h2>Sửa thông tin User</h2>
                        <div class="form-group">
                            <div class="form-inline">
                                <label for="ipFirstname" class="col-sm-4">Họ Tên</label>
                                <input type="text" name="firstname" id="ipFirstname" class="form-control col-sm-8" value="<?php echo $hten;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-inline">
                                <label for="ipTk" class="col-sm-4">Tài khoản</label>
                                <input type="text" name="user" id="ipTk" class="form-control col-sm-8" value="<?php echo $tdnhap;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-inline">
                                <label for="ipPass" class="col-sm-4">Mật khẩu</label>
                                <input type="password" name="pass" id="ipPass" class="form-control col-sm-8" placeholder="Nhập mật khẩu" value="<?php echo $mkhau;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-inline">
                                <label for="ipRePass" class="col-sm-4">Nhập lại</label>
                                <input type="password" name="repass" id="ipRePass" class="form-control col-sm-8" placeholder="Nhập lại mật khẩu" value="<?php echo $mkhau;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-inline">
                                <label for="ipSdt" class="col-sm-4">Địa Chỉ</label>
                                <input type="text" name="address" id="ipSdt" class="form-control col-sm-8" value="<?php echo $dchi;?>" >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-inline">
                                <label for="ipSdt" class="col-sm-4">SĐT</label>
                                <input type="text" name="sdt" id="ipSdt" class="form-control col-sm-8" value="<?php echo $dthoai;?>" >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-inline">
                                <label for="ipSdt" class="col-sm-4">Email</label>
                                <input type="text" name="email" id="ipSdt" class="form-control col-sm-8" value="<?php echo $phremail;?>" >
                            </div>
                        </div>
                        <div id="myErr"></div>
                        <button type="submit" class="btn btn-success btn-block" id="btnSignUp" value="SignUp" name="EditUser">Sửa</button>

                    </form>
                </div>
            </div>
        </div>
        <!--#endregion SignUp-->

    </body>
    <!--#region Script-->
    <script>
        $(document).ready(function(){
            $('#formLogin').validate({
                rules: {
                    firstname:{required:true},
                    lastname:{required:true},
                    user:{required:true, minlength:6},
                    pass:{required:true, minlength:6},
                    repass:{required:true, equalTo:"#ipPass"},
                    sdt:{digits:true}
                },
                messages:{
                   firstname:{required:"Không được bỏ trống",},
                   lastname:{required:"Không được bỏ trống",},
                   user:{
                        required:"Không được bỏ trống",
                        minlength:"Ít nhất 6 ký tự"
                   },
                   pass:{
                        required:"Không được bỏ trống",
                        minlength:"Ít nhất 6 ký tự"
                   },
                   repass:{
                        required:"Không được bỏ trống",
                        equalTo:"Mật khẩu không khớp"
                   },
                   sdt:{digits:"Chỉ nhập số nguyên"}
                },
            });
        })
    </script>
    <!--#endregion Script-->

</html>