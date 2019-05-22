<div class="container">
	<?php if(!isset($thongbao)): ?>
	<form action="" method="post" class="col-md-6 col-md-offset-3 col-xs-8 col-xs-offset-2">
		<div class="form-group">
			<h1>Đặt lại mật khẩu của bạn</h1>
			<label for="exampleInputEmail1">Email address</label>
			<input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email">
			<?php if(isset($errEmail)){?>
				<small id="emailHelp" class="form-text text-muted"><?=$errEmail?></small>
			<?php } ?>
			<h5>Vui lòng nhập email để đặt lại mật khẩu!</h5>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
	<?php else: ?>
		<h1><?=$thongbao?></h1>
<?php endif; ?>
</div>