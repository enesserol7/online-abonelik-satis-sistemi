<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Yeni Taahhut Ekle
        </h4>
    </div>
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="<?php echo base_url("taahhut/save"); ?>" method="post">
                    <div class="form-group">
                        <label>Taahhut</label>
                        <input class="form-control" placeholder="Taahhut" name="title">
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("title"); ?></small>
                        <?php } ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-md btn-outline">Kaydet</button>
                    <a href="<?php echo base_url("taahhut"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
                </form>
            </div>
        </div>
    </div>
</div>