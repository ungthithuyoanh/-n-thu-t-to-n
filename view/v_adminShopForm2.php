	<div class="content">
		<div class="col-md-6 col-md-offset-3">
			<div class="card">
				<div class="card-header">
					<nav>
						<div class="nav nav-tabs" id="nav-tab" role="tablist">
							<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true" style="padding-right: 20px; text-decoration: none;">
								Thông tin cửa hàng
							</a>
							<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false" style="text-decoration: none;padding-right: 20px; ">
								Chủ cửa hàng
							</a>
							<a class="nav-item nav-link" id="nav-product-tab" data-toggle="tab" href="#nav-product" role="tab" aria-controls="nav-product" aria-selected="false" style="text-decoration: none;">
								Thông tin sản phẩm
							</a>
						</div>
					</nav>	
				</div>
				<div class="card-body">
				<div class="tab-content" id="nav-tabContent">
					<!-- <?php if (isset($data)): ?> -->
						<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
							<div class="col-md-10 col-md-offset-1">
								<div id="Shopfood">
									<div class="card-header">
										<h2 align="center" style="font-weight: bold; color: #AA0000"><?=$data['name']?></h2>
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
						</div>
					</div>
						<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
							<div class="col-md-10 col-md-offset-1">
								
							</div>
						</div>
						<div class="tab-pane fade" id="nav-product" role="tabpanel" aria-labelledby="nav-product-tab">
							<div class="col-md-10 col-md-offset-1">
								
							</div>
						</div>
					<?php endif; ?>
				</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			document.title = 'Thông tin Shop';
		});
	</script>
<!-- <?php 
// $page = strstr($_SERVER['PHP_SELF'], 'c_') 
?> -->
<!-- <div class="container col-md-6 col-md-offset-3">
	<h4>Thông tin cửa hàng</h4>
	<ul class="nav nav-tabs"> -->
		<!-- <li class="<?php 
		// echo ($page == "c_shopfood.php" ? "active" : "")
		?>"> -->
		<!-- <a href="../controller/c_shopfood.php">Cửa hàng</a> -->
		<!-- </li> -->
		<!-- <li class="<?php 
		// echo ($page == "c_shopuser.php" ? "active" : "")
		?>"> -->
		<!-- <a href="../controller/c_shopuser.php">Chủ cửa hàng</a> -->
		<!-- </li> -->
	<!-- </ul>
	<br>
</div> -->
