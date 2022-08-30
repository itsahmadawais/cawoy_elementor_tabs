<?php
/**
* Plugin Name: Cawoy Elementor
* Description:       Add Tabs Widget to the Elementor.
* Version:           1.0
* Author:            Awais Ahmad
* Author URI:        https://itsahmadawais.com
* Text Domain:       cawoy_elementor
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
    // Exit if accessed directly.
}
if(!defined('CAWOY_ELEMENTOR_DIR')){
    define('CAWOY_ELEMENTOR_DIR',plugin_dir_path( __FILE__ ));
}

if(!defined('CAWOY_ELEMENTOR_URL')){
    define('CAWOY_ELEMENTOR_URL',plugin_dir_url( __FILE__ ));
}

function register_cawoy_tab_widget_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/tabs-widget.php' );

	$widgets_manager->register( new \CawoyTabsWidget() );

}
add_action( 'elementor/widgets/register', 'register_cawoy_tab_widget_widget' );