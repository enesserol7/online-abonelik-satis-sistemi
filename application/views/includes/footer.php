<footer class="jobguru-footer-area text-center">
   <div class="footer-top section_50">
      <div class="container">
         <div class="row">
            <div class="col-lg-3 col-md-6">
               <div class="single-footer-widget">
                  <h3><u>Kategoriler</u></h3>
                  <ul>
                     <?php foreach ($categories as $category) { ?>
                        <li><a href="<?php echo base_url("tum-kampanyalar/");echo $category->url; ?>"><?php echo $category->title; ?></a></li>  
                     <?php } ?>
                  </ul>
               </div>
            </div>
            <div class="col-lg-3 col-md-6">
               <div class="single-footer-widget">
                  <h3><u>Sayfalar</u></h3>
                  <ul>
                     <li><a href="<?php echo base_url(); ?>">Anasayfa</a></li>
                     <?php foreach ($navpages as $navpage) { ?>
                        <li><a href="<?php echo base_url("sayfalar/");echo $navpage->url; ?>"><?php echo $navpage->title; ?></a></li>
                     <?php } ?>
                     <li><a href="<?php echo base_url("iletisim"); ?>">İletişim</a></li>
                  </ul>
               </div>
            </div>
            <div class="col-lg-3">
               <h3 class=" brands-h3-css"><u>Markalar</u></h3>
               <div class="row">
                  <div class="col-lg-6 col-md-6">
                     <div class="single-footer-widget">
                        <ul>
                           <?php foreach ($brands1 as $brand1) { ?>
                              <li><a href="<?php echo base_url("markalar/");echo $brand1->url; ?>"><?php echo $brand1->title; ?></a></li>
                           <?php } ?>
                        </ul>
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                     <div class="single-footer-widget">
                        <ul>
                           <?php foreach ($brands2 as $brand2) { ?>
                              <li><a href="<?php echo base_url("markalar/");echo $brand2->url; ?>"><?php echo $brand2->title; ?></a></li>
                           <?php } ?>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-3 col-md-6">
               <div class="single-footer-widget">
                  <h3><u>Bilgi Sayfaları</u></h3>
                  <ul>
                     <?php foreach ($informationPages as $informationPage) { ?>
                        <li><a href="<?php echo base_url("bilgi-sayfalari/");echo $informationPage->url; ?>"><?php echo $informationPage->title; ?></a></li>
                     <?php } ?>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="footer-copyright">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="copyright-left">
                  <p>Copyright &copy; 2018 E-Abonelik | Tüm Hakları Saklıdır.</p>
               </div>
            </div>
         </div>
      </div>
   </div>
</footer>