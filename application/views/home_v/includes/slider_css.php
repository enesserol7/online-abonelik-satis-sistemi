<style type="text/css">
<?php $sayac = 1; ?>
<?php foreach ($slides as $slide) { ?>
	.slider-item-<?php echo $sayac; ?> {
		<?php $image = get_picture("slides_v", $slide->img_url, "1288x600"); ?>
		background: url(<?php echo $image ?>);
	}
	<?php $sayac++; ?>
<?php } ?>

</style>