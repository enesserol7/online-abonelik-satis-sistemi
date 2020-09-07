<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni İkon Ekle
        </h4>
    </div>
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("icons/save"); ?>" method="post">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>İkon Adı</label>
                            <input class="form-control" placeholder="İkon Adı" name="icon_name">
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("icon_name"); ?></small>
                            <?php } ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>İkon Kodu</label>
                            <input class="form-control" placeholder="İkon Kodu" name="icon_code">
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("icon_code"); ?></small>
                            <?php } ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                    <a href="<?php echo base_url("icons"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div>
        </div>
    </div>
</div>