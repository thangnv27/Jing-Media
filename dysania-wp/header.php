<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="google" content="notranslate" />    
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
        <!-- MAIN MENU -->
        <div class="fix-nav">
            <div class="nav-container">
                <!-- LOGO -->
                <div class="logo">
                    <a href="<?php  bloginfo('wpurl');?>"> 
                    <?php 
$headerimage = get_header_image();
$headertext = get_bloginfo('name');
if (!empty($headerimage)) { echo '<img src="' . $headerimage . '" alt="" />'; } else { echo '<h1>' . $headertext . '</h1>'; } ?>  
               </a> </div>
                <!-- MOBILE MENU ICON -->
                <a class="toggleMenu" href="#">Menu</a>
            <?php
                    function c_menu_message()  
                { 
                    echo '<nav><ul class="nav"><li><a href="#">Please create a custom menu; Appearance->Menus</a></li></ul></nav>';
                }
$defaults = array(
	'theme_location'  => 'dysania-menu',
	'menu'            => '',
	'container'       => 'nav',
	'container_class' => '',
	'container_id'    => '',
	'menu_class'      => '',
	'menu_id'         => '',
	'echo'            => true,
	'fallback_cb'     => 'c_menu_message',
	'items_wrap'      => '<ul id="%1$s" class="nav %2$s">%3$s</ul>',
    'depth'           => 3
);

wp_nav_menu( $defaults );

?>
            </div>
        </div>    