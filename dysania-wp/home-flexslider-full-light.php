<?php	
/*
Template Name: Homepage-Flexslider-Full-Light
*/
?>

<?php get_header(); ?>

    <?php $bgfilter = get_option('dysania_bgfilterhide'); ?>
    <?php if ($bgfilter != "true") { ?> 
       <!-- BG FILTERS -->
        <div id="left-bg"></div>
        <div id="right-bg-light"></div>
    <?php } ?>

<div class="maincontainer">
    
<?php 
if ( function_exists( 'dysania_flexslider_template' ) ) {
    dysania_flexslider_template(); 
}
?> 
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
            <section class="lightcontainer">
                <?php the_content(); ?>
            </section>
            <div class="clear"></div>
    <?php endwhile; ?>
    <?php 
$latestblogposts = get_option('dysania_latestblogposts');
if ($latestblogposts != "true") {
get_template_part( 'includes/homeblog', 'template');
}
    ?>
    
<?php get_footer(); ?>