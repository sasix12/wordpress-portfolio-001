<?php
// register post type footer
add_action( 'init', 'post_type_footer' );
function post_type_footer() {
	$labels = array(
		'name' => _x('Footer', 'post type general name', 'boston'),
		'singular_name' => _x('Footer', 'post type singular name', 'boston'),
		'add_new' => _x('Add New Footer', 'book', 'boston'),
		'add_new_item' => __('Add New Footer', 'boston'),
		'edit_item' => __('Edit Footer', 'boston'),
		'new_item' => __('New Footer', 'boston'),
		'view_item' => __('View Footer', 'boston'),
		'search_items' => __('Search Footer', 'boston'),
		'not_found' =>  __('No Footer found', 'boston'),
		'not_found_in_trash' => __('No Footer found in Trash', 'boston'), 
		'parent_item_colon' => ''
	);		
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true, 
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'show_in_nav_menus' => false,
		'show_in_admin_bar' => true,
		'menu_position' => 20,
		'exclude_from_search' => true,
		'supports' => array('title', 'content'),
		'menu_icon' => 'dashicons-editor-insertmore'
	); 		

	register_post_type( 'footer', $args );
}