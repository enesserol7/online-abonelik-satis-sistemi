<!DOCTYPE html>
<html lang="tr">
<head>
	<?php $this->load->view("includes/head"); ?>
</head>
<body>
	<!-- Header Area Start -->
	<?php $this->load->view("includes/header"); ?>
	<!-- Header Area End -->
	<!-- page content Start -->
	<?php $this->load->view("{$viewFolder}/includes/content"); ?>
	<!-- page content End -->
	<!-- Footer Area Start -->
	<?php $this->load->view("includes/footer"); ?>
	<!-- Footer Area End -->
	<?php $this->load->view("includes/script"); ?>
</body>
</html>