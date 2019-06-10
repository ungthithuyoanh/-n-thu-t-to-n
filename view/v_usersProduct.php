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