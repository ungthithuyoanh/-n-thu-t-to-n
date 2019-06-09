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
	require_once("../model/m_statistics.php");
	require_once("../view/v_admin.php");
	$m_statistics = new M_Statistics();
	$countProducts = $m_statistics->queryCountProducts();
	$countTypes = $m_statistics->queryCountTypesProducts();
	$countFoodshop = $m_statistics->queryCountFoodShop();
	$countUsers = $m_statistics->queryCountUsers();
	$countAdminUsers = $m_statistics->queryCountAdminUsers();
	$countShopUsers = $m_statistics->queryCountShopUsers();
	$countCustomerUsers = $m_statistics->queryCountCustomerUsers();
	
	require_once("../view/v_adminStatistics.php");
	require_once("../view/footer.php");
?>
<script type="text/javascript">
	    $(document).ready(function() {
	        document.title = 'Thống kê';
	    });
	</script>