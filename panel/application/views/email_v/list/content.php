<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            Email
        </h4>
    </div><!-- END column -->
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
                        <th>Başlık</th>
                        <th>Mesaj</th>
                        <th>Ad Soyad</th>
                        <th>İşlem</th>
                    </thead>
                    <tbody>
                        <?php foreach($items as $item) { ?>
                            <tr>
                                <td class="w50 text-center">#<?php echo $item->id; ?></td>
                                <td><?php echo $item->subject; ?></td>
                                <td><?php echo character_limiter(strip_tags($item->message), 200); ?></td>
                                <td><?php echo $item->full_name; ?></td>
                                <td class="text-center w200">
                                    <button
                                        data-url="<?php echo base_url("email/delete/$item->id"); ?>"
                                        class="btn btn-sm btn-danger btn-outline remove-btn">
                                        <i class="fa fa-trash"></i> Sil
                                    </button>
                                    <a href="<?php echo base_url("email/update_form/$item->id"); ?>" class="btn btn-sm btn-info btn-outline"><i class="fa fa-eye"></i> Görüntüle</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        </div><!-- .widget -->
    </div><!-- END column -->
</div>