<?php	
/*
Template Name: Homepage-Zeusslider
*/
?>

<?php get_header(); ?>

    <?php $bgfilter = get_option('dysania_bgfilterhide'); ?>
    <?php if ($bgfilter != "true") { ?> 
       <!-- BG FILTERS -->
        <div id="left-bg"></div>
        <div id="right-bg"></div>
    <?php } ?>

<div class="maincontainer">
    
<?php 
if ( function_exists( 'dysania_zeusslider_template' ) ) {
    dysania_zeusslider_template(); 
}
?> 
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
            <!-- LEFT CONTAINER -->
            <section class="leftcontainer">
                <?php the_content(); ?>
            </section>
            <!-- RIGHT CONTAINER -->
            <section class="rightcontainer">
                <?php $secondcontent = apply_filters('the_content', get_post_meta( get_the_id(), '_dysania_content_field_key', true )); ?>
                <?php echo $secondcontent; ?>
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