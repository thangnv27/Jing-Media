<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

require ( get_template_directory() . '/includes/functions.php' );
require ( get_template_directory() . '/includes/scripts.php' );
include 'ppo/product.php';
include 'ppo/project.php';
add_image_size( 'ppo363', 363, 363, true ); 
add_image_size( 'ppo368', 368, 368, true ); 
add_image_size( 'ppo371', 371, 371, true ); 
add_image_size( 'ppo378', 378, 378, true ); 

if (is_admin()) {
    $basename_excludes = array('plugins.php', 'plugin-install.php', 'plugin-editor.php', 'themes.php', 'theme-editor.php', 
        'tools.php', 'import.php', 'export.php');
    if (in_array(basename($_SERVER['PHP_SELF']), $basename_excludes)) {
//        wp_redirect(admin_url());
    }
    
    // Add action
    add_action('admin_menu', 'custom_remove_menu_pages');
    add_action('admin_menu', 'remove_menu_editor', 102);
}

/**
 * Remove admin menu
 */
function custom_remove_menu_pages() {
    remove_menu_page('edit-comments.php');
    remove_menu_page('plugins.php');
    remove_menu_page('tools.php');
}

function remove_menu_editor() {
    remove_submenu_page('themes.php', 'theme-editor.php');
    remove_submenu_page('plugins.php', 'plugin-editor.php');
    remove_submenu_page('options-general.php', 'options-writing.php');
    remove_submenu_page('options-general.php', 'options-discussion.php');
    remove_submenu_page('options-general.php', 'options-media.php');
}