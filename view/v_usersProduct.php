<div class="col-md-offset-2 col-xs-offset-2">
	<a href="../controller/c_addShopFood.php">
		<button type="button" class="btn btn-outline-success ">Thêm sản phẩm</button>
	</a>
</div>
<div class="container">
	<div class="col-md-4">
		<h3 style="color: #FF0000;">
			Danh sách sản phẩm: <?=$total_record?>
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
				<th scope="col">Id</th>
				<th scope="col">Name</th>
				<th scope="col">Price</th>
				<th scope="col">Img</th>
				<th scope="col">Type</th>
				<th scope="col">CrTime</th>
				<th scope="col">UpdateTime</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if(isset($data) && $data!=false):
				foreach ($data as $row) {
					?>
					<tr>
						<td><?=$row["id"]?></td>
						<td><a href="../controller/c_detail.php?id=<?=$row['id']?>"><?=$row["name"]?></a></td>
						<td><?=$row["price"]?>.000đ</td>
						<td><?=$row["img"]?></td>
						<td><?=$row["nametype"]?></td>
						<td><?=$row["crtime"]?></td>
						<td><?=$row["updateTime"]?></td>
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