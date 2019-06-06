<?php if ($_SESSION['role'] == 3){ ?>
<div class="col-md-offset-2" style="clear: both;">
	<a href="../controller/c_addShopFood.php">
		<button type="button" class="btn btn-outline-success ">Thêm cửa hàng</button>
	</a>
</div>
<?php } ?>
<div class="container">
	<?php if ($_SESSION['role'] == 3){ ?>
	<div class="col-md-4">
		<h3 style="color: #FF0000;">
			Danh sách cửa hàng: <?=$total_record?>
		</h3>
	</div>
	<?php } ?>
	<div class="col-md-6 col-md-offset-3" style="clear: both;">
		<?php if (isset($data)): 
			foreach ($data as $row) {	
		?>
			<div id="Shopfood">
				<div class="card-header">
					<h2 align="center" style="font-weight: bold; color: #AA0000"><?=$row['name']?></h2>
				</div>
				<div class="card-body">
					<form action="" method="POST" >
						<div class="form-group" style="display: none;">
							<label for="id">ID: </label>
							<input type="text" class="form-control" name="id" id='id' minlength="6" maxlength="100" value="<?=$row['id']?>">
						</div>
						<div class="form-group">
							<label for="img">Image: </label>
							<div class="img-detail" >
								<img src="../images/<?=$row['img']?>" alt="<?=$row['name']?>" style="width: 100%; height: auto;">
							</div>
						</div>
						<div class="form-group">
							<label for="name">Name: </label>
							<input type="text" class="form-control" name="name" id='name' minlength="6" maxlength="100" value="<?=$row['name']?>" required>
						</div>
						<div class="form-group">
							<label for="address">Address: </label>
							<input type="text" class="form-control" name="address" id='address' minlength="6" maxlength="100" value="<?=$row['address']?>" required>
						</div>
						<div class="form-group">
							<label for="open_time">Open-Time: </label>
							<input type="text" class="form-control" name="open_time" id='open_time' minlength="6" maxlength="100" value="<?=$row['open_time']?>" required>
						</div>						
						<div class="form-group">
							<label for="shop_type">Shop Types: </label>
							<select class="form-control" name="shop_type" id="shop_type" class="form-control">
								<option value="<?=$row['shop_types']?>"><?=$row['shop_types']?></option>
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
							<input type="text" class="form-control" name="cost" id='cost' value="<?=$row['cost']?>">
						</div>
						<div class="form-group">
							<label for="phone">Creation time: </label>
							<?php $dateCr = date_create($row['crtime']);
							$dateCr = date_format($dateCr, ' H:i:s \, d-m-Y');
							echo $dateCr; ?>
						</div>
						<div class="form-group" name="updateTime">
							<label for="phone">Update time: </label>
							<?php $dateUp = date_create($row['updateTime']);
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
		<?php }endif; ?>
	</div>
</div>	

<script src="../js/ajax.js" type="text/javascript"></script>

<script type="text/javascript">
	$(document).ready(function() {
		document.title = 'Quản trị ShopFooding';
	});
</script>