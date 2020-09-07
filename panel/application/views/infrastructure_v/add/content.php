<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni Altyapı Ekle
        </h4>
    </div>
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("infrastructure/save"); ?>" method="post">
                        <div class="form-group">
                            <label>Altyapı</label>
                            <input class="form-control" placeholder="Altyapı" name="title">
                            <?php if(isset($form_error)){ ?>
                                <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                            <?php } ?>
                        </div>
                    <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                    <a href="<?php echo base_url("infrastructure"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div>
        </div>
    </div>
</div>