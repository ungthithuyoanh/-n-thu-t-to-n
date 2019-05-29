<?php 
require_once('../view/header.php');
	//biến chứa nội dung đã nhập
$username = '';
$name = '';
$email = '';
// $page = strstr($_SERVER['PHP_SELF'], 'at=') ;
// echo $page;
if(isset($_GET['at'])){
	$at =$_GET['at']; 
}
if(isset($_SESSION['role']) && $_SESSION['role'] == 1){
	require_once("../view/v_admin.php"); 
}
	//nhấn button đăng ký
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$username = $_POST['username'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$pass2 = $_POST['pass2'];
	$role = $_POST['role'];
		//ma xac nhan
	$vkey = md5(time().$username);
		//kiểm tra data nhập vào
	require_once("../model/validation.php");
	$vali = new Validation();

		//test input
	$username = $vali->test_input($username);
	$name = $vali->test_input($name);
	$email =$vali->test_input($email);
	$pass = $vali->test_input($pass);
	$pass2 = $vali->test_input($pass2);

		//check value
	$usernameErr = $vali->checkUserName($username);
	$nameErr = $vali->checkName($name);
	$emailErr = $vali->checkEmail($email);
	$passErr = $vali->checkPass($pass);
	$pass2Err = $vali->checkPass2($pass, $pass2);
	$roleErr = $vali->checkRole($role);
		//thõa điều kiện dữ liệu đầu vào
	if( 
		($usernameErr == null) &&
		($nameErr == null) &&
		($emailErr == null) &&
		($passErr == null) &&
		($pass2Err == null) &&
		($roleErr == null)
	){
		require_once("../model/m_user.php");
		$m_user = new User();
		$userArr = array( 
			$username,
			$pass,
				ucwords($name), //oanh oc bo -> Oanh Oc Bo
				$email,
				null,
				null,
				null,
				null,
				$vkey,
				$role
			);

		$m_user->insertUser($userArr);
			//gửi email xác nhận
		require_once("../controller/PHPMailer/sendMail.php");
		$sendMail = new SendMail();
		$_subject = "Xác nhận tài khoản Fooding!";
		$_body = "<a href='http://localhost:8080/DATT_3/view/verifi.php?vkey=".$vkey."''><b>Xác nhận tài khoản</b></a>";
		$sendMail->sendGmail($_subject, $_body, $email);
		if(isset($_SESSION['role']) && $_SESSION['role'] == 1)
		{
			// $tbDangKy = "Thêm user thành công";
			// $button = "Đăng nhập";
			header('location:c_adminUsers.php');	
		}
		else{ 
			$tbDangKy = "Cảm ơn bạn đã đăng ký! Chúng tôi đã gửi một email xác nhận đăng ký đến ".$email.". Vui lòng vào email để xác nhận đăng ký!";
			$button = "Đăng nhập";
		}
	}
}
require_once("../view/register.php"); 
require_once("../view/footer.php");
?>
