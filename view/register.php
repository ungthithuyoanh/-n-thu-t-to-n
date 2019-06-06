<?php if(isset($_GET['at']))
$at =$_GET['at']; 
?>
<!--container-->	
<div class="container">
	<?php if(!isset($tbDangKy) && !isset($button)){?>
		<div class="col-md-6 col-md-offset-3 col-xs-8 col-xs-offset-2">

			<div id="card">
				<div class="card-header">
					<?php if(isset($at)) {
						if($at == "add") {?>
							<h2 align="center" style="color: red; font-weight: bold;">Thêm User</h2>
						<?php }else{ ?>
							<h2 align="center" style="color: red; font-weight: bold;">Đăng ký User</h2>
						<?php }} ?>
					</div>
					<div class="card-body">
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
							<div class="form-group">	
								<label>Tên đăng nhập: (*)</label>
								<input type="text" class="form-control" name="username" value="<?php echo $username; ?>" id="username" required minlength=6 maxlength="50" placeholder="Nhập tên đăng nhập">
								<?php if (isset($usernameErr)):?>
									<span class='text-danger'><?=$usernameErr?></span>
								<?php endif ?>
							</div>
							<div class="form-group"> 	
								<label>Họ tên: (*)</label>
								<input type="text" class="form-control" name="name" value="<?php echo $name; ?>" id="name" required minlength=10 maxlength="50" placeholder="Nhập họ tên">

								<?php if (isset($nameErr)):?>
									<span class='text-danger'><?=$nameErr?></span>
								<?php endif; ?>

							</div>
							<div class="form-group"> 	
								<label>Email: (*)</label>
								<input type="email" class="form-control" name="email" value="<?php echo $email; ?>" id="email" required maxlength="100" placeholder="Nhập địa chỉ email">

								<?php if (isset($emailErr)):?>
									<span class='text-danger'><?=$emailErr?></span>
								<?php endif ?>

							</div>
							<div class="form-group"> 
								<label >Mật khẩu: (*)</label>
								<input type="password" class="form-control" name="pass" id="pass" required minlength=6 maxlength="100" placeholder="Nhập mật khẩu">
								<?php if (isset($passErr)):?>
									<span class='text-danger'><?=$passErr?></span>
								<?php endif ?>
							</div>
							<div class="form-group"> 
								<label >Nhập lại mật khẩu: (*)</label>
								<input type="password" class="form-control" name="pass2" id="pass2" required minlength=6 maxlength="100" placeholder="Nhập lại mật khẩu">
								<?php if (isset($pass2Err)):?>
									<span class='text-danger'><?=$pass2Err?></span>
								<?php endif ?>
							</div>
							<div class="form-group"> 
								<label >Chức năng: (*)</label>
								<select class="browser-default custom-select custom-select-lg mb-3" name="role">
									<option  selected value="0">Thành viên</option>
									<option value="2">Chủ cửa hàng</option>
								</select>
								<?php if (isset($passErr)):?>
									<span class='text-danger'><?=$passErr?></span>
								<?php endif ?>
							</div>
							<?php if(isset($at)) {
								if($at == "add") {?>
									<input type="submit" value="Thêm User" class="btn btn-success">
								<?php }else{ ?>
									<input type="submit" value="Đăng ký" class="btn btn-success">
								<?php }} ?>

							</form>
						</div>
					</div>
				</div>
				<!-- end register  -->
			<?php }else{ ?>
				<h4 style="color: #AAAAAA; width: 78%;"><?=$tbDangKy?></h4>
				<a href="../controller/c_login.php" class="header-right">
					<input class='btn btn-success btn-lg' type=submit value='<?=$button?>'>
				</a>
			<?php } ?>
		</div>
	<!--end container-->