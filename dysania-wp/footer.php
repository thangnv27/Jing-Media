            <!-- FOOTER -->
            <footer id="footer">
                <?php 
$footerhide = get_option('dysania_footerhide');
if ($footerhide != "true") {
?>     
                <div id="footer-widgets">
                    <div class="footer-widget first-clmn">
                        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('dysaniafooterone') ) : ?>
<?php endif; ?>	
                    </div>
                    <div class="footer-widget second-clmn">
                        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('dysaniafootertwo') ) : ?>
<?php endif; ?>
                    </div>
                    <div class="footer-widget third-clmn">
                        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('dysaniafooterthree') ) : ?>
<?php endif; ?>
                        
                    </div>
                     <div class="footer-widget four-clmn">
                        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('dysaniafooterfour') ) : ?>
<?php endif; ?>
                        
                    </div>
                </div>
                <div class="clear"></div>
                <?php } ?>
                <div class="credits">
                    <?php 
$footertext = get_option('dysania_footertext'); 
echo stripslashes($footertext);  
                    ?> 
                </div>
                <!--?php get_template_part( 'includes/icons', 'template'); ?-->
            </footer>
            <!-- BACK TO TOP BUTTON -->
            <a href="#" class="back-to-top"></a>
        </div>
            <?php 
$bgimage = get_option('dysania_bgimage');
if (!empty($bgimage)) {
    echo '<script type="text/javascript">';
    echo 'jQuery(document).ready(function() {';
    echo '"use strict";';
    echo 'jQuery("body").backstretch("' . esc_URL($bgimage) . '");';
    echo '});</script>';    
}
else {
    if (get_option('dysania_bgfilterhide') != "true") { 
    echo '<script type="text/javascript">';
    echo 'jQuery(document).ready(function() {';
    echo '"use strict";';
    echo 'jQuery("body").backstretch("http://farm3.staticflickr.com/2785/4255990339_469e2e80c2_o.jpg");';
    echo '});</script>';
    }
}
            ?>
<?php wp_footer(); ?>
</body>
</html>