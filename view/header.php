<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Đồ án thuật toán</title>
	<link rel="stylesheet" type="text/css" href="../css/datt.css">
	<link rel="stylesheet" type="text/css" href="../css/menu.css">
	<link rel="stylesheet" type="text/css" href="../css/reset.css">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome-4.7.0/css/font-awesome.css">
	<script src="../js/js.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>
	<div id="header" class="widget-section" >
		<div id="logo" class="widget-element">
			<img src="../images/logoweb.png" alt="logo">
		</div>	
	</div>
	<div class="clear"></div>
	<div id="nav" >
		<nav id="side-nav">
			<i class="fa fa-bars" onclick="open_nav();"></i>	
			<div class="menu">
				<a href="#">Trang chủ</a>
				<a href="#">Đặt hàng</a>
				<a href="#">Tuyển dụng</a>
				<a href="#">Giới thiệu</a>
				<a href="#lien_he">Liên hệ</a>
				<?php	
					if(isset($_SESSION['id']) && isset($_SESSION['name'])){
						?>
						<a href="../controller/c_logout.php" class="header-right">Đăng xuất</a>
						<a href="#" class="header-right"><?php echo $_SESSION['name']; ?> </a>
						<?php 
					}else{
						?>
						<a href="../controller/c_register.php" class="header-right">Đăng ký</a>
						<a href="../controller/c_login.php" class="header-right">Đăng nhập</a>
						<?php 
					}
					?>	
				<a href="javascript:;" class="dong"><i class="fa fa-times" onclick="close_nav();">Close</i></a>
			</div>
		</nav>
	</div>


