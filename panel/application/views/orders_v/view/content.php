<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            <?php echo "<b>$order->customer_name</b> isimli müşterinin siparişini görüntülüyorsunuz"; ?>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <form>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>İsim</label>
                            <input class="form-control" placeholder="İsim" disabled name="name" value="<?php echo $order->customer_name; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label>E-Posta</label>
                            <input class="form-control" disabled placeholder="E-Posta" name="email" value="<?php echo $order->customer_email; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Telefon</label>
                            <input class="form-control" disabled placeholder="Telefon" name="phone" value="<?php echo $order->customer_phone; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Ürün Adı</label>
                            <input class="form-control" disabled placeholder="Ürün Adı" name="title" value="<?php echo $order->product_title; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Fiyat</label>
                            <input class="form-control" disabled placeholder="Fiyat" name="price" value="<?php echo $order->product_price; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Başvuru Durumu</label>
                            <input class="form-control <?php echo ($order->isActive == 1) ? "statusOn" : "statusOff"; ?>" disabled placeholder="Başvuru Durumu" name="isActive" value="<?php echo ($order->isActive == 1) ? "Aktif" : "Pasif"; ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Başvuru Onayı</label>
                            <input class="form-control <?php echo ($order->status == 1) ? "statusOn" : "statusOff"; ?>" disabled placeholder="Başvuru Onayı" name="status" value="<?php echo ($order->status == 1) ? "Onaylandı" : "Onaylanmadı"; ?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Sipariş Tarihi</label>
                            <input class="form-control" disabled placeholder="Sipariş Tarihi" name="date" value="<?php echo $order->createdAt; ?>">
                        </div>
                    </div>
                    <a href="<?php echo base_url("orders"); ?>" class="btn btn-md btn-danger btn-outline">Geri Dön</a>
                </form>
            </div><!-- .widget-body -->
        </div><!-- .widget -->
    </div><!-- END column -->
</div>