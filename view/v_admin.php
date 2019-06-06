<?php $page = strstr($_SERVER['PHP_SELF'], 'c_') ?>
<!-- cắt chuỗi lấy link -->
<div class="container">
	<h1 style="color: #660099;">Trang quản trị của Admin_<?=$_SESSION['name']?></h1>
	<!-- <h1>Trang quản trị</h1> -->
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
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?=$_SESSION['name']?></a>
			<div class="dropdown-menu">
				<a class="thongtinCN" href="../controller/c_profile.php">
					Thông tin cá nhân
				</a>
				<hr>
				<a class="thongtinMK" href="../controller/c_changePass.php">
					Đổi mật khẩu
				</a>
			</div>
		</li>
	</ul>
	<br>
</div>