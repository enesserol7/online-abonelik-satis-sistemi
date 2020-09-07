<?php $settings = get_settings(); ?>
<!-- Breadcromb Area Start -->
   <!-- Breadcromb Area End -->
   <!-- Contact Page Start -->
   <section class="jobguru-contact-page-area section_70 mt-5">
      <div class="container">
         <div class="row">
            <div class="col-md-5">
               <div class="contact-left">
                  <h3>İletişim Bilgileri</h3>
                  <div class="contact-details">
                     <?php if ($settings->address) { ?>
                     <p><i class="fa fa-map-marker"></i> <?php echo $settings->address; ?> </p>
                     <?php } ?>
                     <div class="single-contact-btn">
                        <h4>E-Posta</h4>
                        <a href="mailto:<?php echo $settings->email; ?>" class="jobguru-btn-2"><?php echo $settings->email; ?></a>
                     </div>
                     <div class="single-contact-btn">
                        <h4>Telefon</h4>
                        <a href="tel:<?php echo $settings->phone_1; ?>" class="jobguru-btn-2"><?php echo $settings->phone_1; ?></a>
                     </div>
                     <?php if ($settings->phone_2) { ?>
                        <div class="single-contact-btn">
                           <h4>Telefon 2</h4>
                           <a href="tel:<?php echo $settings->phone_1; ?>" class="jobguru-btn-2"><?php echo $settings->phone_2; ?></a>
                        </div>
                        <br>
                     <?php } ?>
                     <div class="social-links-contact">
                        <h4>Follow Us:</h4>
                        <ul>
                           <?php if ($settings->facebook != "") { ?>
                              <li><a href="https://facebook.com/<?php echo $settings->facebook; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                           <?php } ?>
                           <?php if ($settings->twitter != "") { ?>
                              <li><a href="https://twitter.com/<?php echo $settings->twitter; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                           <?php } ?>
                           <?php if ($settings->linkedin != "") { ?>
                              <li><a href="https://linkedin.com/in/<?php echo $settings->linkedin; ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                           <?php } ?>
                           <?php if ($settings->instagram != "") { ?>
                              <li><a href="https://instagram.com/<?php echo $settings->instagram ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                           <?php } ?>
                           <?php if ($settings->youtube != "") { ?>
                              <li><a href="https://youtube.com/<?php echo $settings->youtube ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
                           <?php } ?>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-7">
               <?php echo $this->session->flashdata("alert"); ?>
               <div class="contact-right">
                  <h3>Bize Yazın</h3>
                  <form action="<?php echo base_url("mesaj-gonder"); ?>" method="post">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="single-contact-field">
                              <input type="text" name="name" placeholder="İsim & Soyisim">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="single-contact-field">
                              <input type="email" name="email" placeholder="E-Posta Adresi">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="single-contact-field">
                              <input type="tel" name="phone" placeholder="Telefon">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="single-contact-field">
                              <input type="text" name="subject" placeholder="Konu">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="single-contact-field">
                              <textarea placeholder="Mesajınız" name="message"></textarea>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="single-contact-field">
                              <input type="hidden" name="brand" value="info-mail">
                              <button type="submit" class="jobguru-btn-2">Gönder</button>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
      <!-- Contact Page End -->