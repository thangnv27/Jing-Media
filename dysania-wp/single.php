<?php get_header(); ?>

    <?php $bgfilter = get_option('dysania_bgfilterhide'); ?>
    <?php $blogstyle = get_post_meta( get_the_id(), '_dysania_blog_skin_key', true ); ?>
    <?php $blogmeta = get_option('dysania_removemeta'); ?>

    <?php if ($bgfilter != "true") { ?>
        <?php if ($blogstyle == "lightsidebar" || $blogstyle == "lightfull") { ?>
        <div id="left-bg"></div>
        <div id="right-bg-light"></div>
        <?php } ?>
        <?php if ($blogstyle == "darksidebar" || $blogstyle == "darkfull") { ?>
        <div id="left-bg-dark"></div>
        <div id="right-bg"></div>
        <?php } ?>
        <?php if ($blogstyle != "lightsidebar" && $blogstyle != "lightfull" && $blogstyle != "darksidebar" && $blogstyle != "darkfull") { ?>
        <div id="left-bg"></div>
        <div id="right-bg-light"></div>
        <?php } ?>
    <?php } ?>

<div class="maincontainer">
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <?php if ( has_post_thumbnail()) { ?> 
    <div class="pageimage">
        <?php the_post_thumbnail('featured-blog-image'); ?>
    </div>
    <?php } ?>
    <h1 class="subtitle"><?php the_title(); ?></h1>
    <div <?php post_class(); ?>  id="post-<?php the_ID(); ?>">
    <article class="<?php if ($blogstyle == "lightsidebar" || $blogstyle == "lightfull") { echo 'lightcontainer'; } if ($blogstyle == "darksidebar" || $blogstyle == "darkfull") { echo 'darkcontainer'; } if ($blogstyle != "lightsidebar" && $blogstyle != "lightfull" && $blogstyle != "darksidebar" && $blogstyle != "darkfull") { echo 'lightcontainer'; } ?>">
        <?php 
if ($blogstyle == "lightfull" || $blogstyle == "darkfull") {
        ?>
    <div class="blogpostdate"><?php echo the_time(get_option('date_format')); ?></div>
        <?php
    the_content();
    if ($blogmeta != "true") {
    echo '<div class="blogmetadata">';
    echo __( 'AUTHOR: ', 'dysaniatext' ) . get_the_author();
    echo '<br/>';
    echo __( 'CATEGORY: ', 'dysaniatext' );
    the_category(' , ');
    echo '<br/>';
    echo the_tags(__( 'TAGS: ', 'dysaniatext' ),' , ', '') . '<br/>'; 
    echo '</div>';
    }
    wp_link_pages();
    comments_template(); 
}
if ($blogstyle == "lightsidebar" || $blogstyle == "darksidebar") { ?>
    <div class="sidebarcontainer">    
        <div class="leftsidebarcontainer">
    <div class="blogpostdate"><?php echo the_time(get_option('date_format')); ?></div>
        <?php
            the_content();
    if ($blogmeta != "true" || empty($blogmeta)) {
    echo '<div class="blogmetadata">';
    echo __( 'AUTHOR: ', 'dysaniatext' ) . get_the_author();
    echo '<br/>';
    echo __( 'CATEGORY: ', 'dysaniatext' );
    the_category(' , ');
    echo '<br/>';
    echo the_tags(__( 'TAGS: ', 'dysaniatext' ),' , ', '') . '<br/>'; 
    echo '</div>';
    }
            wp_link_pages();
            comments_template();                                                               
            ?>
            <div class="clear"></div>
        </div>
        <div class="rightsidebarcontainer">
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('dysaniamainsidebar') ) : ?>
            <?php endif; ?>	
        </div>
    </div>
<?php } 
if ($blogstyle != "lightsidebar" && $blogstyle != "lightfull" && $blogstyle != "darksidebar" && $blogstyle != "darkfull") { 
    the_content();
    wp_link_pages();
    comments_template();
} 
        ?>
    </article>
    </div>        
<?php endwhile; ?>
<?php get_footer(); ?>