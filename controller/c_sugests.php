<?php 
	require_once('../view/header.php');
	require_once('../view/index.php');
	require_once('../controller/c_foodshop.php');
	// kiểm tra đã đăng nhập chưa
	$id_user = null;
	if(isset($_SESSION['name']) || isset($_SESSION['id'])){
		$id_user = $_SESSION['id'];
	}
	
	if($_POST){
		$email = $_POST['email'];
		$comment = $_POST['comment'];

		require_once("../model/validation.php");
		$vali = new Validation();

		$email =$vali->test_input($email);
		$comment =$vali->test_input($comment);

		$commentErr = $vali->checkComment($comment);
		
		if(
			($commentErr == null) 
		){
			require_once("../model/m_sugests.php");

			$m_sugests = new Sugests();

			$m_sugests->insertSugests(array($email, $comment , $id_user));


		}else{
			echo "<script>$('#note').html('fefefewf');</script>";
		}

	}
	
?>