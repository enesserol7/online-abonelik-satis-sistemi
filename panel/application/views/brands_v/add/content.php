<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
        	Yeni Marka Ekle
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <hr class="widget-separator">
            <div class="widget-body">                        
                <form action="<?php echo base_url("brands/save"); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Marka Adı</label>
                        <input class="form-control" placeholder="Marka Adı" name="title">
                        <?php if (isset($form_error)) { ?>
                            <small class="input-form-error pull-right"><?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group image_upload_container">
                        <label>Görsel Seçiniz</label>
                        <input type="file" name="img_url" class="form-control">
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Marka Anahtar Kelimeler SEO (En Fazla 255 Karakter Giriniz! Anahtar Kelimeleri ',' Virgül ile Ayırarak Giriniz!)</label>
                            <textarea class="form-control" name="keyw" cols="4" rows="5"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Marka Açıklama SEO (En Fazla 255 Karakter Giriniz!)</label>
                            <textarea class="form-control" name="desc" cols="4" rows="5"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                    <a href="<?php echo base_url("brands"); ?>" class="btn btn-md btn-danger btn-outlinen">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>