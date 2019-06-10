	<div class="content">
		<div class="col-md-6 col-md-offset-3">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#dich">Thông tin cửa hàng</a></li>
				<li><a data-toggle="tab" href="#dich1">Chủ cửa hàng</a></li>
				<li><a data-toggle="tab" href="#dich2">Thông tin sản phẩm</a></li>
			</ul>

			<div class="tab-content">
				<div id="dich" class="tab-pane fade in active">
					<div id="Shopfood">
						<div class="card-header">
							<h2 align="center" style="color: red; font-weight: bold;"><?=$data['name']?></h2>
					</div>
					<div class="card-body">
						<form action="" method="POST" >
							<div class="form-group" style="display: none;">
								<label for="user_id">User id: </label>
								<input type="text" class="form-control" name="user_id" id='user_id' minlength="6" maxlength="100" value="<?=$data['user_id']?>">
							</div>
							<div class="form-group">
								<label for="img">Image: </label>
								<div class="img-detail" >
									<img src="../images/<?=$data['img']?>" alt="<?=$data['name']?>" style="width: 100%; height: auto;">
								</div>
							</div>
							<div class="form-group">
								<label for="name">Name: </label>
								<input type="text" class="form-control" name="name" id='name' minlength="6" maxlength="100" value="<?=$data['name']?>" required>
							</div>
							<div class="form-group">
								<label for="address">Address: </label>
								<input type="text" class="form-control" name="address" id='address' minlength="6" maxlength="100" value="<?=$data['address']?>" required>
							</div>
							<div class="form-group">
								<label for="open_time">Open-Time: </label>
								<input type="text" class="form-control" name="open_time" id='open_time' minlength="6" maxlength="100" value="<?=$data['open_time']?>" required>
							</div>						
							<div class="form-group">
								<label for="shop_type">Shop Types: </label>
								<select class="form-control" name="shop_type" id="shop_type" class="form-control">
									<option value="<?=$data['shop_types']?>"><?=$data['shop_types']?></option>
									<option value="Quán Ăn">Quán Ăn</option>
									<option value="Cafe/Dessert">Cafe/Dessert</option>
									<option value="Ăn chay">Ăn chay</option>
									<option value="Tiệm Bánh">Tiệm Bánh</option>
									<option value="Ăn vặt/vỉa hè">Ăn vặt/vỉa hè</option>
									<option value="Ăn vặt/vỉa hè">Nhà Hàng</option>
								</select>
							</div>
							<div class="form-group">
								<label for="cost">Cost: (VND)</label><br/>
								<input type="text" class="form-control" name="cost" id='cost' value="<?=$data['cost']?>">
							</div>
							<div class="form-group">
								<label for="phone">Creation time: </label>
								<?php $dateCr = date_create($data['crtime']);
								$dateCr = date_format($dateCr, ' H:i:s \, d-m-Y');
								echo $dateCr; ?>
							</div>
							<div class="form-group" name="updateTime">
								<label for="phone">Update time: </label>
								<?php $dateUp = date_create($data['updateTime']);
								$dateUp = date_format($dateUp, ' H:i:s \, d-m-Y');
								echo $dateUp; ?>
							</div>
							<div class="form-group">
								<button type="submit" name="update" class="btn btn-success">Update</button>
								<button type="submit" name="delete" class="btn btn-danger">Delete</button>

							</div>
						</form>
					</div>
				</div>
			</div>
			<div id="dich1" class="tab-pane fade">
				<div class="card">
					<div class="card-header">
						<h2 align="center" style="color: red; font-weight: bold;">Thông tin chủ cửa hàng</h2>
					</div>
					<div class="card-body ">
						<form action="" method="POST" >
							<div class="form-group" style="display: none;">
								<label for="user_id">User id: </label>
								<input type="text" class="form-control" name="user_idShop" id='user_idShop' minlength="6" maxlength="100" value="<?=$data['user_id']?>">
							</div>
							<div class="form-group">
								<label for="name">Họ tên: </label>
								<input type="text" class="form-control" name="nameShop" id='nameShop' minlength="6" maxlength="50">
							</div>
							<div class="form-group">
								<label for="username">Tài khoản: </label>
								<input type="text" class="form-control" name="usernameShop" id='usernameShop' disabled>
							</div>
							<div class="form-group">
								<label for="email">Email: </label>
								<input type="text" class="form-control" name="emailShop" id='emailShop' disabled>
							</div>
							<div class="form-group">
								<label >Giới tính: </label><br/>
								<label for="male"><input type="radio" class="single-bottom" name="sexShop" id="maleShop" value="Nam">Nam</input></label>
								<label for="female"><input type="radio" class="single-bottom" name="sexShop" id="femaleShop" value="Nữ">Nữ</input></label>
							</div>
							<div class="form-group">
								<label for="birthday">Ngày sinh: </label>
								<input type="date" class="form-control" name="birthdayShop" id="birthdayShop" min="1920-01-01" max="2019-01-04">
							</div>
							<div class="form-group">
								<label for="phone">Số điện thoại: </label>
								<input type="text" class="form-control" name="phoneShop" id="phoneShop" placeholder="Nhập số điện thoại" maxlength="15">
							</div>
							<div class="form-group">
								<label for="address">Địa chỉ: </label>
								<textarea class="form-control" name="addressShop" id="addressShop" placeholder="Nhập địa chỉ"></textarea>
							</div>
							<div class="form-group">
								<div class="col-sm-4 col-sm-offset-4">
									<button type="submit" name="profile" class="btn btn-success btn-md">Cập nhật</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div id="dich2" class="tab-pane fade">
				<h3>Menu 2</h3>
				<p>Some content in menu 2.</p>
			</div>
		</div>

	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		document.title = 'Thông tin Shop';
	});
</script>