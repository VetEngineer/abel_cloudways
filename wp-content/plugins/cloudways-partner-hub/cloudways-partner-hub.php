<?php
/**
 * Plugin Name:       Cloudways Partner Hub
 * Plugin URI:        https://www.cloudways.com/
 * Description:       Overrides specific WordPress plugin upgrade links with the Cloudways affiliate URL.
 * Version:           1.0.1
 * Requires at least: 5.0
 * Tested up to:      6.3
 * Author:            Breeze Team
 * Author URI:        https://www.cloudways.com/
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       cw-partner-hub
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
        exit;
}

/**
 * Define the affiliate URL constant.
 * Replace 'https://your.omnisend.com/XYZ' with the actual affiliate link.
 */
define( 'CWPH_OMNISEND_AFFILIATE_URL', 'https://www.omnisend.com/cloudways-partner-offer' );

/**
 * Main class for the Cloudways Partner Hub plugin.
 */
class CWPH_Partner_Hub {

        /**
         * Constructor.
         */
        public function __construct() {
                $this->setup_hooks();
        }

        /**
         * Setup all necessary WordPress hooks.
         */
        private function setup_hooks() {
                // Omnisend plugin: https://wordpress.org/plugins/omnisend/
                add_filter( 'omnisend_signup_wp_link', array( $this, 'override_omnisend_link' ) );

                // Omnisend WooCommerce plugin: https://wordpress.org/plugins/omnisend-connect/
                add_filter( 'omnisend_woo_partner_link', array( $this, 'override_omnisend_link' ) );
        }

        /**
         * Filters the Omnisend partner links to use the defined affiliate URL.
         *
         * @param string $url The original URL provided by the filter.
         * @return string The affiliate URL constant.
         */
        public function override_omnisend_link( $url ) {
                return CWPH_OMNISEND_AFFILIATE_URL;
        }
}

/**
 * Kick off the plugin.
 */
function cwph_run_partner_hub() {
        new CWPH_Partner_Hub();
}
add_action( 'plugins_loaded', 'cwph_run_partner_hub' );
root@204358:/home/master/applications/zvmmhybsvc/public_html/wp-con
