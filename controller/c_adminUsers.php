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
			if (isset($_POST['birthday']) && $_POST['birthday'] != ''){
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
			echo '<div class="col-md-4 col-md-offset-4 alert alert-success" role="alert">Cập nhật thành công!</div>';
		}
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
			$m_user->deleteIdUser($idUser);
			echo '<div class="col-md-4 col-md-offset-4 alert alert-danger" role="alert">Xóa user thành công!</div>';
		}
		$data = $m_user->queryProfileAdmin($idUser);
		require_once("../view/adminUsersForm.php");
	}else{
		$sql = "SELECT * FROM users WHERE 1=1";
		$sql_total = "SELECT count(id) as total FROM users WHERE 1=1";
		$total_row = $m_user->queryTotalUsers($sql_total);
		$total_record = $total_row['total']; // tổng sô record trong table
			//trnag hiển thị
			$current_page =  isset($_GET['page']) ? $_GET['page'] : 1; 

			$limit = 3;
			$total_page = ceil($total_record / $limit); //hàm làm tròn lên.vd 2,3=3
			//kiểm tra nhập page
			if ($current_page > $total_page) {
				$current_page = $total_page;
			}
			if ($current_page < 1) {
				$current_page = 1;
			}
			//tính start
			$start = ($current_page - 1 ) * $limit;
			$sql .= " LIMIT ".$start." , ".$limit;
			$data = $m_user->queryUserLimit($sql);
		// $data = $m_user->queryAllUsers();
		require_once("../view/adminUser.php");
		require_once("../view/v_paging.php");
	}

	require_once("../view/footer.php");
?>
	<script type="text/javascript">
		$(document).ready(function() {
			document.title = 'Quản trị Users';
		});
	</script>
