<div class="container">
	<!-- <div id="title" class="col-md-12">	 -->
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
						span:before{
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
					<span style="color: #329900">Mở cửa</span>
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
				<div style="color: #959595;font-size: 13px; text-transform: uppercase; padding: 20px 0px 5px;">Phí giao hàng</div>
				<div style="color: #252525; font-size: 14px;">6.000đ/km</div>
			</div>
		</div>
		<!-- </div> -->
	</div>
	<div id="mota">
		<div class="container">	
			<div id="menu">	
				<a href="#_thuc_don">Thực đơn</a>
				<a href="#_binh_luan">Bình luận</a>
			</div>
			<div id="_thuc_don" style="clear: both;">
				<div id="menu1" class="col-md-2">
					aa
				</div>
				<div id="menu2" class="col-md-5 col-md-offset-1">
					<form action="../controller/c_search.php" class="form-inline my-2 my-lg-0" method="GET">
						<p>
							<i class="fas fa-search"></i>
							<input class="form-control mr-sm-2" name="search" id="search"	type="search" placeholder="Nhập tên sản phẩm" aria-label="Search" required>
						</p>					
					</form>
					<div id="form">
						<?php if ( $data1!= 0 ):
							foreach ( $data1 as $row1) {
						?>
						<div>
							<div id="Trà" class="titleProduct">
								<div class="content">
									<p><?=$row1['types']?></p>
								</div>
							</div>
							<div id="product" class="row" style="clear: left;">
								<div class="col-md-2" style="float: left;">
									<img src="../images/p1_gg2.jpg">
								</div>
								<p class="col-md-7 namePr" style="float: left;">Bún ốc</p>
								<p class="col-md-3 costPr" style="float: right;">39.000đ</p>
							</div>
							<!-- <div id="product" class="row" style="clear: left;">
								<div class="col-md-2" style="float: left;">
									<img src="../images/p1_gg2.jpg">
								</div>
								<p class="col-md-7 namePr" style="float: left;">Bún ốc</p>
								<p class="col-md-3 costPr" style="float: right;">39.000đ</p>
							</div> -->
						</div>
					<?php }endif ?>
						<div id="Trà" class="titleProduct">
							<div class="content">
								Trà
							</div>
						</div>
						<div id="product" class="row" style="clear: left;">
							<div class="col-md-2" style="float: left;">
								<img src="../images/p1_gg2.jpg">
							</div>
							<p class="col-md-7 namePr" style="float: left;">Bún ốc</p>
							<p class="col-md-3 costPr" style="float: right;">39.000đ</p>
						</div>
						<div id="product" class="row" style="clear: left;">
							<div class="col-md-2" style="float: left;">
								<img src="../images/p1_gg2.jpg">
							</div>
							<p class="col-md-7 namePr" style="float: left;">Bún ốc</p>
							<p class="col-md-3 costPr" style="float: right;">39.000đ</p>
						</div>	
						<div>Menu của cửa hàng: "A Hải "</div>
					</div>

				</div>
				<div id="menu3" class="col-md-3 col-md-offset-1">
					bas
				</div>
			</div>

			<div id="_binh_luan" style="clear: both;">
				aaaa
			</div>
		</div>
	</div>