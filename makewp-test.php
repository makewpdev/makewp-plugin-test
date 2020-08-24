<?php

/*
Plugin Name: Makewp Test
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: A brief description of the Plugin.
Version: 1.0
Author: hadie
Author URI: http://URI_Of_The_Plugin_Author
License: A "Slug" license name e.g. GPL2
*/



require __FILE__ . '/makewpdev/src/Client.php';
/**
 * Initialize the plugin tracker for plugin MakeWP Test
 *
 * @return  void
 */
function makewp_init_tracker_makewp_test() {

    if ( ! class_exists( 'Makewpdev\Client' ) ) {
        require_once __FILE__ . '/makewpdev/src/Client.php';
    }

    $client = new Makewpdev\Client( 'e4b555e5-917b-47e2-9550-d02f7e9a838b', 'MakeWP Test', __FILE__ );

    // Active insights
    $client->insights()->init();

    // Active automatic updater
    $client->updater();

    // Active license page and checker
    $args = array(
        'type'       => 'options',
        'menu_title' => 'MakeWP Test',
        'page_title' => 'MakeWP Test Settings',
        'menu_slug'  => 'makewp-test_settings',
    );
    $client->license()->add_settings_page( $args );

}

makewp_init_tracker_makewp_test();

