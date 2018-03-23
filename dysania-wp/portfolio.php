<?php	
/*
Template Name: Portfolio
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
        <div id="portfolio-layout" class="maincontainer">
            <h1 class="subtitle btitle"><?php the_title(); ?></h1>
            <?php 
the_content();                 
            ?>
            <div class="clear"></div>
        <?php endwhile; ?>
<?php get_footer(); ?>