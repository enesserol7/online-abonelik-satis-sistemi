<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni Sayfa Ekle
        </h4>
    </div>
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("pages/save"); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Başlık</label>
                        <input class="form-control" placeholder="Başlık" name="title">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label>Açıklama</label>
                        <textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}"></textarea>
                    </div>
                    <div class="form-group image_upload_container">
                        <label>Görsel Seçiniz</label>
                        <input type="file" name="img_url" class="form-control">
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Meta Keywords (Maks. 255 Karakter)</label>
                            <textarea class="form-control" name="page_keyw" cols="30" rows="15"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Meta Description (Maks. 255 Karakter)</label>
                            <textarea class="form-control" name="page_desc" cols="30" rows="15"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                    <a href="<?php echo base_url("pages"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div>
        </div>
    </div>
</div>