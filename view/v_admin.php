<?php $page = strstr($_SERVER['PHP_SELF'], 'c_') ?>
<!-- cắt chuỗi lấy link -->
<div class="container">
	<h1>Trang quản trị</h1>
	<ul class="nav nav-tabs">
		<li class="<?php echo ($page == "c_adminUsers.php" ? "active" : "")?>">
			<a href="../controller/c_adminUsers.php">Quản trị User</a>
		</li>
		<li class="<?php echo ($page == "c_adminShop.php" ? "active" : "")?>">
			<a href="../controller/c_adminShop.php">Quản trị Shop</a>
		</li>
		<li class="<?php echo ($page == "c_adminStatistics.php" ? "active" : "")?>">
			<a href="../controller/c_adminStatistics.php">Thống kê</a>
		</li>
	</ul>
	<br>
</div>