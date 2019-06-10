<?php
	if(!isset($_GET['id'])){
		header("location:../c_index.php");
	}else{
		$id = $_GET['id'];
		require_once("../view/header.php");
		require_once("../model/m_foodshop.php");
		require_once("../model/m_product.php");
		require_once("../model/m_type_products.php");
		$m_foodshop = new FoodShop();
		$m_type_product = new TypeProduct();
		//lấy dữ liệu theo id
		$data = $m_foodshop->queryDetailsFoodShop($id);
		$categoryData = $m_type_product->queryTypeId($id);
		
		$productArr = array();

		if ( $categoryData != 0) {
			foreach ($categoryData as $value) {

				$key = $value['id'];
				$val = $m_type_product->queryProductByTypeId($key);
				$productArr[$key] = $val;
			}
		}
		if($data==0){
			header("location:c_index.php");
		}
		
		
		require_once("../view/detail.php");
		require_once("../view/footer.php");
	}
	?>

	<script type="text/javascript">
		$(document).ready(function() {
			document.title = '<?=$data['name']?>';
		});
	</script>