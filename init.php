<?php
/**
* Plugin Name: Change slug
* Description: this plugin adds a hash on the slug.
* Version: 1.2.1
* Author: Jose Aldana
* Author Email: josegochoxd@gmail.com
*/

defined( 'ABSPATH' ) or die('Not Today!');

add_filter( 'pre_wp_unique_post_slug', 'cs_check_slug', 10, 6 );
function chs_check_slug( $override, $slug, $post_ID, $post_status, $post_type, $post_parent ) {
	global $wpdb;
	if ( 'product' == $post_type ) {
        return chs_gethashSlug($slug,$post_ID);
    }
    return $override;
}

function chs_gethashSlug($slug, $post_id){
	global $wpdb;
	
	$post_name = $wpdb->get_var("SELECT post_name FROM `{$wpdb->prefix}posts` WHERE ID = '$post_id'");
	if($post_name==''){
		return $slug.'-'.hash('sha256', $post_ID);
	}
	return $post_name;
}