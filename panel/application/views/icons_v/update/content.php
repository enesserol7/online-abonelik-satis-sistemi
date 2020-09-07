<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>$item->icon_name</b> kaydını düzenliyorsunuz"; ?>
        </h4>
    </div>
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("icons/update/$item->id"); ?>" method="post">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>İkon Adı</label>
                            <input class="form-control" placeholder="İkon Adı" name="icon_name" value="<?php echo $item->icon_name; ?>">
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("icon_name"); ?></small>
                            <?php } ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>İkon Kodu</label>
                            <input class="form-control" placeholder="İkon Kodu" name="icon_code" value="<?php echo $item->icon_code; ?>">
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("icon_code"); ?></small>
                            <?php } ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
                    <a href="<?php echo base_url("icons"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div>
        </div>
    </div>
</div>