<?php 
require_once("../view/header.php");

if(isset($_POST['email'])){

	require_once("../model/m_user.php");

	$mUser = new User();
	$data = $mUser->queryEmail($_POST['email']);

	if($data){
		require_once("../controller/PHPMailer/sendMail.php");
		$sendMail = new SendMail();
		$_subject = "Khôi phục mật khẩu Fooding!";
		$token = md5(time().$_POST['email']);
		$_body = "<a href='http://localhost:8080/DATT_3/controller/c_newpass.php?token=".$token."&email=".$_POST['email']."'><b>Đổi Mật Khẩu</b></a>";
		$sendMail->sendGmail($_subject, $_body, $_POST['email']);
		$thongbao = "Gửi mail khôi phục mật khẩu thành công";

		$mUser->updateToken($token,$_POST['email']);

	}
	else{
		$errEmail = "Email không tồn tại!";
	}
}
require_once("../view/v_resetPass.php");	


require_once("../view/footer.php");
?>