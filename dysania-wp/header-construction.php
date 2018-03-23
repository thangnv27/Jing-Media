<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>   
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?> </title>
<!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link rel="shortcut icon" href="<?php echo get_option('dysania_favicon'); ?>" type="image/x-icon" />
<?php
$firstfontlink = get_option('dysania_fontheadinglink'); 
$secondfontlink = get_option('dysania_fontlink'); 
if (!empty($firstfontlink)) { echo stripslashes($firstfontlink); }
if (!empty($secondfontlink)) { echo stripslashes($secondfontlink); }   
?>    
<?php get_template_part( 'includes/styles', 'template'); ?>
<?php 
$customcode = get_option('dysania_customcode'); 
if (!empty($customcode)) { echo stripslashes($customcode); }
?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- MAIN CONTAINER -->
<div id="cs-main">
    <?php $bgfilter = get_option('dysania_bgfilterhide'); ?>
    <?php if ($bgfilter != "true") { ?> 
       <!-- BG FILTERS -->
        <div id="left-bg"></div>
        <div id="right-bg"></div>
    <?php } ?>
    <div class="cs-wrapper">