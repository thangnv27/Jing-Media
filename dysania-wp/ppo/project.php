<?php

# Custom project post type
add_action('init', 'create_project_post_type');

function create_project_post_type(){
    $args = array(
        'labels' => array(
            'name' => __('Dự án'),
            'singular_name' => __('projects'),
            'add_new' => __('Add new'),
            'add_new_item' => __('Add new project'),
            'new_item' => __('New project'),
            'edit' => __('Edit'),
            'edit_item' => __('Edit project'),
            'view' => __('View project'),
            'view_item' => __('View project'),
            'search_items' => __('Search projects'),
            'not_found' => __('No project found'),
            'not_found_in_trash' => __('No project found in trash'),
        ),
        'public' => true,
        'show_ui' => true,
        'publicy_queryable' => true,
        'exclude_from_search' => false,
        'menu_position' => 5,
        'hierarchical' => false,
        'query_var' => true,
       'supports' => array(
            'title', 'editor', 'author', 'thumbnail','revisions',
            //'custom-fields', 'excerpt', 'comments','excerpt',
        ),
        'rewrite' => array('slug' => 'project', 'with_front' => false),
        'can_export' => true,
        'description' => __('project description here.')
    );
    
    register_post_type('project', $args);
}

# Custom project taxonomies
add_action('init', 'create_project_taxonomies');

function create_project_taxonomies(){
    register_taxonomy('project_category', 'project', array(
        'hierarchical' => true,
        'labels' => array(
            'name' => __('Danh mục dự án'),
            'singular_name' => __('Danh mục dự án'),
            'add_new' => __('Add New'),
            'add_new_item' => __('Add New Category'),
            'new_item' => __('New Category'),
            'search_items' => __('Search Categories'),
        ),
    ));
}
