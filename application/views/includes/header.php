<?php $settings = get_settings(); ?>
<header class="jobguru-header-area stick-top forsticky <?php echo ($viewFolder != "home_v") ? "page-header" : "" ?>">
   <div class="menu-animation">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-2">
               <div class="site-logo">
                  <a href="<?php echo base_url(); ?>">
                     <?php if ($viewFolder == "home_v") { ?>
                        <?php $this->agent->is_mobile() ?>
                        <?php if ($this->agent->is_mobile()) { ?>
                           <img src="<?php echo get_picture("settings_v", $settings->logo, "150x40"); ?>" alt="<?php echo $settings->company_name; ?>" title="<?php echo $settings->company_name; ?>" class="non-stick-logo" />
                           <img src="<?php echo get_picture("settings_v", $settings->logo, "150x40"); ?>" alt="<?php echo $settings->company_name; ?>" title="<?php echo $settings->company_name; ?>" class="stick-logo" />
                        <?php }else{ ?>
                           <img src="<?php echo get_picture("settings_v", $settings->logo, "160x44"); ?>" alt="<?php echo $settings->company_name; ?>" title="<?php echo $settings->company_name; ?>" class="non-stick-logo" />
                           <img src="<?php echo get_picture("settings_v", $settings->logo, "160x44"); ?>" alt="<?php echo $settings->company_name; ?>" title="<?php echo $settings->company_name; ?>" class="stick-logo" />
                        <?php } ?>
                     <?php }else{ ?>
                        <?php $this->agent->is_mobile() ?>
                        <?php if ($this->agent->is_mobile()) { ?>
                           <img src="<?php echo get_picture("settings_v", $settings->logo, "150x40"); ?>" alt="<?php echo $settings->company_name; ?>" title="<?php echo $settings->company_name; ?>"/>
                        <?php }else{ ?>
                           <img src="<?php echo get_picture("settings_v", $settings->logo, "160x44"); ?>" alt="<?php echo $settings->company_name; ?>" title="<?php echo $settings->company_name; ?>"/>
                        <?php } ?>
                     <?php } ?>
                  </a>
               </div>
               <!-- Responsive Menu Start -->
               <div class="jobguru-responsive-menu"></div>
               <!-- Responsive Menu Start -->
            </div>
            <div class="col-lg-6">
               <div class="header-menu">
                  <nav id="navigation">
                     <ul id="jobguru_navigation">
                        <li><a href="<?php echo base_url(); ?>">Anasayfa</a></li>
                        <?php foreach ($navpages as $navpage) { ?>
                           <li><a href="<?php echo base_url("sayfalar/");echo $navpage->url; ?>"><?php echo $navpage->title; ?></a></li>
                        <?php } ?>
                        <li class=" has-children">
                           <a href="#">Kategoriler</a>
                           <ul>
                              <?php foreach ($categories as $category) { ?>
                                 <li><a href="<?php echo base_url("tum-kampanyalar/");echo $category->url; ?>" class="page-header-a-css"><?php echo $category->title; ?></a></li>
                              <?php } ?>
                           </ul>
                        </li>
                        <li class="has-children">
                           <a href="#">Markalar</a>
                           <ul>
                              <?php foreach ($brands as $brand) { ?>
                                 <li><a href="<?php echo base_url("markalar/");echo $brand->url; ?>" class="page-header-a-css"><?php echo $brand->title; ?></a></li>
                              <?php } ?>
                           </ul>
                        </li>
                        <li><a href="<?php echo base_url("blog"); ?>">Blog</a></li>
                        <li><a href="<?php echo base_url("iletisim"); ?>">İletişim</a></li>
                     </ul>
                  </nav>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="header-right-menu">
                  <ul>
                     <!--<li><a href="post-job.html" class="post-jobs">Post jobs</a></li>
                     <li><a href="register.html"><i class="fa fa-user"></i>sign up</a></li>
                     <li><a href="login.html"><i class="fa fa-lock"></i>login</a></li>-->
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
</header>