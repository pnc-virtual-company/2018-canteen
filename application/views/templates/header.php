<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$title = (isset($title)) ? $title :  "PNC CANTEEN";
$langCode= (isset($langCode)) ? $langCode :  "en";

?><!DOCTYPE html>
<html lang="<?php echo $langCode; ?>">
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
  <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/canteen-logo.png" type="image/x-icon">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap-4.0.0/css/bootstrap.min.css">
  <link href="<?php echo base_url();?>assets/MDI-2.1.19/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" />
  
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/skeleton-1.0.0.css">

  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/admin_dashboard.css">

  <script src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js"></script>
  <script src="<?php echo base_url();?>assets/tether-1.4.3/js/tether.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/popper-1.12.9..min.js"></script>
  <script src="<?php echo base_url();?>assets/bootstrap-4.0.0/js/bootstrap.min.js"></script>
<!--   datepicker -->
  <script src="<?php echo base_url();?>assets/bootstrap-datepicker-1.7.1/css/bootstrap-datepicker.min.css"></script>
  <script src="<?php echo base_url();?>assets/bootstrap-datepicker-1.7.1/js/bootstrap-datepicker.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css"/>


	<style type="text/css">
  body {
      padding-top: 60px;
  }
  #menu-background{
  background-color: green;
}

.nopad {
  padding-left: 0 !important;
  padding-right: 0 !important;
}
/*image gallery*/
.image-checkbox {
  cursor: pointer;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  border: 4px solid transparent;
  margin-bottom: 0;
  outline: 0;
}
.image-checkbox input[type="checkbox"] {
  display: none;
}

.image-checkbox-checked {
  border-color: #4783B0;
}
.image-checkbox .mdi {
  position: absolute;
  color: #4A79A3;
  background-color: #fff;
  padding: 10px;
  top: 0;
  right: 0;
}
.image-checkbox-checked .mdi {
  display: block !important;
}
	</style>
</head>
<body class="app sidebar-mini rtl">
