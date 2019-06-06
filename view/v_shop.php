<?php $page = strstr($_SERVER['PHP_SELF'], 'c_') ?>
<!-- cắt chuỗi lấy link -->
<div class="container">
	<h1 style="color: #660099;">Thông tin cửa hàng_<?=$_SESSION['name']?></h1>
	<!-- <h1>THÔNG TIN</h1> -->
	<ul class="nav nav-tabs">
		<li class="<?php echo ($page == "c_shopFood.php" ? "active" : "")?>">
			<a href="../controller/c_shopFood.php">Quản lý cửa hàng</a>
		</li>
		<li class="<?php echo ($page == "c_shopProduct.php" ? "active" : "")?>">
			<a href="../controller/c_shopProduct.php">Quản lý sản phẩm</a>
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