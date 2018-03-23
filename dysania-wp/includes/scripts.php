<?php
add_action( 'wp_enqueue_scripts', 'dysania_script_register' ); 
if ( ! function_exists( 'dysania_script_register' ) ) {
function dysania_script_register() {  
wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/modernizr.js','','',false);
wp_enqueue_script("jquery");
wp_enqueue_script('backstretch', get_template_directory_uri() . '/js/jquery.backstretch.min.js','','',false);    
wp_enqueue_script('dysaniacustom', get_template_directory_uri() . '/js/custom.js','','',true);
if ( is_page_template('under-construction.php') ) {     
wp_enqueue_script('dysaniauct', get_template_directory_uri() . '/js/underconstruction.js','','',true);
}     
}
}
?>