<?php get_header(); ?>

<?php $bgfilter = get_option('dysania_bgfilterhide'); ?>
<?php if ($bgfilter != "true") { ?> 
    <!-- BG FILTERS -->
    <div id="left-bg"></div>
    <div id="right-bg-light"></div>
<?php } ?>

<?php
//$category_id = get_query_var('cat');
//$cat_name = get_category(get_query_var('cat'))->name;
//$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
//$wp_query = new WP_Query(
//        array('cat' => $category_id, 'posts_per_page' => get_option('posts_per_page'), 'paged' => $paged)
//);
?> 
<div class="maincontainer">
    <h1 class="subtitle btitle">
        <?php single_cat_title(); ?>
    </h1>
        <ul class="dysania-grid " id="gridbox363">
    <?php
    $count=0;
    while (have_posts()) : the_post();
        ?>
            <li data-filter="" class="fourcolumns">
                <a href="<?php the_permalink();?>"  data-title="<?php the_title();?>" class="dysania-link clbx363">
                    <?php the_post_thumbnail(ppo363); ?>                  
                </a>				
            </li>
      <?php
    endwhile; ?>
        </ul>
   
 <?php wp_pagenavi(); ?>
<?php get_footer(); ?>