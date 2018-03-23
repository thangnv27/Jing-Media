            <ul class="social-icons">
                <?php
$facebook = get_option('dysania_facebook_uid');
$twitter = get_option('dysania_twitter_uid');
$flickr = get_option('dysania_flickr_uid');
$linkedin = get_option('dysania_linkedin_uid');
$youtube = get_option('dysania_youtube_uid');		
$rssicon = get_option('dysania_rss_uid');
$vimeo = get_option('dysania_vimeo_uid');
$google = get_option('dysania_google_uid');		
$skype = get_option('dysania_skype_uid');
$dribbble = get_option('dysania_dribbble_uid');
$behance = get_option('dysania_behance_uid');
$paypal = get_option('dysania_paypal_uid');
$custom = get_option('dysania_customlink_uid');
$customimg = get_option('dysania_customimg_uid');
$secondcustom = get_option('dysania_secondcustomlink_uid');
$secondcustomimg = get_option('dysania_secondcustomimg_uid');
$thirdcustom = get_option('dysania_thirdcustomlink_uid');
$thirdcustomimg = get_option('dysania_thirdcustomimg_uid');

if (!empty($facebook)) { echo '<li><a href="' . esc_URL($facebook) . '"><img class="social-icon" src="' . get_stylesheet_directory_uri() . '/images/social/facebook.png" alt="Facebook"></a></li>'; }

if (!empty($twitter)) { echo '<li><a href="' . esc_URL($twitter) . '"><img class="social-icon" src="' . get_stylesheet_directory_uri() . '/images/social/twitter.png" alt="Twitter"></a></li>'; }
					
if (!empty($google)) { echo '<li><a href="' . esc_URL($google) . '"><img class="social-icon" src="' . get_stylesheet_directory_uri() . '/images/social/google+.png" alt="Google"></a></li>'; }

if (!empty($skype)) { echo '<li><a href="' . esc_URL($skype) . '"><img class="social-icon" src="' . get_stylesheet_directory_uri() . '/images/social/skype.png" alt="Skype"></a></li>'; }
					
if (!empty($vimeo)) { echo '<li><a href="' . esc_URL($vimeo) . '"><img class="social-icon" src="' . get_stylesheet_directory_uri() . '/images/social/vimeo.png" alt="Vimeo"></a></li>'; }
					
if (!empty($youtube)) { echo '<li><a href="' . esc_URL($youtube) . '"><img class="social-icon" src="' . get_stylesheet_directory_uri() . '/images/social/youtube.png" alt="You Tube"></a></li>'; }
					
if (!empty($flickr)) { echo '<li><a href="' . esc_URL($flickr) . '"><img class="social-icon" src="' . get_stylesheet_directory_uri() . '/images/social/flickr.png" alt="Flickr"></a></li>'; }
					
if (!empty($linkedin)) { echo '<li><a href="' . esc_URL($linkedin) . '"><img class="social-icon" src="' . get_stylesheet_directory_uri() . '/images/social/linkedin.png" alt="Linked in"></a></li>'; }

if (!empty($dribbble)) { echo '<li><a href="' . esc_URL($dribbble) . '"><img class="social-icon" src="' . get_stylesheet_directory_uri() . '/images/social/dribbble.png" alt="dribbble"></a></li>'; }	

if (!empty($behance)) { echo '<li><a href="' . esc_URL($behance) . '"><img class="social-icon" src="' . get_stylesheet_directory_uri() . '/images/social/behance.png" alt="behance"></a></li>'; }	

if (!empty($paypal)) { echo '<li><a href="' . esc_URL($paypal) . '"><img class="social-icon" src="' . get_stylesheet_directory_uri() . '/images/social/paypal.png" alt="paypal"></a></li>'; }	
					
if (!empty($rssicon)) { echo '<li><a href="' . esc_URL($rssicon) . '"><img class="social-icon" src="' . get_stylesheet_directory_uri() . '/images/social/rss.png" alt="rss"></a></li>'; }

if (!empty($customimg)) { echo '<li><a href="' . esc_URL($custom) . '"><img class="social-icon" src="' . esc_URL($customimg) . '" alt=""></a></li>'; }

if (!empty($secondcustomimg)) { echo '<li><a href="' . esc_URL($secondcustom) . '"><img class="social-icon" src="' . esc_URL($secondcustomimg) . '" alt=""></a></li>'; }
if (!empty($thirdcustomimg)) { echo '<li><a href="' . esc_URL($thirdcustom) . '"><img class="social-icon" src="' . esc_URL($thirdcustomimg) . '" alt=""></a></li>'; }
                ?>
            </ul>