<?php
/**
 * Required plugins
 *
 * @package PRISMA
 * @since PRISMA 1.76.0
 */

// THEME-SUPPORTED PLUGINS
// If plugin not need - remove its settings from next array
//----------------------------------------------------------
if ( ! function_exists( 'prisma_skin_required_plugins' ) ) {
	add_action( 'after_setup_theme', 'prisma_skin_required_plugins', -1 );
	/**
	 * Create the list of required plugins for the skin/theme.
	 * Priority -1 is used to create the list of plugins before the rest skin/theme actions.
	 * 
	 * @hooked 'after_setup_theme', -1
	 */
	function prisma_skin_required_plugins() {
		$prisma_theme_required_plugins_groups = array(
		'core'          => esc_html__( 'Core', 'prisma' ),
		'page_builders' => esc_html__( 'Page Builders', 'prisma' ),
		'ecommerce'     => esc_html__( 'E-Commerce & Donations', 'prisma' ),
		'socials'       => esc_html__( 'Socials and Communities', 'prisma' ),
		'events'        => esc_html__( 'Events and Appointments', 'prisma' ),
		'content'       => esc_html__( 'Content', 'prisma' ),
		'other'         => esc_html__( 'Other', 'prisma' ),
		);
		$prisma_theme_required_plugins = array(
			'trx_addons'                 => array(
				'title'       => esc_html__( 'ThemeREX Addons', 'prisma' ),
				'description' => esc_html__( "Will allow you to install recommended plugins, demo content, and improve the theme's functionality overall with multiple theme options", 'prisma' ),
				'required'    => true,
				'logo'        => 'trx_addons.png',
				'group'       => $prisma_theme_required_plugins_groups['core'],
			),
			'elementor'                  => array(
				'title'       => esc_html__( 'Elementor', 'prisma' ),
				'description' => esc_html__( "Is a beautiful PageBuilder, even the free version of which allows you to create great pages using a variety of modules.", 'prisma' ),
				'required'    => false,
				'logo'        => 'elementor.png',
				'group'       => $prisma_theme_required_plugins_groups['page_builders'],
			),
			'gutenberg'                  => array(
				'title'       => esc_html__( 'Gutenberg', 'prisma' ),
				'description' => esc_html__( "It's a posts editor coming in place of the classic TinyMCE. Can be installed and used in parallel with Elementor", 'prisma' ),
				'required'    => false,
				'install'     => false,          // Do not offer installation of the plugin in the Theme Dashboard and TGMPA
				'logo'        => 'gutenberg.png',
				'group'       => $prisma_theme_required_plugins_groups['page_builders'],
			),
			'js_composer'                => array(
				'title'       => esc_html__( 'WPBakery PageBuilder', 'prisma' ),
				'description' => esc_html__( "Popular PageBuilder which allows you to create excellent pages", 'prisma' ),
				'required'    => false,
				'install'     => false,          // Do not offer installation of the plugin in the Theme Dashboard and TGMPA
				'logo'        => 'js_composer.jpg',
				'group'       => $prisma_theme_required_plugins_groups['page_builders'],
			),
			'woocommerce'                => array(
				'title'       => esc_html__( 'WooCommerce', 'prisma' ),
				'description' => esc_html__( "Connect the store to your website and start selling now", 'prisma' ),
				'required'    => false,
				'install'     => false,
				'logo'        => 'woocommerce.png',
				'group'       => $prisma_theme_required_plugins_groups['ecommerce'],
			),
			'elegro-payment'             => array(
				'title'       => esc_html__( 'Elegro Crypto Payment', 'prisma' ),
				'description' => esc_html__( "Extends WooCommerce Payment Gateways with an elegro Crypto Payment", 'prisma' ),
				'required'    => false,
				'install'     => false, // TRX_addons has marked the "Elegro Crypto Payment" plugin as obsolete and no longer recommends it for installation, even if it had been previously recommended by the theme
				'logo'        => 'elegro-payment.png',
				'group'       => $prisma_theme_required_plugins_groups['ecommerce'],
			),
			'instagram-feed'             => array(
				'title'       => esc_html__( 'Instagram Feed', 'prisma' ),
				'description' => esc_html__( "Displays the latest photos from your profile on Instagram", 'prisma' ),
				'required'    => false,
				'logo'        => 'instagram-feed.png',
				'group'       => $prisma_theme_required_plugins_groups['socials'],
			),
			'mailchimp-for-wp'           => array(
				'title'       => esc_html__( 'MailChimp for WP', 'prisma' ),
				'description' => esc_html__( "Allows visitors to subscribe to newsletters", 'prisma' ),
				'required'    => false,
				'logo'        => 'mailchimp-for-wp.png',
				'group'       => $prisma_theme_required_plugins_groups['socials'],
			),
			'booked'                     => array(
				'title'       => esc_html__( 'Booked Appointments', 'prisma' ),
				'description' => '',
				'required'    => false,
				'install'     => false,
				'logo'        => 'booked.png',
				'group'       => $prisma_theme_required_plugins_groups['events'],
			),
			'quickcal'                     => array(
				'title'       => esc_html__( 'QuickCal', 'prisma' ),
				'description' => '',
				'required'    => false,
				'install'     => false,
				'logo'        => 'quickcal.png',
				'group'       => $prisma_theme_required_plugins_groups['events'],
			),
			'the-events-calendar'        => array(
				'title'       => esc_html__( 'The Events Calendar', 'prisma' ),
				'description' => '',
				'required'    => false,
				'install'     => false,
				'logo'        => 'the-events-calendar.png',
				'group'       => $prisma_theme_required_plugins_groups['events'],
			),
			'contact-form-7'             => array(
				'title'       => esc_html__( 'Contact Form 7', 'prisma' ),
				'description' => esc_html__( "CF7 allows you to create an unlimited number of contact forms", 'prisma' ),
				'required'    => false,
				'logo'        => 'contact-form-7.png',
				'group'       => $prisma_theme_required_plugins_groups['content'],
			),

			'latepoint'                  => array(
				'title'       => esc_html__( 'LatePoint', 'prisma' ),
				'description' => '',
				'required'    => false,
				'install'     => false,
				'logo'        => prisma_get_file_url( 'plugins/latepoint/latepoint.png' ),
				'group'       => $prisma_theme_required_plugins_groups['events'],
			),
			'advanced-popups'                  => array(
				'title'       => esc_html__( 'Advanced Popups', 'prisma' ),
				'description' => '',
				'required'    => false,
				'logo'        => prisma_get_file_url( 'plugins/advanced-popups/advanced-popups.jpg' ),
				'group'       => $prisma_theme_required_plugins_groups['content'],
			),
			'devvn-image-hotspot'                  => array(
				'title'       => esc_html__( 'Image Hotspot by DevVN', 'prisma' ),
				'description' => '',
				'required'    => false,
				'install'     => false,
				'logo'        => prisma_get_file_url( 'plugins/devvn-image-hotspot/devvn-image-hotspot.png' ),
				'group'       => $prisma_theme_required_plugins_groups['content'],
			),
			'ti-woocommerce-wishlist'                  => array(
				'title'       => esc_html__( 'TI WooCommerce Wishlist', 'prisma' ),
				'description' => '',
				'required'    => false,
				'install'     => false,
				'logo'        => prisma_get_file_url( 'plugins/ti-woocommerce-wishlist/ti-woocommerce-wishlist.png' ),
				'group'       => $prisma_theme_required_plugins_groups['ecommerce'],
			),
			'woo-smart-quick-view'                  => array(
				'title'       => esc_html__( 'WPC Smart Quick View for WooCommerce', 'prisma' ),
				'description' => '',
				'required'    => false,
				'install'     => false,
				'logo'        => prisma_get_file_url( 'plugins/woo-smart-quick-view/woo-smart-quick-view.png' ),
				'group'       => $prisma_theme_required_plugins_groups['ecommerce'],
			),
			'twenty20'                  => array(
				'title'       => esc_html__( 'Twenty20 Image Before-After', 'prisma' ),
				'description' => '',
				'required'    => false,
				'install'     => false,
				'logo'        => prisma_get_file_url( 'plugins/twenty20/twenty20.png' ),
				'group'       => $prisma_theme_required_plugins_groups['content'],
			),
			'essential-grid'             => array(
				'title'       => esc_html__( 'Essential Grid', 'prisma' ),
				'description' => '',
				'required'    => false,
				'install'     => false,
				'logo'        => 'essential-grid.png',
				'group'       => $prisma_theme_required_plugins_groups['content'],
			),
			'revslider'                  => array(
				'title'       => esc_html__( 'Revolution Slider', 'prisma' ),
				'description' => '',
				'required'    => false,
				'install'     => false,
				'logo'        => 'revslider.png',
				'group'       => $prisma_theme_required_plugins_groups['content'],
			),
			'sitepress-multilingual-cms' => array(
				'title'       => esc_html__( 'WPML - Sitepress Multilingual CMS', 'prisma' ),
				'description' => esc_html__( "Allows you to make your website multilingual", 'prisma' ),
				'required'    => false,
				'install'     => false,      // Do not offer installation of the plugin in the Theme Dashboard and TGMPA
				'logo'        => 'sitepress-multilingual-cms.png',
				'group'       => $prisma_theme_required_plugins_groups['content'],
			),
			'wp-gdpr-compliance'         => array(
				'title'       => esc_html__( 'Cookie Information', 'prisma' ),
				'description' => esc_html__( "Allow visitors to decide for themselves what personal data they want to store on your site", 'prisma' ),
				'required'    => false,
				'install'     => false,
				'logo'        => 'wp-gdpr-compliance.png',
				'group'       => $prisma_theme_required_plugins_groups['other'],
			),
			'gdpr-framework'         => array(
				'title'       => esc_html__( 'The GDPR Framework', 'prisma' ),
				'description' => esc_html__( "Tools to help make your website GDPR-compliant. Fully documented, extendable and developer-friendly.", 'prisma' ),
				'required'    => false,
				'install'     => false,
				'logo'        => 'gdpr-framework.png',
				'group'       => $prisma_theme_required_plugins_groups['other'],
			),
			'trx_updater'                => array(
				'title'       => esc_html__( 'ThemeREX Updater', 'prisma' ),
				'description' => esc_html__( "Update theme and theme-specific plugins from developer's upgrade server.", 'prisma' ),
				'required'    => false,
				'logo'        => 'trx_updater.png',
				'group'       => $prisma_theme_required_plugins_groups['other'],
			),
		);

		if ( PRISMA_THEME_FREE ) {
			unset( $prisma_theme_required_plugins['js_composer'] );
			unset( $prisma_theme_required_plugins['booked'] );
			unset( $prisma_theme_required_plugins['quickcal'] );
			unset( $prisma_theme_required_plugins['the-events-calendar'] );
			unset( $prisma_theme_required_plugins['calculated-fields-form'] );
			unset( $prisma_theme_required_plugins['essential-grid'] );
			unset( $prisma_theme_required_plugins['revslider'] );
			unset( $prisma_theme_required_plugins['sitepress-multilingual-cms'] );
			unset( $prisma_theme_required_plugins['trx_updater'] );
			unset( $prisma_theme_required_plugins['trx_popup'] );
		}

		// Add plugins list to the global storage
		prisma_storage_set( 'required_plugins', $prisma_theme_required_plugins );
	}
}
