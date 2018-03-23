<?php	
/*
Template Name: Single-Portfolio-Dark
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
            <h1 class="subtitle btitle"><?php the_title(); ?></h1>
            <!-- LEFT CONTAINER -->
            <section class="leftcontainer imagebg">
                <div class="featuredimage2"></div>
                <?php
$post_thumbnail_id = get_post_thumbnail_id();
$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
if ( has_post_thumbnail()) { 
if ( has_post_thumbnail()) { 
echo '<script type="text/javascript">';
echo 'jQuery(window).load(function() {';
echo '"use strict";';
echo 'jQuery(".featuredimage2").backstretch("' . $post_thumbnail_url . '");';
echo '});</script>';    
} 
} 
                ?> 
                <div class="clear"></div>
            </section>
            <!-- RIGHT CONTAINER -->
            <section class="rightcontainer">
                <div id="zeusslider">
                    <div class="zeus-slider zeus-default zeus-innerpage">
                        <?php
                            $args = array(
                                'post_type' => 'attachment',
                                'numberposts' => -1,
                                'post_status' => null,
                                'post_parent' => $post->ID
                            );

                            $attachments = get_posts($args);
                            if ($attachments) {
                                foreach ($attachments as $attachment) {
                                    $img = wp_get_attachment_image_src($attachment->ID, 'full');
                                    ?>
                                    <div class="zeus-block">
                                        <div class="zeus-slide s-100">
                                            <img alt="" data-effect="slideTop" src="<?php echo $img[0];  ?>">
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        <div class="clear"></div>
                        <div class="next-block" ></div>
                        <div class="prev-block"></div>
                    </div>
                </div>
                <script type="text/javascript">
                     jQuery(window).load(function() { jQuery("#zeusslider").zeusslider({ sliderheight: 1.5}); });
                </script>
               
                <?php 
                the_content(); 
                wp_link_pages();
                ?>
            </section>
            <div class="clear"></div>
        <?php endwhile; ?>
<?php get_footer(); ?>