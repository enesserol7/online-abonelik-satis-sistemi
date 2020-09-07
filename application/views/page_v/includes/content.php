<!-- Breadcromb Area Start -->

      <!-- Breadcromb Area End -->


      <!-- Blog Page Area Start -->
      <section class="jobguru-blog-page-area section_70 mt-5">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                  <div class="single-blog-page-item">
                     <div class="single-blog-item-img">
                        <?php if ($page->img_url) { ?>
                           <img src="<?php echo get_picture("pages_v", $page->img_url, "1100x400"); ?>" alt="<?php echo $page->title; ?>" title="<?php echo $page->title; ?>" class="img img-responsive">
                        <?php } ?>
                     </div>
                     <div class="blog-title">
                        <h3><?php echo $page->title; ?></h3>
                     </div>
                     <div class="blog-content">
                        <?php echo $page->description; ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Blog Page Area End -->