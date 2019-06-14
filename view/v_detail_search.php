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
					<div class="col-md-2" style="float: left;">
						<img src="../images/<?=$product['img']?>">
					</div>
					<p class="col-md-8 namePr" style="float: left;"><?=$product['name']?></p>
					<p class="col-md-2 costPr" style="float: right;"><?=$product['price']?>.000đ</p>
				</div>
			<?php endforeach ?>
		<?php endif ?>

	</div>
<?php }endif ?>