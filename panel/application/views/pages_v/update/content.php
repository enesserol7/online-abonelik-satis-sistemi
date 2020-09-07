<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>$item->title</b> kaydını düzenliyorsunuz"; ?>
        </h4>
    </div>
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("pages/update/$item->id"); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Başlık</label>
                        <input class="form-control" placeholder="Başlık" name="title" value="<?php echo $item->title; ?>">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Açıklama</label>
                        <textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}"><?php echo $item->description; ?></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-1 image_upload_container">
                            <img src="<?php echo get_picture($viewFolder,$item->img_url,"1100x400"); ?>" alt="" class="img-responsive">
                        </div>
                        <div class="col-md-9 form-group image_upload_container">
                            <label>Görsel Seçiniz</label>
                            <input type="file" name="img_url" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Meta Keywords (Maks. 255 Karakter)</label>
                            <textarea class="form-control" name="page_keyw" cols="30" rows="15"><?php echo $item->page_keyw; ?></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Meta Description (Maks. 255 Karakter)</label>
                            <textarea class="form-control" name="page_desc" cols="30" rows="15"><?php echo $item->page_desc; ?></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
                    <a href="<?php echo base_url("pages"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div>
        </div>
    </div>
</div>