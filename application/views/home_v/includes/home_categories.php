<section class="jobguru-categories-area section_70">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="site-heading">
               <h2><span>Kategoriler</span></h2>
            </div>
         </div>
      </div>
      <div class="row">
         <?php foreach ($categories as $category) { ?>
            <div class="col-lg-3 col-md-6 col-sm-6">
               <a href="<?php echo base_url("tum-kampanyalar/");echo $category->url; ?>" class="single-category-holder account_cat">
                  <div class="category-holder-icon">
                     <i class="<?php echo $category->icon_code; ?>"></i>
                  </div>
                  <div class="category-holder-text">
                     <h3><?php echo $category->title; ?></h3>
                  </div>
                  
               </a>
            </div>
         <?php } ?>
      </div>
   </div>
</section>