<?php 
	// if(!isset($_GET['id'])){
	// 	header("location:../controller/c_index.php");
	// }else{
		$id = $_REQUEST['id'];
		require_once("../model/m_foodshop.php");
		require_once("../model/m_product.php");
		require_once("../model/m_type_products.php");
		$m_foodshop = new FoodShop();
		$m_type_product = new TypeProduct();
		//lấy dữ liệu theo id
		$data = $m_foodshop->queryDetailsFoodShop($id);
		
		// $name_search = "name like '%".$_REQUEST["q"]."%'";
		if(!empty(trim($_REQUEST["q"]))){
			$name_search = "name like '%".$_REQUEST["q"]."%'";
		}else{
			$name_search = "1=1";
		}
		$categoryData = $m_type_product->queryTypeId($id);
		
		$productArr = array();

		if ( $categoryData != 0) {
			foreach ($categoryData as $value) {

				$key = $value['id'];
				$val = $m_type_product->queryProductByTypeId($key, $name_search);
				$productArr[$key] = $val;
			}
		}
		// if($data==0){
		// 	header("location:c_index.php");
		// }
		
	// }
		require_once("../view/v_detail_search.php");
?>
