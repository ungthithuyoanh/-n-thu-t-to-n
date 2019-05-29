<div class="container">
	<div>
		<a href="../controller/c_register.php?at=add">
			<button type="button" class="btn btn-outline-success">Thêm User</button>
		</a>
	</div>
	<div class="col-md-4">
		<h3 style="color: #FF0000;">
			Danh sách User: <?=$total_record?>
		</h3>
	</div>
	<table class="table table-hover" >
		<thead class="thead-dark" style="background-color: #555555;">
			<tr style="color: #fff; font-size: 16px; font-weight: bold;">
				<th scope="col">ID</th>
				<th scope="col">Name</th>
				<th scope="col">UserName</th>
				<th scope="col">Email</th>
				<th scope="col">Sex</th>
				<th scope="col">Birthday</th>
				<th scope="col">Phone</th>
				<th scope="col">Address</th>
				<th scope="col">Verified</th>
				<th scope="col">Role</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if (isset($data) && $data!=false):
				foreach ($data as $row) {
					?>
					<tr>
						<td>
							<?=$row["id"]?>
						</td>
						<td>
							<?=$row["name"]?>
						</td>						
						<td>
							<?=$row["username"]?>
						</td>
						<td>
							<?=$row['email']?>
						</td>
						<td>
							<?=$row["sex"]?>
						</td>
						<td>
							<?=$row['birthday']?>
						</td>
						<td>
							<?=$row['phone']?>
						</td>
						<td>
							<?=$row['address']?>
						</td>
						<td>
							<?php 

							if($row['verified'] == 1){
								echo "<p style='color:#155724;'>Đã xác nhận</p>";
							}
							if($row['verified'] == 0){
								echo "<p style='color:#721c24;'>Chưa xác nhận</p>";
							}
							?>
						</td>
						<td>
							<?php 

							if($row['role'] == 2){
								echo "<p style='color:#00EE00;'>Đk cửa hàng</p>";
							}
							if($row['role'] == 1){
								echo "<p style='color:#FF0099;'>Admin</p>";
							}
							if($row['role'] == 0){
								echo "<p style='color:#FF6600;'>Thành viên</p>";
							}
							if($row['role'] == 3){
								echo "<p style='color:#FF0000;'>Cửa hàng</p>";
							}
							?>
						</td>
						<td>
							<a href="?edit=<?=$row['id']?>"><input type="button" class="btn btn-info" value="Edit"></a>
						</td>
					</tr>
				<?php } endif; ?>
		</tbody>
	</table>
</div>


