<?php	
/*
Template Name: Dark-Full-Width
*/
?>

<?php get_header(); ?>

    <?php $bgfilter = get_option('dysania_bgfilterhide'); ?>
    <?php if ($bgfilter != "true") { ?> 
       <!-- BG FILTERS -->
        <div id="left-bg-dark"></div>
        <div id="right-bg"></div>
    <?php } ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <div class="maincontainer">
            <?php if ( has_post_thumbnail()) { ?> 
            <div class="pageimage">
                <?php the_post_thumbnail('featured-blog-image'); ?>
            </div>
    <?php } ?>
            <h1 class="subtitle <?php if ( !has_post_thumbnail()) { echo 'btitle'; } ?>"><?php the_title(); ?></h1>
            <section class="darkcontainer">
            <?php 
the_content(); 
wp_link_pages();                  
            ?>
                <div class="clear"></div>
            </section>
        <?php endwhile; ?>
<?php get_footer(); ?>