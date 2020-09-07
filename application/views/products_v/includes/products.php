<?php foreach ($products as $product) { ?>
   <?php
   $image = get_product_cover_image($product->id);
   $image = ($image) ? base_url("panel/uploads/product_v/200x170/$image") : base_url("assets/images/portfolio-1.jpg");
   ?>
   <div class="sidebar-list-single">
      <div class="top-company-list">
         <div class="company-list-logo">
            <a href="<?php echo base_url("kampanyalar/");echo $product->category_url; ?>/<?php echo $product->url; ?>">
               <img src="<?php echo $image; ?>" title="<?php echo $product->title; ?>" alt="<?php echo $product->title; ?>">
            </a>
         </div>
         <div class="company-list-details text-center">
            <h3><a href="<?php echo base_url("kampanyalar/");echo $product->category_url; ?>/<?php echo $product->url; ?>"><?php echo $product->title; ?></a></h3>
            <div class="col-md-12">
               <table class="table table-condensed  text-center">
                 <thead class="col-md-6 col-md-offset-1">
                  <tr>
                     <?php if ($product->hiz) { ?>
                        <th><b>HIZ </b></th>
                     <?php } ?>
                     <?php if ($product->AKN) { ?>
                        <th><b>AKN </b></th>
                     <?php } ?>
                     <?php if ($product->altyapi) { ?>
                        <th><b>ALT YAPI</b></th>
                     <?php } ?>
                     <?php if ($product->dakika) { ?>
                        <th><b>DAKİKA </b></th>
                     <?php } ?>
                     <?php if ($product->SMS) { ?>
                        <th><b>SMS </b></th>
                     <?php } ?>
                     <?php if ($product->internet) { ?>
                        <th><b>İNTERNET</b></th>
                     <?php } ?>
                     <th><b>FİYAT</b></th>
                  </tr>
               </thead>
               <tbody class="col-md-6 col-md-offset-1">
                  <tr>
                     <?php if ($product->hiz) { ?>
                        <td><?php echo $product->hiz; ?></td>
                     <?php } ?>
                     <?php if ($product->AKN) { ?>
                        <td><?php echo $product->AKN; ?></td>
                     <?php } ?>
                     <?php if ($product->altyapi) { ?>
                        <td><?php echo $product->altyapi; ?></td>
                     <?php } ?>
                     <?php if ($product->dakika) { ?>
                        <td><?php echo $product->dakika; ?></td>
                     <?php } ?>
                     <?php if ($product->SMS) { ?>
                        <td> <?php echo $product->SMS; ?></td>
                     <?php } ?>
                     <?php if ($product->internet) { ?>
                        <td><?php echo $product->internet; ?></td>
                     <?php } ?>
                     <td><?php echo $product->price; ?>&#x20BA;<?php if ($product->price_2) { ?>  |  <?php echo $product->price_2; ?>&#x20BA;<?php } ?></td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
      <div class="company-list-btn">
         <a href="<?php echo base_url("kampanyalar/");echo $product->category_url; ?>/<?php echo $product->url; ?>" class="jobguru-btn">İncele</a>
      </div>
   </div>
</div>
<?php } ?>