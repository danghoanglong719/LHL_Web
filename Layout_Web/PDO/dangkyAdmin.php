<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Đăng ký</title>
        <!--<link rel="stylesheet" type="text/css" href="../css/SignUp.css">-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="../OwlCarousel2-2.3.4/src/js/owl.carousel.js">
        <link rel="stylesheet" href="../OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="../OwlCarousel2-2.3.4/dist/assets/owl.theme.green.min.css">
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
    <script type="text/javascript" src="../js/jquery/jquery-3.5.0.min.js"></script>
    <script src="../OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
    <script src="../js/jQueryValidation1.19.1/jquery.validate.js"></script>
    


    <body>
    <?php
        session_start();
        include_once("DataProvider.php");
        if(isset($_POST['dangkyAdmin']))
        {
            $firstname = $_POST['firstname'];
            $username = $_POST['user'];
            $password = $_POST['pass'];
            $Repass   = $_POST['repass'];
            $diachi = $_POST['address'];
            $sdt   = $_POST['sdt'];
            $email  = $_POST['email'];
            $Level  = $_POST['level'];
            $status  = $_POST['status'];
            $sql = "INSERT INTO `admin` (`HoTenAdmin`, `TaiKhoan`, `MatKhau`,`DiaChi`, `DienThoai`, `Email`,`Level`,`Status`)VALUES ('$firstname' , '$username' ,' $password' , '$diachi' ,'$sdt' , '$email','$Level','$status' )";
            $result = DataProvider::ExecuteQuery($sql);

            if($password == $Repass)
            {
                header("location:Manager/QuanLyAdmin.php");
            }
            
        }
    ?>
        <div class="container-fluid bg"> 
            <div class="row">
                <div class="col-md-4 col-sm-3 col-xs-12"></div>
                <div class="col-md-4 col-sm-6 col-xs-12 border border-success rounded">
                    <form class="form-container mt-3 mb-3" id="formSignUpAdmin" method="POST">
                        <h2>Đăng ký Admin</h2>
                        <div class="form-group">
                            <div class="form-inline">
                                <label for="ipFirstname" class="col-sm-4">Họ Tên</label>
                                <input type="text" name="firstname" id="ipFirstname" class="form-control col-sm-8" placeholder="Họ">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-inline">
                                <label for="ipTk" class="col-sm-4">Tài khoản</label>
                                <input type="text" name="user" id="ipTk" class="form-control col-sm-8" placeholder="Nhập tài khoản">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-inline">
                                <label for="ipPass" class="col-sm-4">Mật khẩu</label>
                                <input type="password" name="pass" id="ipPass" class="form-control col-sm-8" placeholder="Nhập mật khẩu">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-inline">
                                <label for="ipRePass" class="col-sm-4">Nhập lại</label>
                                <input type="password" name="repass" id="ipRePass" class="form-control col-sm-8" placeholder="Nhập lại mật khẩu">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-inline">
                                <label for="ipDiaChi" class="col-sm-4">Địa Chỉ</label>
                                <input type="text" name="address" id="ipDiaChi" class="form-control col-sm-8" placeholder="Nhập địa chỉ" >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-inline">
                                <label for="ipSdt" class="col-sm-4">SĐT</label>
                                <input type="text" name="sdt" id="ipSdt" class="form-control col-sm-8" placeholder="Nhập Số điện thoại" >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-inline">
                                <label for="ipEmail" class="col-sm-4">Email</label>
                                <input type="text" name="email" id="ipEmail" class="form-control col-sm-8" placeholder="Nhập email" >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-inline">
                                <label for="Admin_1" class="col-sm-4">Level</label>
                                <input type="radio" name="level" class="mr-3" value="Admin_1" id="Admin_1" checked>
                                <label for="Admin_1">Admin 1</label>
                                <input type="radio" name="level" class="ml-4 mr-3" value="Admin_2" id="Admin_2">
                                <label for="Admin_2">Admin 2</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-inline">
                                <label for="Active" class="col-sm-4">Trạng thái</label>
                                <input type="radio" name="status" class="mr-3" value="Active" id="Active" checked>
                                <label for="Active">Active</label>
                                <input type="radio" name="status" class="ml-5 mr-3" value="Block" id="Block">
                                <label for="Block">Block</label>
                            </div>
                        </div>
                        <div id="myErr"></div>
                        <button type="submit" class="btn btn-success btn-status" id="btnSignUpAdmin" value="SignUpAdmin" name="dangkyAdmin">Tạo tài khoản</button>
                        
                    </form>
                </div>
            </div>
        </div>
        <!--#endregion SignUp-->
        
    </body>
    <!--#region Script-->
    <script>
        $(document).ready(function(){
            $('#formSignUpAdmin').validate({
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