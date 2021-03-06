<?php  // <~ do not copy the opening php tag

// Add the Membership sub-navigation menu item to BuddyPress' Profile navigation array
add_action( 'bp_setup_nav', 'my_woo_info_nav' );
function my_woo_info_nav() {
	global $bp;
	$profile_link = trailingslashit( $bp->loggedin_user->domain . $bp->profile->slug );
	bp_core_new_subnav_item( array( 'name' => __( 'Membership', 'buddypress' ), 'slug' => 'membership', 'parent_url' => $profile_link, 'parent_slug' => $bp->profile->slug, 'screen_function' => 'bp_woo_profile_subscription_screen', 'position' => 30, 'item_css_id' => 'membership' ) );
}

// This is the screen_function used by BuddyPress' navigation
function bp_woo_profile_subscription_screen() {
	add_action( 'bp_template_title', 'bp_woo_profile_subscription_screen_title' );
	add_action( 'bp_template_content', 'bp_woo_profile_subscription_screen_content' );
	bp_core_load_template( apply_filters( 'bp_core_template_plugin', 'members/single/plugins' ) );
}

// Echo the screen title
function bp_woo_profile_subscription_screen_title() {
	echo 'Membership Settings';
}

// Add the WooCommerce My Account shortcode to the screen
function bp_woo_profile_subscription_screen_content() {
	echo do_shortcode( '[woocommerce_my_account]' );
}

