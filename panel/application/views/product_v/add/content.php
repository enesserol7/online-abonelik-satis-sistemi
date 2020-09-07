<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni Ürün Ekle
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <hr class="widget-separator">
            <div class="widget-body">                        
                <form action="<?php echo base_url("product/save"); ?>" method="post">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Ürün Adı</label>
                            <input class="form-control" placeholder="Ürün Adı" name="title">
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
                                    <option value="<?php echo $category->id; ?>"><?php echo $category->title; ?></option>
                                <?php } ?>
                            </select>
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("category_id"); ?></small>
                            <?php } ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Marka</label>
                            <select class="form-control" name="brand_url">
                                <?php foreach ($brands as $brand) { ?>
                                    <option value="<?php echo $brand->url; ?>"><?php echo $brand->title; ?></option>
                                <?php } ?>
                            </select>
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("brand_url"); ?></small>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Açıklama</label>
                        <textarea name="description" class="m-0" data-plugin="summernote" data-options="{height: 250}"></textarea>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Fiyat</label>
                            <input class="form-control" placeholder="Fiyat" name="price">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Fiyat 2</label>
                            <input class="form-control" placeholder="Fiyat 2" name="price_2">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Taahhüt</label>
                            <select class="form-control" name="taahhut">
                                <option value="">Seçiniz</option>
                                <?php foreach ($taahhut as $taahhut) { ?>
                                    <option value="<?php echo $taahhut->title; ?>"><?php echo $taahhut->title; ?></option>
                                <?php } ?>
                            </select>
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("taahhut"); ?></small>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>AKN (Adil Kullanım Noktası)</label>
                            <select class="form-control" name="akn">
                                <option value="">Seçiniz</option>
                                <?php foreach ($akn as $akn) { ?>
                                    <option value="<?php echo $akn->title; ?>"><?php echo $akn->title; ?></option>
                                <?php } ?>
                            </select>
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("akn"); ?></small>
                            <?php } ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Alt Yapı (FİBER/ADSL/VDSL vb.)</label>
                            <select class="form-control" name="infrastructure">
                                <option value="">Seçiniz</option>
                                <?php foreach ($infrastructure as $infrastructure) { ?>
                                    <option value="<?php echo $infrastructure->title; ?>"><?php echo $infrastructure->title; ?></option>
                                <?php } ?>
                            </select>
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("infrastructure"); ?></small>
                            <?php } ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Hız</label>
                            <select class="form-control" name="speed">
                                <option value="">Seçiniz</option>
                                <?php foreach ($speed as $speed) { ?>
                                    <option value="<?php echo $speed->title; ?>"><?php echo $speed->title; ?></option>
                                <?php } ?>
                            </select>
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("speed"); ?></small>
                            <?php } ?>
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
                                    <option value="<?php echo $minute->title; ?>"><?php echo $minute->title; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>SMS</label>
                            <select class="form-control" name="SMS">
                                <option value="">Seçiniz</option>
                                <?php foreach ($sms as $sms) { ?>
                                    <option value="<?php echo $sms->title; ?>"><?php echo $sms->title; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>İnternet</label>
                            <select class="form-control" name="internet">
                                <option value="">Seçiniz</option>
                                <?php foreach ($internet as $internet) { ?>
                                    <option value="<?php echo $internet->title; ?>"><?php echo $internet->title; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label>Kullanım Koşulları</label>
                        <textarea name="terms_of_use" class="m-0" data-plugin="summernote" data-options="{height: 250}"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Kullanıcı Sözleşmesi</label>
                        <textarea name="user_agreement" class="m-0" data-plugin="summernote" data-options="{height: 250}"></textarea>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Ürün Anahtar Kelimeler SEO (En Fazla 255 Karakter Giriniz! Anahtar Kelimeleri ',' Virgül ile Ayırarak Giriniz!)</label>
                            <textarea class="form-control" name="product_keyw" cols="4" rows="5"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Ürün Açıklama SEO (En Fazla 255 Karakter Giriniz!)</label>
                            <textarea class="form-control" name="product_desc" cols="4" rows="5"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                    <a href="<?php echo base_url("product"); ?>" class="btn btn-md btn-danger btn-outlinen">İptal</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>