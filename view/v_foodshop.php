	<div id="address_product" class="col-md-9">
		<div id="border">
			<p class="col-md-4" style="color: red; font-weight: bold; font-size: 18px;">DANH SÁCH CỬA HÀNG</p>
			<p class="col-md-7 col-md-offset-1" id="filter"  style="margin: 0;">
				<form action="" class="form-inline" method="GET">
					<select name="address" id="address" class="form-control">
						<option value="-1">Địa chỉ</option>
						<option value="Hải Châu">Hải Châu</option>
						<option value="Thanh Khê">Thanh Khê</option>
						<option value="Liên Chiểu">Liên Chiểu</option>
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
			</p>
		</div>
			<?php if ( $data!= 0 ): ?>
				<?php foreach ($data as $row){ ?>
					<a href='../controller/c_detail.php?id=<?=$row['id']?>' class="shop">
						<div id="address_1" class="col-md-4 khung">
							<div class="address_1_1">
								<div id="hinh_anh">
									<img src="../images/<?=$row['img']?>" alt="hình ảnh">
								</div>
								<div class="noi_dung">
									<div class="noi_dung_1">
										<div class="mo_ta">
											<p class="title"><?=$row['name']?></p>
											<p class="title_1"><?=$row['address']?></p>
										</div>
										<div class="chu_de">
											<p><?=$row['shop_types']?></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
				<?php } ?>
			<?php endif ?>
			<div id="page" class="col-md-4 col-md-offset-4" style="clear: both;">
				<ul class="pagination">
					<?php if(isset($total_page) && isset($current_page) && $current_page > 1 ): ?>
					<li><a href="?page=<?=$current_page-1?>"> < </a></li>
				<?php endif ?>
				<?php for( $i=1 ; $i <= $total_page; $i++ ){ ?>

					<?php if($current_page == $i){ ?>
						<li class="active">
							<a href=""><?=$i?></a>
						</li>
					<?php }else{ ?>
						<li class="">
							<a href="?page=<?=$i?>"><?=$i?></a>
						</li>
					<?php } ?>
				<?php } ?>
				<?php if(isset($total_page) && isset($current_page) && $current_page < $total_page ): ?>
				<li><a href="?page=<?=$current_page+1?>"> > </a></li>
			<?php endif ?>
		
		</div>
	</div>
	<div id="address_product" class="col-md-3" >	
		<div id="border" style="padding-bottom: 20px; border-bottom: 1px solid #CCCCCC;">
			<p style="color: red; font-weight: bold; font-size: 18px;">CỬA HÀNG MỚI NHẤT</p>
		</div>
		<?php
		if (isset($dataNew) && $dataNew!=0) {
			foreach ($dataNew as $rowNew) {
				?>
				<a href='../controller/c_detail.php?id=<?=$rowNew['id']?>' class="shop">
					<div id="address_1" class="col-md-12 khung">
						<div class="address_1_1">
							<div id="hinh_anh">
								<img src="../images/<?=$rowNew['img']?>" alt="hình ảnh">
							</div>
							<div class="noi_dung">
								<div class="noi_dung_1">
									<div class="mo_ta">
										<p class="title"><?=$rowNew['name']?></p>
										<p class="title_1"><?=$rowNew['address']?></p>
									</div>
									<div class="chu_de">
										<p><?=$rowNew['shop_types']?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</a>
				<?php
			}
		}
		?>
	</div>
</div>
</div>

