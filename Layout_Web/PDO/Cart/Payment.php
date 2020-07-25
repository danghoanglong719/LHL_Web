<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
	<link rel="stylesheet" href="Payment.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<style type="text/css">    
		label.error {   color:red;}
		input.error {   color:red;}
		textarea.error {color:red;}
	</style>
</head>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../js/jquery/jquery-3.5.0.min.js"></script>
<script src="../../js/jQueryValidation1.19.1/jquery.validate.js"></script>

<body>
	<?php
		include_once('Paymentcode.php')
	?>
	<header>
		<div class="header-container plr">
			<div class="logo">
				<a href="../home.php"><img class="icon" src="../../img/LogoLHL.png" width="60px"></a>
				<div class="text">
					Thanh Toán
				</div>
			</div>
		</div>
	</header>
	<main>
		<div class="main-container plr" width="1170px">
			<div class="form-info">
				<div class="form-container">
					<form class="form-container-inner" id="formPayment" method="POST" name="formPayment">
						<div class="form-group">
                            <div class="form-inline">
								<label for="ipName" class="col-sm-4">Họ Tên</label>
								<?php
									if(isset($_SESSION['dangnhap'])){
										$plh = $_SESSION['dangnhap'];
									}
								?>
                                <input type="text" name="name" id="ipName" class="form-control col-sm-8" placeholder="Nhập họ tên" value="<?php echo $plh; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-inline" >
							<?php
									if(isset($_SESSION['sdt'])){
										$plh = "0". $_SESSION['sdt'];
									}
								?>
                                <label for="ipTel" class="col-sm-4">Điện thoại di dộng</label>
                                <input type="text" name="telephone" id="ipTel" class="form-control col-sm-8" placeholder="Nhập số điện thoại" value="<?php echo $plh; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-inline">
                                <label for="ipTinh" class="col-sm-4">Tỉnh/Thành phố</label>
                                <input type="text" name="tinh" id="ipTinh" class="form-control col-sm-8" placeholder="Nhập Tỉnh/Thành phố">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-inline">
                                <label for="ipQuan" class="col-sm-4">Quận/Huyện</label>
                                <input type="text" name="quan" id="ipQuan" class="form-control col-sm-8" placeholder="Nhập Quận/Huyện">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-inline">
                                <label for="ipPhuong" class="col-sm-4">Phường/Xã</label>
                                <input type="text" name="phuong" id="ipPhuong" class="form-control col-sm-8" placeholder="Nhập Phường/Xã" >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-inline">
								<?php
									if(isset($_SESSION['diachi'])){
										$plh = $_SESSION['diachi'];
									}
								?>
                                <label for="ipDiaChi" class="col-sm-4">Địa Chỉ</label>
                                <textarea type="textarea" name="diachi" id="ipDiachi" class="form-control col-sm-8" placeholder="Ví dụ: 280 An Dương Vương" value="<?php echo $plh; ?>"></textarea>
                            </div>
                        </div>
						<div id="myErr"></div>
						<div class="form-group">
                            <div class="form-inline">
                                <div class="col-sm-4"></div>
                                <div class="col-sm-8" style="margin:0; padding:0;">
									<a href="GioHang.php" class="cancel" style="margin-right:25px; margin-top:10px">Hủy bỏ</a>
									<button type="submit" class="create-update col-sm-8" style="margin-top:10px;" id="btnPayment" value="payment" name="payment">Đặt hàng</button>
								</div>
                            </div>
                        </div>
                    </form>
				</div>
			</div>
		</div>
	</main>
</body>
<!--#region Script-->
<script>
	$(document).ready(function(){
		$('#formPayment').validate({
			rules: {
				name:{required:true},
				telephone:{required:true, digits:true, rangelength:[10,11]},
				tinh:{required:true,},
				quan:{required:true,},
				phuong:{required:true,},
				diachi:{require:true}
			},
			messages:{
				name:{required:"Vui lòng nhập Họ tên",},
				telephone:{	required:"Vui lòng nhập Số điện thoại",
							digits:"Vui lòng nhập số điện thoại hợp lệ"},
				tinh:{required:"Vui lòng nhập Tỉnh",},
				quan:{required:"Vui lòng nhập Quận",},
				phuong:{required:"Vui lòng nhập Phường",},
				diachi:{required:"Vui lòng nhập Địa chỉ",}
			},
		});
	})
</script>
<script>
	$(document).ready(function() {
		$(".create-update").click(function(){
			Swal.fire({
				position: 'center',
				icon: 'success',
				title: 'Đặt hàng thành công',
				showConfirmButton: false,
				timer: 1500
			})
		});
	});
</script>
<!--#endregion Script-->
</html>