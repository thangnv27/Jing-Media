<?php	
/*
Template Name: Single-Portfolio-Light
*/
?>

<?php get_header(); ?>

    <?php $bgfilter = get_option('dysania_bgfilterhide'); ?>
    <?php if ($bgfilter != "true") { ?> 
       <!-- BG FILTERS -->
        <div id="left-bg"></div>
        <div id="right-bg"></div>
    <?php } ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <div class="maincontainer">
            <h1 class="subtitle btitle"><?php the_title(); ?></h1>
            <!-- LEFT CONTAINER -->
            <section class="leftcontainer">
                <?php 
the_content(); 
wp_link_pages();
$post_thumbnail_id = get_post_thumbnail_id();
$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
                ?>
                <div class="clear"></div>
            </section>
            <!-- RIGHT CONTAINER -->
            <section class="rightcontainer imagebg">
                <div class="featuredimage"></div>
                <?php 
if ( has_post_thumbnail()) { 
echo '<script type="text/javascript">';
echo 'jQuery(window).load(function() {';
echo '"use strict";';
echo 'jQuery(".featuredimage").backstretch("' . $post_thumbnail_url . '");';
echo '});</script>';    
} 
                ?>
            </section>
            <div class="clear"></div>
        <?php endwhile; ?>
<?php get_footer(); ?>