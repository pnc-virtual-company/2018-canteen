<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$title = (isset($title)) ? $title :  "PNC CANTEEN";
$langCode= (isset($langCode)) ? $langCode :  "en";

?><!DOCTYPE html>
<html lang="<?php echo $langCode; ?>">
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
  <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap-4.0.0/css/bootstrap.min.css">
  <link href="<?php echo base_url();?>assets/MDI-2.1.19/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url();?>assets/css/top_menus.css" media="all" rel="stylesheet" type="text/css" />
  
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/skeleton-1.0.0.css">

  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/admin_dashboard.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/createMenu.css">

  <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
  <script src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js"></script>
  <script src="<?php echo base_url();?>assets/tether-1.4.3/js/tether.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/popper-1.12.9..min.js"></script>
  <script src="<?php echo base_url();?>assets/js/top_menu.js"></script>
  <script src="<?php echo base_url();?>assets/bootstrap-4.0.0/js/bootstrap.min.js"></script>
<!--   datepicker -->
  <script src="<?php echo base_url();?>assets/bootstrap-datepicker-1.7.1/css/bootstrap-datepicker.min.css"></script>
  <script src="<?php echo base_url();?>assets/bootstrap-datepicker-1.7.1/css/bootstrap-datepicker3.css"></script>
  <script src="<?php echo base_url();?>assets/bootstrap-datepicker-1.7.1/js/bootstrap-datepicker.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css"/>


	<style type="text/css">
  body {
      padding-top: 60px;
  }
  }
	</style>
</head>
<body class="app sidebar-mini rtl">
