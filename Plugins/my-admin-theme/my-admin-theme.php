<?php
/*
Plugin Name: My Admin Theme
Plugin URI: 
Description: WP Admin Theme - Upload and Activate.  This is a very basic admin theme which adds an admin css file and a custom footer.
Author: Gururaj
Version: 1.0
*/

/**
 * Add CSS file link
 */
function my_admin_theme_style() {
    wp_enqueue_style('my-admin-theme', plugins_url('wp-admin.css', __FILE__));
}
add_action('admin_enqueue_scripts', 'my_admin_theme_style');
add_action('login_enqueue_scripts', 'my_admin_theme_style');

function my_crazy_admin_footer() {
   echo '<div class="myfooter-wrap"><p>This dashboard was made by <a href="https://www.skylinemicrosites.co.uk" target="_blank">Skyline Microsites</a>.</p></div>';
}

add_action('admin_footer', 'my_crazy_admin_footer');

function role_admin_body_class( $classes ) {
    global $wpdb, $current_user;

    wp_get_current_user();

    if (is_super_admin()) {
          $classes .= 'superadmin';
    } else {
          foreach( $current_user->roles as $role ) {
                $classes .= ' role-' . $role;
          }
    }

    return trim( $classes );
}

add_filter( 'admin_body_class', 'role_admin_body_class' );