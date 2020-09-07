<div role="tabpanel" class="tab-pane fade" id="tab-8">
	<div class="row">
		<div class="form-group col-md-6">
			<label>Meta Keywords (Maks. 255 Karakter)</label>
			<textarea class="form-control" name="metakeyw" cols="5" rows="15"><?php echo isset($form_error) ? set_value("metakeyw") : $item->meta_keywords; ?></textarea>
		</div>
		<div class="form-group col-md-6">
			<label>Meta Description (Maks. 255 Karakter)</label>
			<textarea class="form-control" name="metadesc" cols="5" rows="15"><?php echo isset($form_error) ? set_value("metadesc") : $item->meta_description; ?></textarea>
		</div>
	</div>
</div>