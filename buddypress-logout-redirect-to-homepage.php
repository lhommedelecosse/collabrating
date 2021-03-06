<?php  // <~ do not copy the opening php tag

add_filter('logout_url',"bpdev_logout_url",100,2);
function bpdev_logout_url( $logout_url, $redirect) {
    //simply ignore the redirect and set it to the main domain
    //let us check for buddyopress,if yes,let us get the bp root domain right ?
    if(function_exists("bp_core_get_root_domain"))
        $redirect=bp_core_get_root_domain();
    else
        $redirect = get_blog_option( SITE_ID_CURRENT_SITE, 'siteurl' );

    $args = array( 'action' => 'logout' );
    if ( !empty($redirect) ) {
        $args['redirect_to'] = $redirect;
    }

    $logout_url = add_query_arg($args, site_url('wp-login.php', 'login'));
    $logout_url = wp_nonce_url( $logout_url, 'log-out' );

    return $logout_url;
}
