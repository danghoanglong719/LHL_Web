

$("#btnLogin").click(function(){
    var username = $("#txtUsername").val();
    var password = $("#txtPassword").val();
       if(username=="")
            $('#txtErrUser').html("Vui lòng nhập tên tài khoản");
        if(password=="")
            $("#txtErrPass").html("Vui lòng nhập mật khẩu");

            $('#txtErrUser').hide(2000);
            $("#txtErrPass").hide(2000);
    Swal.fire({
      
        icon: 'success',
        title: 'Bạn đã đăng nhập thành công',
        showConfirmButton: false,
        timer: 1500
      })
});
