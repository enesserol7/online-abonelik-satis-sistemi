<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>$item->full_name</b> kaydını görüntülüyorsunuz"; ?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form action="#">
                    <div class="form-group">
                        <label>Ad Soyad</label>
                        <input class="form-control" placeholder="Ad Soyad" name="full_name" value="<?php echo $item->full_name; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" placeholder="Email" name="email" value="<?php echo $item->email; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Telefon</label>
                        <input class="form-control" placeholder="Telefon" name="phone" value="<?php echo $item->phone; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Konu</label>
                        <input class="form-control" placeholder="Konu" name="subject" value="<?php echo $item->subject; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Mesaj</label>
                        <textarea class="form-control" name="message" placeholder="Bizimle ilgili mesaj..." cols="30" rows="10" disabled><?php echo $item->message; ?></textarea>
                    </div>
                    <a href="<?php echo base_url("email"); ?>" class="btn btn-md btn-danger btn-outline">Geri Dön</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>