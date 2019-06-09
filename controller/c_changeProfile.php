<?php
	require_once('../view/header.php');
	if($_SESSION['role'] == 1){
		require_once("../view/v_admin.php");
	}else if ($_SESSION['role'] == 3){
		require_once("../view/v_shop.php");
	}else{
		require_once("../view/v_users.php");
	}

	// kiểm tra user
	if( !isset($_SESSION['id']) || !isset($_SESSION['name']) || !isset($_SESSION['role'])){
		// chưa đăng nhập
		header('location:c_index.php'); 
	}
	// tồn tại user
	$_id = $_SESSION['id'];	//lấy id

	require_once("../model/m_user.php");

	echo "<script type='text/javascript'>
		$(document).ready(function() {
			$('.card').html(function(){
				return '<h4>Đăng ký cửa hàng!<h4><br/><a href=\'../index.php\' alt=\'Đăng ký\' ><input class=\'btn btn-success btn-lg\' type=submit value=\'Đăng ký\'></a>';
			});
		});
	</script>";

	//views
	require_once('../view/v_profile.php');
	require_once('../view/footer.php');

?>