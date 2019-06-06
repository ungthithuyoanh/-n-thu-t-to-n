<?php 	
	require_once("../view/header.php");

	if(
		!isset($_SESSION['name']) || 
		!isset($_SESSION['id']) || 
		!isset($_SESSION['role']) ||
		($_SESSION['role']!="1")
	){
		header("location:c_index.php");
	}

	require_once("../model/m_foodshop.php");
	require_once("../view/v_admin.php");
	require_once("../view/v_shop.php");

	$m_foodshop = new FoodShop();
	// $_iduser = $_SESSION['id'];
	if(isset($_GET["edit"])){
		$idProduct = $_GET["edit"];
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["update"])) {
		$m_foodshop->updateProducts(array(
			$_POST["name"], 
			$_POST["shop_type"], 
			$_POST["address"],
			$_POST["open_time"], 
			$_POST["cost"], 
			// $_POST["img"], 
			$_iduser,
			$idProduct
		));

		echo '<div class="col-md-4 col-md-offset-4 alert alert-success" role="alert">Cập nhật thành công!</div>';
	}
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["delete"])) {
		$idProduct = $_POST["id"];
		$m_foodshop->deleteIdFoodShop($idProduct);
		echo '<div class="col-md-4 col-md-offset-4 alert alert-success" role="alert">Xóa product thành công!</div>';
	}
	}else{
		$sql = "SELECT fs.*, users.name as nameuser FROM foodshop fs , users WHERE users.id = '$_iduser' and fs.user_id = '$_iduser'";
		$sql_total = "SELECT count(fs.user_id) as total FROM foodshop fs, users WHERE users.id = '$_iduser' and fs.user_id = '$_iduser'";
		$total_row = $m_foodshop->queryTotalFoodShop($sql_total);

		$total_record = $total_row['total']; // tổng sô record trong table
			//trnag hiển thị
			$current_page =  isset($_GET['page']) ? $_GET['page'] : 1; 

			$limit = 1;
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
			require_once("../view/v_shopFood.php");
			require_once("../view/v_paging.php");
	}

	require_once("../view/footer.php");

?>