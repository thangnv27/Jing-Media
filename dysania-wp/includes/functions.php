<?php
if ( !defined('ABSPATH')) exit;

add_filter('show_admin_bar', '__return_false'); 
add_theme_support( 'menus' );
add_theme_support( 'automatic-feed-links' );
if ( function_exists( 'add_theme_support' ) ) { 
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'blog-image', 600, 300, true);
    add_image_size( 'featured-blog-image', 1024, 250, true);
    add_filter('image_size_names_choose', 'dysania_image_sizes');
}
if ( ! function_exists( 'dysania_image_sizes' ) ) {
function dysania_image_sizes($sizes) {
    $addsizes = array(
        "blog-image" => __( 'Blog Image', 'dysaniatext'),
        "featured-blog" => __( 'Blog Post Featured Image', 'dysaniatext')
    );
    $newsizes = array_merge($sizes, $addsizes);
    return $newsizes;
}
}
$customlogo = array(
	'height'        => 97,
	'default-image' => get_template_directory_uri() . '/images/logo.png',
	'uploads'       => true,
	'header-text'   => false,
);
$custombg = array(
	'default-color' => 'FFFFFF'
);
add_theme_support( 'custom-background', $custombg );
add_theme_support( 'custom-header', $customlogo );

load_theme_textdomain( 'dysaniatext', get_template_directory() .'/languages' );
$locale = get_locale();
$locale_file = get_template_directory() ."/languages/$locale.php";
if ( is_readable($locale_file) )
	require_once($locale_file);


/* ----------------------------------------------------------
Declare vars
------------------------------------------------------------- */
$themename = "Dysania-WP";
$shortname = "dysania";
 
/*---------------------------------------------------
register settings
----------------------------------------------------*/

if ( ! function_exists( 'theme_settings_init' ) ) {
function theme_settings_init(){
register_setting( 'theme_settings', 'theme_settings' );
wp_enqueue_style('dysaniapanel_style', get_template_directory_uri() . '/includes/panel.css', false, '1.0'); 
}
add_action( 'admin_init', 'theme_settings_init' );
}

if ( ! function_exists( 'load_theme_scripts' ) ) {
function load_theme_scripts() {
    wp_enqueue_style( 'farbtastic' );
    wp_enqueue_script( 'farbtastic' );
}
add_action('admin_init', 'load_theme_scripts');    
}
if ( ! isset( $content_width ) ) $content_width = 1024;
if ( is_singular() ) wp_enqueue_script( "comment-reply" );

/*---------------------------------------------------
stylesheets
----------------------------------------------------*/

if ( ! function_exists( 'theme_styles' ) ) {
function theme_styles()  
{ 
  wp_register_style( 'custom-style', 
  get_stylesheet_directory_uri() . '/style.css', false, '1.0');
  wp_enqueue_style( 'custom-style' );
}
add_action('wp_enqueue_scripts', 'theme_styles');
}

/*---------------------------------------------------
Custom Menu
----------------------------------------------------*/
if ( ! function_exists( 'dysania_menu' ) ) {
function dysania_menu() {
register_nav_menus(
array(
'dysania-menu' => __( 'Main Menu', 'dysaniatext' )
)
);
}
add_action( 'init', 'dysania_menu' );
}

/*---------------------------------------------------
Register Sidebars
----------------------------------------------------*/
if ( function_exists('register_sidebar') )
    register_sidebar( array(
   'name' => __( 'Main Sidebar', 'dysaniatext'),
   'id' => 'dysaniamainsidebar',
   'description' => __( 'Main Sidebar Widget Area', 'dysaniatext' ),
   'before_widget' => '<div id="%1$s" class="sidebarbox %2$s">',
   'after_widget' => "</div>",
   'before_title' => '<h5>',
   'after_title' => '</h5>',
   ) );

if ( function_exists('register_sidebar') )
    register_sidebar( array(
   'name' => __( 'Footer 1', 'dysaniatext'),
   'id' => 'dysaniafooterone',
   'description' => __( 'First Footer Widget Area', 'dysaniatext' ),
   'before_widget' => '<div id="%1$s" class="sidebarbox %2$s">',
   'after_widget' => "</div>",
   'before_title' => '<h5>',
   'after_title' => '</h5>',
   ) );

if ( function_exists('register_sidebar') )
    register_sidebar( array(
   'name' => __( 'Footer 2', 'dysaniatext'),
   'id' => 'dysaniafootertwo',
   'description' => __( 'Second Footer Widget Area', 'dysaniatext' ),
   'before_widget' => '<div id="%1$s" class="sidebarbox %2$s">',
   'after_widget' => "</div>",
   'before_title' => '<h5>',
   'after_title' => '</h5>',
   ) );

if ( function_exists('register_sidebar') )
    register_sidebar( array(
   'name' => __( 'Footer 3', 'dysaniatext'),
   'id' => 'dysaniafooterthree',
   'description' => __( 'Third Footer Widget Area', 'dysaniatext' ),
   'before_widget' => '<div id="%1$s" class="sidebarbox %2$s">',
   'after_widget' => "</div>",
   'before_title' => '<h5>',
   'after_title' => '</h5>',
   ) );
if ( function_exists('register_sidebar') )
    register_sidebar( array(
   'name' => __( 'Footer 4', 'dysaniatext'),
   'id' => 'dysaniafooterfour',
   'description' => __( 'Third Footer Widget Area', 'dysaniatext' ),
   'before_widget' => '<div id="%1$s" class="sidebarbox %2$s">',
   'after_widget' => "</div>",
   'before_title' => '<h5>',
   'after_title' => '</h5>',
   ) );

/*---------------------------------------------------
turn off Magic Quotes of Tinymce
----------------------------------------------------*/
if (get_magic_quotes_gpc()) {
    $process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
    while (list($key, $val) = each($process)) {
        foreach ($val as $k => $v) {
            unset($process[$key][$k]);
            if (is_array($v)) {
                $process[$key][stripslashes_deep($k)] = $v;
                $process[] = &$process[$key][stripslashes_deep($k)];
            } else {
                $process[$key][stripslashes_deep($k)] = stripslashes_deep($v);
            }
        }
    }
    unset($process);
}

/*---------------------------------------------------
Tinymce add iframe
----------------------------------------------------*/
if ( ! function_exists( 'add_iframe' ) ) {
function add_iframe($arr) {
	$arr['extended_valid_elements'] = "iframe[id|class|title|style|align|frameborder|height|longdesc|marginheight|marginwidth|name|scrolling|src|width]";
	return $arr;
}
add_filter('tiny_mce_before_init', 'add_iframe');
}
 
global $allowedposttags;
$allowedposttags["iframe"] = array(
        "id" => array(),
		"class" => array(),
		"title" => array(),
		"style" => array(),
		"align" => array(),
		"frameborder" => array(),
		"longdesc" => array(),
		"marginheight" => array(),
		"marginwidth" => array(),
		"name" => array(),
		"scrolling" => array(),
		"src" => array(),
        "height" => array(),
        "width" => array()
);

/*---------------------------------------------------
custom more link
----------------------------------------------------*/
if ( ! function_exists( 'new_excerpt_more' ) ) {
function new_excerpt_more($more) {
       global $post;
	return ' <a class="read-more" href="'. get_permalink($post->ID) . '"> ' . __('Read More...', 'dysaniatext') . '</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');
}
if ( ! function_exists( 'dysania_excerpt_length' ) ) {
function dysania_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'dysania_excerpt_length', 999 );
}
/*---------------------------------------------------
custom next-prev links
----------------------------------------------------*/
add_filter('next_posts_link_attributes', 'dysania_posts_link_attributes');
add_filter('previous_posts_link_attributes', 'dysania_posts_link_attributes');

if ( ! function_exists( 'dysania_posts_link_attributes' ) ) {
function dysania_posts_link_attributes() {
    return 'class="button next-prev"';
}
}
/*---------------------------------------------------
custom tag cloud
----------------------------------------------------*/
if ( ! function_exists( 'dysania_tag_cloud_args' ) ) {
function dysania_tag_cloud_args($args) {
$args = array('smallest' => 12, 'largest' => 12, 'orderby' => 'count','unit' => 'px','order' => 'DESC',);
return $args;
}
}
add_filter('widget_tag_cloud_args','dysania_tag_cloud_args');

/*---------------------------------------------------
Custom comments field
----------------------------------------------------*/
if ( ! function_exists( 'dysania_comment' ) ) {
function dysania_comment($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">      
<div id="comment-<?php comment_ID(); ?>" class="comments"> 
 <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.', 'dysaniatext') ?></em>
         <br />
      <?php endif; ?>   
     <p class="meta">
     <?php printf(__('<cite class="fn">%s</cite> <span class="says">-</span>', 'dysaniatext'), get_comment_author_link()) ?>     
     <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s', 'dysaniatext'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)', 'dysaniatext'),'  ','') ?></p>
      <div class="comments_content">
       <?php comment_text() ?>
       <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
       <div class="clr"></div>       
</div>
    
<?php
}          
}

/* ---------------------------------------------------------
Second Content Field
----------------------------------------------------------- */

if ( ! function_exists( 'dysania_content_field_box' ) ) {

add_action( 'edit_form_after_editor', 'dysania_content_field_box' );

function dysania_content_field_box( $post ) {
    if ($post->post_type != 'page') return;    
    wp_nonce_field( 'dysania_content_field_box', 'dysania_content_field_box_nonce' );
    $value = get_post_meta( $post->ID, '_dysania_content_field_key', true );    
    echo '<div id="dysania-editor-container" style="margin-bottom:20px"><h2><strong>SECOND CONTENT FIELD</strong></h2>';      
    wp_editor( $value , 'dysaniacontent');    
    echo '</div>';
    echo '<script type="text/javascript">
jQuery(document).ready(function() {
    var page_template = jQuery( "#page_template option:selected").val();
    if (page_template === "half-width.php" || page_template === "home-flexslider.php" || page_template === "home-zeusslider.php" || page_template === "home-flexslider-gallery.php" || page_template === "home-zeusslider-gallery.php") {
        jQuery("#dysania-editor-container").fadeIn();
    }
    else {
        jQuery("#dysania-editor-container").fadeOut();
    }
});    
jQuery(document).on("change", "#page_template", function() {
    var page_template = jQuery( "#page_template option:selected").val();
    if (page_template === "half-width.php" || page_template === "home-flexslider.php" || page_template === "home-zeusslider.php" || page_template === "home-flexslider-gallery.php" || page_template === "home-zeusslider-gallery.php") {
        jQuery("#dysania-editor-container").fadeIn();
    }
    else {
        jQuery("#dysania-editor-container").fadeOut();
    }
}); 
</script>';
}

function dysania_content_save_postdata( $post_id ) {
    if ( ! isset( $_POST['dysania_content_field_box_nonce'] ) )
        return $post_id;

    $nonce = $_POST['dysania_content_field_box_nonce'];
    if ( ! wp_verify_nonce( $nonce, 'dysania_content_field_box' ) )
        return $post_id;

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
        return $post_id;

    if ( 'page' == $_POST['post_type'] ) {

        if ( ! current_user_can( 'edit_page', $post_id ) )
            return $post_id;
    } else {
        if ( ! current_user_can( 'edit_post', $post_id ) )
            return $post_id;
    }

    $mydata = $_POST['dysaniacontent'];

    update_post_meta( $post_id, '_dysania_content_field_key', $mydata );
}
add_action( 'save_post', 'dysania_content_save_postdata' );
}

/* ---------------------------------------------------------
Single post skin selection
----------------------------------------------------------- */

if ( ! function_exists( 'dysania_blog_skin_box' ) ) {

add_action( 'edit_form_after_editor', 'dysania_blog_skin_box' );

function dysania_blog_skin_box( $post ) {
    if ($post->post_type != 'post') return;    
    wp_nonce_field( 'dysania_blog_skin_box', 'dysania_blog_skin_box_nonce' );
    $value = get_post_meta( $post->ID, '_dysania_blog_skin_key', true );    
    echo '<div id="dysaniablogskinbox"><h3><strong>Style</strong></h3>';
    ?>
    <select name="dysaniablogskin" id="dysaniablogskin">
<option value="lightfull" <?php if ($value == 'lightfull') { echo 'selected="selected"'; } ?>>Light-Full Width</option> 
<option value="darkfull" <?php if ($value == 'darkfull') { echo 'selected="selected"'; } ?>>Dark-Full Width</option>         
<option value="lightsidebar" <?php if ($value == 'lightsidebar') { echo 'selected="selected"'; } ?>>Light-Sidebar</option>
<option value="darksidebar" <?php if ($value == 'darksidebar') { echo 'selected="selected"'; } ?>>Dark-Sidebar</option>    
</select>
    <?php
    echo '</div>';
}

function dysania_blogskin_save_postdata( $post_id ) {
    if ( ! isset( $_POST['dysania_blog_skin_box_nonce'] ) )
        return $post_id;

    $nonce = $_POST['dysania_blog_skin_box_nonce'];
    if ( ! wp_verify_nonce( $nonce, 'dysania_blog_skin_box' ) )
        return $post_id;

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
        return $post_id;

    if ( 'page' == $_POST['post_type'] ) {

        if ( ! current_user_can( 'edit_page', $post_id ) )
            return $post_id;
    } else {
        if ( ! current_user_can( 'edit_post', $post_id ) )
            return $post_id;
    }

    $skindata = $_POST['dysaniablogskin'];

    update_post_meta( $post_id, '_dysania_blog_skin_key', $skindata );
}
add_action( 'save_post', 'dysania_blogskin_save_postdata' );
} 

/* ---------------------------------------------------------
TGM Activation Class
----------------------------------------------------------- */

require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'dysania_register_required_plugins' );

function dysania_register_required_plugins() {

	$plugins = array(

		array(
			'name'     				=> 'Dysania Grid Gallery',
			'slug'     				=> 'dysania-grid-gallery',
			'source'   				=> get_stylesheet_directory() . '/plugins/dysania-grid-gallery.zip',
			'required' 				=> true,
			'version' 				=> '',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),

		array(
			'name'     				=> 'Dysania Shortcodes and Widgets',
			'slug'     				=> 'dysania-shortcodes-and-widgets',
			'source'   				=> get_stylesheet_directory() . '/plugins/dysania-shortcodes-and-widgets.zip',
			'required' 				=> true,
			'version' 				=> '',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),
        
        array(
			'name'     				=> 'Dysania Sliders',
			'slug'     				=> 'dysania-sliders',
			'source'   				=> get_stylesheet_directory() . '/plugins/dysania-sliders.zip',
			'required' 				=> true,
			'version' 				=> '',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),
        array(
			'name'     				=> 'Column shortcodes',
			'slug'     				=> 'column-shortcodes',
			'source'   				=> get_stylesheet_directory() . '/plugins/column-shortcodes.zip',
			'required' 				=> false,
			'version' 				=> '',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),

	);

	$theme_text_domain = 'dysaniatext';

	$config = array(
		'domain'       		=> $theme_text_domain, 
		'default_path' 		=> '',
		'parent_menu_slug' 	=> 'themes.php', 
		'parent_url_slug' 	=> 'themes.php',
		'menu'         		=> 'install-required-plugins',
		'has_notices'      	=> true,
		'is_automatic'    	=> false,
		'message' 			=> '',
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', $theme_text_domain ),
			'menu_title'                       			=> __( 'Install Plugins', $theme_text_domain ),
			'installing'                       			=> __( 'Installing Plugin: %s', $theme_text_domain ),
			'oops'                             			=> __( 'Something went wrong with the plugin API.', $theme_text_domain ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ),
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ),
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ),
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ),
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ),
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ),
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ),
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ),
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', $theme_text_domain ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', $theme_text_domain ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', $theme_text_domain ),
			'nag_type'									=> 'updated'
		)
	);

	tgmpa( $plugins, $config );

} 
 
/* ---------------------------------------------------------
Declare options
----------------------------------------------------------- */
 
$theme_options = array (
 
array( "name" => $themename." Options",
"type" => "title"),   
 
/* ---------------------------------------------------------
General
----------------------------------------------------------- */
array( "name" => __( 'General', 'dysaniatext'),
"type" => "section"),
array( "type" => "open"),
 
array( "name" => __( 'Custom Favicon URL', 'dysaniatext'),
"desc" => "",
"id" => $shortname."_favicon",
"type" => "media",
"std" => get_template_directory_uri() ."/images/favicon.ico"),

array( "name" => __( 'Custom Header Script', 'dysaniatext'),
"desc" => __( 'You can use this field to add custom scripts,styles,Google Analystics Tracking code etc.', 'dysaniatext'),
"id" => $shortname."_customcode",
"type" => "textarea",
"std" => ""),
    
array( "name" => __( 'Background Image', 'dysaniatext'),
"desc" => __( 'Background Image URL', 'dysaniatext'),
"id" => $shortname."_bgimage",
"type" => "media",
"std" => ""),
    
array( "name" => __( '404 Page Bg Image', 'dysaniatext'),
"desc" => __( '404 Page Background Image URL', 'dysaniatext'),
"id" => $shortname."_errorimage",
"type" => "media",
"std" => ""),   
    
array( "name" => __( 'Dropdown Menu Width', 'dysaniatext'),
"desc" => __( 'Dropdown Menu Width (em)', 'dysaniatext'),
"id" => $shortname."_dropdownwidth",
"type" => "number",
"std" => "14"),      

array( "name" => __( 'Hide Footer Widget Area', 'dysaniatext'),
"desc" => __( 'If you dont want to use footer widgets, check this box.', 'dysaniatext'),
"id" => $shortname."_footerhide",
"type" => "checkbox",
"std" => ""),
    
array( "name" => __( 'Remove Bg Filter', 'dysaniatext'),
"desc" => __( 'If you dont want to use background filter, check this box.', 'dysaniatext'),
"id" => $shortname."_bgfilterhide",
"type" => "checkbox",
"std" => ""),
    
array( "name" => __( 'Under Construction Page Target Date', 'dysaniatext'),
"desc" => __( 'Valid date string is: Month Day, Year Hour:Minute:Second', 'dysaniatext'),
"id" => $shortname."_underconstructiontime",
"type" => "text",
"std" => "June 7, 2087 15:03:25"),    
    
array( "name" => __( 'Footer Text', 'dysaniatext'),
"desc" => __( 'Footer Text', 'dysaniatext'),
"id" => $shortname."_footertext",
"type" => "text",
"std" => "2013 Copyright - Dysania"),
    
array( "name" => __( 'Remove Meta Data', 'dysaniatext'),
"desc" => __( 'If you want to remove meta data (Author name, category name, tags) from single post pages, check this box.', 'dysaniatext'),
"id" => $shortname."_removemeta",
"type" => "checkbox",
"std" => ""),    
    
array( "type" => "close"),
    
/* ---------------------------------------------------------
Sliders
----------------------------------------------------------- */  
    
array( "name" => __( 'Sliders', 'dysaniatext'),
"type" => "section"),
array( "type" => "open"), 
    
array( "name" => __( 'Disable Autoplay', 'dysaniatext'),
"desc" => __( 'To disable autoplay, check this box.', 'dysaniatext'),
"id" => $shortname."_sliderautoplay",
"type" => "checkbox",
"std" => ""),
    
array( "name" => __( 'Slider Autoplay Speed', 'dysaniatext'),
"desc" => __( 'Slider Autoplay Speed (Second)', 'dysaniatext'),
"id" => $shortname."_sliderautoplayspeed",
"type" => "number",
"std" => "5"),
    
array( "name" => __( 'ZeusSlider Height', 'dysaniatext'),
"desc" => __( 'You can use only numbers between 1 with 5. Default value is 2.5', 'dysaniatext'),
"id" => $shortname."_zeusheight",
"type" => "text",
"std" => "2.5"),     

array( "type" => "close"),
    
/* ---------------------------------------------------------
Homepage
----------------------------------------------------------- */  
    
array( "name" => __( 'Homepage', 'dysaniatext'),
"type" => "section"),
array( "type" => "open"), 
    
array( "name" => __( 'Remove Latest Blog Posts', 'dysaniatext'),
"desc" => __( 'If you want to remove latest blog posts from your homepage, check this box.', 'dysaniatext'),
"id" => $shortname."_latestblogposts",
"type" => "checkbox",
"std" => ""),
    
array( "name" => __( 'Latest Blog Posts Title', 'dysaniatext'),
"desc" => __( 'If you dont want to add title, leave this field blank.', 'dysaniatext'),
"id" => $shortname."_latestblogpoststitle",
"type" => "text",
"std" => ""),
    
array( "name" => __( 'Maximum Post', 'dysaniatext'),
"desc" => __( 'Maximum Post', 'dysaniatext'),
"id" => $shortname."_latestblogpostspaged",
"type" => "number",
"std" => "3"),    
    
array( "name" => __( 'Remove Gallery', 'dysaniatext'),
"desc" => __( 'If you want to remove gallery from your homepage, check this box.', 'dysaniatext'),
"id" => $shortname."_homegallery",
"type" => "checkbox",
"std" => ""),
    
array( "name" => __( 'Gallery Title', 'dysaniatext'),
"desc" => __( 'If you dont want to add title, leave this field blank.', 'dysaniatext'),
"id" => $shortname."_homegallerytitle",
"type" => "text",
"std" => ""),
    
array( "name" => __( 'Filter Shortcode (Optional)', 'dysaniatext'),
"desc" => __( 'Add your filters between [filter][/filter] shortcodes. Dysania Grid Gallery Plugin is required.', 'dysaniatext'),
"id" => $shortname."_homegalleryfilter",
"type" => "text",
"std" => ""),      
    
array( "name" => __( 'Gallery ID', 'dysaniatext'),
"desc" => __( 'Dysania Grid Gallery Plugin is required.', 'dysaniatext'),
"id" => $shortname."_homegalleryshortcode",
"type" => "number",
"std" => ""),     

array( "type" => "close"),  

/* ---------------------------------------------------------
Fonts
----------------------------------------------------------- */  

array( "name" => __( 'Fonts', 'dysaniatext'),
"type" => "section"),
array( "type" => "open"),   
    
array( "name" => __( 'First Google Web Fonts Stylesheet Link', 'dysaniatext'),
"desc" => __( 'Google Web Fonts Stylesheet Link (For more information please look at the HELP DOCUMENTION)', 'dysaniatext'),
"id" => $shortname."_fontheadinglink",
"type" => "text",
"std" => ""),

array( "name" => __( 'First Font-Family (For Titles)', 'dysaniatext'),
"desc" => __( 'First Font-Family (Default Font-Family is Oswald)', 'dysaniatext'),
"id" => $shortname."_fontheadingfamily",
"type" => "text",
"std" => ""),

array( "name" => __( 'Second Google Web Fonts Stylesheet Link', 'dysaniatext'),
"desc" => __( 'Google Web Fonts Stylesheet Link', 'dysaniatext'),
"id" => $shortname."_fontlink",
"type" => "text",
"std" => ""),

array( "name" => __( 'Second Font-Family', 'dysaniatext'),
"desc" => __( 'Second Font-Family (Default Font-Family is Open Sans)', 'dysaniatext'),
"id" => $shortname."_fontfamily",
"type" => "text",
"std" => ""),
    
array( "name" => __( 'Site Title (px)', 'dysaniatext'),
"desc" => __( 'Site Title Font Size (px)', 'dysaniatext'),
"id" => $shortname."_sitetitlesize",
"type" => "number",
"std" => "60"), 

array( "name" => __( 'Menu (px)', 'dysaniatext'),
"desc" => __( 'Menu Font Size (px)', 'dysaniatext'),
"id" => $shortname."_menusize",
"type" => "number",
"std" => "14"),    
    
array( "name" => __( 'H1 (px)', 'dysaniatext'),
"desc" => __( 'H1 Title Font Size (px)', 'dysaniatext'),
"id" => $shortname."_h1",
"type" => "number",
"std" => "48"),

array( "name" => __( 'H2 (px)', 'dysaniatext'),
"desc" => __( 'H2 Title Font Size (px)', 'dysaniatext'),
"id" => $shortname."_h2",
"type" => "number",
"std" => "36"),

array( "name" => __( 'H3 (px)', 'dysaniatext'),
"desc" => __( 'H3 Title Font Size (px)', 'dysaniatext'),
"id" => $shortname."_h3",
"type" => "number",
"std" => "28"), 

array( "name" => __( 'H4 (px)', 'dysaniatext'),
"desc" => __( 'H4 Title Font Size (px)', 'dysaniatext'),
"id" => $shortname."_h4",
"type" => "number",
"std" => "24"), 

array( "name" => __( 'H5 (px)', 'dysaniatext'),
"desc" => __( 'H5 Title Font Size (px)', 'dysaniatext'),
"id" => $shortname."_h5",
"type" => "number",
"std" => "20"), 

array( "name" => __( 'H6 (px)', 'dysaniatext'),
"desc" => __( 'H6 Title Font Size (px)', 'dysaniatext'),
"id" => $shortname."_h6",
"type" => "number",
"std" => "16"), 

array( "name" => __( 'p (px)', 'dysaniatext'),
"desc" => __( 'Paragraphs and other texts font size (px)', 'dysaniatext'),
"id" => $shortname."_p",
"type" => "number",
"std" => "13"),     
    
array( "type" => "close"), 
    
/* ---------------------------------------------------------
Colors
----------------------------------------------------------- */  
    
array( "name" => __( 'Colors', 'dysaniatext'),
"type" => "section"),
array( "type" => "open"),
    
array( "name" => __( 'First Color', 'dysaniatext'),
"desc" => "",
"id" => $shortname."_first_color",
"type" => "text",
"std" => "#da2f10"),
    
array( "name" => __( 'Second Color', 'dysaniatext'),
"desc" => "",
"id" => $shortname."_second_color",
"type" => "text",
"std" => "#1b1b1b"), 
    
array( "name" => __( 'Third Color', 'dysaniatext'),
"desc" => "",
"id" => $shortname."_third_color",
"type" => "text",
"std" => "#262626"), 
    
array( "name" => __( 'Fourth Color', 'dysaniatext'),
"desc" => "",
"id" => $shortname."_fourth_color",
"type" => "text",
"std" => "#ffffff"), 
    
array( "name" => __( 'Fifth Color', 'dysaniatext'),
"desc" => "",
"id" => $shortname."_fifth_color",
"type" => "text",
"std" => "#c7c7c7"),     
    
array( "type" => "close"),     

/* ---------------------------------------------------------
Social Icons
----------------------------------------------------------- */ 
    
array( "name" => __( 'Social Icons', 'dysaniatext'),
"type" => "section"),
array( "type" => "open"),

array( "name" => __( 'Facebook', 'dysaniatext'),
"desc" => __( 'Facebook Link', 'dysaniatext'),
"id" => $shortname."_facebook_uid",
"type" => "text",
"std" => ""),

array( "name" => __( 'Twitter', 'dysaniatext'),
"desc" => __( 'Twitter Link', 'dysaniatext'),
"id" => $shortname."_twitter_uid",
"type" => "text",
"std" => ""),

array( "name" => __( 'Flickr', 'dysaniatext'),
"desc" => __( 'Flickr Link', 'dysaniatext'),
"id" => $shortname."_flickr_uid",
"type" => "text",
"std" => ""),
    
array( "name" => __( 'Google Plus', 'dysaniatext'),
"desc" => __( 'Google Plus Link', 'dysaniatext'),
"id" => $shortname."_google_uid",
"type" => "text",
"std" => ""),

array( "name" => __( 'Skype', 'dysaniatext'),
"desc" => __( 'Skype Link', 'dysaniatext'),
"id" => $shortname."_skype_uid",
"type" => "text",
"std" => ""),

array( "name" => __( 'Vimeo', 'dysaniatext'),
"desc" => __( 'Vimeo Link', 'dysaniatext'),
"id" => $shortname."_vimeo_uid",
"type" => "text",
"std" => ""),

array( "name" => __( 'You Tube', 'dysaniatext'),
"desc" => __( 'You Tube Link', 'dysaniatext'),
"id" => $shortname."_youtube_uid",
"type" => "text",
"std" => ""),
    
array( "name" => __( 'Linkedin', 'dysaniatext'),
"desc" => __( 'Linkedin Link', 'dysaniatext'),
"id" => $shortname."_linkedin_uid",
"type" => "text",
"std" => ""),
    
array( "name" => __( 'Dribbble', 'dysaniatext'),
"desc" => __( 'Dribbble Link', 'dysaniatext'),
"id" => $shortname."_dribbble_uid",
"type" => "text",
"std" => ""),
    
array( "name" => __( 'Behance', 'dysaniatext'),
"desc" => __( 'Behance Link', 'dysaniatext'),
"id" => $shortname."_behance_uid",
"type" => "text",
"std" => ""),
    
array( "name" => __( 'Paypal', 'dysaniatext'),
"desc" => __( 'Paypal Link', 'dysaniatext'),
"id" => $shortname."_paypal_uid",
"type" => "text",
"std" => ""),     
    
array( "name" => __( 'Rss', 'dysaniatext'),
"desc" => __( 'Rss Link', 'dysaniatext'),
"id" => $shortname."_rss_uid",
"type" => "text",
"std" => ""), 

array( "name" => __( 'Custom Icon Image', 'dysaniatext'),
"desc" => "",
"id" => $shortname."_customimg_uid",
"type" => "media",
"std" => ""),

array( "name" => __( 'Custom Icon Link', 'dysaniatext'),
"desc" => __( 'Custom Icon Link', 'dysaniatext'),
"id" => $shortname."_customlink_uid",
"type" => "text",
"std" => ""),
    
array( "name" => __( 'Second Custom Icon Image', 'dysaniatext'),
"desc" => "",
"id" => $shortname."_secondcustomimg_uid",
"type" => "media",
"std" => ""),

array( "name" => __( 'Second Custom Icon Link', 'dysaniatext'),
"desc" => __( 'Second Custom Icon Link', 'dysaniatext'),
"id" => $shortname."_secondcustomlink_uid",
"type" => "text",
"std" => ""),  

array( "name" => __( 'Third Custom Icon Image', 'dysaniatext'),
"desc" => "",
"id" => $shortname."_thirdcustomimg_uid",
"type" => "media",
"std" => ""),

array( "name" => __( 'Third Custom Icon Link', 'dysaniatext'),
"desc" => __( 'Third Custom Icon Link', 'dysaniatext'),
"id" => $shortname."_thirdcustomlink_uid",
"type" => "text",
"std" => ""),      
    
array( "type" => "close"),    


/* ---------------------------------------------------------
Contact section
----------------------------------------------------------- */
array( "name" => __( 'Contact Form', 'dysaniatext'),
"type" => "section"),
array( "type" => "open"),

array( "name" => __( 'Recipient Name', 'dysaniatext'),
"desc" => __( 'Recipient Name of the contact form e-mail', 'dysaniatext'),
"id" => $shortname."_contactform_recipient",
"type" => "text",
"std" => "yourname"),

array( "name" => __( 'E-Mail Subject', 'dysaniatext'),
"desc" => __( 'Subject of the contact form e-mail', 'dysaniatext'),
"id" => $shortname."_contactform_subject",
"type" => "text",
"std" => "subject"),
 
array( "name" => __( 'Contact Form E-Mail', 'dysaniatext'),
"desc" => __( 'Contact form content will be send to this email address', 'dysaniatext'),
"id" => $shortname."_contactform_email",
"type" => "text",
"std" => ""),

array( "name" => __( 'Name Field Text', 'dysaniatext'),
"desc" => __( 'Name field text', 'dysaniatext'),
"id" => $shortname."_name_field",
"type" => "text",
"std" => "Name"),

array( "name" => __( 'E-Mail Field Text', 'dysaniatext'),
"desc" => __( 'E-Mail field text', 'dysaniatext'),
"id" => $shortname."_email_field",
"type" => "text",
"std" => "Email"),

array( "name" => __( 'Message Field Text', 'dysaniatext'),
"desc" => __( 'Message field text', 'dysaniatext'),
"id" => $shortname."_message_field",
"type" => "text",
"std" => "Message"),

array( "name" => __( 'Send Button Text', 'dysaniatext'),
"desc" => __( 'Send button text', 'dysaniatext'),
"id" => $shortname."_send_button",
"type" => "text",
"std" => "Send"),

 
array( "type" => "close")
);
 
/*---------------------------------------------------
Theme Panel Output
----------------------------------------------------*/
if ( ! function_exists( 'add_settings_page' ) ) {
function add_settings_page() {
add_theme_page( __( 'Theme Settings', 'dysaniatext'), __( 'Theme Settings', 'dysaniatext'), 'manage_options', 'settings', 'theme_settings_page');
}
add_action( 'admin_menu', 'add_settings_page' );    
}

if ( ! function_exists( 'theme_settings_page' ) ) {
function theme_settings_page() {
if ( ! did_action( 'wp_enqueue_media' ) ){
    wp_enqueue_media();
}      
global $themename,$theme_options;
$i=0;
$message='';
if ( 'save' == @$_REQUEST['action'] ) {

foreach ($theme_options as $value) {
update_option( @$value['id'], @$_REQUEST[ $value['id'] ] ); }

 
if ( array_key_exists('id', $value) ) { 
foreach ($theme_options as $value) {
if( isset( $_REQUEST[ @$value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
}
$message='saved';
}
else if( 'reset' == @$_REQUEST['action'] ) {
 
foreach ($theme_options as $value) {
delete_option( @$value['id'] ); }
$message='reset';
}
 
if ( $message=='saved' ) echo '<div id="message" class="updated"><p><strong>'.$themename.' settings saved.</strong></p></div>';
if ( $message=='reset' ) echo '<div id="message" class="updated"><p><strong>'.$themename.' settings reset.</strong></p></div>';
 
?>
<script type="text/javascript">
jQuery(document).ready(function (){
"use strict";

jQuery('.input_title h3').click(function(){
if(jQuery(this).parent().next('.all_options').css('display')==='none')
{    
jQuery(this).removeClass('inactive');
jQuery(this).addClass('active');
 
}
else
{    
jQuery(this).removeClass('active');
jQuery(this).addClass('inactive');
}
 
jQuery(this).parent().next('.all_options').slideToggle('slow');
return false;
});
})(jQuery);	
</script>
<div id="panelwrapper">
<div class="options_wrap">
<div id="icon-options-general"></div>
<h1><?php _e( ' Theme Settings', 'dysaniatext' )?></h1>
<script type="text/javascript">
jQuery(document).ready(function($){
    $('#pickerdysania_first_color').farbtastic('#colordysania_first_color');
    $('#pickerdysania_second_color').farbtastic('#colordysania_second_color'); 
    $('#pickerdysania_third_color').farbtastic('#colordysania_third_color'); 
    $('#pickerdysania_fourth_color').farbtastic('#colordysania_fourth_color'); 
    $('#pickerdysania_fifth_color').farbtastic('#colordysania_fifth_color'); 
});
</script>
<ul class="doclinks">
<li><a class="button-primary" href="<?php echo get_template_directory_uri() . '/documentation/index.html' ?>" target="_blank">Help Documentation</a></li>
<li><a class="button-secondary" href="http://help.wp4life.com/" target="_blank">Knowledge Base</a></li>    
<li><a class="button-secondary" href="<?php echo get_template_directory_uri() . '/documentation/dysania.zip' ?>">Download Demo XML File</a></li>
<li><a class="button-secondary" href="http://themeforest.net/user/egemenerd?ref=egemenerd">Visit Support</a></li>    
</ul>
<div>
<form method="post">
 
<?php foreach ($theme_options as $value) {
 
switch ( $value['type'] ) {
 
case "open": ?>
<?php break;
 
case "close": ?>
</div>
</div><br />

<?php break;
 
case 'text': ?>
<div class="option_input">
<label for="<?php echo $value['id']; ?>">
<?php echo $value['name']; ?></label>
<input id="color<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" name="<?php echo $value['id']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>" />
<small><?php echo $value['desc']; ?> <div id="picker<?php echo $value['id']; ?>"></div></small>
<div class="clearfix"></div>
</div>
<?php break;
    
case 'number': ?>
<div class="option_input">
<label for="<?php echo $value['id']; ?>">
<?php echo $value['name']; ?></label>
<input id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" onkeypress="validate(event)" name="<?php echo $value['id']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>" />
<small><?php echo $value['desc']; ?> <div id="<?php echo $value['id']; ?>"></div></small>
<script type="text/javascript">
function validate(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}    
</script>    
<div class="clearfix"></div>
</div>
<?php break;    
 
case 'textarea': ?>
<div class="option_input">
<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
<textarea name="<?php echo $value['id']; ?>" rows="" cols=""><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id']) ); } else { echo $value['std']; } ?></textarea>
<small><?php echo $value['desc']; ?></small>
<div class="clearfix"></div>
</div>
<?php break;    
    
case 'info': ?>
<div class="option_input">
<div class="option_info_box"><?php echo $value['name']; ?></div>
<div class="clearfix"></div>
</div>
<?php break;    
 
case 'editor': ?>
<div class="option_input">
<?php wp_editor( stripslashes(get_option( $value['id'])), $value['id']); ?> 
<div class="clearfix"></div>
<div style="font-size:10px; color:#F00;"><?php echo $value['desc']; ?></div>
<div class="clearfix"></div>
</div>
<?php break; 
 
case 'tinyeditor': ?>
<div class="option_input">
<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>    
<?php $settings = array( 'teeny' => true, 'media_buttons' => false ); ?>    
<?php wp_editor( stripslashes(get_option( $value['id'])), $value['id'], $settings); ?> 
<div class="clearfix"></div>
<div style="font-size:10px; color:#F00;"><?php echo $value['desc']; ?></div>
<div class="clearfix"></div>
</div>
<?php break;    
    
case 'media': ?>
<div class="option_input">
<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
<input id="<?php echo $value['id']; ?>_image" type="text" name="<?php echo $value['id']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>" /> 
<input id="<?php echo $value['id']; ?>_image_button" class="button" type="button" value="Upload Image" />
<script type="text/javascript">
jQuery(document).ready(function($){ 
    var custom_uploader; 
    $('#<?php echo $value['id']; ?>_image_button').click(function(e) { 
        e.preventDefault();
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
        custom_uploader.on('select', function() {
            attachment = custom_uploader.state().get('selection').first().toJSON();
            $('#<?php echo $value['id']; ?>_image').val(attachment.url);
        });
        custom_uploader.open(); 
    }); 
});    
</script>    
<div class="clearfix"></div>
</div>
<?php break;    
 
case "checkbox": ?>
<div class="option_input">
<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
<?php if(get_option($value['id'])){ $checked = 'checked="checked"'; }else{ $checked = "";} ?>
<input id="<?php echo $value['id']; ?>" type="checkbox" name="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
<small><?php echo $value['desc']; ?></small>
<div class="clearfix"></div>
</div>
<?php break;
 
case "section":
$i++; ?>
<div class="input_section">
<div class="input_title">
 
<h3><img src="<?php echo get_template_directory_uri(); ?>/includes/images/settings.png" alt="">&nbsp;<?php echo $value['name']; ?></h3>
<span class="submit"><input name="save<?php echo $i; ?>" type="submit" value="<?php echo __( 'Save Changes', 'dysaniatext') ?>" class="button-primary" /></span>
<div class="clearfix"></div>
</div>
<div class="all_options">
<?php break;
 
}
}?>
<input type="hidden" name="action" value="save" class="button-primary" />
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="<?php echo __( 'Reset', 'dysaniatext') ?>" class="button-secondary" />
<input type="hidden" name="action" value="reset" />
</p>
</form>
</div>
<div>
<p>This theme was made by <a title="egemenerd" href="http://themeforest.net/user/egemenerd?ref=egemenerd" target="_blank" >Egemenerd</a>.</p>
</div>
</div>
</div>
<?php
}
}
?>