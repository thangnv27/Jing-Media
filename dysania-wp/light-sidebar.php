<?php	
/*
Template Name: Light-Sidebar
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
            <section class="lightcontainer">
                <div class="sidebarcontainer">    
                    <div class="leftsidebarcontainer">
                        <?php
the_content();
wp_link_pages();                                                               
                        ?>
                    </div>
        <div class="rightsidebarcontainer">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('dysaniamainsidebar') ) : ?>
            <?php endif; ?>	
        </div>
    </div>
                <div class="clear"></div>
            </section>
        <?php endwhile; ?>
<?php get_footer(); ?>