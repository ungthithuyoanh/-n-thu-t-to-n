
<div class="container" id="_trang_chu">
	<div class="col-md-5 col-md-offset-0 col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1">
		<img src="../images/<?=$data['img']?>" alt="<?=$data['name']?>" style = "width: 100%; height: auto;">
	</div>
	<div class="col-md-6 col-md-offset-0 col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1">
		<h6>THÔNG TIN CỬA HÀNG</h6>	
		<p style="font-size: 14px; color: #959595;text-transform: uppercase;"><?=$data['shop_types']?></p>
		<h2 style="font-size: 25px;color: #464646;font-weight: 700;text-overflow: ellipsis;white-space: nowrap;overflow: hidden; margin: 0px 0px 10px">
			<?=$data['name']?>	
		</h2>
		<div class="address" style="color: #252525; font-size: 14px; margin-bottom: 3px;">
			<?=$data['address']?>
		</div>
		<div class="open_time" style="padding: 10px 0px;">
			<div class="title_time" style="float: left;">
				<style type="text/css" media="screen">
					.span:before{
						width: 8px;
						height: 8px;
						background-color: #6cc942;
						content: "";
						border-radius: 50%;
						cursor: pointer;
						float: left;
						margin: 5px 5px 5px 0px;
					}
				</style>
				<span class="span" style="color: #329900">Mở cửa</span>
			</div>
			<div class="time"  style="float: left; padding-left: 15px;">
				<i class="far fa-clock" style="color: #959595; margin-right: 3px;"></i>
				<?=$data['open_time']?>
			</div>	
		</div>
		<div class="cost" style="clear: both; color: #959595; font-size: 15px; padding: 10px 0px;">
			<i class="fas fa-comment-dollar" style="color: #959595; margin-right: 3px;"></i>
			<?=$data['cost']?>	
		</div>

		<div style="border-top: 2px solid #ebebeb; margin-top: 10px; width: 80%;">
			<div style="float: left;">
				<div style="color: #959595;font-size: 13px; text-transform: uppercase; padding: 20px 0px 5px;">Phí giao hàng</div>
				<div style="color: #252525; font-size: 14px;"><?=$data['shipped']?>đ/km</div>
			</div>
			<div id="border_center" style="float: left; border-left: 1px solid #959595;margin: 25px 5%; height: 30px;">
			</div>
			<div style="float: left; ">
				<div style="color: #959595;font-size: 13px; text-transform: uppercase; padding: 20px 0px 5px;">Chuẩn bị</div>
				<div style="color: #252525; font-size: 14px;"><?=$data['prepare']?></div>
			</div>
		</div>
	</div>
</div>
<div id="mota">
	<div class="container">	
		<div id="menu" class="col-md-3">	
			<div class="col-md-12">
				<a href="#_trang_chu" class="col-md-10">Trang chủ
					<span style="float: right;">></span>
				</a>
			</div>
			<div class="col-md-12">
				<a id="show" href="#_thuc_don" class="col-md-10">Thực đơn 
					<span style="float: right;">></span>
				</a>
				<div id="menu1" class="col-md-12">
					<div class="menu_restaurant_category">
						<?php if ( $categoryData != 0): ?>
							<?php foreach ($categoryData as $typeRow): ?>
								<div class="item">
									<a href="#<?=$typeRow['id']?>Type" class="link">
										<span id="45173" title="Combo Hot chỉ bán trên Now" class="item-link active"><?=$typeRow['types']?></span>

									</a>
								</div>
							<?php endforeach; ?>
						<?php endif ?>
					</div>
				</div>
			</div>
			<!-- <div class="col-md-12">
				<a href="#_binh_luan" class="col-md-10">Bình luận
					<span style="float: right;">></span>
				</a>
			</div> -->
		</div>
		<div class="col-md-9 result">
			<div id="_thuc_don" class="col-md-12">
				<div id="menu2" class="col-md-10">
					<div id="menu2_2" >
						<form class="form-inline my-2 my-lg-0">
							<p>
								<i class="fas fa-search"></i>
								<input class="form-control mr-sm-2" name="search" id="search"	type="search" placeholder="Nhập tên sản phẩm" aria-label="Search" required onkeyup="showHint(this.value, <?= $data['id'] ?>)">
							</p>					
						</form>
						<div id="form">
							<?php if ( $categoryData != 0 ):
								foreach ( $categoryData as $typeRow) {
									?>								
									<div>
										<div id="<?=$typeRow['id']?>Type" class="titleProduct">
											<div class="content">
												<p><?=$typeRow['types']?></p>
											</div>
										</div>
										<?php if ($productArr[$typeRow['id']] != 0 ): ?>
											<?php foreach ($productArr[$typeRow['id']] as $product): ?>

												<div id="product" class="row" style="clear: left;">
													<?php if($product['img'] != null){?>
													<div class="col-md-2" style="float: left;">
														<img src="../images/<?=$product['img']?>">
													</div>
												<?php }else { ?>
													<div class="col-md-2" style="float: left;">
														<img src="../images/default.png">
													</div>
												<?php } ?>
													<p class="col-md-8 namePr" style="float: left;"><?=$product['name']?></p>
													<p class="col-md-2 costPr" style="float: right;"><?=$product['price']?>.000đ</p>
												</div>
											<?php endforeach ?>
										<?php endif ?>

									</div>
								<?php }endif ?>
							</div>

							<div>Menu của cửa hàng: "<?=$data['name']?>"</div>
						</div>
					</div>
				</div>
			</div>
			<!-- <h3>Bình luận cửa hàng</h3>
			<div id="_binh_luan" class="col-md-12">
				<div id="menu2" class="col-md-10 col-md-offset-2">
					<div id="menu2_2" >
						<div id="form">
							<div>
								<div class="titleProduct">
									<div class="content">
										<a href="Link" class="profile">ten user</a><br>
										<a href="#" class="profile">ten quán</a>
									</div>
								</div>
								<?php if ($productArr[$typeRow['id']] != 0 ): ?>

									<?php foreach ($productArr[$typeRow['id']] as $product): ?>

										<div id="product" class="row" style="clear: left;">
											<div class="col-md-2" style="float: left;">
												<img src="../images/<?=$product['img']?>">
											</div>
											<p class="col-md-7 namePr" style="float: left;"><?=$product['name']?></p>
											<p class="col-md-3 costPr" style="float: right;"><?=$product['price']?>.000đ</p>
										</div>
									<?php endforeach ?>
								<?php endif ?>
							</div>
					</div>

					<div>Menu của cửa hàng: "A Hải "</div>
				</div>
			</div> -->
		</div>
	</div>
</div>
</div>
</div>
<script> 
	$(document).ready(function(){
		$("#show").click(function(){
			$("#menu1").slideToggle("slow");
		});
	});
</script>
<script src="../js/search.js">
</script>