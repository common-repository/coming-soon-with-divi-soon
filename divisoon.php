<?php
/*
Plugin Name: Divi Soon
Plugin URI: https://www.divistride.com/product/divisoon
Description: Hide your website from visitors while working on your website
Author: Divi Stride
Version: 3.3.1
Author URI: https://www.divistride.com/
*/

include "includes/customizer.php";

function dsdsoon_add_submenus() {
    add_submenu_page(
        'et_divi_options',
            __( 'Page title', 'textdomain' ),
            __( 'Divi Soon', 'textdomain' ),
            'manage_options',
            '/customize.php?autofocus[section]=divi_soon_section'
        );
}
add_action('admin_menu', 'dsdsoon_add_submenus', 11 );

function divisoon_backend_css() {
    wp_enqueue_style('divisoon_backend_css', plugin_dir_url( __FILE__ ) . 'assets/css/backend.css');
}
add_action('admin_enqueue_scripts', 'divisoon_backend_css');

if( false != get_theme_mod( 'ds_coming_soon_enabler_switch' ) ) {
    function divisoon_frontend_css() {
        if ( ! is_user_logged_in() ) {
            wp_enqueue_style('divisoon_soon_css', plugin_dir_url( __FILE__ ) . 'assets/css/frontend.css');
            wp_enqueue_style( 'divisoon_soon_css' );
        }
    }
    add_action('wp_enqueue_scripts', 'divisoon_frontend_css');
}
if( false != get_theme_mod( 'ds_coming_soon_full_screen' ) ) {
    function divisoon_fullscreen_css() {
        if ( ! is_user_logged_in() ) {
            wp_enqueue_style('divisoon_fullscreen_css', plugin_dir_url( __FILE__ ) . 'assets/css/fullscreen.css');
            wp_enqueue_style( 'divisoon_fullscreen_css' );
        }
    }
    add_action('wp_enqueue_scripts', 'divisoon_fullscreen_css');
}

function dsds_soon_layout(){
if( false != get_theme_mod( 'ds_coming_soon_enabler_switch' ) ) {
    if ( ! is_user_logged_in() ) {
       
            echo '<div class="divisoon-container">';
                $id = get_option('coming_soon_layout_page'); 
                $p = get_page($id); echo apply_filters('the_content', $p->post_content);
            echo '</div>'; 
        
    }
}
}
add_action('wp_footer', 'dsds_soon_layout');
 
function dsds_redirect() {
 
	if ( ! is_front_page() && ! is_user_logged_in() ) { 
 
		wp_redirect( esc_url_raw( home_url( '/' ) ) ); 
 
     exit;
   
   }
   
}
add_action( 'template_redirect', 'dsds_redirect' );