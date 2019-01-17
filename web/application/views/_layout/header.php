<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?=(isset($title_browser_ro) && !is_null($title_browser_ro) ? $title_browser_ro : "No Title ;-)")?></title>
	<!-- SEO -->
	<meta name="description" content="<?=(isset($meta_description) && !is_null($meta_description) ? $meta_description : "")?>">
	<meta name="keywords" content="<?=(isset($keywords) && !is_null($keywords) ? $keywords : "")?>">
	<meta name="author" content="">
	
	<!-- initializing looks -->
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	
	<!-- Animate Styles -->
	<link rel="stylesheet" href="<?=base_url();?>public/assets/css/vendor/animate.css">	
	
	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Playfair+Display|Sintony:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?=base_url();?>public/assets/font/font.css">
	
	<link href="<?=base_url();?>public/scripts/realperson/jquery.realperson.css" rel="stylesheet" />
	
	<!-- Stylesheet -->
	<link rel="stylesheet" href="<?=base_url();?>public/assets/css/styles.css">
	<link rel="stylesheet" href="<?=base_url();?>public/assets/css/font-awesome/css/font-awesome.min.css">	
	<link rel="stylesheet" href="<?=base_url();?>public/scripts/fancybox/jquery.fancybox-1.3.1.css">	
</head>
