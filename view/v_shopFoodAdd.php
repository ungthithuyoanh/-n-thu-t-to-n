<!--container-->	
<div class="container">
	<div class="col-md-6 col-md-offset-3 col-xs-8 col-xs-offset-2">
		
		<div id="card">
			<div class="card-header">
				<h3 style="color: red; font-weight: bold; text-align: center;">Thêm Cửa hàng</h3>
			</div>
			<div class="card-body">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST"  enctype= "multipart/form-data">
					<div class="form-group">	
						<label>Tên cửa hàng: (*)</label>
						<input type="text" class="form-control" name="nameShop" value="<?php echo $nameShop; ?>" id="nameShop" required minlength=6 maxlength="50" placeholder="Nhập tên cửa hàng">
						<?php if (isset($nameShopErr)):?>
							<span class='text-danger'><?=$nameShopErr?></span>
						<?php endif ?>
					</div>
					<div class="form-group">
						<label>Images: </label>
						<input type="file" name="fileToUpload" id="fileToUpload">
					</div>
					
					<div class="form-group">
						<label for="shop_type">Loại cửa hàng: (*)</label>
						<select class="form-control" name="shop_type" id="shop_type" class="form-control">
							<option value="Quán Ăn">Quán Ăn</option>
							<option value="Cafe/Dessert">Cafe/Dessert</option>
							<option value="Ăn chay">Ăn chay</option>
							<option value="Tiệm Bánh">Tiệm Bánh</option>
							<option value="Ăn vặt/vỉa hè">Ăn vặt/vỉa hè</option>
							<option value="Ăn vặt/vỉa hè">Nhà Hàng</option>
						</select>
						<?php if (isset($shop_typeErr)):?>
							<span class='text-danger'><?=$shop_typeErr?></span>
						<?php endif ?>
					</div>
					<div class="form-group"> 	
						<label>Địa chỉ: (*)</label>
						<input type="text" class="form-control" name="address" value="<?php echo $address; ?>" id="address" required minlength=10 maxlength="50" placeholder="Nhập địa chỉ">

						<?php if (isset($addressErr)):?>
							<span class='text-danger'><?=$addressErr?></span>
						<?php endif; ?>

					</div>
					<div class="form-group"> 	
						<label>Open-Time: (*)</label>
						<input type="text" class="form-control" name="open_time" value="<?php echo $open_time; ?>" id="open_time" required maxlength="100" placeholder="Nhập thời gian mở cửa">

						<?php if (isset($open_timeErr)):?>
							<span class='text-danger'><?=$open_timeErr?></span>
						<?php endif ?>
					</div>
					<div class="form-group"> 	
						<label>Cost: </label>
						<input type="text" class="form-control" name="cost" value="<?php echo $cost; ?>" id="cost"  maxlength="100" placeholder="Nhập giá giao động">
					</div>
					
					<input type="submit" value="Thêm cửa hàng" class="btn btn-success">
				</form>
			</div>
		</div>
	</div>
	<!-- end register  -->
</div>
	<!--end container-->