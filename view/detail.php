<div class="container">
	<div class="col-md-6">
		<img src="../images/<?=$data['img']?>" alt="<?=$data['name']?>" style = "width: 100%; height: 300px;">
	</div>
	<div class="col-md-5">
		<h6>THÔNG TIN CỬA HÀNG</h6>
		<p><?=$data['shop_types']?></p>
		<h2><?=$data['name']?></h2>
		<div class="open_time">
			<div class="title_time">
				<span>Mở cửa</span>
			</div>
			<div class="time">
				<!-- <i class="far fa-clock"></i> -->
				<?=$data['open_time']?>
			</div>
		</div>
	</div>
</div>