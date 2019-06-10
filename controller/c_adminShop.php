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

	require_once("../model/m_foodshop.php");
	require_once("../view/v_admin.php");

	$m_foodshop = new FoodShop();

	

	if(isset($_GET["edit"])){
		$idProduct = $_GET["edit"];
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["update"])) {
			$id_shop = $_POST["user_id"]; 
			$m_foodshop->updateProducts(array(
				$_POST["name"], 
				$_POST["shop_type"], 
				$_POST["address"],
				$_POST["open_time"], 
				$_POST["cost"], 
				$id_shop,
				$idProduct
			));
			// echo "<script>alert('Cập nhật thành công!')</script>";
			echo '<div class="col-md-4 col-md-offset-4 alert alert-success" role="alert">Cập nhật thành công!</div>';
		}
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["delete"])) {
			$m_foodshop->deleteIdFoodShop($idProduct);
			echo '<div class="col-md-4 col-md-offset-4 alert alert-success" role="alert">Xóa product thành công!</div>';
		}
		require_once("../model/m_user.php");
		//cập nhập thông tin chủ
		if (isset($_POST["profile"])) {
			
			$id_shop = $_POST["user_idShop"]; 
			function showProfile($id_shop) //lấy thông tin user
			{
				$mUser = new User();
				$m_Profile = $mUser->queryProfile($id_shop);
				if($m_Profile == 0){
					return 0;
				}else{
					return $m_Profile;
				}
			}
			if($_SERVER['REQUEST_METHOD'] == 'POST' ){
			$sex = null;
			$birthday = null;
			$phone = null;
			$address = null;
			$name = null;
			$verified = '1';
			if (isset($_POST['nameShop'])){
				$name = $_POST['nameShop'];
			}
			if (isset($_POST['sexShop'])){
				$sex = $_POST['sexShop'];
			}
			if (isset($_POST['birthdayShop'])){
				$birthday = $_POST['birthdayShop'];
			}
			if (isset($_POST['phoneShop'])){
				$phone = $_POST['phoneShop'];
			}
			if (isset($_POST['addressShop'])){
				$address = $_POST['addressShop'];
			}
			$mUser = new User();
			$ok = $mUser->updateProfile(array( (ucwords($name)), $sex, $birthday, $phone, (ucwords($address)),$verified, $id_shop));
			// echo "<script>alert('Cập nhật thành công!')</script>";
			echo '<div class="col-md-4 col-md-offset-4 alert alert-success" role="alert">Cập nhật thành công!</div>';
			}
			$profileArr = showProfile($id_shop);
		
				if($profileArr == 0){
					header('location:c_index.php');
				}else{
					echo "<script>$('#nameShop').val('".$profileArr['name']."')</script>";
					echo "<script>$('#usernameShop').val('".$profileArr['username']."')</script>";
					echo "<script>$('#emailShop').val('".$profileArr['email']."')</script>";
					if(strcmp($profileArr['sex'], 'Nam') == 0){
						echo "<script>$('#maleShop').attr('checked', true);$('#femaleShop').attr('checked', false);</script>";
					}elseif(strcmp($profileArr['sex'], 'Nữ') == 0){
						echo "<script>$('#maleShop').attr('checked', false);$('#femaleShop').attr('checked', true);</script>";
					}
					echo "<script>$('#birthdayShop').val('".$profileArr['birthday']."')</script>";
					echo "<script>$('#phoneShop').val('".$profileArr['phone']."')</script>";
					echo "<script>$('#addressShop').val('".$profileArr['address']."')</script>";

				}
			
		}	
		//lấy dữ liệu theo id
		$data = $m_foodshop->queryDetailsFoodShop($idProduct);
		require_once("../model/m_user.php");
		$user = new User();
		$userData = $user->queryProfile($data['user_id']);
		require_once("../view/v_adminShopForm.php");

		echo "<script>$('#nameShop').val('".$userData['name']."')</script>";
		echo "<script>$('#usernameShop').val('".$userData['username']."')</script>";
		echo "<script>$('#emailShop').val('".$userData['email']."')</script>";
		if(strcmp($userData['sex'], 'Nam') == 0){
			echo "<script>$('#maleShop').attr('checked', true);$('#femaleShop').attr('checked', false);</script>";
		}elseif(strcmp($userData['sex'], 'Nữ') == 0){
			echo "<script>$('#maleShop').attr('checked', false);$('#femaleShop').attr('checked', true);</script>";
		}
		echo "<script>$('#birthdayShop').val('".$userData['birthday']."')</script>";
		echo "<script>$('#phoneShop').val('".$userData['phone']."')</script>";
		echo "<script>$('#addressShop').val('".$userData['address']."')</script>";

	}else{
		$sql = "SELECT fs.*, users.name as nameuser FROM foodshop fs , users WHERE fs.user_id = users.id";
		$sql_total = "SELECT count(id) as total FROM foodshop WHERE 1=1";
		$link = "";
		//tìm kiếm địa chỉ
		if(isset($_GET["address"]) && ($_GET["address"]!="-1")){
			$address = $_GET["address"];
			$sql_total .=  " AND address like N'%".$address."%'";
			$sql .= " AND fs.address like N'%".$address."%'";
			$link.="address=".$address."&";
			echo '<script type="text/javascript">
			$(document).ready(function() {
				$("#address option[value=\''.$address.'\']").attr("selected", "selected");
				});
				</script>';
		}
		//kieu cửa hàng
		if(isset($_GET["shop_type"]) && ($_GET["shop_type"]!="-1")){
			$types = $_GET["shop_type"];
			$sql_total .=" AND shop_types like '%".$types."%'";
			$sql .=" AND shop_types like '%".$types."%'";
			$link.="shop_types=".$types."&";
			echo '<script type="text/javascript">
			$(document).ready(function() {
				$("#shop_type option[value=\''.$types.'\']").attr("selected", "selected");
				});
				</script>';
		}
		//gia
		if( isset($_GET["cost"]) && ($_GET["cost"] != "-1") ){
			if($_GET["cost"] == "1"){
				$sql_total .=" ORDER BY cost";
				$sql .=" ORDER BY cost";
				$link.="cost=1&";
				echo '<script type="text/javascript">
				$(document).ready(function() {
					$("#cost option[value=1]").attr("selected", "selected");
					});
					</script>';
			}
			if($_GET["cost"] == "2"){
				$link.="cost=2&";
				$sql_total .=" ORDER BY cost DESC";
				$sql .=" ORDER BY cost DESC";
				echo '<script type="text/javascript">
					$(document).ready(function() {
						$("#cost option[value=2]").attr("selected", "selected");
						});
					</script>';
			}
		}
		$total_row = $m_foodshop->queryTotalFoodShop($sql_total);
		$total_record = $total_row['total']; // tổng sô record trong table
			//trnag hiển thị
		$current_page =  isset($_GET['page']) ? $_GET['page'] : 1; 

		$limit = 5;
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
		$data = $m_foodshop->queryFoodShop($sql);
		require_once("../view/v_adminShop.php");
		require_once("../view/v_paging.php");
	}

	require_once("../view/footer.php");

?>