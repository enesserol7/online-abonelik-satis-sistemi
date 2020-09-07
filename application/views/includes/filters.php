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
                        <a class="btn item_filter">Filtrele</a>
                     </p>
                  </div>
               </div>
               <!-- Single Job Sidebar End -->

            </div>
         </div>