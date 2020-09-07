<!-- Breadcromb Area Start -->

   <!-- Breadcromb Area End -->
   <!-- Blog Page Area Start -->
      <section class="jobguru-blog-page-area section_70 mt-5">
         <div class="container">
            <div class="row">
               <div class="col-lg-10 col-md-12 col-sm-12 col-12">
               <?php foreach ($news as $news) { ?>
                  <div class="single-blog-page-item">
                     <div class="single-blog-item-img">
                        <a href="<?php echo base_url("blog-detay/");echo $news->url; ?>">
                        <img src="<?php echo get_picture("news_v", $news->img_url, "1200x800"); ?>" alt="<?php echo $news->title; ?>" title="<?php echo $news->title; ?>">
                        </a>
                     </div>
                     <div class="blog-title">
                        <h3>
                           <a href="<?php echo base_url("blog-detay/");echo $news->url; ?>">
                           <?php echo $news->title; ?>
                           </a>
                        </h3>
                     </div>
                     <div class="blog-content">
                        <?php echo character_limiter($news->description,750); ?>
                        <br>
                        <a href="<?php echo base_url("blog-detay/");echo $news->url; ?>" class="jobguru-btn">Devamını Oku</a>
                     </div>
                  </div>
               <?php } ?>
               </div>
            </div>
         </div>
      </section>
      <!-- Blog Page Area End -->