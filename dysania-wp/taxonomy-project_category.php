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
        <?php if ($count < 4) { ?>
            <li data-filter="" class="fourcolumns">
                <a href="<?php the_permalink();?>"  data-title="<?php the_title();?>" class="dysania-link clbx363">
                    <?php the_post_thumbnail(ppo363); ?>                  
                </a>				
            </li>
        <?php } elseif($count < 6){?>
            <li data-filter="" class="twocolumns">
                <a href="<?php the_permalink();?>" data-title="<?php the_title();?>" class="dysania-link clbx368">
                    <?php the_post_thumbnail(ppo368); ?>                     
                </a>				
            </li>
        <?php } elseif($count < 11){?>          
            <li data-filter="" class="fivecolumns">
                <a href="<?php the_permalink();?>"  data-title="<?php the_title();?>" class="dysania-link clbx371 ">
                    <?php the_post_thumbnail(ppo371); ?>                    
                </a>				
            </li>
        <?php } else{?>
            <li data-filter="" class="threecolumns">
                <a href="<?php the_permalink();?>"  data-title="<?php the_title();?>" class="dysania-link clbx378 ">
                    <?php the_post_thumbnail(ppo378); ?>                    
                </a>				
            </li>
        <?php
        }
        $count++;
    endwhile; ?>
        </ul>
   <?php wp_pagenavi(); ?>

<?php get_footer(); ?>