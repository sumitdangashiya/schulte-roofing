<?php
/**
 * Register KB Custom Post Type
 */
function schulte_roofing_knowledge_base() {

	$labels = array(
		'name'                  => _x( 'Knowledge base', 'Post Type General Name', 'schulte-roofing' ),
		'singular_name'         => _x( 'Knowledge base', 'Post Type Singular Name', 'schulte-roofing' ),
		'menu_name'             => __( 'Knowledge base', 'schulte-roofing' ),
		'name_admin_bar'        => __( 'Knowledge base', 'schulte-roofing' ),
		'archives'              => __( 'Item Archives', 'schulte-roofing' ),
		'attributes'            => __( 'Item Attributes', 'schulte-roofing' ),
		'parent_item_colon'     => __( 'Parent Item:', 'schulte-roofing' ),
		'all_items'             => __( 'All Items', 'schulte-roofing' ),
		'add_new_item'          => __( 'Add New Item', 'schulte-roofing' ),
		'add_new'               => __( 'Add New', 'schulte-roofing' ),
		'new_item'              => __( 'New Item', 'schulte-roofing' ),
		'edit_item'             => __( 'Edit Item', 'schulte-roofing' ),
		'update_item'           => __( 'Update Item', 'schulte-roofing' ),
		'view_item'             => __( 'View Item', 'schulte-roofing' ),
		'view_items'            => __( 'View Items', 'schulte-roofing' ),
		'search_items'          => __( 'Search Item', 'schulte-roofing' ),
		'not_found'             => __( 'Not found', 'schulte-roofing' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'schulte-roofing' ),
		'featured_image'        => __( 'Featured Image', 'schulte-roofing' ),
		'set_featured_image'    => __( 'Set featured image', 'schulte-roofing' ),
		'remove_featured_image' => __( 'Remove featured image', 'schulte-roofing' ),
		'use_featured_image'    => __( 'Use as featured image', 'schulte-roofing' ),
		'insert_into_item'      => __( 'Insert into item', 'schulte-roofing' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'schulte-roofing' ),
		'items_list'            => __( 'Items list', 'schulte-roofing' ),
		'items_list_navigation' => __( 'Items list navigation', 'schulte-roofing' ),
		'filter_items_list'     => __( 'Filter items list', 'schulte-roofing' ),
	);
	$args = array(
		'label'                 => __( 'Knowledge base', 'schulte-roofing' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-book',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'knowledgebase', $args );

}
//add_action( 'init', 'schulte_roofing_knowledge_base', 0 );

/**
 * Register KB Custom Category
 */
function schulte_roofing_kb_category() {

	$labels = array(
		'name'                       => _x( 'Category', 'Category General Name', 'schulte-roofing' ),
		'singular_name'              => _x( 'Category', 'Category Singular Name', 'schulte-roofing' ),
		'menu_name'                  => __( 'Category', 'schulte-roofing' ),
		'all_items'                  => __( 'All Items', 'schulte-roofing' ),
		'parent_item'                => __( 'Parent Item', 'schulte-roofing' ),
		'parent_item_colon'          => __( 'Parent Item:', 'schulte-roofing' ),
		'new_item_name'              => __( 'New Item Name', 'schulte-roofing' ),
		'add_new_item'               => __( 'Add New Item', 'schulte-roofing' ),
		'edit_item'                  => __( 'Edit Item', 'schulte-roofing' ),
		'update_item'                => __( 'Update Item', 'schulte-roofing' ),
		'view_item'                  => __( 'View Item', 'schulte-roofing' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'schulte-roofing' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'schulte-roofing' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'schulte-roofing' ),
		'popular_items'              => __( 'Popular Items', 'schulte-roofing' ),
		'search_items'               => __( 'Search Items', 'schulte-roofing' ),
		'not_found'                  => __( 'Not Found', 'schulte-roofing' ),
		'no_terms'                   => __( 'No items', 'schulte-roofing' ),
		'items_list'                 => __( 'Items list', 'schulte-roofing' ),
		'items_list_navigation'      => __( 'Items list navigation', 'schulte-roofing' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'kbcategory', array( 'knowledgebase' ), $args );

}
add_action( 'init', 'schulte_roofing_kb_category', 0 );

/**
 * Register Portfolio Post Type
 */
function schulte_roofing_portfolio() {

	$labels = array(
		'name'                  => _x( 'Roofing Portfolio', 'Post Type General Name', 'schulte-roofing' ),
		'singular_name'         => _x( 'Roofing Portfolio', 'Post Type Singular Name', 'schulte-roofing' ),
		'menu_name'             => __( 'Roofing Portfolio', 'schulte-roofing' ),
		'name_admin_bar'        => __( 'Roofing Portfolio', 'schulte-roofing' ),
		'archives'              => __( 'Item Archives', 'schulte-roofing' ),
		'attributes'            => __( 'Item Attributes', 'schulte-roofing' ),
		'parent_item_colon'     => __( 'Parent Item:', 'schulte-roofing' ),
		'all_items'             => __( 'All Items', 'schulte-roofing' ),
		'add_new_item'          => __( 'Add New Item', 'schulte-roofing' ),
		'add_new'               => __( 'Add New', 'schulte-roofing' ),
		'new_item'              => __( 'New Item', 'schulte-roofing' ),
		'edit_item'             => __( 'Edit Item', 'schulte-roofing' ),
		'update_item'           => __( 'Update Item', 'schulte-roofing' ),
		'view_item'             => __( 'View Item', 'schulte-roofing' ),
		'view_items'            => __( 'View Items', 'schulte-roofing' ),
		'search_items'          => __( 'Search Item', 'schulte-roofing' ),
		'not_found'             => __( 'Not found', 'schulte-roofing' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'schulte-roofing' ),
		'featured_image'        => __( 'Featured Image', 'schulte-roofing' ),
		'set_featured_image'    => __( 'Set featured image', 'schulte-roofing' ),
		'remove_featured_image' => __( 'Remove featured image', 'schulte-roofing' ),
		'use_featured_image'    => __( 'Use as featured image', 'schulte-roofing' ),
		'insert_into_item'      => __( 'Insert into item', 'schulte-roofing' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'schulte-roofing' ),
		'items_list'            => __( 'Items list', 'schulte-roofing' ),
		'items_list_navigation' => __( 'Items list navigation', 'schulte-roofing' ),
		'filter_items_list'     => __( 'Filter items list', 'schulte-roofing' ),
	);
	$args = array(
		'label'                 => __( 'Roofing Portfolio', 'schulte-roofing' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'rewrite'               => array( 'slug' => 'portfolio-item' ),
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'roofingportfolio', $args );

}
add_action( 'init', 'schulte_roofing_portfolio', 0 );

/**
 * Register Custom portfolio category
 */
function schulte_roofing_portfolio_category() {

	$labels = array(
		'name'                       => _x( 'Category', 'Taxonomy General Name', 'schulte-roofing' ),
		'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'schulte-roofing' ),
		'menu_name'                  => __( 'Category', 'schulte-roofing' ),
		'all_items'                  => __( 'All Items', 'schulte-roofing' ),
		'parent_item'                => __( 'Parent Item', 'schulte-roofing' ),
		'parent_item_colon'          => __( 'Parent Item:', 'schulte-roofing' ),
		'new_item_name'              => __( 'New Item Name', 'schulte-roofing' ),
		'add_new_item'               => __( 'Add New Item', 'schulte-roofing' ),
		'edit_item'                  => __( 'Edit Item', 'schulte-roofing' ),
		'update_item'                => __( 'Update Item', 'schulte-roofing' ),
		'view_item'                  => __( 'View Item', 'schulte-roofing' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'schulte-roofing' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'schulte-roofing' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'schulte-roofing' ),
		'popular_items'              => __( 'Popular Items', 'schulte-roofing' ),
		'search_items'               => __( 'Search Items', 'schulte-roofing' ),
		'not_found'                  => __( 'Not Found', 'schulte-roofing' ),
		'no_terms'                   => __( 'No items', 'schulte-roofing' ),
		'items_list'                 => __( 'Items list', 'schulte-roofing' ),
		'items_list_navigation'      => __( 'Items list navigation', 'schulte-roofing' ),
	);
	$args = array(
		'labels'                     => $labels,
		'rewrite'           		 => array( 'slug' => 'portfolio-category', 'hierarchical' => true ),
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'portfoliocategory', array( 'roofingportfolio' ), $args );

}
add_action( 'init', 'schulte_roofing_portfolio_category', 0 );

/**
 * Register Custom portfolio tag
 */
function schulte_roofing_portfolio_tag() {

	$labels = array(
		'name'                       => _x( 'Tags', 'Taxonomy General Name', 'schulte-roofing' ),
		'singular_name'              => _x( 'Tags', 'Taxonomy Singular Name', 'schulte-roofing' ),
		'menu_name'                  => __( 'Tags', 'schulte-roofing' ),
		'all_items'                  => __( 'All Tags', 'schulte-roofing' ),
		'parent_item'                => __( 'Parent Tag', 'schulte-roofing' ),
		'parent_item_colon'          => __( 'Parent Tag:', 'schulte-roofing' ),
		'new_item_name'              => __( 'New Tag Name', 'schulte-roofing' ),
		'add_new_item'               => __( 'Add New Tag', 'schulte-roofing' ),
		'edit_item'                  => __( 'Edit Tag', 'schulte-roofing' ),
		'update_item'                => __( 'Update Tag', 'schulte-roofing' ),
		'view_item'                  => __( 'View Tag', 'schulte-roofing' ),
		'separate_items_with_commas' => __( 'Separate Tags with commas', 'schulte-roofing' ),
		'add_or_remove_items'        => __( 'Add or remove Tags', 'schulte-roofing' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'schulte-roofing' ),
		'popular_items'              => __( 'Popular Tags', 'schulte-roofing' ),
		'search_items'               => __( 'Search Tags', 'schulte-roofing' ),
		'not_found'                  => __( 'Not Found', 'schulte-roofing' ),
		'no_terms'                   => __( 'No Tags', 'schulte-roofing' ),
		'items_list'                 => __( 'Tags list', 'schulte-roofing' ),
		'items_list_navigation'      => __( 'Items list navigation', 'schulte-roofing' ),
	);
	$args = array(
		'labels'                     => $labels,
		'rewrite'           		 => array( 'slug' => 'portfolio-tag' ),
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'portfoliotag', array( 'roofingportfolio' ), $args );

}
add_action( 'init', 'schulte_roofing_portfolio_tag', 0 );

/**
 * Register Testimonial Post Type
 */
 // Register Custom Post Type
function schulte_roofing_testimonials() {

	$labels = array(
		'name'                  => _x( 'Testimonials', 'Post Type General Name', 'schulte-roofing' ),
		'singular_name'         => _x( 'Testimonials', 'Post Type Singular Name', 'schulte-roofing' ),
		'menu_name'             => __( 'Testimonials', 'schulte-roofing' ),
		'name_admin_bar'        => __( 'Testimonials', 'schulte-roofing' ),
		'archives'              => __( 'Item Archives', 'schulte-roofing' ),
		'attributes'            => __( 'Item Attributes', 'schulte-roofing' ),
		'parent_item_colon'     => __( 'Parent Testimonial:', 'schulte-roofing' ),
		'all_items'             => __( 'All Testimonials', 'schulte-roofing' ),
		'add_new_item'          => __( 'Add New Testimonial', 'schulte-roofing' ),
		'add_new'               => __( 'Add New Testimonial', 'schulte-roofing' ),
		'new_item'              => __( 'New Testimonial', 'schulte-roofing' ),
		'edit_item'             => __( 'Edit Testimonial', 'schulte-roofing' ),
		'update_item'           => __( 'Update Testimonial', 'schulte-roofing' ),
		'view_item'             => __( 'View Testimonial', 'schulte-roofing' ),
		'view_items'            => __( 'View Testimonials', 'schulte-roofing' ),
		'search_items'          => __( 'Search Testimonial', 'schulte-roofing' ),
		'not_found'             => __( 'Not found', 'schulte-roofing' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'schulte-roofing' ),
		'featured_image'        => __( 'Featured Image', 'schulte-roofing' ),
		'set_featured_image'    => __( 'Set featured image', 'schulte-roofing' ),
		'remove_featured_image' => __( 'Remove featured image', 'schulte-roofing' ),
		'use_featured_image'    => __( 'Use as featured image', 'schulte-roofing' ),
		'insert_into_item'      => __( 'Insert into Testimonial', 'schulte-roofing' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'schulte-roofing' ),
		'items_list'            => __( 'Items list', 'schulte-roofing' ),
		'items_list_navigation' => __( 'Items list navigation', 'schulte-roofing' ),
		'filter_items_list'     => __( 'Filter items list', 'schulte-roofing' ),
	);
	$args = array(
		'label'                 => __( 'Testimonials', 'schulte-roofing' ),
		'description'           => __( 'Post Type Description', 'schulte-roofing' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'testimonial', $args );

}
add_action( 'init', 'schulte_roofing_testimonials', 0 );


/**
 * Register  Testimonial Custom Category
 */
function schulte_roofing_testimonials_category() {

	$labels = array(
		'name'                       => _x( 'Category', 'Category General Name', 'schulte-roofing' ),
		'singular_name'              => _x( 'Category', 'Category Singular Name', 'schulte-roofing' ),
		'menu_name'                  => __( 'Category', 'schulte-roofing' ),
		'all_items'                  => __( 'All Items', 'schulte-roofing' ),
		'parent_item'                => __( 'Parent Item', 'schulte-roofing' ),
		'parent_item_colon'          => __( 'Parent Item:', 'schulte-roofing' ),
		'new_item_name'              => __( 'New Item Name', 'schulte-roofing' ),
		'add_new_item'               => __( 'Add New Item', 'schulte-roofing' ),
		'edit_item'                  => __( 'Edit Item', 'schulte-roofing' ),
		'update_item'                => __( 'Update Item', 'schulte-roofing' ),
		'view_item'                  => __( 'View Item', 'schulte-roofing' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'schulte-roofing' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'schulte-roofing' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'schulte-roofing' ),
		'popular_items'              => __( 'Popular Items', 'schulte-roofing' ),
		'search_items'               => __( 'Search Items', 'schulte-roofing' ),
		'not_found'                  => __( 'Not Found', 'schulte-roofing' ),
		'no_terms'                   => __( 'No items', 'schulte-roofing' ),
		'items_list'                 => __( 'Items list', 'schulte-roofing' ),
		'items_list_navigation'      => __( 'Items list navigation', 'schulte-roofing' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'tsmcategory', array( 'testimonial' ), $args );

}
add_action( 'init', 'schulte_roofing_testimonials_category', 0 );