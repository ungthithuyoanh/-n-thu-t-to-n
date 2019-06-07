<div class="col-md-offset-2 col-xs-offset-2">
	<a href="../controller/c_addShopFood.php">
		<button type="button" class="btn btn-outline-success ">Thêm cửa hàng</button>
	</a>
</div>
<div class="container">
	<div class="col-md-4">
		<h3 style="color: #FF0000;">
			Danh sách cửa hàng: <?=$total_record?>
		</h3>
	</div>
	<div class="" id="filter" style="padding-top: 15px; float: right;">
		<form action="" class="form-inline" method="GET">
			<select name="address" id="address" class="form-control">
				<option value="-1">Địa chỉ</option>
				<option value="Hải Châu">Hải Châu</option>
				<option value="Thanh Khê">Thanh Khê</option>
				<option value="Liên Chiểu">Liên Chiểu</option>
				<option value="Cẩm Lệ">Cẩm Lệ</option>
				<option value="Sơn Trà">Sơn Trà</option>
			</select>
			<select name="shop_type" id="shop_type" class="form-control">
				<option value="-1">Danh mục</option>
				<option value="Quán ăn">Quán ăn</option>
				<option value="Ăn Chay">Ăn Chay</option>
				<option value="Tiệm Bánh">Tiệm Bánh</option>
				<option value="Ăn vặt/vỉa hè">Ăn vặt/vỉa hè</option>
				<option value="Cafe/Dessert">Cafe/Dessert</option>
			</select>
			<select name="cost" id="cost" class="form-control">
				<option value="-1">Giá</option>
				<option value="1">Thấp - Cao</option>
				<option value="2">Cao - Thấp</option>
			</select>
			<button class="btn btn-outline-success" type="submit">Lọc</button>
		</form>
	</div>
	<table class="table table-striped">
		<thead class="thead-dark" style="background-color: #555555;">
			<tr style="color: #fff; font-size: 16px; font-weight: bold;">
				<th scope="col">Name</th>
				<th scope="col">Shop_Types</th>
				<th scope="col">Address</th>
				<th scope="col">Open_Time</th>
				<th scope="col">Cost</th>
				<th scope="col">Img</th>
				<th scope="col">CrTime</th>
				<th scope="col">User</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if(isset($data) && $data!=false):
				foreach ($data as $row) {
					?>
					<tr>
						<td><a href="../controller/c_detail.php?id=<?=$row['id']?>"><?=$row["name"]?></a></td>
						<td><?=$row["shop_types"]?></td>
						<td><?=$row["address"]?></td>
						<td><?=$row["open_time"]?></td>
						<td><?=$row["cost"]?></td>
						<td><?=$row["img"]?></td>
						<td><?=$row["crtime"]?></td>
						<td><?=$row["nameuser"]?></td>
						<td><a href="?edit=<?=$row['id']?>"><button type="button" class="btn btn-info">Edit</button> </a></td>
					</tr>
					<?php 
				}
			endif; ?>
		</tbody>
	</table>
</div>	

<script src="../js/ajax.js" type="text/javascript"></script>

<script type="text/javascript">
		$(document).ready(function() {
			document.title = 'Quản trị ShopFooding';
		});
	</script>