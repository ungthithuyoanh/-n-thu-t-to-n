<?php 	
	require_once("../view/header.php");

	if(
		!isset($_SESSION['name']) || 
		!isset($_SESSION['id']) || 
		!isset($_SESSION['role']) ||
		($_SESSION['role']!="3")
	){
		header("location:index.php");
	}

	require_once("../model/m_foodshop.php");
	require_once("../model/m_product.php");
	require_once("../view/v_shop.php");

	$m_foodshop = new FoodShop();

	$m_product = new Product();

	

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
		
		//lấy dữ liệu theo id
		$data = $m_foodshop->queryDetailsFoodShop($idProduct);
		echo "<script type='text/javascript' charset='utf-8'>$(document).ready(function(){ $('#nav-home').show(); });</script>";
		require_once("../view/v_adminShopForm.php");
	}else{
		$id = $_SESSION['id'];
		$sql = "SELECT pr.*, types_products.types as nametype FROM products pr , types_products, foodshop,users WHERE pr.type_id = types_products.id and foodshop.id= types_products.shop_id and foodshop.user_id= users.id and users.id=:id";
		$sql_total = "SELECT count(id) as total FROM products WHERE 1=1";
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
		// $sql .= " LIMIT ".$start." , ".$limit;
		$data = $m_product->queryProductUser($sql,$id);
		require_once("../view/v_usersProduct.php");
		// require_once("../view/v_paging.php");
	}

	require_once("../view/footer.php");

?>