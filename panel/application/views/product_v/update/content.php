<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>$item->title</b> kaydını düzenliyorsunuz" ?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <hr class="widget-separator">
            <div class="widget-body">                        
                <form action="<?php echo base_url("product/update/$item->id"); ?>" method="post">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Ürün Adı</label>
                            <input class="form-control" placeholder="Ürün Adı" name="title" value="<?php echo $item->title; ?>">
                            <?php if (isset($form_error)) { ?>
                                <small class="input-form-error pull-right"><?php echo form_error("title"); ?></small>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Kategori</label>
                            <select class="form-control" name="category_id">
                                <?php foreach ($categories as $category) { ?>
                                    <?php $category_id = isset($form_error) ? set_value("category_id") : $item->category_id; ?>
                                    <option <?php echo ($category->id === $category_id) ? "selected" : ""; ?> value="<?php echo $category->id; ?>"><?php echo $category->title; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Marka</label>
                            <select class="form-control" name="brand_url">
                                <?php foreach ($brands as $brand) { ?>
                                    <?php $brand_url = isset($form_error) ? set_value("brand_url") : $item->brand_url; ?>
                                    <option <?php echo ($brand->url === $brand_url) ? "selected" : ""; ?> value="<?php echo $brand->url; ?>"><?php echo $brand->title; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Açıklama</label>
                        <textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}"><?php echo $item->description; ?></textarea>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Fiyat</label>
                            <input class="form-control" placeholder="Fiyat" name="price" value="<?php echo $item->price; ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Fiyat 2</label>
                            <input class="form-control" placeholder="Fiyat 2" name="price_2" value="<?php echo $item->price_2; ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Taahhüt</label>
                            <select class="form-control" name="taahhut">
                                <option value="">Seçiniz</option>
                                <?php foreach ($taahhut as $taahhut) { ?>
                                    <?php $title = isset($form_error) ? set_value("taahhut") : $item->taahhut; ?>
                                    <option <?php echo ($taahhut->title === $title) ? "selected" : ""; ?> value="<?php echo $taahhut->title; ?>"><?php echo $taahhut->title; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>AKN (Adil Kullanım Noktası)</label>
                            <select class="form-control" name="akn">
                                <option value="">Seçiniz</option>
                                <?php foreach ($akn as $akn) { ?>
                                    <?php $title = isset($form_error) ? set_value("akn") : $item->AKN; ?>
                                    <option <?php echo ($akn->title === $title) ? "selected" : ""; ?> value="<?php echo $akn->title; ?>"><?php echo $akn->title; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Alt Yapı (FİBER/ADSL/VDSL vb.)</label>
                            <select class="form-control" name="infrastructure">
                                <option value="">Seçiniz</option>
                                <?php foreach ($infrastructure as $infrastructure) { ?>
                                    <?php $title = isset($form_error) ? set_value("infrastructure") : $item->altyapi; ?>
                                    <option <?php echo ($infrastructure->title === $title) ? "selected" : ""; ?> value="<?php echo $infrastructure->title; ?>"><?php echo $infrastructure->title; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Hız</label>
                            <select class="form-control" name="speed">
                                <option value="">Seçiniz</option>
                                <?php foreach ($speed as $speed) { ?>
                                    <?php $title = isset($form_error) ? set_value("speed") : $item->hiz; ?>
                                    <option <?php echo ($speed->title === $title) ? "selected" : ""; ?> value="<?php echo $speed->title; ?>"><?php echo $speed->title; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <hr>
                        <div class="form-group col-md-4">
                            <label>GSM Tarifeleri</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Dakika</label>
                            <select class="form-control" name="dakika">
                                <option value="">Seçiniz</option>
                                <?php foreach ($minute as $minute) { ?>
                                    <?php $title = isset($form_error) ? set_value("dakika") : $item->dakika; ?>
                                    <option <?php echo ($minute->title === $title) ? "selected" : ""; ?> value="<?php echo $minute->title; ?>"><?php echo $minute->title; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>SMS</label>
                            <select class="form-control" name="SMS">
                                <option value="">Seçiniz</option>
                                <?php foreach ($sms as $sms) { ?>
                                    <?php $title = isset($form_error) ? set_value("SMS") : $item->SMS; ?>
                                    <option <?php echo ($sms->title === $title) ? "selected" : ""; ?> value="<?php echo $sms->title; ?>"><?php echo $sms->title; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>İnternet</label>
                            <select class="form-control" name="internet">
                                <option value="">Seçiniz</option>
                                <?php foreach ($internet as $internet) { ?>
                                    <?php $title = isset($form_error) ? set_value("internet") : $item->internet; ?>
                                    <option <?php echo ($internet->title === $title) ? "selected" : ""; ?> value="<?php echo $internet->title; ?>"><?php echo $internet->title; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label>Kullanım Koşulları</label>
                        <textarea name="terms_of_use" class="m-0" data-plugin="summernote" data-options="{height: 250}"><?php echo $item->terms_of_use; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Kullanıcı Sözleşmesi</label>
                        <textarea name="user_agreement" class="m-0" data-plugin="summernote" data-options="{height: 250}"><?php echo $item->user_agreement; ?></textarea>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Ürün Anahtar Kelimeler SEO (En Fazla 255 Karakter Giriniz! Anahtar Kelimeleri ',' Virgül ile Ayırarak Giriniz!)</label>
                            <textarea class="form-control" name="product_keyw" cols="4" rows="5"><?php echo $item->page_keyw; ?></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Ürün Açıklama SEO (En Fazla 255 Karakter Giriniz!)</label>
                            <textarea class="form-control" name="product_desc" cols="4" rows="5"><?php echo $item->page_desc; ?></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
                    <a href="<?php echo base_url("product"); ?>" class="btn btn-md btn-danger btn-outlinen">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>