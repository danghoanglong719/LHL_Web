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
    #formdoimk{
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
  #formdoimk label:last-child{
      padding-left: 20px;
  }
  #btndoimk{
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
        <form class="form-container" id="formdoimk" method="POST">
          <h2>Đổi mật khẩu</h2>
          <?php   
            include_once("DataProvider.php");
            if(isset($_POST['doimatkhau']))
            {
                $oldpassword = $_POST['oldpsw'];
                $newpassword = $_POST['newpsw'];
                $renewpassword = $_POST['renewpsw'];
                $makh = $_SESSION['makh'];
                if(empty($oldpassword) || empty($newpassword) || empty($renewpassword))
                {
                    echo "<p style='color:red'>*Vui lòng nhập đầy đủ</P>";
                }
                
                else {
                    if(isset($_SESSION['QTV'])){
                        $sqlCheck = "SELECT MatKhau FROM admin where  id_admin ='$makh'";
                        $dsCheck = DataProvider::ExecuteQuery($sqlCheck);
                        $row = $dsCheck->fetch();
                        if($oldpassword == $row['MatKhau']){
                            if($newpassword == $renewpassword){
                                $sqlUpdate = "UPDATE `admin` SET `MatKhau`='$newpassword' where  id_admin ='$makh'";
                                $dsUpdate = DataProvider::ExecuteQuery($sqlUpdate);
                                header("location:home.php");
                            }
                            else{
                                echo "<p style='color:red'>*Nhập lại không đúng</P>";
                            }
                        }
                        else{
                            echo "<p style='color:red'>*Sai mật khẩu cũ</P>";
                        }
                    }
                    else{
                        $sqlCheck = "SELECT MatKhau FROM khachhang where  MaKH ='$makh'";
                        $dsCheck = DataProvider::ExecuteQuery($sqlCheck);
                        $row = $dsCheck->fetch();
                        if($oldpassword == $row['MatKhau']){
                            if($newpassword == $renewpassword){
                            $sqlUpdate = "UPDATE `khachhang` SET `MatKhau`='$newpassword' where  MaKH ='$makh'";
                            $dsUpdate = DataProvider::ExecuteQuery($sqlUpdate);
                            header("location:home.php");
                        }
                        else{
                            echo "<p style='color:red'>*Nhập lại không đúng</P>";
                        }
                    }
                    else{
                        echo "<p style='color:red'>*Sai mật khẩu cũ</P>";
                    }
                    }
                }
            }
            ?>
          <div class="form-group">
            <div class="form-inline">
              <label for="oldpsw" class="col-sm-5">Mật khẩu cũ</label>
              <input type="password" name="oldpsw" id="oldpsw" class="form-control col-sm-7" placeholder="Nhập mật khẩu cũ">
            </div>
          </div>
          <div class="form-group">
            <div class="form-inline">
              <label for="newpsw" class="col-sm-5">Mật khẩu mới</label>
              <input type="password" name="newpsw" id="newpsw" class="form-control col-sm-7" placeholder="Nhập mật khẩu mới">
            </div>
          </div>
          <div class="form-group">
            <div class="form-inline">
              <label for="renewpsw" class="col-sm-5">Nhập lại</label>
              <input type="password" name="renewpsw" id="renewpsw" class="form-control col-sm-7" placeholder="Nhập lại mật khẩu mới">
            </div>
          </div>
          <div id="myErr"></div>
          <button type="submit" class="btn btn-success btn-block" id="btndoimk"  name="doimatkhau">Đổi mật khẩu</button>
          
        </form>
      </div>
    </div>
  </div>
</body>
<script>
    $(document).ready(function(){
        $('#formdoimk').validate({
            rules: {
                oldpsw:{required:true},
                newpsw:{required:true},
                renewpsw:{required:true},
            },
            messages:{
                oldpsw:{required:"Vui lòng nhập mật khẩu cũ",},
                newpsw:{required:"Vui lòng nhập mật khẩu mới",},
                renewpsw:{required:"Vui lòng nhập lại mật khẩu cũ",},
            },
        });
    })
</script>
</html>
