<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/* *** add menu page and add sub menu page *** */
add_action( 'admin_menu', function() {
    add_menu_page(
        'Remove Related',                                          // Page title
        'Remove Related',                                          // Menu title
        'manage_options',                                          // Capability
        'ns-remove-related-products',                              // Menu slug (semplice, univoco)
        'nsrrp_admin_page_render',                                 // Callback function
        plugin_dir_url( __FILE__ ) . 'img/backend-sidebar-icon.png',
        60
    );
    add_submenu_page(
        'ns-remove-related-products',                              // Parent slug (deve corrispondere al menu slug sopra)
        'How to install premium version',
        'How to install premium version',
        'manage_options',
        'how-to-install-premium-version',
        function() { wp_redirect( 'https://www.nsthemes.com/how-to-install-the-premium-version/' ); exit; }
    );
});

/* *** Callback per la pagina principale *** */
function nsrrp_admin_page_render() {
    include plugin_dir_path( __FILE__ ) . 'ns_admin_option_dashboard.php';
}

/* *** Redirect sottomenu esterno *** */
function nsrrp_preprocess_pages( $value ) {
    global $pagenow;
    $page = isset( $_REQUEST['page'] ) ? $_REQUEST['page'] : false;
    if ( $pagenow == 'admin.php' && $page == 'how-to-install-premium-version' ) {
        wp_redirect( 'https://www.nsthemes.com/how-to-install-the-premium-version/' );
        exit;
    }
}
add_action( 'admin_init', 'nsrrp_preprocess_pages' );

/* *** add style *** */
add_action( 'admin_enqueue_scripts', function() {
    $ns_plugin_prefix = 'apf';
    wp_enqueue_style( 'ns-' . $ns_plugin_prefix . '-option-css-page', plugin_dir_url( __FILE__ ) . 'css/ns-option-css-page.css' );
    wp_enqueue_style( 'ns-' . $ns_plugin_prefix . '-option-css-a-page', plugin_dir_url( __FILE__ ) . 'css/ns-option-css-custom-page.css' );
    wp_enqueue_script( 'ns-' . $ns_plugin_prefix . '-option-js-page', plugins_url( '/js/ns-option-js-page.js', __FILE__ ), array( 'jquery' ) );
});