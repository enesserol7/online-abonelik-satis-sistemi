<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Sipariş Listesi
        </h4>
    </div>
    <div class="col-md-12">
        <div class="widget p-lg">
            <?php if(empty($items)) { ?>
                <div class="alert alert-info text-center">
                    <p>Burada herhangi bir veri bulunmamaktadır.</p>
                </div>
            <?php } else { ?>
                <table class="table table-hover table-striped table-bordered content-container">
                    <thead>
                        <th class="w50">#id</th>
                        <th>Müşteri Adı</th>
                        <th>Müşteri Telefon</th>
                        <th>Başvururlan Marka</th>
                        <th>Başvururlan Ürün</th>
                        <th>Başvuru Durumu</th>
                        <th>Başvuru Onayı</th>
                        <th>İşlem</th>
                    </thead>
                    <tbody>
                        <?php foreach($items as $item) { ?>
                            <tr>
                                <td class="w50 text-center">#<?php echo $item->id; ?></td>
                                <td class="text-center"><?php echo $item->customer_name; ?></td>
                                <td class="text-center"><?php echo $item->customer_phone; ?></td>
                                <td class="text-center"><?php echo $item->brand; ?></td>
                                <td class="text-center"><?php echo $item->product_title; ?></td>
                                <td class="text-center w100">
                                    <input data-url="<?php echo base_url("orders/isActiveSetter/$item->id"); ?>" class="isActive" type="checkbox" data-switchery data-color="#10c469" <?php echo ($item->isActive) ? "checked" : ""; ?>/>
                                </td>
                                <td class="text-center w100">
                                    <input data-url="<?php echo base_url("orders/statusSetter/$item->id"); ?>" class="isActive" type="checkbox" data-switchery data-color="#10c469" <?php echo ($item->status) ? "checked" : ""; ?>/>
                                </td>
                                <td class="text-center w250">
                                    <?php if (isAllowedDeleteModule()) { ?>
                                    <button data-url="<?php echo base_url("orders/delete/$item->id"); ?>" class="btn btn-sm btn-danger btn-outline remove-btn"><i class="fa fa-trash"></i> Sil</button>
                                    <?php } ?>
                                    <a href="<?php echo base_url("orders/view_form/$item->id"); ?>" class="btn btn-sm btn-info btn-outline"><i class="fa fa-pencil-square-o"></i> Görüntüle</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </div>
</div>