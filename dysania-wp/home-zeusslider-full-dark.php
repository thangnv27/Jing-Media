<?php	
/*
Template Name: Homepage-Zeusslider-Full-Dark
*/
?>

<?php get_header(); ?>

    <?php $bgfilter = get_option('dysania_bgfilterhide'); ?>
    <?php if ($bgfilter != "true") { ?> 
       <!-- BG FILTERS -->
        <div id="left-bg-dark"></div>
        <div id="right-bg"></div>
    <?php } ?>

<div class="maincontainer">
    
<?php 
if ( function_exists( 'dysania_zeusslider_template' ) ) {
    dysania_zeusslider_template(); 
}
?> 
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
            <section class="darkcontainer">
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