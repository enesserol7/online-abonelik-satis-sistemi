<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>$item->title</b> kaydını düzenliyorsunuz"; ?>
        </h4>
    </div>
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("product_categories/update/$item->id"); ?>" method="post">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Başlık</label>
                            <input class="form-control" placeholder="Başlık" name="title" value="<?php echo $item->title; ?>">
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                            <?php } ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>İkon</label>
                            <select class="form-control" name="icon_code">
                                <?php foreach ($icons as $icon) { ?>
                                    <?php $icon_code = isset($form_error) ? set_value("icon_code") : $item->icon_code; ?>
                                    <option <?php echo ($icon->icon_code === $icon_code) ? "selected" : ""; ?> value="<?php echo $icon->icon_code; ?>"><?php echo $icon->icon_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Kategori Anahtar Kelimeler SEO (En Fazla 255 Karakter Giriniz! Anahtar Kelimeleri ',' Virgül ile Ayırarak Giriniz!)</label>
                            <textarea class="form-control" name="category_keyw" cols="4" rows="5"><?php echo $item->category_keyw; ?></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Kategori Açıklama SEO (En Fazla 255 Karakter Giriniz!)</label>
                            <textarea class="form-control" name="category_desc" cols="4" rows="5"><?php echo $item->category_desc; ?></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
                    <a href="<?php echo base_url("product_categories"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div>
        </div>
    </div>
</div>