<?php
/*
Plugin Name: NS Remove Related Products for WooCommerce
Plugin URI: http://nsthemes.com
Description: Remove Related Products from your shop page
Version: 2.3.10
Author: NsThemes
Author URI: http://nsthemes.com
Text Domain: ns-remove-related-products-for-woocommerce
Domain Path: /i18n
License: GNU General Public License v2.0
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


/** 
 * @author        PluginEye
 * @copyright     Copyright (c) 2019, PluginEye.
 * @version         1.0.0
 * @license       https://www.gnu.org/licenses/gpl-3.0.html GNU General Public License Version 3
 * PLUGINEYE SDK
*/

require_once('plugineye/plugineye-class.php');
$plugineye = array(
    'main_directory_name'       => 'ns-remove-related-products-for-woocommerce',
    'main_file_name'            => 'ns-remove-related-product-woocommerce.php',
    'redirect_after_confirm'    => 'admin.php?page=ns-remove-related-products-for-woocommerce%2Fns-admin-options%2Fns_admin_option_dashboard.php',
    'plugin_id'                 => '208',
    'plugin_token'              => 'NWNmZTU0NWUzOTM3MzRlN2EwNjY4ZTFkZTQzNGE4OGMyNmFlMjQ4YWI4MGU3MWYzZGM1ZWM2MDM0MjFmMmRlY2FkMTBmNTU2ZjkxNDc=',
    'plugin_dir_url'            => plugin_dir_url(__FILE__),
    'plugin_dir_path'           => plugin_dir_path(__FILE__)
);

$plugineyeobj208 = new pluginEye($plugineye);
$plugineyeobj208->pluginEyeStart();      
        

if ( ! defined( 'REMOVE_RELATED_NS_PLUGIN_DIR' ) )
    define( 'REMOVE_RELATED_NS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

if ( ! defined( 'REMOVE_RELATED_NS_PLUGIN_URL' ) )
    define( 'REMOVE_RELATED_NS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );


function ns_rrpw_translate(){
	load_plugin_textdomain('ns-remove-related-products-for-woocommerce',false, basename( dirname( __FILE__ ) ) .'/i18n/');
}
add_action('plugins_loaded','ns_rrpw_translate');


/* *** plugin review trigger *** */
require_once( plugin_dir_path( __FILE__ ) .'/class/class-plugin-theme-review-request.php');

	
/* *** include css admin *** */
function ns_remove_related_css_admin( $hook ) {
	wp_enqueue_style('ns-style-remove-related-admin', REMOVE_RELATED_NS_PLUGIN_URL . '/css/style.css');
}
add_action( 'admin_enqueue_scripts', 'ns_remove_related_css_admin' );

/* *** include js admin *** */
function ns_remove_related_js( $hook ) {
	wp_enqueue_script('ns-script-remove-related', REMOVE_RELATED_NS_PLUGIN_URL . '/js/custom.js', array('jquery'));
	wp_localize_script( 'ns-script-remove-related', 'nsdismissremoverelated', array( 'ajax_url' => admin_url( 'admin-ajax.php' )));
}
add_action( 'admin_enqueue_scripts', 'ns_remove_related_js' );

/* *** include css *** */
function ns_remove_related_css( $hook ) {
	wp_enqueue_style('ns-style-remove-related-css', REMOVE_RELATED_NS_PLUGIN_URL . '/css/style_remove.css');
}
if (get_option('rrp_enabled_plugin', true)) {
	add_action( 'wp_enqueue_scripts', 'ns_remove_related_css' );
}

function ns_remove_related_products( $args ) {
	return array();
}
add_filter('woocommerce_related_products_args','ns_remove_related_products', 10); 


function ns_remove_related_free_options_group() {
    register_setting('woocommerce_remove_related_free_options', 'rrp_enabled_plugin');
}
 
add_action ('admin_init', 'ns_remove_related_free_options_group');

require_once( plugin_dir_path( __FILE__ ).'ns-admin-options/ns-admin-options-setup.php');

function ns_remove_related_update_options_form() {
	include_once('ns-admin-options/ns_admin_option_dashboard.php');
}


/* *** add link premium *** */
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'nsremoverelatedproduct_add_action_links' );

function nsremoverelatedproduct_add_action_links ( $links ) {	
 $mylinks = array('<a id="nsrrplinkpremium" href="https://www.nsthemes.com/product/remove-related-products-for-woocommerce/?ref-ns=2&campaign=RRP-linkpremium" target="_blank">'.__( 'Premium Version', 'ns-remove-related-products-for-woocommerce' ).'</a>');
return array_merge( $links, $mylinks );
}
?>