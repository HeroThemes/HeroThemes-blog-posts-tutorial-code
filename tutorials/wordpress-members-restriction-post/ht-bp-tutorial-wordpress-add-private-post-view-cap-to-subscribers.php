<?php

if ( ! defined( 'ABSPATH' ) ) exit;

/**
* Add read_private_posts capability to subscriber
* Note this is saves capability to the database on admin_init, so consider doing this once on theme/plugin activation
*/
add_action ('admin_init','add_sub_caps');

function add_sub_caps() {
	global $wp_roles;
	$role = get_role('subscriber');
	$role->add_cap('read_private_posts');
}