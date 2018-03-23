<?php	
/*
Template Name: Under-Construction
*/
?>

<?php get_header('construction'); ?>
<section class="cs-bg">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>    
    <h3 class="cs-head"><?php the_title(); ?></h3>
    <div class="countdown"></div>
    <?php
$post_thumbnail_id = get_post_thumbnail_id();
$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
if ( has_post_thumbnail() ) { 
    echo '<script type="text/javascript">';
    echo 'jQuery(document).ready(function() {';
    echo '"use strict";';
    echo 'jQuery("body").backstretch("' . $post_thumbnail_url . '");';
    echo '});</script>';
}
    ?>
<?php endwhile; ?>
<!-- COUNTDOWN SETTINGS -->
<?php $cstime = get_option('dysania_underconstructiontime'); ?>
        <script type="text/javascript">
            jQuery(function() {
        var endDate = "<?php if (!empty($cstime)) { echo $cstime; } else { echo 'June 7, 2087 15:03:25'; } ?>";
        jQuery('.countdown').countdown({
          date: endDate,
          render: function(data) {
            var el = jQuery(this.el);
            el.empty()
              .append("<div>" + this.leadingZeros(data.days, 3) + " <span><?php echo __('days', 'dysaniatext'); ?></span></div>")
              .append("<div>" + this.leadingZeros(data.hours, 2) + " <span><?php echo __('hrs', 'dysaniatext'); ?></span></div>")
              .append("<div>" + this.leadingZeros(data.min, 2) + " <span><?php echo __('min', 'dysaniatext'); ?></span></div>")
              .append("<div>" + this.leadingZeros(data.sec, 2) + " <span><?php echo __('second', 'dysaniatext'); ?></span></div>");
          }
        });
      });
        </script>    
</section>
<?php get_footer('construction'); ?>