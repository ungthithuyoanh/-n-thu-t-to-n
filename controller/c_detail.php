<?php
	if(!isset($_GET['id'])){
		header("location:../c_index.php");
	}else{
		$id = $_GET['id'];
		require_once("../view/header.php");
		require_once("../model/m_foodshop.php");
		require_once("../model/m_product.php");
		$m_foodshop = new FoodShop();
		
			//lấy dữ liệu theo id
		$data = $m_foodshop->queryDetailsFoodShop($id);

		//lấy sản phẩm
		$m_products = new Product();

		$data1 = $m_products->queryProduct($id);
		// $data1=array($data1);
		// foreach ($data1 as $value) {
		// echo $value['id'];
		// }
		//không có kết quả
		if($data==0){
			header("location:c_index.php");
		}
		if($data1==0){
			header("location:c_index.php");
		}
		// if($_SERVER['REQUEST_METHOD'] == 'POST'){ //add cart
		// 	if(!isset($_SESSION['id']) || !isset($_SESSION['name']) || !isset($_SESSION['role'])){ //kiem tra login
		// 		echo "<script type='text/javascript' charset='utf-8' >$(document).ready(function(){ $('#danger').sho(); });</wscript>";
		// 	}else{
		// 		require_once("../model/m_cart.php");
		// 		$m_cart = new M_Cart();
		// 		$idUser = $_SESSION["id"];
		// 		$idProduct = $id;
		// 		if($m_cart->queryCart($idUser, $idProduct)){
		// 			echo "<script type='text/javascript' charset='utf-8' >$(document).ready(function(){ 
		// 				$('#added').show(); });</script>";
		// 		}else{
		// 			$size = $_POST['size'];
		// 			$amount = $_POST['amount'];
		// 			$m_cart->insertCart( $idUser, $idProduct, $size, $amount);
		// 			echo "<script type='text/javascript' charset='utf-8' >$(document).ready(function(){ 
		// 				$('#added').show(); });</script>";
		// 		}
		// 	}
		// }
		require_once("../view/detail.php");
		require_once("../view/footer.php");
	}
	?>

	<script type="text/javascript">
		$(document).ready(function() {
			document.title = '<?=$data['name']?>';
		});
	</script>