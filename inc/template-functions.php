<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Schulte_Roofing
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function schulte_roofing_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'schulte_roofing_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function schulte_roofing_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'schulte_roofing_pingback_header' );

/*
 * Return rating for knowledge base post
 */
function schulte_roofing_ht_usefulness( $post_id ) {
	global $wpdb;
	
	$get_usefulness_query = "SELECT 
                                        SUM(magnitude) AS mag_total,
                                        COUNT(*) AS sum,
                                        SUM(CASE WHEN magnitude > 0 THEN 1 ELSE 0 END) AS upvotes,
                                        SUM(CASE WHEN magnitude = 0 THEN 1 ELSE 0 END) AS downvotes
                                        FROM {$wpdb->prefix}" . HT_VOTING_TABLE  .
                                    " WHERE post_id = '{$post_id}'
                                ";
	$mag_total =  $wpdb->get_var( $get_usefulness_query, 0 );
	$sum = $wpdb->get_var( $get_usefulness_query, 1 );
	$upvotes = $wpdb->get_var( $get_usefulness_query, 2 );
	$downvotes = $wpdb->get_var( $get_usefulness_query, 3 );
	if( ! $upvotes ) {
		$upvotes = 0;
	}
	if( $sum != 0 ) {
		$total_percentage = ( $upvotes / $sum ) * 100;
	}
	
	
	$total_upvotes_count = number_format($total_percentage / 20, 2, '.', '' );
	
	$knowledge_rating = '<div class="sr-kb-item-rating">
		<div class="sr-star-rating">
			<span style="width:'.$total_percentage.'%;">
				Rated <strong class="rating">' . $total_upvotes_count . '</strong> out of 5
			</span>
		</div>
		<span class="sr-upvotes">(' . $sum . ')</span>
	</div>';
	
	return $knowledge_rating;
}