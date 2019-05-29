	<div class="content">
		<div class="col-md-6 col-md-offset-3">
			<div class="card">
				<div class="card-header">
					<nav>
						<div class="nav nav-tabs" id="nav-tab" role="tablist">
							<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
								Thông tin cửa hàng
							</a>
							<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
								Chủ cửa hàng
							</a>
						</div>
					</nav>	
				</div>
				<div class="tab-content" id="nav-tabContent">
					<?php if (isset($data)): ?>
						<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
							<div class="col-md-6 offset-3">
								<div id="Shopfood">
									<div class="card-header">
										<h2 align="center">Thông tin cửa hàng</h2>
									</div>
									<div class="card-body">
										<form action="" method="POST" >
											<div class="form-group" >
												<label for="id">ID: </label>
												<input type="text" class="form-control" name="id" id='id' minlength="6" maxlength="100" value="<?=$data['id']?>" disabled>
											</div>
											<div class="form-group">
												<label for="img">Image: </label>
												<div class="img-detail" >
													<img src="../images/<?=$data['img']?>" alt="<?=$data['name']?>">
												</div>
												<br>
												<input type="text" class="form-control" name="img" id='img' minlength="2" maxlength="100" value="<?=$data['img']?>" required>
											</div>
											<div class="form-group">
												<label for="name">Name: </label>

												<input type="text" class="form-control" name="name" id='name' minlength="6" maxlength="100" value="<?=$data['name']?>" required>
											</div>
											<div class="form-group">
												<label for="gender">Gender: </label>
												<label for="male">Male</label>
												<input type="radio" class="single-bottom" name="gender" id="male" value="Nam">
												<label for="female">Female</label>
												<input type="radio" class="single-bottom" name="gender" id="female" value="Nữ">
											</div>
											<div class="form-group">
												<label for="types">Types: </label>
												<select class="form-control" name="types" id="types" class="form-control">
													<option value="Giày Sneaker">Giày Sneaker</option>
													<option value="Giày Boot">Giày Boot</option>
													<option value="Giày Lười">Giày Lười</option>
													<option value="Giày Cao Gót">Giày Cao Gót</option>
													<option value="Giày Tây">Giày Tây</option>
												</select>
											</div>
											<div class="form-group">
												<label for="cost">Cost: (VND)</label><br/>
												<input type="text" class="form-control" name="cost" id='cost' value="<?=$data['cost']?>" required>
											</div>
											<div class="form-group">
												<label for="describes">Describes: </label>
												<textarea class="form-control" name="describes" id="describes" placeholder="Nhập mô tả" required value=""></textarea>
											</div>
											<div class="form-group">
												<label for="phone">Creation time: </label>
												<?php $dateCr = date_create($data['crtime']);
												$dateCr = date_format($dateCr, ' H:i:s \, d-m-Y');
												echo $dateCr; ?>
											</div>
											<div class="form-group">
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
						<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
							<p><?=$data['address']?></p>
						</div>
					<?php endif; ?>
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
