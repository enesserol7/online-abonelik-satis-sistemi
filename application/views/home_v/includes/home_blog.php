<section class="jobguru-blog-area section_70">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="site-heading">
               <h2><span>Blog</span></h2>
            </div>
         </div>
      </div>
      <div class="row">
      <?php foreach ($news as $news) { ?>
         <div class="col-lg-4 col-md-12">
            <a href="<?php echo base_url("blog-detay/");echo $news->url; ?>">
               <div class="single-blog">
                  <div class="blog-image">
                     <img src="<?php echo get_picture("news_v", $news->img_url, "570x480"); ?>" alt="<?php echo $news->title; ?>" title="<?php echo $news->title; ?>" alt="<?php echo $news->title; ?>" />
                  </div>
                  <div class="blog-text">
                     <h3><?php echo $news->title; ?></h3>
                  </div>
               </div>
            </a>
         </div>
      <?php } ?>
      </div>
   </div>
</section>