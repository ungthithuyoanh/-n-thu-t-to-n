<?php 
require_once("../view/header.php");
if(isset($_GET['token']) && isset($_GET['email'])){

	require_once("../model/m_user.php");
	$mUser = new User();

	$data = $mUser->queryToken($_GET['token'],$_GET['email']);
	if(!$data){
		$errNotFound = "Không tìm thấy token và pass!";
	}
	else {
		$pass = '';
		$pass1 = '';

		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$pass=$_POST['pass'];
			$pass1=$_POST['pass1'];

			require_once("../model/validation.php");
			$vali = new Validation();

			$pass = $vali->test_input($pass);
			$pass1 = $vali->test_input($pass1);

			$passErr = $vali->checkPass($pass);
			$pass1Err = $vali->checkPass2($pass, $pass1);

			if(
				($passErr == null) &&
				($pass1Err == null)
			){
				$mUser->updatePass($pass,$_GET['token'],$_GET['email']);
				$thongbao = "updatePass thành công!";
			}
		}

		// require_once("../view/v_newpass.php");

	}
}
else {
	$errLink = " Liên kết không hợp lệ!";
}
require_once("../view/v_newpass.php");
require_once("../view/footer.php");
?>