<?php $page = strstr($_SERVER['PHP_SELF'], 'c_') ?>
<!-- cắt chuỗi lấy link -->
<div class="container">
	<h1 style="color: #660099;">Thông tin_<?=$_SESSION['name']?></h1>
	<ul class="nav nav-tabs">
		<li class="<?php echo ($page == "c_profile.php" ? "active" : "")?>">
			<a class="thongtinCN" href="../controller/c_profile.php">
					Thông tin cá nhân
				</a>
		</li>
		<li class="<?php echo ($page == "c_changePass.php" ? "active" : "")?>">
			<a class="thongtinMK" href="../controller/c_changePass.php">
					Đổi mật khẩu
				</a>
		</li>
		
		<br>
	</div>