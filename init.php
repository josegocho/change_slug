<?php
/**
* Plugin Name: Change slug
* Description: Este plugin modifica los slug.
* Version: 1.1
* Author: Jose Aldana & Gabriel Segovia - Digitally
* Author Email: josegochoxd@gmail.com
*/

defined( 'ABSPATH' ) or die('Not Today!');


add_filter( 'pre_wp_unique_post_slug', 'vip_set_log_slug', 10, 6 );

function vip_set_log_slug( $override, $slug, $post_ID, $post_status, $post_type, $post_parent ) {
	//if ( 'product' == $post_type ) {
        return $slug.'-'.base64_encode(hash('sha256', $post_ID));
    //}
    //return $override;
}

