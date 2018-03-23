<?php get_header('construction'); ?>
<section class="cs-bg">  
    <h1 class="cs-head"><?php _e('404 - Page Not Found!', 'dysaniatext'); ?></h1>
    <h6><?php _e( 'You can return', 'dysaniatext'); ?> <a href="<?php echo home_url(); ?>/" title="<?php esc_attr_e( 'Home', 'dysaniatext' ); ?>"><?php _e( '&larr; Home', 'dysaniatext'); ?></a> <?php _e( 'or search for the page you were looking for;', 'dysaniatext'); ?></h6>
    <div class="errorbox"><?php get_search_form(); ?></div>
    <?php
$errorimage = get_option('dysania_errorimage');
if (!empty($errorimage)) {
    echo '<script type="text/javascript">';
    echo 'jQuery(document).ready(function() {';
    echo '"use strict";';
    echo 'jQuery("body").backstretch("' . esc_URL($errorimage) . '");';
    echo '});</script>';    
}
    ?>   
</section>
<?php get_footer('construction'); ?>