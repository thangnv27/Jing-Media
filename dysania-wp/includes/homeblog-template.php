<?php 
$latestblogpoststitle = get_option('dysania_latestblogpoststitle');
$latestblogpostspaged = get_option('dysania_latestblogpostspaged');
$wp_query = new WP_Query( 
    array('posts_per_page' => $latestblogpostspaged) 
);
?>
<?php if (!empty($latestblogpoststitle)) {
    echo '<h3 class="subtitle">' . $latestblogpoststitle . '</h3>';
}
?>
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
wp_reset_query();
?>