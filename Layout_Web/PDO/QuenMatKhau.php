<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Quên mật khẩu</title>
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
          <h2>Quên mật khẩu</h2>
          <?php

          ?>

          <div class="form-group">
            <div class="form-inline">
              <label for="psw" class="col-sm-4">Email</label>
              <input type="password" name="email" id="psw" class="form-control col-sm-8" placeholder="Nhập Email đã đăng ký ">
            </div>
          </div>
          <div id="myErr"></div>
          <button type="submit" class="btn btn-success btn-block" id="btnQuenmk"  name="dangnhap">Gửi về</button>

        </form>
      </div>
    </div>
  </div>

  <?php
        /*if(isset($_POST['btnQuenmk']))
        {
        $email = $_POST['email'];
            $sql = "SELECT * FROM khachhang  where `Email` = '$email' limit 1";
            $result = DataProvider::ExecuteQuery($sql);
            //$row = $result->fetch();
                if($result == true){
                    $token = rand(100,999);

                }



        }*/


  ?>
</body>

</html>
