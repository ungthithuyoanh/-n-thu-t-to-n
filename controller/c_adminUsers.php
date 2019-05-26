<?php
	require_once("../view/header.php");
	if(
		!isset($_SESSION['name']) || 
		!isset($_SESSION['id']) || 
		!isset($_SESSION['role']) ||
		($_SESSION['role']!="1")
	){
		header("location:index.php");
	}
	require_once("../model/m_user.php");
	require_once("../view/v_admin.php");

	$m_user = new User();

	if(isset($_GET['edit'])){
		$idUser = $_GET['edit'];
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
			$sex = null;
			$birthday = null;
			$phone = null;
			$address = null;
			$name = null;
			$verified = null;
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
			if (isset($_POST['verified'])){
				$verified = $_POST['verified'];
			}
			$m_User = new User();
			$m_User->updateProfile(array( (ucwords($name)), $sex, $birthday, $phone, (ucwords($address)),$verified, $idUser));
				//update role
			if (isset($_POST['role'])){
				$m_User->updateAdminUser($idUser, $_POST['role']);
			}
			echo '<div class="col-md-6 col-md-offset-3 alert alert-success" role="alert">Cập nhật thành công!</div>';
		}
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
			$m_user->deleteIdUser($idUser);
			echo '<div class="col-md-4 offset-4 alert alert-danger" role="alert">Xóa user thành công!</div>';
		}
		$data = $m_user->queryProfileAdmin($idUser);
		require_once("../view/adminUsersForm.php");
	}else{
		$data = $m_user->queryAllUsers();
		require_once("../view/adminUser.php");
	}

	require_once("../view/footer.php");
?>
	<script type="text/javascript">
		$(document).ready(function() {
			document.title = 'Quản trị Users';
		});
	</script>
