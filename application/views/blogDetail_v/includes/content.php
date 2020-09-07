<!-- Breadcromb Area Start -->

   <!-- Breadcromb Area End -->
   <!-- Blog Page Area Start -->
      <section class="jobguru-blog-page-area section_70 mt-5">
         <div class="container">
            <div class="row">
               <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                  <div class="single-blog-page-item">
                     <div class="single-blog-item-img">
                        <img src="<?php echo get_picture("news_v", $page->img_url, "1200x800"); ?>" alt="<?php echo $page->title; ?>" title="<?php echo $page->title; ?>">
                     </div>
                     <div class="blog-title">
                        <h3><?php echo $page->title; ?></h3>
                     </div>
                     <div class="blog-content">
                        <?php echo $page->description; ?>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                  <div class="blog-page-right">
                     <div class="blog-sidebar-widget">
                        <h3>Diğer Haberler</h3>
                        <ul class="featured-list">
                        <?php foreach ($other_news as $other_news) { ?>
                           <li class="sidebr-pro-widget">
                              <div class="blog-thumb-info">
                                 <div class="blog-thumb-info-image">
                                    <a href="<?php echo base_url("blog-detay/");echo $other_news->url; ?>">
                                    <img src="<?php echo get_picture("news_v", $other_news->img_url, "85x85"); ?>" alt="<?php echo $other_news->title; ?>" title="<?php echo $other_news->title; ?>" />
                                    </a>
                                 </div>
                                 <div class="blog-thumb-info-content">
                                    <h4><a href="<?php echo base_url("blog-detay/");echo $other_news->url; ?>"><?php echo $other_news->title; ?></a></h4>
                                 </div>
                              </div>
                           </li>
                        <?php } ?>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Blog Page Area End -->