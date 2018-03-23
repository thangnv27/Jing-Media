<?php	
/*
Template Name: Homepage-Zeusslider-Full-Dark-Gallery
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
$homegallery = get_option('dysania_homegallery');
$homegallerytitle = get_option('dysania_homegallerytitle');
$homegalleryfilter = get_option('dysania_homegalleryfilter');
$homegalleryshortcode = get_option('dysania_homegalleryshortcode');

if ($homegallery != "true" || !empty($homegalleryshortcode)) {
    if (!empty($homegallerytitle)) {
    echo '<h3 class="subtitle gallerysubtitle">' . $homegallerytitle . '</h3>';
    }
    if (!empty($homegalleryfilter)) {
    echo do_shortcode('<div id="latestprojectsfilter">[filters galleryid="' . $homegalleryshortcode . '"]' . $homegalleryfilter . '[/filters]</div>');
    }
    echo do_shortcode('[gridgallery id="' . $homegalleryshortcode . '"]');
}
    ?>

<?php get_footer(); ?>