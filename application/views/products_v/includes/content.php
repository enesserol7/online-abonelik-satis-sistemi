<!-- Breadcromb Area Start -->
<!-- Breadcromb Area End -->
<!-- Top Job Area Start -->
<section class="jobguru-top-job-area browse-page section_70 mt-5">
   <div class="container">
      <div class="row">
         <div class="col-md-12 col-lg-3">
            <div class="job-grid-sidebar">
               <!-- Single Job Sidebar Start -->
               <!-- Single Job Sidebar End -->
               <!-- Single Job Sidebar Start -->
               <!-- Single Job Sidebar End -->
               <!-- Single Job Sidebar Start -->
               <!-- Single Job Sidebar End -->
               <!-- Single Job Sidebar Start -->
               <!-- Single Job Sidebar End -->
               <!-- Single Job Sidebar Start -->
               <div class="single-job-sidebar sidebar-type">
                  <h3>Marka</h3>
                  <div class="job-sidebar-box">
                     <ul>
                        <?php foreach ($brands as $brand) { ?>
                           <li class="checkbox">
                              <input class="checkbox-spin brand" type="checkbox" id="<?php echo $brand->url; ?>" name="brand" value="<?php echo $brand->url; ?>" />
                              <label for="<?php echo $brand->url; ?>"><span></span><?php echo $brand->title; ?></label>
                           </li>
                        <?php } ?>
                     </ul>
                  </div>
               </div>
               <div class="single-job-sidebar sidebar-type">
                  <h3>Hız</h3>
                  <div class="job-sidebar-box">
                     <ul>
                        <?php foreach ($speeds as $speed) { ?>
                           <li class="checkbox">
                              <input class="checkbox-spin speed" type="checkbox" id="<?php echo $speed->title; ?>" name="speed" value="<?php echo $speed->title; ?>" />
                              <label for="<?php echo $speed->title; ?>"><span></span><?php echo $speed->title; ?></label>
                           </li>
                        <?php } ?>
                     </ul>
                  </div>
               </div>
               <div class="single-job-sidebar sidebar-type">
                  <h3>AKN</h3>
                  <div class="job-sidebar-box">
                     <ul>
                        <?php foreach ($akn as $akn) { ?>
                           <li class="checkbox">
                              <input class="checkbox-spin akn" type="checkbox" id="<?php echo $akn->title; ?>" name="akn" value="<?php echo $akn->title; ?>" />
                              <label for="<?php echo $akn->title; ?>"><span></span><?php echo $akn->title; ?></label>
                           </li>
                        <?php } ?>
                     </ul>
                  </div>
               </div>
               <!-- Single Job Sidebar End -->

               <!-- Single Job Sidebar Start -->
               <div class="single-job-sidebar sidebar-salary">
                  <div class="job-sidebar-box">
                     <p>
                        
                        <b class="btn item_filter a-class-filter">Filtrele</b>
                     </p>
                  </div>
               </div>
               <!-- Single Job Sidebar End -->

            </div>
         </div>
         <div class="col-md-12 col-lg-9">
            <div class="job-grid-right">
                  <!--<div class="browse-job-head-option">
                     <div class="job-browse-search">
                        <form>
                           <input type="search" placeholder="Search Jobs Here...">
                           <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                     </div>
                     <div class="job-browse-action">
                        <div class="email-alerts">
                           <input type="checkbox" class="styled" id="b_1">
                           <label class="styled" for="b_1">email alerts for this search</label>
                        </div>
                        <div class="dropdown">
                           <button class="btn-dropdown dropdown-toggle" type="button" id="dropdowncur" data-toggle="dropdown" aria-haspopup="true">Short By</button>
                           <ul class="dropdown-menu" aria-labelledby="dropdowncur">
                              <li>Newest</li>
                              <li>Oldest</li>
                              <li>Random</li>
                           </ul>
                        </div>
                     </div>
                  </div>-->
                  <!-- end job head -->
                  <div class="job-sidebar-list-single">
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
                  <!-- end sidebar single list -->
               </div>
               <!-- end job sidebar list -->
               <!-- end pagination -->
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Top Job Area End -->