<?php

if ( ! defined( 'ABSPATH' ) ) exit;

/**
* Add rest support to an existing post type
*/
add_action( 'init', 'my_custom_post_type_rest_support', 25 );

function my_custom_post_type_rest_support() {
    global $wp_post_types;

    //set this to the name of your post type!
    $post_type_name = 'ht_kb';
    if( isset( $wp_post_types[ $post_type_name ] ) ) {
        $wp_post_types[$post_type_name]->show_in_rest = true;
        $wp_post_types[$post_type_name]->rest_base = $post_type_name;
        $wp_post_types[$post_type_name]->rest_controller_class = 'WP_REST_Posts_Controller';
    }
}