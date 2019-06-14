$(document).ready(function()
{  
    //khai báo nút submit form
    var submit   = $("button[type='submit']");
     
    //khi thực hiện kích vào nút Login
    $('#sugest').click(function()
    {
        //khai báo các biến
        var email = $("input[name='email']").val(); //lấy giá trị input tài khoản
        var comment = $("input[name='comment']").val(); //lấy giá trị input mật khẩu
        var a = $('#exampleInputComment').val();
        if(a ==null || a==""){
            $('#note').html("vui long nhap noi dung");
            return false;
        }
         
        //lay tat ca du lieu trong form login
        var data = $('form#form_login').serialize();
        //su dung ham $.ajax()
        $.ajax({
        type : 'POST', //kiểu post
        url  : '../controller/c_sugests.php', //gửi dữ liệu sang trang submit.php
        data : data,
        success :  function(data)
               {                       
                    if(data == "false")
                    {
                        return false;
                    }else{
                        alert("Cam on ban da gui yeu cau");
                        // $('#note').html("Cam on ban da gui yeu cau");
                    }
               }
        });
        return false;
        });
        // }
    // });
});