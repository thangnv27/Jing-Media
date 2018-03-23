<?php //	
/*
Template Name: Half-Width
*/
?>

<?php get_header(); ?>

    <?php $bgfilter = get_option('dysania_bgfilterhide'); ?>
    <?php if ($bgfilter != "true") { ?> 
       <!-- BG FILTERS -->
        <div id="left-bg"></div>
        <div id="right-bg-light"></div>
    <?php } ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <div class="maincontainer">
            <?php if ( has_post_thumbnail()) { ?> 
            <div class="pageimage">
                <?php the_post_thumbnail('featured-blog-image'); ?>
            </div>
    <?php } ?>
            <h1 class="subtitle <?php if ( !has_post_thumbnail()) { echo 'btitle'; } ?>"><?php the_title(); ?></h1>
            <!-- LEFT CONTAINER -->
            <section class="leftcontainer">
                <?php 
the_content(); 
wp_link_pages();                
                ?>
            </section>
            <!-- RIGHT CONTAINER -->
            <section class="rightcontainer">
                <?php $secondcontent = apply_filters('the_content', get_post_meta( get_the_id(), '_dysania_content_field_key', true )); ?>
                <?php echo $secondcontent; ?>
            </section>
            <div class="clear"></div>
        <?php endwhile; ?>
<?php get_footer(); ?>