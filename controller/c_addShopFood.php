<?php 
require_once('../view/header.php');
$nameShop = '';
$shop_type = '';
$address = '';
$open_time = '';
$cost = '';

	//biến chứa nội dung đã nhập

if(isset($_SESSION['role']) && $_SESSION['role'] == 3){
	require_once("../view/v_shop.php"); 
}
if(isset($_SESSION['role']) && $_SESSION['role'] == 1){
	require_once("../view/v_admin.php"); 
}
	//nhấn button đăng ký
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	require_once('../controller/c_uploadImg.php');
	$nameShop = $_POST['nameShop'];
	$shop_type = $_POST['shop_type'];
	$address = $_POST['address'];
	$open_time = $_POST['open_time'];
	$cost = $_POST['cost'];
	// $branch = $_POST['branch'];
		//kiểm tra data nhập vào
	require_once("../model/validationShop.php");
	$vali = new ValidationShop();

		//test input
	$nameShop = $vali->test_input($nameShop);
	$shop_type = $vali->test_input($shop_type);
	$address =$vali->test_input($address);
	$open_time = $vali->test_input($open_time);
	$cost = $vali->test_input($cost);
		//check value
	$nameShopErr = $vali->checkNameShop($nameShop);
	$shop_typeErr = $vali->checkType($shop_type);
	$addressErr = $vali->checkAddress($address);
	$open_timeErr = $vali->checkTime($open_time);
	// $branchErr = $vali->checkRole($branch);
		//thõa điều kiện dữ liệu đầu vào
	if( 
		($nameShopErr == null) &&
		($shop_typeErr == null) &&
		($addressErr == null) &&
		($open_timeErr == null) 
		// ($roleErr == null)
	){
		require_once("../model/m_user.php");
		$target_file1 = basename($_FILES["fileToUpload"]["name"]);
		$m_foodshop = new FoodShop();
		$shopArr = array( 
			ucwords($nameShop),//oanh oc bo -> Oanh Oc Bo
			ucwords($shop_type), 
			ucwords($address),
			$open_time,
			$cost,
			$target_file1,
			$_SESSION['id']
		);

		$m_foodshop->insertShop($shopArr);
		echo '<div class="col-md-4 col-md-offset-4 alert alert-success" role="alert">Thêm cửa hàng thành công!</div>';
		// $thongbao = "Thêm cửa hàng thành công";
		// if(isset($_SESSION['role']) && $_SESSION['role'] == 3)
		// {
		// 	header('location:c_shopFood.php');	
		// }
		// else if(isset($_SESSION['role']) && $_SESSION['role'] == 1){
		// 	header('location:c_adminShop.php');	
		// }
	}
}
require_once("../view/v_shopFoodAdd.php"); 
require_once("../view/footer.php");
?>
