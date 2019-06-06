<?php $page = strstr($_SERVER['PHP_SELF'], 'c_') ?>
<!-- cắt chuỗi lấy link -->
<div class="col-md-6 col-md-offset-3">
	<h4 style="color: #660099;"><?=$data['name']?></h4>
	<!-- <h1>Trang quản trị</h1> -->
	<ul class="nav nav-tabs">
		<li class="<?php echo ($page == "c_adminshopFood.php" ? "active" : "")?>">
			<a href="../controller/c_adminshopFood.php">Thông tin cửa hàng</a>
		</li>
		<li class="<?php echo ($page == "c_adminShop.php" ? "active" : "")?>">
			<a href="../controller/c_adminShop.php">Chủ cửa hàng</a>
		</li>
	</ul>
	<br>
</div>