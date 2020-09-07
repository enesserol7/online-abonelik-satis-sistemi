<section class="jobguru-banner-area">
   <div class="banner-slider owl-carousel">
      <?php $sayac = 1; ?>
      <?php foreach ($slides as $slide) { ?>
         <div class="banner-single-slider slider-item-<?php echo $sayac; ?>">
            <div class="slider-offset"></div>
            <div class="banner-text">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="banner-search">
                           <h2><?php echo $slide->title; ?></h2>
                           <h4><?php echo strip_tags($slide->description); ?> </h4>
                           <br>
                           <?php if($slide->allowButton) { ?>
                             <a class="btn btn-banner-btn" href="<?php echo base_url("tum-kampanyalar/");echo $slide->button_url; ?>"><i class="fa fa-search"></i> <?php echo $slide->button_caption; ?></a>
                          <?php } ?>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
        <?php $sayac++; ?>
     <?php } ?>
  </div>
</section>