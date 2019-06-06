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

	
	function showProfile($_id) //lấy thông tin user
	{
		$mUser = new User();
		$m_Profile = $mUser->queryProfile($_id);
		if($m_Profile == 0){
			return 0;
		}else{
			return $m_Profile;
		}
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$sex = null;
		$birthday = null;
		$phone = null;
		$address = null;
		$name = null;
		$verified = '1';
		if (isset($_POST['name'])){
			$name = $_POST['name'];
		}
		if (isset($_POST['sex'])){
			$sex = $_POST['sex'];
		}
		if (isset($_POST['birthday'])){
			$birthday = $_POST['birthday'];
		}
		if (isset($_POST['phone'])){
			$phone = $_POST['phone'];
		}
		if (isset($_POST['address'])){
			$address = $_POST['address'];
		}
		$mUser = new User();
		$ok = $mUser->updateProfile(array( (ucwords($name)), $sex, $birthday, $phone, (ucwords($address)),$verified, $_id));
		echo "<script>alert('Cập nhật thành công!')</script>";

	}

	//views
	require_once('../view/v_profile.php');
	require_once('../view/footer.php');

	$profileArr = showProfile($_id);
	
	if($profileArr == 0){
		header('location:c_index.php');
	}else{
		echo "<script>$('#name').val('".$profileArr['name']."')</script>";
		echo "<script>$('#username').val('".$profileArr['username']."')</script>";
		echo "<script>$('#email').val('".$profileArr['email']."')</script>";
		if(strcmp($profileArr['sex'], 'Nam') == 0){
			echo "<script>$('#male').attr('checked', true);$('#female').attr('checked', false);</script>";
		}elseif(strcmp($profileArr['sex'], 'Nữ') == 0){
			echo "<script>$('#male').attr('checked', false);$('#female').attr('checked', true);</script>";
		}
		echo "<script>$('#birthday').val('".$profileArr['birthday']."')</script>";
		echo "<script>$('#phone').val('".$profileArr['phone']."')</script>";
		echo "<script>$('#address').val('".$profileArr['address']."')</script>";

	}
?>