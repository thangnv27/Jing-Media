<?php get_header(); ?>

    <?php $bgfilter = get_option('dysania_bgfilterhide'); ?>
    <?php if ($bgfilter != "true") { ?> 
       <!-- BG FILTERS -->
        <div id="left-bg"></div>
        <div id="right-bg-light"></div>
    <?php } ?>

<?php 
$category_id = get_query_var('cat');
$cat_name = get_category(get_query_var('cat'))->name;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$wp_query = new WP_Query( 
    array('cat' => $category_id,'posts_per_page' => get_option( 'posts_per_page' ), 'paged' => $paged) 
);
?> 
<div class="maincontainer">
    <h1 class="subtitle btitle">
        <?php echo $cat_name; ?>
    </h1>
    <?php while($wp_query->have_posts()) : $wp_query->the_post(); ?>
    <article class="blogcontainer">
        <div <?php post_class(); ?>  id="post-<?php the_ID(); ?>">
            <?php if ( has_post_thumbnail() ) { ?> 
            <div class="blogimage">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('blog-image'); ?>
                </a>
                <div class="mask"></div>
            </div>
            <?php } ?>
            <div class="blogexcerpt <?php if ( !has_post_thumbnail() ) { echo 'withoutimage'; } ?>">
                <a href="<?php the_permalink(); ?>">
                    <h5><?php the_title(); ?></h5>
                </a>
                <p class="blogdate"><?php echo the_time(get_option('date_format')); ?></p>
                <?php the_excerpt(); ?>
            </p>
        </div>
    </div>
</article>
                <?php 
endwhile;
if ( $wp_query->max_num_pages > 1 ) : 
                ?>
<div class="blogpager">
                <div class="previous">
                    <?php next_posts_link( __( '&#8249; Older posts', 'dysaniatext' ) ); ?>
                </div>
                <div class="next">
                    <?php previous_posts_link( __( 'Newer posts &#8250;', 'dysaniatext' ) ); ?>
                </div>
            </div>                      
                <?php 
endif;
wp_reset_query();
                ?>

<?php get_footer(); ?>