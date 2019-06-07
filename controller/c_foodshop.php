<?php
	require_once('../model/m_foodshop.php');
	// require_once('../view/index.php');
	$m_foodshop = new FoodShop();

	//tìm kiếm theo địa chỉ
	// if(isset($_POST['diachi'])){
	// 	$dia_chi = $_POST['diachi'];
	// }
	// else {
	// 	$dia_chi = null;
	// }
	// $timkiem = $foodshop->queryLimitFoodShop($sql,$dia_chi);

	//bộ lọc
	$sql = "SELECT fs.*, users.name as nameuser FROM foodshop fs , users WHERE fs.user_id = users.id";
		$sql_total = "SELECT count(id) as total FROM foodshop WHERE 1=1";
		$link = "";
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

	//phân trang\
		$total_row = $m_foodshop->queryTotalFoodShop($sql_total);
		$total_record = $total_row['total']; // tổng sô record trong table
	// $total_page = $m_foodshop->countRowFoodShop();
	// $total_page = $total_page["total"];
	$current_page =  isset($_GET['page']) ? $_GET['page'] : 1; 

	$limit = 6;//6
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
	// $data = $foodshop->queryLimitFoodShop($sql,$dia_chi);
	require_once('../view/v_foodshop.php');
?>