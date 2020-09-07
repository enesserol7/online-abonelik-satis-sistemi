<section class="jobguru-categories-area jobguru-categories-area-back-color section_70">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="site-heading">
               <h2><span>Markalar</span></h2>
            </div>
         </div>
      </div>
      <div class="row">
         <?php foreach ($brands as $brand) { ?>
            <div class="col-lg-3 col-md-6 col-sm-6">
               <a href="<?php echo base_url("markalar/");echo $brand->url; ?>" class="single-category-holder2 account_cat">
                  
                  <div class="category-holder-text">
                     <h3><?php echo $brand->title; ?></h3>
                  </div>
                  <img src="<?php echo get_picture("brands_v", $brand->img_url, "271x200"); ?>" alt="<?php echo $brand->title; ?>" title="<?php echo $brand->title; ?>" class="img img-responsive">
               </a>
            </div>
         <?php } ?>
      </div>
   </div>
</section>