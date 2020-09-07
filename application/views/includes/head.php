<?php $settings = get_settings(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php if ($page == "") { ?>
	<?php if ($pagetitle != "") { ?>
		<title><?php echo $pagetitle; ?> | <?php echo $settings->company_name; ?> | <?php echo $settings->slogan; ?></title>
	<?php }else{ ?>
		<title>Ana Sayfa | <?php echo $settings->company_name; ?> | <?php echo $settings->slogan; ?></title>
	<?php } ?>
<?php }else{ ?>
	<title><?php echo $page->title; ?> | <?php echo $settings->company_name; ?> | <?php echo $settings->slogan; ?></title>
<?php } ?>
<?php if ($page == "") { ?>
	<?php if ($pagekeyw != "" && $pagedesc != "") { ?>
		<meta name="keywords" content="<?php echo $pagekeyw; ?>" />
		<meta name="description" content="<?php echo $pagedesc; ?>" />
	<?php }else{ ?>
		<meta name="keywords" content="<?php echo $settings->meta_keywords; ?>" />
		<meta name="description" content="<?php echo $settings->meta_description; ?>" />
	<?php } ?>
<?php }else{ ?>
	<meta name="keywords" content="<?php echo $page->page_keyw ?>" />
	<meta name="description" content="<?php echo $page->page_desc; ?>" />
<?php } ?>
<meta name="author" content="Themescare">
<!-- Favicon -->
<?php if($settings->logo == "default") { $favicon_image = base_url("assets") . "/img/favicon/favicon-32x32.png";
} else { $favicon_image = get_picture("settings_v", $settings->favicon, "32x32"); }?>
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $favicon_image; ?>">
<!--Bootstrap css-->
<link href="https://fonts.googleapis.com/css?family=Rajdhani:500,600,700" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url("assets/"); ?>css/bootstrap.css">
<!--Font Awesome css-->
<link rel="stylesheet" href="<?php echo base_url("assets/"); ?>css/font-awesome.min.css">
<!--Magnific css-->
<link rel="stylesheet" href="<?php echo base_url("assets/"); ?>css/magnific-popup.css">
<!--Owl-Carousel css-->
<link rel="stylesheet" href="<?php echo base_url("assets/"); ?>css/owl.carousel.min.css">
<link rel="stylesheet" href="<?php echo base_url("assets/"); ?>css/owl.theme.default.min.css">
<!--Animate css-->
<link rel="stylesheet" href="<?php echo base_url("assets/"); ?>css/animate.min.css">
<!--Select2 css-->
<link rel="stylesheet" href="<?php echo base_url("assets/"); ?>css/select2.min.css">
<!--Slicknav css-->
<link rel="stylesheet" href="<?php echo base_url("assets/"); ?>css/slicknav.min.css">
<!--Bootstrap-Datepicker css-->
<link rel="stylesheet" href="<?php echo base_url("assets/"); ?>css/bootstrap-datepicker.min.css">
<!--Jquery UI css-->
<link rel="stylesheet" href="<?php echo base_url("assets/"); ?>css/jquery-ui.min.css">
<!--Perfect-Scrollbar css-->
<link rel="stylesheet" href="<?php echo base_url("assets/"); ?>css/perfect-scrollbar.min.css">
<!--Site Main Style css-->
<link rel="stylesheet" href="<?php echo base_url("assets/"); ?>css/style.css">
<!--Responsive css-->
<link rel="stylesheet" href="<?php echo base_url("assets/"); ?>css/responsive.css">
<?php echo $settings->analytics; ?>
<?php echo $settings->metrica; ?>
<?php echo $settings->live_support; ?>