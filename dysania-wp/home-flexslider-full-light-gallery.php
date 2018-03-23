<?php	
/*
Template Name: Homepage-Flexslider-Full-Light-Gallery
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
    <h3 class="subtitle gallerysubtitle">DỰ ÁN TIÊU BIỂU</h3>
    <ul id="gridbox305" class="dysania-grid">
        <?php  
        $args = array(
	'post_type' => 'project',
	'posts_per_page'    => 8,
        );
        query_posts( $args );
        while ( have_posts() ) : the_post();
        ?>	
        <li data-filter="images" class="fourcolumns">
            <a href="<?php the_permalink();?>" data-title="<?php the_title();?>" class="dysania-link clbx305">
                <?php the_post_thumbnail(ppo305); ?>                   
            </a>				
        </li>
        <?php endwhile; ?>	
    </ul>
    <!--?php 
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
    ?-->
    
<?php get_footer(); ?>