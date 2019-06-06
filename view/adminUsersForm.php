<?php 
if(isset($data) && $data != false): 
	?>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="card">
					<div class="card-header">
						<h2 align="center" style="color: red; font-weight: bold;">Thông tin User</h2>
					</div>
					<div class="card-body">
						<form action="" method="POST" >
							<div class="form-group">
								<label for="id">ID: </label>
								<input type="text" class="form-control" name="id" id='id' minlength="6" maxlength="100" value="<?=$data['id']?>" disabled>
							</div>
							<div class="form-group">
								<label for="name">Name: </label>
								<input type="text" class="form-control" name="name" id='name' minlength="6" maxlength="100" value="<?=$data['name']?>">
							</div>
							<div class="form-group">
								<label for="username">UserName: </label>
								<input type="text" class="form-control" name="username" id='username' value="<?=$data['username']?>" disabled>
							</div>
							<div class="form-group">
								<label for="email">Email: </label>
								<input type="text" class="form-control" name="email" id='email' value="<?=$data['email']?>" disabled>
							</div>
							<div class="form-group">
								<label >Sex: </label><br/>
								<input type="radio" class="single-bottom" name="sex" id="male" value="Nam">
								<label for="male">Male</label>
								<input type="radio" class="single-bottom" name="sex" id="female" value="Nữ">
								<label for="female">Female</label>
							</div>
							<div class="form-group">
								<label for="birthday">Birthday: </label>
								<input type="date" class="form-control" name="birthday" id="birthday" min="1920-01-01" max="2019-05-30" value="<?=$data['birthday']?>">
							</div>
							<div class="form-group">
								<label for="phone">Phone: </label>
								<input type="text" class="form-control" name="phone" id="phone" placeholder="Nhập số điện thoại" maxlength="15" value="<?=$data['phone']?>">
							</div>
							<div class="form-group">
								<label for="address">Address: </label>
								<textarea class="form-control" name="address" id="address" placeholder="Nhập địa chỉ"></textarea>
								<?php 
								if(strcmp($data['sex'], 'Nam') == 0){
									echo "<script>$('#male').attr('checked', true);
									$('#female').attr('checked', false);</script>";
								}elseif(strcmp($data['sex'], 'Nữ') == 0){
									echo "<script>$('#male').attr('checked', false);
									$('#female').attr('checked', true);</script>";
								}
								echo "<script>$('#address').val('".$data['address']."')</script>"; 
								?>
							</div>
							<div class="form-group">
								<label for="address">Verified: </label> <br>
								<?php  
									if($data['verified'] == 1){?>
								 	<input type="radio" class="single-bottom" name="verified" id="yes" value="1" checked hidden>
									<label for="verified" style="color: #155724;">Đã xác nhận</label>
								<?php }else{?>
									<input type="radio" class="single-bottom" name="verified" id="yes" value="1">
									<label for="verified">Đã xác nhận</label>
									<input type="radio" class="single-bottom" name="verified" id="no" value="0">
									<label for="verified">Chưa xác nhận</label>
								<?php } ?>

								<?php 
								if($data['verified'] == 0){
									echo "<script>
									$('#yes').attr('checked', false);
									$('#no').attr('checked', true);
									</script>";
								}?>
								
							</div>
							<div class="form-group">
								<label >Role: </label><br/>

								<input type="radio" class="single-bottom" name="role" id="admin" value="1">
								<label for="role">Admin</label>
								
								<input type="radio" class="single-bottom" name="role" id="customer" value="0">
								<label for="customer">Thành viên</label>

								<?php if($data['role'] == 2){?>
									<input type="radio" class="single-bottom" name="role" id="dkshop" value="2">
									<label for="dkshop">ĐK Cửa hàng</label>
								<?php } ?>

								<input type="radio" class="single-bottom" name="role" id="shop" value="3">
								<label for="shop">Cửa hàng</label>
								
								<?php if($data['role'] == 1){
									echo "<script>
									$('#admin').attr('checked', true);
									$('#customer').attr('checked', false);
									$('#shop').attr('checked', false);
									</script>";
								}elseif($data['role'] == 0){
									echo "<script>
									$('#admin').attr('checked', false);
									$('#customer').attr('checked', true);
									$('#shop').attr('checked', false);
									</script>";
								}elseif($data['role'] == 3){
									echo "<script>
									$('#admin').attr('checked', false);
									$('#customer').attr('checked', false);
									$('#shop').attr('checked', true);
									</script>";
								} 
								elseif($data['role'] == 2){
									echo "<script>
									$('#admin').attr('checked', false);
									$('#customer').attr('checked', false);
									$('#shop').attr('checked', false);
									$('#dkshop').attr('checked', true);
									</script>";
								} 
								?>
							</div>
							<div class="form-group">
								<label for="phone">Creation time: </label>
								<?php $date = date_create($data['crtime']);
								$date = date_format($date, ' H:i:s \, d-m-Y');
								echo $date; ?>
							</div>
							<div class="form-group">
								<button type="submit" name="update" class="btn btn-success">Update</button>
								<button type="submit" name="delete" class="btn btn-danger">Delete</button>			
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php 
endif; 
?>
<script type="text/javascript">
	$(document).ready(function() {
		document.title = 'Quản trị Users';
	});
</script>