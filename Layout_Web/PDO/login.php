<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Đăng nhập</title>
<link rel="stylesheet" type="text/css" href="../css/SignUp.css">
  <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1-dist/css/bootstrap.css">
  <style type="text/css">    
    label.error {   color:red;}
    input.error {   color:red;}
    #formdangnhap{
    border: 1px solid white;
    padding:40px 40px;
    border-radius: 10px;
    margin-top: 12vh;
    -webkit-box-shadow: 0px 0px 15px 15px rgba(0,0,0,0.74);
    -moz-box-shadow: 0px 0px 15px 15px rgba(0,0,0,0.74);
    box-shadow: 0px 0px 15px 15px rgba(0,0,0,0.74);
    color: #212529;
    background: rgba(234, 252, 255, 0.815);
  }
  #formdangnhap label:last-child{
      padding-left: 20px;
  }
  #btndangnhap{
      margin-top: 10px;
  }
  </style>
</head>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="../js/jquery/jquery-3.5.0.min.js"></script>
<script src="../js/jQueryValidation1.19.1/jquery.validate.js"></script>
<body>
  <div div class="container-fluid bg"> 
    <div class="row">
      <div class="col-md-4 col-sm-3 col-xs-12"></div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <form class="form-container" id="formdangnhap" method="POST">
          <h2>Đăng nhập</h2>
          <?php
              include_once("logincode.php");
          ?>
          <div class="form-group">
            <div class="form-inline">
              <label for="uname" class="col-sm-4">Tài khoản</label>
              <input type="text" name="uname" id="uname" class="form-control col-sm-8" placeholder="Nhập tài khoản">
            </div>
          </div>
          <div class="form-group">
            <div class="form-inline">
              <label for="psw" class="col-sm-4">Mật khẩu</label>
              <input type="password" name="psw" id="psw" class="form-control col-sm-8" placeholder="Nhập mật khẩu">
            </div>
          </div>
          <div class="form-group">
            <div class="form-inline">
              <div class="col-sm-4"></div>
                <label for="user"><b>User</b></label>
                <input type="radio"  name="radio" id="user" value="0" required checked>
                <label for="admin" class ="ml-3"><b>Admin</b></label>
                <input type="radio"  name="radio" id="admin" value="1" required>
            </div>
          </div>
          <div id="myErr"></div>
          <button type="submit" class="btn btn-success btn-block" id="btndangnhap"  name="dangnhap">Đăng nhập</button>
          
        </form>
      </div>
    </div>
  </div>
</body>
<script>
    $(document).ready(function(){
        $('#formdangnhap').validate({
            rules: {
              uname:{required:true},
              psw:{required:true},
            },
            messages:{
              uname:{required:"Vui lòng nhập tài khoản",},
              psw:{required:"Vui lòng nhập mật khẩu",},
            },
        });
    })
</script>
</html>
