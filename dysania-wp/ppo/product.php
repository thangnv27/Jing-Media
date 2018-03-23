<?php

# Custom product post type
add_action('init', 'create_product_post_type');

function create_product_post_type(){
    $args = array(
        'labels' => array(
            'name' => __('sản phẩm'),
            'singular_name' => __('products'),
            'add_new' => __('Add new'),
            'add_new_item' => __('Add new product'),
            'new_item' => __('New product'),
            'edit' => __('Edit'),
            'edit_item' => __('Edit product'),
            'view' => __('View product'),
            'view_item' => __('View product'),
            'search_items' => __('Search products'),
            'not_found' => __('No product found'),
            'not_found_in_trash' => __('No product found in trash'),
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
        'rewrite' => array('slug' => 'product', 'with_front' => false),
        'can_export' => true,
        'description' => __('product description here.')
    );
    
    register_post_type('product', $args);
}

# Custom product taxonomies
add_action('init', 'create_product_taxonomies');

function create_product_taxonomies(){
    register_taxonomy('product_category', 'product', array(
        'hierarchical' => true,
        'labels' => array(
            'name' => __('Danh mục sản phẩm'),
            'singular_name' => __('Danh mục sản phẩm'),
            'add_new' => __('Add New'),
            'add_new_item' => __('Add New Category'),
            'new_item' => __('New Category'),
            'search_items' => __('Search Categories'),
        ),
    ));
}