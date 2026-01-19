<?php
/**
 * Skin Setup
 *
 * @package PRISMA
 * @since PRISMA 1.76.0
 */


//--------------------------------------------
// SKIN DEFAULTS
//--------------------------------------------

// Return theme's (skin's) default value for the specified parameter
if ( ! function_exists( 'prisma_theme_defaults' ) ) {
	function prisma_theme_defaults( $name='', $value='' ) {
		$defaults = array(
			'page_width'          => 1290,
			'page_boxed_extra'  => 60,
			'page_fullwide_max' => 1920,
			'page_fullwide_extra' => 130,
			'sidebar_width'       => 410,
			'sidebar_gap'       => 40,
			'grid_gap'          => 30,
			'rad'               => 0,
		);
		if ( empty( $name ) ) {
			return $defaults;
		} else {
			if ( empty( $value ) && isset( $defaults[ $name ] ) ) {
				$value = $defaults[ $name ];
			}
			return $value;
		}
	}
}


// Theme init priorities:
// Action 'after_setup_theme'
// 1 - register filters to add/remove lists items in the Theme Options
// 2 - create Theme Options
// 3 - add/remove Theme Options elements
// 5 - load Theme Options. Attention! After this step you can use only basic options (not overriden)
// 9 - register other filters (for installer, etc.)
//10 - standard Theme init procedures (not ordered)
// Action 'wp_loaded'
// 1 - detect override mode. Attention! Only after this step you can use overriden options (separate values for the shop, courses, etc.)


//--------------------------------------------
// SKIN SETTINGS
//--------------------------------------------
if ( ! function_exists( 'prisma_skin_setup' ) ) {
	add_action( 'after_setup_theme', 'prisma_skin_setup', 1 );
	function prisma_skin_setup() {

		$GLOBALS['PRISMA_STORAGE'] = array_merge( $GLOBALS['PRISMA_STORAGE'], array(

			// Key validator: market[env|loc]-vendor[axiom|ancora|themerex]
			'theme_pro_key'       => 'env-axiom',

			'theme_doc_url'       => '//prisma.axiomthemes.com/doc',

			'theme_demofiles_url' => '//demofiles.axiomthemes.com/prisma/',
			
			'theme_rate_url'      => '//themeforest.net/downloads',

			'theme_custom_url'    => '//axiomthemes.com/offers/?utm_source=offers&utm_medium=click&utm_campaign=themeinstall',

			'theme_support_url'   => '//axiomthemes.com/support/',

			'theme_download_url'  => '//themeforest.net/item/prisma-digital-startup-app-wordpress-theme/49053314',            // Axiom

			'theme_video_url'     => '//www.youtube.com/channel/UCnFisBimrK2aIE-hnY70kCA',   // Axiom

			'theme_privacy_url'   => '//axiomthemes.com/privacy-policy/',                       // Axiom

			'portfolio_url'       => '//themeforest.net/user/themerex/portfolio',            // Axiom


			// Comma separated slugs of theme-specific categories (for get relevant news in the dashboard widget)
			// (i.e. 'children,kindergarten')
			'theme_categories'    => '',
		) );
	}
}


// Add/remove/change Theme Settings
if ( ! function_exists( 'prisma_skin_setup_settings' ) ) {
	add_action( 'after_setup_theme', 'prisma_skin_setup_settings', 1 );
	function prisma_skin_setup_settings() {
		// Example: enable (true) / disable (false) thumbs in the prev/next navigation
		prisma_storage_set_array( 'settings', 'thumbs_in_navigation', false );
        prisma_storage_set_array2( 'required_plugins', 'woocommerce', 'install', true);
        prisma_storage_set_array2( 'required_plugins', 'ti-woocommerce-wishlist', 'install', true);
        prisma_storage_set_array2( 'required_plugins', 'elegro-payment', 'install', true);
        prisma_storage_set_array2( 'required_plugins', 'revslider', 'install', true);
	}
}
// Add/remove/change Theme Options
if ( ! function_exists( 'prisma_skin_setup_options' ) ) {
    add_action( 'after_setup_theme', 'prisma_skin_setup_options', 3 );
    function prisma_skin_setup_options()  {
        prisma_storage_set_array2( 'options', 'footer_scheme', 'std', 'dark' );
    }
}


// Enqueue extra styles for frontend
if ( ! function_exists( 'prisma_trx_addons_extra_styles' ) ) {
    add_action( 'wp_enqueue_scripts', 'prisma_trx_addons_extra_styles', 2060 );
    function prisma_trx_addons_extra_styles() {
        $prisma_url = prisma_get_file_url( 'extra-styles.css' );
        if ( '' != $prisma_url ) {
            wp_enqueue_style( 'prisma-trx-addons-extra-styles', $prisma_url, array(), null );
        }
    }
}

// Custom styles
$prisma_skin_path = prisma_get_file_dir( prisma_skins_get_current_skin_dir() . 'extra-styles.php' );
if ( ! empty( $prisma_skin_path ) ) {
    require_once $prisma_skin_path;
}
// Customizer css
if ( ! function_exists( 'prisma_skin_customizer_control_js' ) ) {
	add_action( 'customize_controls_enqueue_scripts', 'prisma_skin_customizer_control_js' );
	function prisma_skin_customizer_control_js() {
		wp_enqueue_style( 'prisma-skin-customizer', prisma_get_file_url( 'skin-customizer.css' ), array(), null );
	}
}
// Load required styles and scripts for admin mode
if ( ! function_exists( 'prisma_skin_admin_scripts' ) ) {
	add_action('admin_enqueue_scripts', 'prisma_skin_admin_scripts');
	function prisma_skin_admin_scripts() {
		// Add theme admin styles
		wp_enqueue_style( 'prisma-skin-admin', prisma_get_file_url( 'skin-admin.css' ), array(), null );
	}
}
// Filter to add/remove shortcodes
if ( ! function_exists( 'prisma_skin_setup_trx_addons_sc_list' ) ) {
    add_filter('trx_addons_sc_list', 'prisma_skin_setup_trx_addons_sc_list');
    function prisma_skin_setup_trx_addons_sc_list($list = array()) {
        $list['blogger']['templates']['default']['over_centered_hover_price'] = array(
            'title' => esc_html__('Title with price over image', 'prisma'),
            'layout' => array(
                'featured' => array(
                    'mc' => array(
                        'title', 'price'
                    )
                ),
            )
        );
        return $list;
    }
}
// Add new output types (layouts) in the shortcodes
if ( ! function_exists( 'prisma_skin_setup_trx_addons_sc_type' ) ) {
    add_filter('trx_addons_sc_type', 'prisma_skin_setup_trx_addons_sc_type', 11, 2);
    function prisma_skin_setup_trx_addons_sc_type($list, $sc) {
        if ('trx_sc_layouts_menu' == $sc ) {
            $list['modern'] = 'Modern Burger';
        }
        return $list;
    }
}
// Modified export single user
if ( ! function_exists( 'prisma_skin_filter_export_single_user' ) ) {
    add_filter('trx_addons_filter_export_single_user', 'prisma_skin_filter_export_single_user', 11, 2);
	function prisma_skin_filter_export_single_user($mod, $orig) {
		$mod['display_name'] = $orig['display_name'];
		$mod['user_login'] = $orig['user_login'];
		$mod['user_nicename'] = $orig['user_nicename'];
		
		return $mod;
	}
}
// Modified export single usermeta
if ( ! function_exists( 'prisma_skin_filter_export_single_usermeta' ) ) {
    add_filter('trx_addons_filter_export_single_usermeta', 'prisma_skin_filter_export_single_usermeta', 11, 2);
	function prisma_skin_filter_export_single_usermeta($mod, $orig) {
		if   ( $mod['meta_key'] == 'nickname' ) $mod['meta_value'] = $orig['meta_value'];
		else if ( $mod['meta_key'] == 'first_name' ) $mod['meta_value'] = $orig['meta_value']; 
		else if ( $mod['meta_key'] == 'last_name' ) $mod['meta_value'] = $orig['meta_value']; 
		else if ( $mod['meta_key'] == 'billing_first_name' ) $mod['meta_value'] = $orig['meta_value']; 
		else if ( $mod['meta_key'] == 'billing_last_name' ) $mod['meta_value'] = $orig['meta_value']; 
		
		return $mod;
	}
}
// Modified export usermeta
if ( ! function_exists( 'prisma_skin_filter_export_usermeta' ) ) {
    add_filter('trx_addons_filter_export_usermeta', 'prisma_skin_filter_export_usermeta');
	function prisma_skin_filter_export_usermeta($rows) {
		if (is_array($rows) && count($rows)>0) {
			foreach ($rows as $k=>$v) {
				if  ($rows[$k]['meta_key'] == '_wcfm_vendor_tax_migrated')	unset($rows[$k]);
			}
		}
		return $rows;
	}
}

//--------------------------------------------
// SKIN FONTS
//--------------------------------------------
if ( ! function_exists( 'prisma_skin_setup_fonts' ) ) {
	add_action( 'after_setup_theme', 'prisma_skin_setup_fonts', 1 );
	function prisma_skin_setup_fonts() {
		// Fonts to load when theme start
		// It can be:
		// - Google fonts (specify name, family and styles)
		// - Adobe fonts (specify name, family and link URL)
		// - uploaded fonts (specify name, family), placed in the folder css/font-face/font-name inside the skin folder
		// Attention! Font's folder must have name equal to the font's name, with spaces replaced on the dash '-'
		// example: font name 'TeX Gyre Termes', folder 'TeX-Gyre-Termes'
		prisma_storage_set(
			'load_fonts', array(
				array(
					'name'   => 'roc-grotesk',
					'family' => 'sans-serif',
					'link'   => 'https://use.typekit.net/mwe5hxs.css',
					'styles' => ''
				),
				// Google font
				array(
					'name'   => 'Kumbh Sans',
					'family' => 'sans-serif',
					'link'   => '',
					'styles' => 'wght@100;200;300;400;500;600;700;800;900',     // Parameter 'style' used only for the Google fonts
				),
			)
		);

		// Characters subset for the Google fonts. Available values are: latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese
		prisma_storage_set( 'load_fonts_subset', 'latin,latin-ext' );

		// Settings of the main tags.
		// Default value of 'font-family' may be specified as reference to the array $load_fonts (see above)
		// or as comma-separated string.
		// In the second case (if 'font-family' is specified manually as comma-separated string):
		//    1) Font name with spaces in the parameter 'font-family' will be enclosed in the quotes and no spaces after comma!
		//    2) If font-family inherit a value from the 'Main text' - specify 'inherit' as a value
		// example:
		// Correct:   'font-family' => basekit_get_load_fonts_family_string( $load_fonts[0] )
		// Correct:   'font-family' => 'Roboto,sans-serif'
		// Correct:   'font-family' => '"PT Serif",sans-serif'
		// Incorrect: 'font-family' => 'Roboto, sans-serif'
		// Incorrect: 'font-family' => 'PT Serif,sans-serif'

		$font_description = esc_html__( 'Font settings for the %s of the site. To ensure that the elements scale properly on mobile devices, please use only the following units: "rem", "em" or "ex"', 'prisma' );

		prisma_storage_set(
			'theme_fonts', array(
				'p'       => array(
					'title'           => esc_html__( 'Main text', 'prisma' ),
					'description'     => sprintf( $font_description, esc_html__( 'main text', 'prisma' ) ),
					'font-family'     => '"Kumbh Sans",sans-serif',
					'font-size'       => '1rem',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.72em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
					'margin-top'      => '0em',
					'margin-bottom'   => '1.77em',
				),
				'post'    => array(
					'title'           => esc_html__( 'Article text', 'prisma' ),
					'description'     => sprintf( $font_description, esc_html__( 'article text', 'prisma' ) ),
					'font-family'     => '',			// Example: '"PR Serif",serif',
					'font-size'       => '',			// Example: '1.286rem',
					'font-weight'     => '',			// Example: '400',
					'font-style'      => '',			// Example: 'normal',
					'line-height'     => '',			// Example: '1.75em',
					'text-decoration' => '',			// Example: 'none',
					'text-transform'  => '',			// Example: 'none',
					'letter-spacing'  => '',			// Example: '',
					'margin-top'      => '',			// Example: '0em',
					'margin-bottom'   => '',			// Example: '1.4em',
				),
				'h1'      => array(
					'title'           => esc_html__( 'Heading 1', 'prisma' ),
					'description'     => sprintf( $font_description, esc_html__( 'tag H1', 'prisma' ) ),
					'font-family'     => 'roc-grotesk,sans-serif',
					'font-size'       => '3.563em',
					'font-weight'     => '500',
					'font-style'      => 'normal',
					'line-height'     => '1em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '-1.8px',
					'margin-top'      => '1.1em',
					'margin-bottom'   => '0.4em',
				),
				'h2'      => array(
					'title'           => esc_html__( 'Heading 2', 'prisma' ),
					'description'     => sprintf( $font_description, esc_html__( 'tag H2', 'prisma' ) ),
					'font-family'     => 'roc-grotesk,sans-serif',
					'font-size'       => '2.938em',
					'font-weight'     => '500',
					'font-style'      => 'normal',
					'line-height'     => '1.021em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '-0.5px',
					'margin-top'      => '0.8em',
					'margin-bottom'   => '0.4em',
				),
				'h3'      => array(
					'title'           => esc_html__( 'Heading 3', 'prisma' ),
					'description'     => sprintf( $font_description, esc_html__( 'tag H3', 'prisma' ) ),
					'font-family'     => 'roc-grotesk,sans-serif',
					'font-size'       => '2.188em',
					'font-weight'     => '500',
					'font-style'      => 'normal',
					'line-height'     => '1.086em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
					'margin-top'      => '1.1em',
					'margin-bottom'   => '0.6em',
				),
				'h4'      => array(
					'title'           => esc_html__( 'Heading 4', 'prisma' ),
					'description'     => sprintf( $font_description, esc_html__( 'tag H4', 'prisma' ) ),
					'font-family'     => 'roc-grotesk,sans-serif',
					'font-size'       => '1.625em',
					'font-weight'     => '500',
					'font-style'      => 'normal',
					'line-height'     => '1.214em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
					'margin-top'      => '1.25em',
					'margin-bottom'   => '0.7em',
				),
				'h5'      => array(
					'title'           => esc_html__( 'Heading 5', 'prisma' ),
					'description'     => sprintf( $font_description, esc_html__( 'tag H5', 'prisma' ) ),
					'font-family'     => 'roc-grotesk,sans-serif',
					'font-size'       => '1.500em',
					'font-weight'     => '500',
					'font-style'      => 'normal',
					'line-height'     => '1.417em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
					'margin-top'      => '1.22em',
					'margin-bottom'   => '0.7em',
				),
				'h6'      => array(
					'title'           => esc_html__( 'Heading 6', 'prisma' ),
					'description'     => sprintf( $font_description, esc_html__( 'tag H6', 'prisma' ) ),
					'font-family'     => 'roc-grotesk,sans-serif',
					'font-size'       => '1.188em',
					'font-weight'     => '500',
					'font-style'      => 'normal',
					'line-height'     => '1.474em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
					'margin-top'      => '1.6em',
					'margin-bottom'   => '0.9em',
				),
				'logo'    => array(
					'title'           => esc_html__( 'Logo text', 'prisma' ),
					'description'     => sprintf( $font_description, esc_html__( 'text of the logo', 'prisma' ) ),
					'font-family'     => 'roc-grotesk,sans-serif',
					'font-size'       => '1.7em',
					'font-weight'     => '500',
					'font-style'      => 'normal',
					'line-height'     => '1.2em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
				),
				'button'  => array(
					'title'           => esc_html__( 'Buttons', 'prisma' ),
					'description'     => sprintf( $font_description, esc_html__( 'buttons', 'prisma' ) ),
					'font-family'     => 'roc-grotesk,sans-serif',
					'font-size'       => '16px',
					'font-weight'     => '500',
					'font-style'      => 'normal',
					'line-height'     => '21px',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
				),
				'input'   => array(
					'title'           => esc_html__( 'Input fields', 'prisma' ),
					'description'     => sprintf( $font_description, esc_html__( 'input fields, dropdowns and textareas', 'prisma' ) ),
					'font-family'     => 'inherit',
					'font-size'       => '16px',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.5em',     // Attention! Firefox don't allow line-height less then 1.5em in the select
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0.1px',
				),
				'info'    => array(
					'title'           => esc_html__( 'Post meta', 'prisma' ),
					'description'     => sprintf( $font_description, esc_html__( 'post meta (author, categories, publish date, counters, share, etc.)', 'prisma' ) ),
					'font-family'     => 'inherit',
					'font-size'       => '13px',  // Old value '13px' don't allow using 'font zoom' in the custom blog items
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.5em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
					'margin-top'      => '0.4em',
					'margin-bottom'   => '',
				),
				'menu'    => array(
					'title'           => esc_html__( 'Main menu', 'prisma' ),
					'description'     => sprintf( $font_description, esc_html__( 'main menu items', 'prisma' ) ),
					'font-family'     => 'roc-grotesk,sans-serif',
					'font-size'       => '17px',
					'font-weight'     => '500',
					'font-style'      => 'normal',
					'line-height'     => '1.5em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
				),
				'submenu' => array(
					'title'           => esc_html__( 'Dropdown menu', 'prisma' ),
					'description'     => sprintf( $font_description, esc_html__( 'dropdown menu items', 'prisma' ) ),
					'font-family'     => '"Kumbh Sans",sans-serif',
					'font-size'       => '15px',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.5em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
				),
				'other' => array(
					'title'           => esc_html__( 'Other', 'prisma' ),
					'description'     => sprintf( $font_description, esc_html__( 'specific elements', 'prisma' ) ),
					'font-family'     => '"Kumbh Sans",sans-serif',
				),
			)
		);

		// Font presets
		prisma_storage_set(
			'font_presets', array(
				'karla' => array(
								'title'  => esc_html__( 'Karla', 'prisma' ),
								'load_fonts' => array(
													// Google font
													array(
														'name'   => 'Dancing Script',
														'family' => 'fantasy',
														'link'   => '',
														'styles' => '300,400,700',
													),
													// Google font
													array(
														'name'   => 'Sansita Swashed',
														'family' => 'fantasy',
														'link'   => '',
														'styles' => '300,400,700',
													),
												),
								'theme_fonts' => array(
													'p'       => array(
														'font-family'     => '"Dancing Script",fantasy',
														'font-size'       => '1.25rem',
													),
													'post'    => array(
														'font-family'     => '',
													),
													'h1'      => array(
														'font-family'     => '"Sansita Swashed",fantasy',
														'font-size'       => '4em',
													),
													'h2'      => array(
														'font-family'     => '"Sansita Swashed",fantasy',
													),
													'h3'      => array(
														'font-family'     => '"Sansita Swashed",fantasy',
													),
													'h4'      => array(
														'font-family'     => '"Sansita Swashed",fantasy',
													),
													'h5'      => array(
														'font-family'     => '"Sansita Swashed",fantasy',
													),
													'h6'      => array(
														'font-family'     => '"Sansita Swashed",fantasy',
													),
													'logo'    => array(
														'font-family'     => '"Sansita Swashed",fantasy',
													),
													'button'  => array(
														'font-family'     => '"Sansita Swashed",fantasy',
													),
													'input'   => array(
														'font-family'     => 'inherit',
													),
													'info'    => array(
														'font-family'     => 'inherit',
													),
													'menu'    => array(
														'font-family'     => '"Sansita Swashed",fantasy',
													),
													'submenu' => array(
														'font-family'     => '"Sansita Swashed",fantasy',
													),
												),
							),
				'roboto' => array(
								'title'  => esc_html__( 'Roboto', 'prisma' ),
								'load_fonts' => array(
													// Google font
													array(
														'name'   => 'Noto Sans JP',
														'family' => 'serif',
														'link'   => '',
														'styles' => '300,300italic,400,400italic,700,700italic',
													),
													// Google font
													array(
														'name'   => 'Merriweather',
														'family' => 'sans-serif',
														'link'   => '',
														'styles' => '300,300italic,400,400italic,700,700italic',
													),
												),
								'theme_fonts' => array(
													'p'       => array(
														'font-family'     => '"Noto Sans JP",serif',
													),
													'post'    => array(
														'font-family'     => '',
													),
													'h1'      => array(
														'font-family'     => 'Merriweather,sans-serif',
													),
													'h2'      => array(
														'font-family'     => 'Merriweather,sans-serif',
													),
													'h3'      => array(
														'font-family'     => 'Merriweather,sans-serif',
													),
													'h4'      => array(
														'font-family'     => 'Merriweather,sans-serif',
													),
													'h5'      => array(
														'font-family'     => 'Merriweather,sans-serif',
													),
													'h6'      => array(
														'font-family'     => 'Merriweather,sans-serif',
													),
													'logo'    => array(
														'font-family'     => 'Merriweather,sans-serif',
													),
													'button'  => array(
														'font-family'     => 'Merriweather,sans-serif',
													),
													'input'   => array(
														'font-family'     => 'inherit',
													),
													'info'    => array(
														'font-family'     => 'inherit',
													),
													'menu'    => array(
														'font-family'     => 'Merriweather,sans-serif',
													),
													'submenu' => array(
														'font-family'     => 'Merriweather,sans-serif',
													),
												),
							),
				'garamond' => array(
								'title'  => esc_html__( 'Garamond', 'prisma' ),
								'load_fonts' => array(
													// Adobe font
													array(
														'name'   => 'Europe',
														'family' => 'sans-serif',
														'link'   => 'https://use.typekit.net/qmj1tmx.css',
														'styles' => '',
													),
													// Adobe font
													array(
														'name'   => 'Sofia Pro',
														'family' => 'sans-serif',
														'link'   => 'https://use.typekit.net/qmj1tmx.css',
														'styles' => '',
													),
												),
								'theme_fonts' => array(
													'p'       => array(
														'font-family'     => '"Sofia Pro",sans-serif',
													),
													'post'    => array(
														'font-family'     => '',
													),
													'h1'      => array(
														'font-family'     => 'Europe,sans-serif',
													),
													'h2'      => array(
														'font-family'     => 'Europe,sans-serif',
													),
													'h3'      => array(
														'font-family'     => 'Europe,sans-serif',
													),
													'h4'      => array(
														'font-family'     => 'Europe,sans-serif',
													),
													'h5'      => array(
														'font-family'     => 'Europe,sans-serif',
													),
													'h6'      => array(
														'font-family'     => 'Europe,sans-serif',
													),
													'logo'    => array(
														'font-family'     => 'Europe,sans-serif',
													),
													'button'  => array(
														'font-family'     => 'Europe,sans-serif',
													),
													'input'   => array(
														'font-family'     => 'inherit',
													),
													'info'    => array(
														'font-family'     => 'inherit',
													),
													'menu'    => array(
														'font-family'     => 'Europe,sans-serif',
													),
													'submenu' => array(
														'font-family'     => 'Europe,sans-serif',
													),
												),
							),
			)
		);
	}
}


//--------------------------------------------
// COLOR SCHEMES
//--------------------------------------------
if ( ! function_exists( 'prisma_skin_setup_schemes' ) ) {
	add_action( 'after_setup_theme', 'prisma_skin_setup_schemes', 1 );
	function prisma_skin_setup_schemes() {

		// Theme colors for customizer
		// Attention! Inner scheme must be last in the array below
		prisma_storage_set(
			'scheme_color_groups', array(
				'main'    => array(
					'title'       => esc_html__( 'Main', 'prisma' ),
					'description' => esc_html__( 'Colors of the main content area', 'prisma' ),
				),
				'alter'   => array(
					'title'       => esc_html__( 'Alter', 'prisma' ),
					'description' => esc_html__( 'Colors of the alternative blocks (sidebars, etc.)', 'prisma' ),
				),
				'extra'   => array(
					'title'       => esc_html__( 'Extra', 'prisma' ),
					'description' => esc_html__( 'Colors of the extra blocks (dropdowns, price blocks, table headers, etc.)', 'prisma' ),
				),
				'inverse' => array(
					'title'       => esc_html__( 'Inverse', 'prisma' ),
					'description' => esc_html__( 'Colors of the inverse blocks - when link color used as background of the block (dropdowns, blockquotes, etc.)', 'prisma' ),
				),
				'input'   => array(
					'title'       => esc_html__( 'Input', 'prisma' ),
					'description' => esc_html__( 'Colors of the form fields (text field, textarea, select, etc.)', 'prisma' ),
				),
			)
		);

		prisma_storage_set(
			'scheme_color_names', array(
				'bg_color'    => array(
					'title'       => esc_html__( 'Background color', 'prisma' ),
					'description' => esc_html__( 'Background color of this block in the normal state', 'prisma' ),
				),
				'bg_hover'    => array(
					'title'       => esc_html__( 'Background hover', 'prisma' ),
					'description' => esc_html__( 'Background color of this block in the hovered state', 'prisma' ),
				),
				'bd_color'    => array(
					'title'       => esc_html__( 'Border color', 'prisma' ),
					'description' => esc_html__( 'Border color of this block in the normal state', 'prisma' ),
				),
				'bd_hover'    => array(
					'title'       => esc_html__( 'Border hover', 'prisma' ),
					'description' => esc_html__( 'Border color of this block in the hovered state', 'prisma' ),
				),
				'text'        => array(
					'title'       => esc_html__( 'Text', 'prisma' ),
					'description' => esc_html__( 'Color of the text inside this block', 'prisma' ),
				),
				'text_dark'   => array(
					'title'       => esc_html__( 'Text dark', 'prisma' ),
					'description' => esc_html__( 'Color of the dark text (bold, header, etc.) inside this block', 'prisma' ),
				),
				'text_light'  => array(
					'title'       => esc_html__( 'Text light', 'prisma' ),
					'description' => esc_html__( 'Color of the light text (post meta, etc.) inside this block', 'prisma' ),
				),
				'text_link'   => array(
					'title'       => esc_html__( 'Link', 'prisma' ),
					'description' => esc_html__( 'Color of the links inside this block', 'prisma' ),
				),
				'text_hover'  => array(
					'title'       => esc_html__( 'Link hover', 'prisma' ),
					'description' => esc_html__( 'Color of the hovered state of links inside this block', 'prisma' ),
				),
				'text_link2'  => array(
					'title'       => esc_html__( 'Accent 2', 'prisma' ),
					'description' => esc_html__( 'Color of the accented texts (areas) inside this block', 'prisma' ),
				),
				'text_hover2' => array(
					'title'       => esc_html__( 'Accent 2 hover', 'prisma' ),
					'description' => esc_html__( 'Color of the hovered state of accented texts (areas) inside this block', 'prisma' ),
				),
				'text_link3'  => array(
					'title'       => esc_html__( 'Accent 3', 'prisma' ),
					'description' => esc_html__( 'Color of the other accented texts (buttons) inside this block', 'prisma' ),
				),
				'text_hover3' => array(
					'title'       => esc_html__( 'Accent 3 hover', 'prisma' ),
					'description' => esc_html__( 'Color of the hovered state of other accented texts (buttons) inside this block', 'prisma' ),
				),
			)
		);

		// Default values for each color scheme
		$schemes = array(

			// Color scheme: 'default'
			'default' => array(
				'title'    => esc_html__( 'Default', 'prisma' ),
				'internal' => true,
				'colors'   => array(

					// Whole block border and background
					'bg_color'         => '#F8F6FB', //ok
					'bd_color'         => '#E0DFE6', //ok

					// Text and links colors
					'text'             => '#7B798B', //ok
					'text_light'       => '#A09CB1', //ok
					'text_dark'        => '#181621', //ok
					'text_link'        => '#B83DDA', //ok
					'text_hover'       => '#9A33B6', //ok
					'text_link2'       => '#0066D9', //ok
					'text_hover2'      => '#045BBD', //ok
					'text_link3'       => '#810D6A', //ok
					'text_hover3'      => '#5C0E4D', //ok

					// Alternative blocks (sidebar, tabs, alternative blocks, etc.)
					'alter_bg_color'   => '#FFFFFF', //ok
					'alter_bg_hover'   => '#E9E7EF', //ok
					'alter_bd_color'   => '#E0DFE6', //ok
					'alter_bd_hover'   => '#CBC8D3', //ok
					'alter_text'       => '#7B798B', //ok
					'alter_light'      => '#A09CB1', //ok
					'alter_dark'       => '#181621', //ok
					'alter_link'       => '#B83DDA', //ok
					'alter_hover'      => '#9A33B6', //ok
					'alter_link2'      => '#0066D9', //ok
					'alter_hover2'     => '#045BBD', //ok
					'alter_link3'      => '#810D6A', //ok
					'alter_hover3'     => '#5C0E4D', //ok

					// Extra blocks (submenu, tabs, color blocks, etc.)
					'extra_bg_color'   => '#2B2534', //ok
					'extra_bg_hover'   => '#211632',
					'extra_bd_color'   => '#2F2640',
					'extra_bd_hover'   => '#544E64',
					'extra_text'       => '#948EAC', //ok
					'extra_light'      => '#67607E',
					'extra_dark'       => '#F7F7F8', //ok
					'extra_link'       => '#B83DDA', //ok
					'extra_hover'      => '#F7F7F8', //ok
					'extra_link2'      => '#0066D9',
					'extra_hover2'     => '#045BBD',
					'extra_link3'      => '#810D6A',
					'extra_hover3'     => '#5C0E4D',

					// Input fields (form's fields and textarea)
					'input_bg_color'   => 'transparent', //ok
					'input_bg_hover'   => 'transparent', //ok
					'input_bd_color'   => '#E0DFE6', //ok
					'input_bd_hover'   => '#CBC8D3', //ok
					'input_text'       => '#7B798B', //ok
					'input_light'      => '#A09CB1', //ok
					'input_dark'       => '#181621', //ok

					// Inverse blocks (text and links on the 'text_link' background)
					'inverse_bd_color' => '#67bcc1',
					'inverse_bd_hover' => '#5aa4a9',
					'inverse_text'     => '#181621',
					'inverse_light'    => '#333333',
					'inverse_dark'     => '#181621', //ok
					'inverse_link'     => '#FFFFFF', //ok
					'inverse_hover'    => '#FFFFFF', //ok

					// Additional (skin-specific) colors.
					// Attention! Set of colors must be equal in all color schemes.
					//---> For example:
					//---> 'new_color1'         => '#rrggbb',
					//---> 'alter_new_color1'   => '#rrggbb',
					//---> 'inverse_new_color1' => '#rrggbb',
				),
			),

			// Color scheme: 'dark'
			'dark'    => array(
				'title'    => esc_html__( 'Dark', 'prisma' ),
				'internal' => true,
				'colors'   => array(

					// Whole block border and background
					'bg_color'         => '#020002', //ok
					'bd_color'         => '#34313B', //ok

					// Text and links colors
					'text'             => '#A09BAF', //ok
					'text_light'       => '#7E7A91', //ok
					'text_dark'        => '#F7F7F8', //ok
					'text_link'        => '#B83DDA', //ok
					'text_hover'       => '#9A33B6', //ok
					'text_link2'       => '#0066D9', //ok
					'text_hover2'      => '#045BBD', //ok
					'text_link3'       => '#810D6A', //ok
					'text_hover3'      => '#5C0E4D', //ok

					// Alternative blocks (sidebar, tabs, alternative blocks, etc.)
					'alter_bg_color'   => '#16111D', //ok
					'alter_bg_hover'   => '#231B33', //ok
					'alter_bd_color'   => '#34313B', //ok
					'alter_bd_hover'   => '#423F4F', //ok
					'alter_text'       => '#A09BAF', //ok
					'alter_light'      => '#7E7A91', //ok
					'alter_dark'       => '#F7F7F8', //ok
					'alter_link'       => '#B83DDA', //ok
					'alter_hover'      => '#9A33B6', //ok
					'alter_link2'      => '#0066D9', //ok
					'alter_hover2'     => '#045BBD', //ok
					'alter_link3'      => '#810D6A', //ok
					'alter_hover3'     => '#5C0E4D', //ok

					// Extra blocks (submenu, tabs, color blocks, etc.)
					'extra_bg_color'   => '#0F031F', //ok
					'extra_bg_hover'   => '#231B33',
					'extra_bd_color'   => '#34313B',
					'extra_bd_hover'   => '#423F4F',
					'extra_text'       => '#A09BAF', //ok
					'extra_light'      => '#7E7A91',
					'extra_dark'       => '#F7F7F8', //ok
					'extra_link'       => '#B83DDA', //ok
					'extra_hover'      => '#F7F7F8', //ok
					'extra_link2'      => '#0066D9',
					'extra_hover2'     => '#045BBD',
					'extra_link3'      => '#810D6A',
					'extra_hover3'     => '#5C0E4D',

					// Input fields (form's fields and textarea)
					'input_bg_color'   => '#transparent', //ok
					'input_bg_hover'   => '#transparent', //ok
					'input_bd_color'   => '#34313B', //ok
					'input_bd_hover'   => '#423F4F', //ok
					'input_text'       => '#A09BAF', //ok
					'input_light'      => '#7E7A91', //ok
					'input_dark'       => '#F7F7F8', //ok

					// Inverse blocks (text and links on the 'text_link' background)
					'inverse_bd_color' => '#e36650',
					'inverse_bd_hover' => '#cb5b47',
					'inverse_text'     => '#F7F7F8', //ok
					'inverse_light'    => '#6f6f6f',
					'inverse_dark'     => '#161921', //ok
					'inverse_link'     => '#FFFFFF', //ok
					'inverse_hover'    => '#161921', //ok

					// Additional (skin-specific) colors.
					// Attention! Set of colors must be equal in all color schemes.
					//---> For example:
					//---> 'new_color1'         => '#rrggbb',
					//---> 'alter_new_color1'   => '#rrggbb',
					//---> 'inverse_new_color1' => '#rrggbb',
				),
			),

            // Color scheme: 'light'
            'light' => array(
                'title'    => esc_html__( 'Light', 'prisma' ),
                'internal' => true,
                'colors'   => array(

                    // Whole block border and background
                    'bg_color'         => '#FFFFFF', //ok
                    'bd_color'         => '#E0DFE6', //ok

                    // Text and links colors
                    'text'             => '#7B798B', //ok
                    'text_light'       => '#A09CB1', //ok
                    'text_dark'        => '#181621', //ok
                    'text_link'        => '#B83DDA', //ok
                    'text_hover'       => '#9A33B6', //ok
                    'text_link2'       => '#0066D9', //ok
                    'text_hover2'      => '#045BBD', //ok
                    'text_link3'       => '#810D6A', //ok
                    'text_hover3'      => '#5C0E4D', //ok

                    // Alternative blocks (sidebar, tabs, alternative blocks, etc.)
                    'alter_bg_color'   => '#F8F6FB', //ok
                    'alter_bg_hover'   => '#E9E7EF', //ok
                    'alter_bd_color'   => '#E0DFE6', //ok
                    'alter_bd_hover'   => '#CBC8D3', //ok
                    'alter_text'       => '#7B798B', //ok
                    'alter_light'      => '#A09CB1', //ok
                    'alter_dark'       => '#181621', //ok
                    'alter_link'       => '#B83DDA', //ok
                    'alter_hover'      => '#9A33B6', //ok
                    'alter_link2'      => '#0066D9', //ok
                    'alter_hover2'     => '#045BBD', //ok
                    'alter_link3'      => '#810D6A', //ok
                    'alter_hover3'     => '#5C0E4D', //ok

                    // Extra blocks (submenu, tabs, color blocks, etc.)
                    'extra_bg_color'   => '#2B2534', //ok
                    'extra_bg_hover'   => '#211632',
                    'extra_bd_color'   => '#2F2640',
                    'extra_bd_hover'   => '#544E64',
                    'extra_text'       => '#948EAC', //ok
                    'extra_light'      => '#67607E',
                    'extra_dark'       => '#F7F7F8', //ok
                    'extra_link'       => '#B83DDA', //ok
                    'extra_hover'      => '#F7F7F8', //ok
                    'extra_link2'      => '#0066D9',
                    'extra_hover2'     => '#045BBD',
                    'extra_link3'      => '#810D6A',
                    'extra_hover3'     => '#5C0E4D',

                    // Input fields (form's fields and textarea)
                    'input_bg_color'   => 'transparent', //ok
                    'input_bg_hover'   => 'transparent', //ok
                    'input_bd_color'   => '#E0DFE6', //ok
                    'input_bd_hover'   => '#CBC8D3', //ok
                    'input_text'       => '#7B798B', //ok
                    'input_light'      => '#A09CB1', //ok
                    'input_dark'       => '#181621', //ok

                    // Inverse blocks (text and links on the 'text_link' background)
                    'inverse_bd_color' => '#67bcc1',
                    'inverse_bd_hover' => '#5aa4a9',
                    'inverse_text'     => '#181621',
                    'inverse_light'    => '#333333',
                    'inverse_dark'     => '#181621', //ok
                    'inverse_link'     => '#FFFFFF', //ok
                    'inverse_hover'    => '#FFFFFF', //ok

                    // Additional (skin-specific) colors.
                    // Attention! Set of colors must be equal in all color schemes.
                    //---> For example:
                    //---> 'new_color1'         => '#rrggbb',
                    //---> 'alter_new_color1'   => '#rrggbb',
                    //---> 'inverse_new_color1' => '#rrggbb',
                ),
            ),

            // Color scheme: 'green_default'
            'green_default' => array(
                'title'    => esc_html__( 'Green Default', 'prisma' ),
                'internal' => true,
                'colors'   => array(

                    // Whole block border and background
                    'bg_color'         => '#F6F8FB', //ok
                    'bd_color'         => '#DBE7EF', //ok

                    // Text and links colors
                    'text'             => '#79858B', //ok
                    'text_light'       => '#9CA6B1', //ok
                    'text_dark'        => '#161921', //ok
                    'text_link'        => '#B8E210', //ok green
                    'text_hover'       => '#A9D10C', //ok green
                    'text_link2'       => '#2531EF', //ok
                    'text_hover2'      => '#141FC7', //ok
                    'text_link3'       => '#172B36', //ok
                    'text_hover3'      => '#0B171D', //ok

                    // Alternative blocks (sidebar, tabs, alternative blocks, etc.)
                    'alter_bg_color'   => '#FFFFFF', //ok
                    'alter_bg_hover'   => '#E7ECEF', //ok
                    'alter_bd_color'   => '#DBE7EF', //ok
                    'alter_bd_hover'   => '#CBD9E7', //ok
                    'alter_text'       => '#79858B', //ok
                    'alter_light'      => '#9CA6B1', //ok
                    'alter_dark'       => '#161921', //ok
                    'alter_link'       => '#B8E210', //ok green
                    'alter_hover'      => '#A9D10C', //ok green
                    'alter_link2'      => '#2531EF', //ok
                    'alter_hover2'     => '#141FC7', //ok
                    'alter_link3'      => '#172B36', //ok
                    'alter_hover3'     => '#0B171D', //ok

                    // Extra blocks (submenu, tabs, color blocks, etc.)
                    'extra_bg_color'   => '#011521', //ok
                    'extra_bg_hover'   => '#162532',
                    'extra_bd_color'   => '#263540',
                    'extra_bd_hover'   => '#4E5B64',
                    'extra_text'       => '#8EA0AC', //ok
                    'extra_light'      => '#60717E',
                    'extra_dark'       => '#F7F7F8', //ok
                    'extra_link'       => '#B8E210', //ok
                    'extra_hover'      => '#FCFCFC', //ok
                    'extra_link2'      => '#2531EF',
                    'extra_hover2'     => '#141FC7',
                    'extra_link3'      => '#172B36',
                    'extra_hover3'     => '#0B171D',

                    // Input fields (form's fields and textarea)
                    'input_bg_color'   => 'transparent', //ok
                    'input_bg_hover'   => 'transparent', //ok
                    'input_bd_color'   => '#DBE7EF', //ok
                    'input_bd_hover'   => '#CBD9E7', //ok
                    'input_text'       => '#79858B', //ok
                    'input_light'      => '#9CA6B1', //ok
                    'input_dark'       => '#161921', //ok

                    // Inverse blocks (text and links on the 'text_link' background)
                    'inverse_bd_color' => '#67bcc1',
                    'inverse_bd_hover' => '#5aa4a9',
                    'inverse_text'     => '#161921',
                    'inverse_light'    => '#333333',
                    'inverse_dark'     => '#161921', //ok
                    'inverse_link'     => '#FFFFFF', //ok
                    'inverse_hover'    => '#FFFFFF', //ok

                    // Additional (skin-specific) colors.
                    // Attention! Set of colors must be equal in all color schemes.
                    //---> For example:
                    //---> 'new_color1'         => '#rrggbb',
                    //---> 'alter_new_color1'   => '#rrggbb',
                    //---> 'inverse_new_color1' => '#rrggbb',
                ),
            ),

            // Color scheme: 'green_dark'
            'green_dark'    => array( 
                'title'    => esc_html__( 'Green Dark', 'prisma' ),
                'internal' => true,
                'colors'   => array(

                    // Whole block border and background
                    'bg_color'         => '#1A2225', //ok
                    'bd_color'         => '#31393B', //ok

                    // Text and links colors
                    'text'             => '#9B9FAF', //ok
                    'text_light'       => '#7A7F91', //ok
                    'text_dark'        => '#F7F7F8', //ok
                    'text_link'        => '#B8E210', //ok green
                    'text_hover'       => '#A9D10C', //ok green
                    'text_link2'       => '#2531EF', //ok
                    'text_hover2'      => '#141FC7', //ok
                    'text_link3'       => '#172B36', //ok
                    'text_hover3'      => '#0B171D', //ok

                    // Alternative blocks (sidebar, tabs, alternative blocks, etc.)
                    'alter_bg_color'   => '#111A1F', //ok
                    'alter_bg_hover'   => '#1B2933', //ok
                    'alter_bd_color'   => '#31393B', //ok
                    'alter_bd_hover'   => '#3F4B4F', //ok
                    'alter_text'       => '#9BA8AF', //ok
                    'alter_light'      => '#7A7F91', //ok
                    'alter_dark'       => '#F7F7F8', //ok
                    'alter_link'       => '#B8E210', //ok green
                    'alter_hover'      => '#A9D10C', //ok green
                    'alter_link2'      => '#2531EF', //ok
                    'alter_hover2'     => '#141FC7', //ok
                    'alter_link3'      => '#172B36', //ok
                    'alter_hover3'     => '#0B171D', //ok

                    // Extra blocks (submenu, tabs, color blocks, etc.)
                    'extra_bg_color'   => '#011321', //ok
                    'extra_bg_hover'   => '#1B2933',
                    'extra_bd_color'   => '#31393B',
                    'extra_bd_hover'   => '#3F4B4F',
                    'extra_text'       => '#9B9FAF', //ok
                    'extra_light'      => '#7A7F91',
                    'extra_dark'       => '#F7F7F8', //ok
                    'extra_link'       => '#B8E210', //ok
                    'extra_hover'      => '#F7F7F8', //ok
                    'extra_link2'      => '#2531EF',
                    'extra_hover2'     => '#141FC7',
                    'extra_link3'      => '#172B36',
                    'extra_hover3'     => '#0B171D',

                    // Input fields (form's fields and textarea)
                    'input_bg_color'   => '#transparent', //ok
                    'input_bg_hover'   => '#transparent', //ok
                    'input_bd_color'   => '#31393B', //ok
                    'input_bd_hover'   => '#464C65', //ok
                    'input_text'       => '#9B9FAF', //ok
                    'input_light'      => '#7A7F91', //ok
                    'input_dark'       => '#F7F7F8', //ok

                    // Inverse blocks (text and links on the 'text_link' background)
                    'inverse_bd_color' => '#e36650',
                    'inverse_bd_hover' => '#cb5b47',
                    'inverse_text'     => '#F7F7F8', //ok
                    'inverse_light'    => '#6f6f6f',
                    'inverse_dark'     => '#161921', //ok
                    'inverse_link'     => '#FFFFFF', //ok
                    'inverse_hover'    => '#161921', //ok

                    // Additional (skin-specific) colors.
                    // Attention! Set of colors must be equal in all color schemes.
                    //---> For example:
                    //---> 'new_color1'         => '#rrggbb',
                    //---> 'alter_new_color1'   => '#rrggbb',
                    //---> 'inverse_new_color1' => '#rrggbb',
                ),
            ),

            // Color scheme: 'green_light'
            'green_light' => array(
                'title'    => esc_html__( 'Green Light', 'prisma' ),
                'internal' => true,
                'colors'   => array(

                    // Whole block border and background
                    'bg_color'         => '#FFFFFF', //ok
                    'bd_color'         => '#DBE7EF', //ok

                    // Text and links colors
                    'text'             => '#79858B', //ok
                    'text_light'       => '#9CA6B1', //ok
                    'text_dark'        => '#161921', //ok
                    'text_link'        => '#B8E210', //ok green
                    'text_hover'       => '#A9D10C', //ok green
                    'text_link2'       => '#2531EF', //ok
                    'text_hover2'      => '#141FC7', //ok
                    'text_link3'       => '#172B36', //ok
                    'text_hover3'      => '#0B171D', //ok

                    // Alternative blocks (sidebar, tabs, alternative blocks, etc.)
                    'alter_bg_color'   => '#F6F8FB', //ok
                    'alter_bg_hover'   => '#E7ECEF', //ok
                    'alter_bd_color'   => '#DBE7EF', //ok
                    'alter_bd_hover'   => '#CBD9E7', //ok
                    'alter_text'       => '#79858B', //ok
                    'alter_light'      => '#9CA6B1', //ok
                    'alter_dark'       => '#161921', //ok
                    'alter_link'       => '#B8E210', //ok green
                    'alter_hover'      => '#A9D10C', //ok green
                    'alter_link2'      => '#2531EF', //ok
                    'alter_hover2'     => '#141FC7', //ok
                    'alter_link3'      => '#172B36', //ok
                    'alter_hover3'     => '#0B171D', //ok

                    // Extra blocks (submenu, tabs, color blocks, etc.)
                    'extra_bg_color'   => '#011521', //ok
                    'extra_bg_hover'   => '#162532',
                    'extra_bd_color'   => '#263540',
                    'extra_bd_hover'   => '#4E5B64',
                    'extra_text'       => '#8EA0AC', //ok
                    'extra_light'      => '#60717E',
                    'extra_dark'       => '#F7F7F8', //ok
                    'extra_link'       => '#B8E210', //ok
                    'extra_hover'      => '#FCFCFC', //ok
                    'extra_link2'      => '#2531EF',
                    'extra_hover2'     => '#141FC7',
                    'extra_link3'      => '#172B36',
                    'extra_hover3'     => '#0B171D',

                    // Input fields (form's fields and textarea)
                    'input_bg_color'   => 'transparent', //ok
                    'input_bg_hover'   => 'transparent', //ok
                    'input_bd_color'   => '#DBE7EF', //ok
                    'input_bd_hover'   => '#CBD9E7', //ok
                    'input_text'       => '#79858B', //ok
                    'input_light'      => '#9CA6B1', //ok
                    'input_dark'       => '#161921', //ok

                    // Inverse blocks (text and links on the 'text_link' background)
                    'inverse_bd_color' => '#67bcc1',
                    'inverse_bd_hover' => '#5aa4a9',
                    'inverse_text'     => '#161921',
                    'inverse_light'    => '#333333',
                    'inverse_dark'     => '#161921', //ok
                    'inverse_link'     => '#FFFFFF', //ok
                    'inverse_hover'    => '#FFFFFF', //ok

                    // Additional (skin-specific) colors.
                    // Attention! Set of colors must be equal in all color schemes.
                    //---> For example:
                    //---> 'new_color1'         => '#rrggbb',
                    //---> 'alter_new_color1'   => '#rrggbb',
                    //---> 'inverse_new_color1' => '#rrggbb',
                ),
            ),

            // Color scheme: 'ruby_default'
            'ruby_default' => array(
                'title'    => esc_html__( 'Ruby Default', 'prisma' ),
                'internal' => true,
                'colors'   => array(

                    // Whole block border and background
                    'bg_color'         => '#F9F6FB', //ok
                    'bd_color'         => '#F0F0F0', //ok

                    // Text and links colors
                    'text'             => '#84798B', //ok
                    'text_light'       => '#A69CB1', //ok
                    'text_dark'        => '#1D1D1D', //ok
                    'text_link'        => '#D83A6A', //ok ruby
                    'text_hover'       => '#C3305D', //ok ruby
                    'text_link2'       => '#F5B30D', //ok
                    'text_hover2'      => '#E4AA18', //ok
                    'text_link3'       => '#4290D9', //ok
                    'text_hover3'      => '#367EC1', //ok

                    // Alternative blocks (sidebar, tabs, alternative blocks, etc.)
                    'alter_bg_color'   => '#FFFFFF', //ok
                    'alter_bg_hover'   => '#EEECF0', //ok
                    'alter_bd_color'   => '#F0F0F0', //ok
                    'alter_bd_hover'   => '#E8E7E7', //ok
                    'alter_text'       => '#84798B', //ok
                    'alter_light'      => '#A69CB1', //ok
                    'alter_dark'       => '#1D1D1D', //ok
                    'alter_link'       => '#D83A6A', //ok ruby
                    'alter_hover'      => '#C3305D', //ok ruby
                    'alter_link2'      => '#F5B30D', //ok
                    'alter_hover2'     => '#E4AA18', //ok
                    'alter_link3'      => '#4290D9', //ok
                    'alter_hover3'     => '#367EC1', //ok

                    // Extra blocks (submenu, tabs, color blocks, etc.)
                    'extra_bg_color'   => '#16011F', //ok
                    'extra_bg_hover'   => '##201529',
                    'extra_bd_color'   => '#2B1D2F',
                    'extra_bd_hover'   => '#5C4E64',
                    'extra_text'       => '#A38EAC', //ok
                    'extra_light'      => '#6E607E',
                    'extra_dark'       => '#F5F5F5', //ok
                    'extra_link'       => '#D83A6A', //ok
                    'extra_hover'      => '#FCFCFC', //ok
                    'extra_link2'      => '#F5B30D',
                    'extra_hover2'     => '#E4AA18',
                    'extra_link3'      => '#4290D9',
                    'extra_hover3'     => '#367EC1',

                    // Input fields (form's fields and textarea)
                    'input_bg_color'   => 'transparent', //ok
                    'input_bg_hover'   => 'transparent', //ok
                    'input_bd_color'   => '#F0F0F0', //ok
                    'input_bd_hover'   => '#E8E7E7', //ok
                    'input_text'       => '#84798B', //ok
                    'input_light'      => '#A69CB1', //ok
                    'input_dark'       => '#1D1D1D', //ok

                    // Inverse blocks (text and links on the 'text_link' background)
                    'inverse_bd_color' => '#67bcc1',
                    'inverse_bd_hover' => '#5aa4a9',
                    'inverse_text'     => '#1D1D1D',
                    'inverse_light'    => '#333333',
                    'inverse_dark'     => '#1D1D1D', //ok
                    'inverse_link'     => '#FFFFFF', //ok
                    'inverse_hover'    => '#FFFFFF', //ok

                    // Additional (skin-specific) colors.
                    // Attention! Set of colors must be equal in all color schemes.
                    //---> For example:
                    //---> 'new_color1'         => '#rrggbb',
                    //---> 'alter_new_color1'   => '#rrggbb',
                    //---> 'inverse_new_color1' => '#rrggbb',
                ),
            ),

            // Color scheme: 'ruby_dark'
            'ruby_dark'    => array(
                'title'    => esc_html__( 'Ruby Dark', 'prisma' ),
                'internal' => true,
                'colors'   => array(

                    // Whole block border and background
                    'bg_color'         => '#201A25', //ok
                    'bd_color'         => '#32313B', //ok

                    // Text and links colors
                    'text'             => '#9C9BAF', //ok
                    'text_light'       => '#807A91', //ok
                    'text_dark'        => '#F7F7F8', //ok
                    'text_link'        => '#D83A6A', //ok ruby
                    'text_hover'       => '#C3305D', //ok ruby
                    'text_link2'       => '#F5B30D', //ok
                    'text_hover2'      => '#E4AA18', //ok
                    'text_link3'       => '#4290D9', //ok
                    'text_hover3'      => '#367EC1', //ok

                    // Alternative blocks (sidebar, tabs, alternative blocks, etc.)
                    'alter_bg_color'   => '#1C111F', //ok
                    'alter_bg_hover'   => '#241B33', //ok
                    'alter_bd_color'   => '#433F4F', //ok
                    'alter_bd_hover'   => '#433F4F', //ok
                    'alter_text'       => '#9C9BAF', //ok
                    'alter_light'      => '#807A91', //ok
                    'alter_dark'       => '#F7F7F8', //ok
                    'alter_link'       => '#D83A6A', //ok ruby
                    'alter_hover'      => '#C3305D', //ok ruby
                    'alter_link2'      => '#F5B30D', //ok
                    'alter_hover2'     => '#E4AA18', //ok
                    'alter_link3'      => '#4290D9', //ok
                    'alter_hover3'     => '#367EC1', //ok

                    // Extra blocks (submenu, tabs, color blocks, etc.)
                    'extra_bg_color'   => '#160121', //ok
                    'extra_bg_hover'   => '#241B33',
                    'extra_bd_color'   => '#32313B',
                    'extra_bd_hover'   => '#433F4F',
                    'extra_text'       => '#9C9BAF', //ok
                    'extra_light'      => '#807A91',
                    'extra_dark'       => '#F7F7F8', //ok
                    'extra_link'       => '#D83A6A', //ok
                    'extra_hover'      => '#F7F7F8', //ok
                    'extra_link2'      => '#F5B30D',
                    'extra_hover2'     => '#E4AA18',
                    'extra_link3'      => '#4290D9',
                    'extra_hover3'     => '#367EC1',

                    // Input fields (form's fields and textarea)
                    'input_bg_color'   => '#transparent', //ok
                    'input_bg_hover'   => '#transparent', //ok
                    'input_bd_color'   => '#32313B', //ok
                    'input_bd_hover'   => '#433F4F', //ok
                    'input_text'       => '#9C9BAF', //ok
                    'input_light'      => '#807A91', //ok
                    'input_dark'       => '#F7F7F8', //ok

                    // Inverse blocks (text and links on the 'text_link' background)
                    'inverse_bd_color' => '#e36650',
                    'inverse_bd_hover' => '#cb5b47',
                    'inverse_text'     => '#F7F7F8', //ok
                    'inverse_light'    => '#6f6f6f',
                    'inverse_dark'     => '#1D1D1D', //ok
                    'inverse_link'     => '#FFFFFF', //ok
                    'inverse_hover'    => '#1D1D1D', //ok

                    // Additional (skin-specific) colors.
                    // Attention! Set of colors must be equal in all color schemes.
                    //---> For example:
                    //---> 'new_color1'         => '#rrggbb',
                    //---> 'alter_new_color1'   => '#rrggbb',
                    //---> 'inverse_new_color1' => '#rrggbb',
                ),
            ),

            // Color scheme: 'ruby_light'
            'ruby_light' => array(
                'title'    => esc_html__( 'Ruby Light', 'prisma' ),
                'internal' => true,
                'colors'   => array(

                    // Whole block border and background
                    'bg_color'         => '#FFFFFF', //ok
                    'bd_color'         => '#F0F0F0', //ok

                    // Text and links colors
                    'text'             => '#84798B', //ok
                    'text_light'       => '#A69CB1', //ok
                    'text_dark'        => '#1D1D1D', //ok
                    'text_link'        => '#D83A6A', //ok ruby
                    'text_hover'       => '#C3305D', //ok ruby
                    'text_link2'       => '#F5B30D', //ok
                    'text_hover2'      => '#E4AA18', //ok
                    'text_link3'       => '#4290D9', //ok
                    'text_hover3'      => '#367EC1', //ok

                    // Alternative blocks (sidebar, tabs, alternative blocks, etc.)
                    'alter_bg_color'   => '#F9F6FB', //ok
                    'alter_bg_hover'   => '#EEECF0', //ok
                    'alter_bd_color'   => '#F0F0F0', //ok
                    'alter_bd_hover'   => '#E8E7E7', //ok
                    'alter_text'       => '#84798B', //ok
                    'alter_light'      => '#A69CB1', //ok
                    'alter_dark'       => '#1D1D1D', //ok
                    'alter_link'       => '#D83A6A', //ok ruby
                    'alter_hover'      => '#C3305D', //ok ruby
                    'alter_link2'      => '#F5B30D', //ok
                    'alter_hover2'     => '#E4AA18', //ok
                    'alter_link3'      => '#4290D9', //ok
                    'alter_hover3'     => '#367EC1', //ok

                    // Extra blocks (submenu, tabs, color blocks, etc.)
                    'extra_bg_color'   => '#16011F', //ok
                    'extra_bg_hover'   => '#201529',
                    'extra_bd_color'   => '#2B1D2F',
                    'extra_bd_hover'   => '#5C4E64',
                    'extra_text'       => '#A38EAC', //ok
                    'extra_light'      => '#6E607E',
                    'extra_dark'       => '#F5F5F5', //ok
                    'extra_link'       => '#D83A6A', //ok
                    'extra_hover'      => '#FCFCFC', //ok
                    'extra_link2'      => '#F5B30D',
                    'extra_hover2'     => '#E4AA18',
                    'extra_link3'      => '#4290D9',
                    'extra_hover3'     => '#367EC1',

                    // Input fields (form's fields and textarea)
                    'input_bg_color'   => 'transparent', //ok
                    'input_bg_hover'   => 'transparent', //ok
                    'input_bd_color'   => '#F0F0F0', //ok
                    'input_bd_hover'   => '#E8E7E7', //ok
                    'input_text'       => '#84798B', //ok
                    'input_light'      => '#A69CB1', //ok
                    'input_dark'       => '#1D1D1D', //ok

                    // Inverse blocks (text and links on the 'text_link' background)
                    'inverse_bd_color' => '#67bcc1',
                    'inverse_bd_hover' => '#5aa4a9',
                    'inverse_text'     => '#1D1D1D',
                    'inverse_light'    => '#333333',
                    'inverse_dark'     => '#1D1D1D', //ok
                    'inverse_link'     => '#FFFFFF', //ok
                    'inverse_hover'    => '#FFFFFF', //ok

                    // Additional (skin-specific) colors.
                    // Attention! Set of colors must be equal in all color schemes.
                    //---> For example:
                    //---> 'new_color1'         => '#rrggbb',
                    //---> 'alter_new_color1'   => '#rrggbb',
                    //---> 'inverse_new_color1' => '#rrggbb',
                ),
            ),

            // Color scheme: 'game_default'
            'game_default' => array(
                'title'    => esc_html__( 'Game Default', 'prisma' ),
                'internal' => true,
                'colors'   => array(

                    // Whole block border and background
                    'bg_color'         => '#F6F8FB', //ok
                    'bd_color'         => '#DBE7EF', //ok

                    // Text and links colors
                    'text'             => '#79858B', //ok
                    'text_light'       => '#9CA6B1', //ok
                    'text_dark'        => '#161D21', //ok
                    'text_link'        => '#FFC700', //ok game
                    'text_hover'       => '#EAB803', //ok game
                    'text_link2'       => '#4AC1D2', //ok
                    'text_hover2'      => '#3BAFBF', //ok
                    'text_link3'       => '#854BFF', //ok
                    'text_hover3'      => '#733DE4', //ok

                    // Alternative blocks (sidebar, tabs, alternative blocks, etc.)
                    'alter_bg_color'   => '#FFFFFF', //ok
                    'alter_bg_hover'   => '#E7ECEF', //ok
                    'alter_bd_color'   => '#DBE7EF', //ok
                    'alter_bd_hover'   => '#CBD9E7', //ok
                    'alter_text'       => '#79858B', //ok
                    'alter_light'      => '#9CA6B1', //ok
                    'alter_dark'       => '#161D21', //ok
                    'alter_link'       => '#FFC700', //ok
                    'alter_hover'      => '#EAB803', //ok
                    'alter_link2'      => '#4AC1D2', //ok
                    'alter_hover2'     => '#3BAFBF', //ok
                    'alter_link3'      => '#854BFF', //ok
                    'alter_hover3'     => '#733DE4', //ok

                    // Extra blocks (submenu, tabs, color blocks, etc.)
                    'extra_bg_color'   => '#011521', //ok
                    'extra_bg_hover'   => '#161732',
                    'extra_bd_color'   => '#263540',
                    'extra_bd_hover'   => '#4E5B64',
                    'extra_text'       => '#8E8EAC', //ok
                    'extra_light'      => '#60607E',
                    'extra_dark'       => '#F7F7F8', //ok
                    'extra_link'       => '#FFC700', //ok game
                    'extra_hover'      => '#F7F7F8', //ok
                    'extra_link2'      => '#4AC1D2',
                    'extra_hover2'     => '#3BAFBF',
                    'extra_link3'      => '#854BFF',
                    'extra_hover3'     => '#733DE4',

                    // Input fields (form's fields and textarea)
                    'input_bg_color'   => 'transparent', //ok
                    'input_bg_hover'   => 'transparent', //ok
                    'input_bd_color'   => '#DBE7EF', //ok
                    'input_bd_hover'   => '#CBD9E7', //ok
                    'input_text'       => '#79858B', //ok
                    'input_light'      => '#9CA6B1', //ok
                    'input_dark'       => '#161D21', //ok

                    // Inverse blocks (text and links on the 'text_link' background)
                    'inverse_bd_color' => '#67bcc1',
                    'inverse_bd_hover' => '#5aa4a9',
                    'inverse_text'     => '#161D21',
                    'inverse_light'    => '#333333',
                    'inverse_dark'     => '#161D21', //ok
                    'inverse_link'     => '#FFFFFF', //ok
                    'inverse_hover'    => '#FFFFFF', //ok

                    // Additional (skin-specific) colors.
                    // Attention! Set of colors must be equal in all color schemes.
                    //---> For example:
                    //---> 'new_color1'         => '#rrggbb',
                    //---> 'alter_new_color1'   => '#rrggbb',
                    //---> 'inverse_new_color1' => '#rrggbb',
                ),
            ),

            // Color scheme: 'game_dark'
            'game_dark'    => array(
                'title'    => esc_html__( 'Game Dark', 'prisma' ),
                'internal' => true,
                'colors'   => array(

                    // Whole block border and background
                    'bg_color'         => '#111A1F', //ok
                    'bd_color'         => '#212D34', //ok

                    // Text and links colors
                    'text'             => '#9BA8AF', //ok
                    'text_light'       => '#7A8A91', //ok
                    'text_dark'        => '#F7F7F8', //ok
                    'text_link'        => '#FFC700', //ok game
                    'text_hover'       => '#EAB803', //ok game
                    'text_link2'       => '#4AC1D2', //ok
                    'text_hover2'      => '#3BAFBF', //ok
                    'text_link3'       => '#854BFF', //ok
                    'text_hover3'      => '#733DE4', //ok

                    // Alternative blocks (sidebar, tabs, alternative blocks, etc.)
                    'alter_bg_color'   => '#1A2225', //ok
                    'alter_bg_hover'   => '#1B2933', //ok
                    'alter_bd_color'   => '#212D34', //ok
                    'alter_bd_hover'   => '#33444E', //ok
                    'alter_text'       => '#9BA8AF', //ok
                    'alter_light'      => '#7A8A91', //ok
                    'alter_dark'       => '#F7F7F8', //ok
                    'alter_link'       => '#FFC700', //ok game
                    'alter_hover'      => '#EAB803', //ok game
                    'alter_link2'      => '#4AC1D2', //ok
                    'alter_hover2'     => '#3BAFBF', //ok
                    'alter_link3'      => '#854BFF', //ok
                    'alter_hover3'     => '#733DE4', //ok

                    // Extra blocks (submenu, tabs, color blocks, etc.)
                    'extra_bg_color'   => '#011321', //ok
                    'extra_bg_hover'   => '#1B2933',
                    'extra_bd_color'   => '#212D34',
                    'extra_bd_hover'   => '#33444E',
                    'extra_text'       => '#9BA8AF', //ok
                    'extra_light'      => '#7A8A91',
                    'extra_dark'       => '#F7F7F8', //ok
                    'extra_link'       => '#FFC700', //ok game
                    'extra_hover'      => '#F7F7F8', //ok
                    'extra_link2'      => '#4AC1D2',
                    'extra_hover2'     => '#3BAFBF',
                    'extra_link3'      => '#854BFF',
                    'extra_hover3'     => '#733DE4',

                    // Input fields (form's fields and textarea)
                    'input_bg_color'   => '#transparent', //ok
                    'input_bg_hover'   => '#transparent', //ok
                    'input_bd_color'   => '#212D34', //ok
                    'input_bd_hover'   => '#33444E', //ok
                    'input_text'       => '#9BA8AF', //ok
                    'input_light'      => '#7A8A91', //ok
                    'input_dark'       => '#F7F7F8', //ok

                    // Inverse blocks (text and links on the 'text_link' background)
                    'inverse_bd_color' => '#e36650',
                    'inverse_bd_hover' => '#cb5b47',
                    'inverse_text'     => '#F7F7F8', //ok
                    'inverse_light'    => '#6f6f6f',
                    'inverse_dark'     => '#161D21', //ok
                    'inverse_link'     => '#FFFFFF', //ok
                    'inverse_hover'    => '#161D21', //ok

                    // Additional (skin-specific) colors.
                    // Attention! Set of colors must be equal in all color schemes.
                    //---> For example:
                    //---> 'new_color1'         => '#rrggbb',
                    //---> 'alter_new_color1'   => '#rrggbb',
                    //---> 'inverse_new_color1' => '#rrggbb',
                ),
            ),

            // Color scheme: 'game_light'
            'game_light' => array(
                'title'    => esc_html__( 'Game Light', 'prisma' ),
                'internal' => true,
                'colors'   => array(

                    // Whole block border and background
                    'bg_color'         => '#FFFFFF', //ok
                    'bd_color'         => '#DBE7EF', //ok

                    // Text and links colors
                    'text'             => '#79858B', //ok
                    'text_light'       => '#9CA6B1', //ok
                    'text_dark'        => '#161D21', //ok
                    'text_link'        => '#FFC700', //ok game
                    'text_hover'       => '#EAB803', //ok game
                    'text_link2'       => '#4AC1D2', //ok
                    'text_hover2'      => '#3BAFBF', //ok
                    'text_link3'       => '#854BFF', //ok
                    'text_hover3'      => '#733DE4', //ok

                    // Alternative blocks (sidebar, tabs, alternative blocks, etc.)
                    'alter_bg_color'   => '#F6F8FB', //ok
                    'alter_bg_hover'   => '#E7ECEF', //ok
                    'alter_bd_color'   => '#DBE7EF', //ok
                    'alter_bd_hover'   => '#CBD9E7', //ok
                    'alter_text'       => '#79858B', //ok
                    'alter_light'      => '#9CA6B1', //ok
                    'alter_dark'       => '#161D21', //ok
                    'alter_link'       => '#FFC700', //ok
                    'alter_hover'      => '#EAB803', //ok
                    'alter_link2'      => '#4AC1D2', //ok
                    'alter_hover2'     => '#3BAFBF', //ok
                    'alter_link3'      => '#854BFF', //ok
                    'alter_hover3'     => '#733DE4', //ok

                    // Extra blocks (submenu, tabs, color blocks, etc.)
                    'extra_bg_color'   => '#011521', //ok
                    'extra_bg_hover'   => '#162532',
                    'extra_bd_color'   => '#263540',
                    'extra_bd_hover'   => '#4E5B64',
                    'extra_text'       => '#8EA0AC', //ok
                    'extra_light'      => '#60717E',
                    'extra_dark'       => '#F7F7F8', //ok
                    'extra_link'       => '#FFC700', //ok game
                    'extra_hover'      => '#F7F7F8', //ok
                    'extra_link2'      => '#4AC1D2',
                    'extra_hover2'     => '#3BAFBF',
                    'extra_link3'      => '#854BFF',
                    'extra_hover3'     => '#733DE4',

                    // Input fields (form's fields and textarea)
                    'input_bg_color'   => 'transparent', //ok
                    'input_bg_hover'   => 'transparent', //ok
                    'input_bd_color'   => '#DBE7EF', //ok
                    'input_bd_hover'   => '#CBD9E7', //ok
                    'input_text'       => '#79858B', //ok
                    'input_light'      => '#9CA6B1', //ok
                    'input_dark'       => '#161D21', //ok

                    // Inverse blocks (text and links on the 'text_link' background)
                    'inverse_bd_color' => '#67bcc1',
                    'inverse_bd_hover' => '#5aa4a9',
                    'inverse_text'     => '#161D21',
                    'inverse_light'    => '#333333',
                    'inverse_dark'     => '#161D21', //ok
                    'inverse_link'     => '#FFFFFF', //ok
                    'inverse_hover'    => '#FFFFFF', //ok

                    // Additional (skin-specific) colors.
                    // Attention! Set of colors must be equal in all color schemes.
                    //---> For example:
                    //---> 'new_color1'         => '#rrggbb',
                    //---> 'alter_new_color1'   => '#rrggbb',
                    //---> 'inverse_new_color1' => '#rrggbb',
                ),
            ),
			// Color scheme: 'purple_default'
            'purple_default' => array(
                'title'    => esc_html__( 'Purple Default', 'prisma' ),
                'internal' => true,
                'colors'   => array(

                    // Whole block border and background
                    'bg_color'         => '#F6F8FB', //ok
                    'bd_color'         => '#DBE7EF', //ok

                    // Text and links colors
                    'text'             => '#79858B', //ok
                    'text_light'       => '#9CA6B1', //ok
                    'text_dark'        => '#161D21', //ok
                    'text_link'        => '#8D2CFF', //ok game
                    'text_hover'       => '#7924DC', //ok game
                    'text_link2'       => '#28CDCF', //ok
                    'text_hover2'      => '#1CB1B2', //ok
                    'text_link3'       => '#FE4981', //ok
                    'text_hover3'      => '#E92F68', //ok

                    // Alternative blocks (sidebar, tabs, alternative blocks, etc.)
                    'alter_bg_color'   => '#FFFFFF', //ok
                    'alter_bg_hover'   => '#E7EAEF', //ok
                    'alter_bd_color'   => '#DBE7EF', //ok
                    'alter_bd_hover'   => '#CBD9E7', //ok
                    'alter_text'       => '#79858B', //ok
                    'alter_light'      => '#9CA6B1', //ok
                    'alter_dark'       => '#161D21', //ok
                    'alter_link'       => '#8D2CFF', //ok
                    'alter_hover'      => '#7924DC', //ok
                    'alter_link2'      => '#28CDCF', //ok
                    'alter_hover2'     => '#1CB1B2', //ok
                    'alter_link3'      => '#FE4981', //ok
                    'alter_hover3'     => '#E92F68', //ok

                    // Extra blocks (submenu, tabs, color blocks, etc.)
                    'extra_bg_color'   => '#011521', //ok
                    'extra_bg_hover'   => '#161732',
                    'extra_bd_color'   => '#263140',
                    'extra_bd_hover'   => '#4E5B64',
                    'extra_text'       => '#8E8EAC', //ok
                    'extra_light'      => '#60607E',
                    'extra_dark'       => '#F7F7F8', //ok
                    'extra_link'       => '#8D2CFF', //ok game
                    'extra_hover'      => '#F7F7F8', //ok
                    'extra_link2'      => '#28CDCF',
                    'extra_hover2'     => '#1CB1B2',
                    'extra_link3'      => '#FE4981',
                    'extra_hover3'     => '#E92F68',

                    // Input fields (form's fields and textarea)
                    'input_bg_color'   => 'transparent', //ok
                    'input_bg_hover'   => 'transparent', //ok
                    'input_bd_color'   => '#DBE7EF', //ok
                    'input_bd_hover'   => '#CBD9E7', //ok
                    'input_text'       => '#79858B', //ok
                    'input_light'      => '#9CA6B1', //ok
                    'input_dark'       => '#161D21', //ok

                    // Inverse blocks (text and links on the 'text_link' background)
                    'inverse_bd_color' => '#67bcc1',
                    'inverse_bd_hover' => '#5aa4a9',
                    'inverse_text'     => '#161D21',
                    'inverse_light'    => '#333333',
                    'inverse_dark'     => '#161D21', //ok
                    'inverse_link'     => '#FFFFFF', //ok
                    'inverse_hover'    => '#FFFFFF', //ok

                    // Additional (skin-specific) colors.
                    // Attention! Set of colors must be equal in all color schemes.
                    //---> For example:
                    //---> 'new_color1'         => '#rrggbb',
                    //---> 'alter_new_color1'   => '#rrggbb',
                    //---> 'inverse_new_color1' => '#rrggbb',
                ),
            ),

            // Color scheme: 'purple_dark'
            'purple_dark'    => array(
                'title'    => esc_html__( 'Purple Dark', 'prisma' ),
                'internal' => true,
                'colors'   => array(

                    // Whole block border and background
                    'bg_color'         => '#1F172A', //ok
                    'bd_color'         => '#36313B', //ok

                    // Text and links colors
                    'text'             => '#9BA8AF', //ok
                    'text_light'       => '#7A8A91', //ok
                    'text_dark'        => '#F7F7F8', //ok
                    'text_link'        => '#8D2CFF', //ok game
                    'text_hover'       => '#7924DC', //ok game
                    'text_link2'       => '#28CDCF', //ok
                    'text_hover2'      => '#1CB1B2', //ok
                    'text_link3'       => '#FE4981', //ok
                    'text_hover3'      => '#E92F68', //ok

                    // Alternative blocks (sidebar, tabs, alternative blocks, etc.)
                    'alter_bg_color'   => '#16111D', //ok
                    'alter_bg_hover'   => '#1B2933', //ok
                    'alter_bd_color'   => '#36313B', //ok
                    'alter_bd_hover'   => '#463F4F', //ok
                    'alter_text'       => '#9BA8AF', //ok
                    'alter_light'      => '#7A8A91', //ok
                    'alter_dark'       => '#F7F7F8', //ok
                    'alter_link'       => '#8D2CFF', //ok game
                    'alter_hover'      => '#7924DC', //ok game
                    'alter_link2'      => '#28CDCF', //ok
                    'alter_hover2'     => '#1CB1B2', //ok
                    'alter_link3'      => '#FE4981', //ok
                    'alter_hover3'     => '#E92F68', //ok

                    // Extra blocks (submenu, tabs, color blocks, etc.)
                    'extra_bg_color'   => '#120121', //ok
                    'extra_bg_hover'   => '#261B33',
                    'extra_bd_color'   => '#36313B',
                    'extra_bd_hover'   => '#463F4F',
                    'extra_text'       => '#9BA8AF', //ok
                    'extra_light'      => '#7A8A91',
                    'extra_dark'       => '#F7F7F8', //ok
                    'extra_link'       => '#8D2CFF', //ok game
                    'extra_hover'      => '#F7F7F8', //ok
                    'extra_link2'      => '#28CDCF',
                    'extra_hover2'     => '#1CB1B2',
                    'extra_link3'      => '#FE4981',
                    'extra_hover3'     => '#E92F68',

                    // Input fields (form's fields and textarea)
                    'input_bg_color'   => '#transparent', //ok
                    'input_bg_hover'   => '#transparent', //ok
                    'input_bd_color'   => '#36313B', //ok
                    'input_bd_hover'   => '#463F4F', //ok
                    'input_text'       => '#9BA8AF', //ok
                    'input_light'      => '#7A8A91', //ok
                    'input_dark'       => '#F7F7F8', //ok

                    // Inverse blocks (text and links on the 'text_link' background)
                    'inverse_bd_color' => '#e36650',
                    'inverse_bd_hover' => '#cb5b47',
                    'inverse_text'     => '#F7F7F8', //ok
                    'inverse_light'    => '#6f6f6f',
                    'inverse_dark'     => '#161D21', //ok
                    'inverse_link'     => '#FFFFFF', //ok
                    'inverse_hover'    => '#161D21', //ok

                    // Additional (skin-specific) colors.
                    // Attention! Set of colors must be equal in all color schemes.
                    //---> For example:
                    //---> 'new_color1'         => '#rrggbb',
                    //---> 'alter_new_color1'   => '#rrggbb',
                    //---> 'inverse_new_color1' => '#rrggbb',
                ),
            ),

            // Color scheme: 'purple_light'
            'purple_light' => array(
                'title'    => esc_html__( 'Purple Light', 'prisma' ),
                'internal' => true,
                'colors'   => array(

                    // Whole block border and background
                    'bg_color'         => '#FFFFFF', //ok
                    'bd_color'         => '#DBE7EF', //ok

                    // Text and links colors
                    'text'             => '#79858B', //ok
                    'text_light'       => '#9CA6B1', //ok
                    'text_dark'        => '#161D21', //ok
                    'text_link'        => '#8D2CFF', //ok game
                    'text_hover'       => '#7924DC', //ok game
                    'text_link2'       => '#28CDCF', //ok
                    'text_hover2'      => '#1CB1B2', //ok
                    'text_link3'       => '#FE4981', //ok
                    'text_hover3'      => '#E92F68', //ok

                    // Alternative blocks (sidebar, tabs, alternative blocks, etc.)
                    'alter_bg_color'   => '#F6F8FB', //ok
                    'alter_bg_hover'   => '#E7EAEF', //ok
                    'alter_bd_color'   => '#DBE7EF', //ok
                    'alter_bd_hover'   => '#CBD9E7', //ok
                    'alter_text'       => '#79858B', //ok
                    'alter_light'      => '#9CA6B1', //ok
                    'alter_dark'       => '#161D21', //ok
                    'alter_link'       => '#8D2CFF', //ok
                    'alter_hover'      => '#7924DC', //ok
                    'alter_link2'      => '#28CDCF', //ok
                    'alter_hover2'     => '#1CB1B2', //ok
                    'alter_link3'      => '#FE4981', //ok
                    'alter_hover3'     => '#E92F68', //ok

                    // Extra blocks (submenu, tabs, color blocks, etc.)
                    'extra_bg_color'   => '#011521', //ok
                    'extra_bg_hover'   => '#162532',
                    'extra_bd_color'   => '#263140',
                    'extra_bd_hover'   => '#4E5B64',
                    'extra_text'       => '#8EA0AC', //ok
                    'extra_light'      => '#60717E',
                    'extra_dark'       => '#F7F7F8', //ok
                    'extra_link'       => '#8D2CFF', //ok game
                    'extra_hover'      => '#F7F7F8', //ok
                    'extra_link2'      => '#28CDCF',
                    'extra_hover2'     => '#1CB1B2',
                    'extra_link3'      => '#FE4981',
                    'extra_hover3'     => '#E92F68',

                    // Input fields (form's fields and textarea)
                    'input_bg_color'   => 'transparent', //ok
                    'input_bg_hover'   => 'transparent', //ok
                    'input_bd_color'   => '#DBE7EF', //ok
                    'input_bd_hover'   => '#CBD9E7', //ok
                    'input_text'       => '#79858B', //ok
                    'input_light'      => '#9CA6B1', //ok
                    'input_dark'       => '#161D21', //ok

                    // Inverse blocks (text and links on the 'text_link' background)
                    'inverse_bd_color' => '#67bcc1',
                    'inverse_bd_hover' => '#5aa4a9',
                    'inverse_text'     => '#161D21',
                    'inverse_light'    => '#333333',
                    'inverse_dark'     => '#161D21', //ok
                    'inverse_link'     => '#FFFFFF', //ok
                    'inverse_hover'    => '#FFFFFF', //ok

                    // Additional (skin-specific) colors.
                    // Attention! Set of colors must be equal in all color schemes.
                    //---> For example:
                    //---> 'new_color1'         => '#rrggbb',
                    //---> 'alter_new_color1'   => '#rrggbb',
                    //---> 'inverse_new_color1' => '#rrggbb',
                ),
            ),
            // Color scheme: 'fancy_default'
            'fancy_default' => array(
                'title'    => esc_html__( 'Fancy Default', 'prisma' ),
                'internal' => true,
                'colors'   => array(

                    // Whole block border and background
                    'bg_color'         => '#F7F7F8', //ok
                    'bd_color'         => '#E0E0E4', //ok

                    // Text and links colors
                    'text'             => '#79798F', //ok
                    'text_light'       => '#9D9DAC', //ok
                    'text_dark'        => '#161D21', //ok
                    'text_link'        => '#AF62FE', //ok game
                    'text_hover'       => '#9352D6', //ok game
                    'text_link2'       => '#FFC31F', //ok
                    'text_hover2'      => '#F2B202', //ok
                    'text_link3'       => '#C0D003', //ok
                    'text_hover3'      => '#AEBC01', //ok

                    // Alternative blocks (sidebar, tabs, alternative blocks, etc.)
                    'alter_bg_color'   => '#FFFFFF', //ok
                    'alter_bg_hover'   => '#EEEEF1', //ok
                    'alter_bd_color'   => '#E0E0E4', //ok
                    'alter_bd_hover'   => '#C8C8CF', //ok
                    'alter_text'       => '#79798F', //ok
                    'alter_light'      => '#9D9DAC', //ok
                    'alter_dark'       => '#161D21', //ok
                    'alter_link'       => '#AF62FE', //ok
                    'alter_hover'      => '#9352D6', //ok
                    'alter_link2'      => '#FFC31F', //ok
                    'alter_hover2'     => '#F2B202', //ok
                    'alter_link3'      => '#C0D003', //ok
                    'alter_hover3'     => '#AEBC01', //ok

                    // Extra blocks (submenu, tabs, color blocks, etc.)
                    'extra_bg_color'   => '#010221', //ok
                    'extra_bg_hover'   => '#161732',
                    'extra_bd_color'   => '#262740',
                    'extra_bd_hover'   => '#4E4F64',
                    'extra_text'       => '#8E8EAC', //ok
                    'extra_light'      => '#60607E',
                    'extra_dark'       => '#F7F7F8', //ok
                    'extra_link'       => '#AF62FE', //ok game
                    'extra_hover'      => '#F7F7F8', //ok
                    'extra_link2'      => '#FFC31F',
                    'extra_hover2'     => '#F2B202',
                    'extra_link3'      => '#C0D003',
                    'extra_hover3'     => '#AEBC01',

                    // Input fields (form's fields and textarea)
                    'input_bg_color'   => 'transparent', //ok
                    'input_bg_hover'   => 'transparent', //ok
                    'input_bd_color'   => '#E0E0E4', //ok
                    'input_bd_hover'   => '#C8C8CF', //ok
                    'input_text'       => '#79798F', //ok
                    'input_light'      => '#9D9DAC', //ok
                    'input_dark'       => '#161D21', //ok

                    // Inverse blocks (text and links on the 'text_link' background)
                    'inverse_bd_color' => '#67bcc1',
                    'inverse_bd_hover' => '#5aa4a9',
                    'inverse_text'     => '#161D21',
                    'inverse_light'    => '#333333',
                    'inverse_dark'     => '#161D21', //ok
                    'inverse_link'     => '#FFFFFF', //ok
                    'inverse_hover'    => '#FFFFFF', //ok

                    // Additional (skin-specific) colors.
                    // Attention! Set of colors must be equal in all color schemes.
                    //---> For example:
                    //---> 'new_color1'         => '#rrggbb',
                    //---> 'alter_new_color1'   => '#rrggbb',
                    //---> 'inverse_new_color1' => '#rrggbb',
                ),
            ),

            // Color scheme: 'fancy_dark'
            'fancy_dark'    => array(
                'title'    => esc_html__( 'Fancy Dark', 'prisma' ),
                'internal' => true,
                'colors'   => array(

                    // Whole block border and background
                    'bg_color'         => '#0D0D11', //ok
                    'bd_color'         => '#23232F', //ok

                    // Text and links colors
                    'text'             => '#A3A3B4', //ok
                    'text_light'       => '#898999', //ok
                    'text_dark'        => '#F7F7F8', //ok
                    'text_link'        => '#AF62FE', //ok game
                    'text_hover'       => '#9352D6', //ok game
                    'text_link2'       => '#FFC31F', //ok
                    'text_hover2'      => '#F2B202', //ok
                    'text_link3'       => '#C0D003', //ok
                    'text_hover3'      => '#AEBC01', //ok

                    // Alternative blocks (sidebar, tabs, alternative blocks, etc.)
                    'alter_bg_color'   => '#17171F', //ok
                    'alter_bg_hover'   => '#161732', //ok
                    'alter_bd_color'   => '#23232F', //ok
                    'alter_bd_hover'   => '#3B3B4D', //ok
                    'alter_text'       => '#A3A3B4', //ok
                    'alter_light'      => '#898999', //ok
                    'alter_dark'       => '#F7F7F8', //ok
                    'alter_link'       => '#AF62FE', //ok game
                    'alter_hover'      => '#9352D6', //ok game
                    'alter_link2'      => '#FFC31F', //ok
                    'alter_hover2'     => '#F2B202', //ok
                    'alter_link3'      => '#C0D003', //ok
                    'alter_hover3'     => '#AEBC01', //ok

                    // Extra blocks (submenu, tabs, color blocks, etc.)
                    'extra_bg_color'   => '#010221', //ok
                    'extra_bg_hover'   => '#161732',
                    'extra_bd_color'   => '#23232F',
                    'extra_bd_hover'   => '#3B3B4D',
                    'extra_text'       => '#A3A3B4', //ok
                    'extra_light'      => '#898999',
                    'extra_dark'       => '#F7F7F8', //ok
                    'extra_link'       => '#AF62FE', //ok game
                    'extra_hover'      => '#F7F7F8', //ok
                    'extra_link2'      => '#FFC31F',
                    'extra_hover2'     => '#F2B202',
                    'extra_link3'      => '#C0D003',
                    'extra_hover3'     => '#AEBC01',

                    // Input fields (form's fields and textarea)
                    'input_bg_color'   => '#transparent', //ok
                    'input_bg_hover'   => '#transparent', //ok
                    'input_bd_color'   => '#23232F', //ok
                    'input_bd_hover'   => '#3B3B4D', //ok
                    'input_text'       => '#9BA8AF', //ok
                    'input_light'      => '#898999', //ok
                    'input_dark'       => '#F7F7F8', //ok

                    // Inverse blocks (text and links on the 'text_link' background)
                    'inverse_bd_color' => '#e36650',
                    'inverse_bd_hover' => '#cb5b47',
                    'inverse_text'     => '#F7F7F8', //ok
                    'inverse_light'    => '#6f6f6f',
                    'inverse_dark'     => '#161D21', //ok
                    'inverse_link'     => '#FFFFFF', //ok
                    'inverse_hover'    => '#161D21', //ok

                    // Additional (skin-specific) colors.
                    // Attention! Set of colors must be equal in all color schemes.
                    //---> For example:
                    //---> 'new_color1'         => '#rrggbb',
                    //---> 'alter_new_color1'   => '#rrggbb',
                    //---> 'inverse_new_color1' => '#rrggbb',
                ),
            ),

            // Color scheme: 'fancy_light'
            'fancy_light' => array(
                'title'    => esc_html__( 'Fancy Light', 'prisma' ),
                'internal' => true,
                'colors'   => array(

                    // Whole block border and background
                    'bg_color'         => '#FFFFFF', //ok
                    'bd_color'         => '#E0E0E4', //ok

                    // Text and links colors
                    'text'             => '#79798F', //ok
                    'text_light'       => '#9D9DAC', //ok
                    'text_dark'        => '#161D21', //ok
                    'text_link'        => '#AF62FE', //ok game
                    'text_hover'       => '#9352D6', //ok game
                    'text_link2'       => '#FFC31F', //ok
                    'text_hover2'      => '#F2B202', //ok
                    'text_link3'       => '#C0D003', //ok
                    'text_hover3'      => '#AEBC01', //ok

                    // Alternative blocks (sidebar, tabs, alternative blocks, etc.)
                    'alter_bg_color'   => '#F7F7F8', //ok
                    'alter_bg_hover'   => '#EEEEF1', //ok
                    'alter_bd_color'   => '#E0E0E4', //ok
                    'alter_bd_hover'   => '#C8C8CF', //ok
                    'alter_text'       => '#79798F', //ok
                    'alter_light'      => '#9D9DAC', //ok
                    'alter_dark'       => '#161D21', //ok
                    'alter_link'       => '#AF62FE', //ok
                    'alter_hover'      => '#9352D6', //ok
                    'alter_link2'      => '#FFC31F', //ok
                    'alter_hover2'     => '#F2B202', //ok
                    'alter_link3'      => '#C0D003', //ok
                    'alter_hover3'     => '#AEBC01', //ok

                    // Extra blocks (submenu, tabs, color blocks, etc.)
                    'extra_bg_color'   => '#010221', //ok
                    'extra_bg_hover'   => '#161732',
                    'extra_bd_color'   => '#262740',
                    'extra_bd_hover'   => '#4E4F64',
                    'extra_text'       => '#8E8EAC', //ok
                    'extra_light'      => '#60607E',
                    'extra_dark'       => '#F7F7F8', //ok
                    'extra_link'       => '#AF62FE', //ok game
                    'extra_hover'      => '#F7F7F8', //ok
                    'extra_link2'      => '#FFC31F',
                    'extra_hover2'     => '#F2B202',
                    'extra_link3'      => '#C0D003',
                    'extra_hover3'     => '#AEBC01',

                    // Input fields (form's fields and textarea)
                    'input_bg_color'   => 'transparent', //ok
                    'input_bg_hover'   => 'transparent', //ok
                    'input_bd_color'   => '#E0E0E4', //ok
                    'input_bd_hover'   => '#C8C8CF', //ok
                    'input_text'       => '#79798F', //ok
                    'input_light'      => '#9D9DAC', //ok
                    'input_dark'       => '#161D21', //ok

                    // Inverse blocks (text and links on the 'text_link' background)
                    'inverse_bd_color' => '#67bcc1',
                    'inverse_bd_hover' => '#5aa4a9',
                    'inverse_text'     => '#161D21',
                    'inverse_light'    => '#333333',
                    'inverse_dark'     => '#161D21', //ok
                    'inverse_link'     => '#FFFFFF', //ok
                    'inverse_hover'    => '#FFFFFF', //ok

                    // Additional (skin-specific) colors.
                    // Attention! Set of colors must be equal in all color schemes.
                    //---> For example:
                    //---> 'new_color1'         => '#rrggbb',
                    //---> 'alter_new_color1'   => '#rrggbb',
                    //---> 'inverse_new_color1' => '#rrggbb',
                ),
            ),
		);
		prisma_storage_set( 'schemes', $schemes );
		prisma_storage_set( 'schemes_original', $schemes );

		// Add names of additional colors
		//---> For example:
		//---> prisma_storage_set_array( 'scheme_color_names', 'new_color1', array(
		//---> 	'title'       => __( 'New color 1', 'prisma' ),
		//---> 	'description' => __( 'Description of the new color 1', 'prisma' ),
		//---> ) );


		// Additional colors for each scheme
		// Parameters:	'color' - name of the color from the scheme that should be used as source for the transformation
		//				'alpha' - to make color transparent (0.0 - 1.0)
		//				'hue', 'saturation', 'brightness' - inc/dec value for each color's component
		prisma_storage_set(
			'scheme_colors_add', array(
				'bg_color_0'        => array(
					'color' => 'bg_color',
					'alpha' => 0,
				),
				'bg_color_02'       => array(
					'color' => 'bg_color',
					'alpha' => 0.2,
				),
				'bg_color_07'       => array(
					'color' => 'bg_color',
					'alpha' => 0.7,
				),
				'bg_color_08'       => array(
					'color' => 'bg_color',
					'alpha' => 0.8,
				),
				'bg_color_09'       => array(
					'color' => 'bg_color',
					'alpha' => 0.9,
				),
				'bd_color_065'       => array(
					'color' => 'bd_color',
					'alpha' => 0.65,
				),
				'alter_bg_color_07' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0.7,
				),
				'alter_bg_color_04' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0.4,
				),
				'alter_bg_color_00' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0,
				),
				'alter_bg_color_02' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0.2,
				),
				'alter_bd_color_02' => array(
					'color' => 'alter_bd_color',
					'alpha' => 0.2,
				),
                'alter_dark_015'     => array(
                    'color' => 'alter_dark',
                    'alpha' => 0.15,
                ),
                'alter_dark_02'     => array(
                    'color' => 'alter_dark',
                    'alpha' => 0.2,
                ),
                'alter_dark_05'     => array(
                    'color' => 'alter_dark',
                    'alpha' => 0.5,
                ),
                'alter_dark_08'     => array(
                    'color' => 'alter_dark',
                    'alpha' => 0.8,
                ),
				'alter_link_02'     => array(
					'color' => 'alter_link',
					'alpha' => 0.2,
				),
				'alter_link_07'     => array(
					'color' => 'alter_link',
					'alpha' => 0.7,
				),
				'extra_bg_color_05' => array(
					'color' => 'extra_bg_color',
					'alpha' => 0.5,
				),
				'extra_bg_color_07' => array(
					'color' => 'extra_bg_color',
					'alpha' => 0.7,
				),
				'extra_link_02'     => array(
					'color' => 'extra_link',
					'alpha' => 0.2,
				),
				'extra_link_07'     => array(
					'color' => 'extra_link',
					'alpha' => 0.7,
				),
                'text_dark_003'      => array(
                    'color' => 'text_dark',
                    'alpha' => 0.03,
                ),
                'text_dark_005'      => array(
                    'color' => 'text_dark',
                    'alpha' => 0.05,
                ),
                'text_dark_008'      => array(
                    'color' => 'text_dark',
                    'alpha' => 0.08,
                ),
				'text_dark_015'      => array(
					'color' => 'text_dark',
					'alpha' => 0.15,
				),
				'text_dark_02'      => array(
					'color' => 'text_dark',
					'alpha' => 0.2,
				),
                'text_dark_03'      => array(
                    'color' => 'text_dark',
                    'alpha' => 0.3,
                ),
                'text_dark_05'      => array(
                    'color' => 'text_dark',
                    'alpha' => 0.5,
                ),
				'text_dark_07'      => array(
					'color' => 'text_dark',
					'alpha' => 0.7,
				),
                'text_dark_08'      => array(
                    'color' => 'text_dark',
                    'alpha' => 0.8,
                ),
                'text_link_007'      => array(
                    'color' => 'text_link',
                    'alpha' => 0.07,
                ),
				'text_link_02'      => array(
					'color' => 'text_link',
					'alpha' => 0.2,
				),
                'text_link_03'      => array(
                    'color' => 'text_link',
                    'alpha' => 0.3,
                ),
				'text_link_04'      => array(
					'color' => 'text_link',
					'alpha' => 0.4,
				),
				'text_link_05'      => array(
					'color' => 'text_link',
					'alpha' => 0.5,
				),
				'text_link_07'      => array(
					'color' => 'text_link',
					'alpha' => 0.7,
				),
				'text_link2_08'      => array(
                    'color' => 'text_link2',
                    'alpha' => 0.8,
                ),
                'text_link2_007'      => array(
                    'color' => 'text_link2',
                    'alpha' => 0.07,
                ),
				'text_link2_02'      => array(
					'color' => 'text_link2',
					'alpha' => 0.2,
				),
                'text_link2_03'      => array(
                    'color' => 'text_link2',
                    'alpha' => 0.3,
                ),
				'text_link2_05'      => array(
					'color' => 'text_link2',
					'alpha' => 0.5,
				),
                'text_link3_007'      => array(
                    'color' => 'text_link3',
                    'alpha' => 0.07,
                ),
				'text_link3_02'      => array(
					'color' => 'text_link3',
					'alpha' => 0.2,
				),
                'text_link3_03'      => array(
                    'color' => 'text_link3',
                    'alpha' => 0.3,
                ),
                'inverse_text_03'      => array(
                    'color' => 'inverse_text',
                    'alpha' => 0.3,
                ),
                'inverse_link_08'      => array(
                    'color' => 'inverse_link',
                    'alpha' => 0.8,
                ),
                'inverse_hover_08'      => array(
                    'color' => 'inverse_hover',
                    'alpha' => 0.8,
                ),
				'text_dark_blend'   => array(
					'color'      => 'text_dark',
					'hue'        => 2,
					'saturation' => -5,
					'brightness' => 5,
				),
				'text_link_blend'   => array(
					'color'      => 'text_link',
					'hue'        => 2,
					'saturation' => -5,
					'brightness' => 5,
				),
				'alter_link_blend'  => array(
					'color'      => 'alter_link',
					'hue'        => 2,
					'saturation' => -5,
					'brightness' => 5,
				),
			)
		);

		// Simple scheme editor: lists the colors to edit in the "Simple" mode.
		// For each color you can set the array of 'slave' colors and brightness factors that are used to generate new values,
		// when 'main' color is changed
		// Leave 'slave' arrays empty if your scheme does not have a color dependency
		prisma_storage_set(
			'schemes_simple', array(
				'text_link'        => array(),
				'text_hover'       => array(),
				'text_link2'       => array(),
				'text_hover2'      => array(),
				'text_link3'       => array(),
				'text_hover3'      => array(),
				'alter_link'       => array(),
				'alter_hover'      => array(),
				'alter_link2'      => array(),
				'alter_hover2'     => array(),
				'alter_link3'      => array(),
				'alter_hover3'     => array(),
				'extra_link'       => array(),
				'extra_hover'      => array(),
				'extra_link2'      => array(),
				'extra_hover2'     => array(),
				'extra_link3'      => array(),
				'extra_hover3'     => array(),
			)
		);

		// Parameters to set order of schemes in the css
		prisma_storage_set(
			'schemes_sorted', array(
				'color_scheme',
				'header_scheme',
				'menu_scheme',
				'sidebar_scheme',
				'footer_scheme',
			)
		);

		// Color presets
		prisma_storage_set(
			'color_presets', array(
				'autumn' => array(
								'title'  => esc_html__( 'Autumn', 'prisma' ),
								'colors' => array(
												'default' => array(
																	'text_link'  => '#d83938',
																	'text_hover' => '#f2b232',
																	),
												'dark' => array(
																	'text_link'  => '#d83938',
																	'text_hover' => '#f2b232',
																	)
												)
							),
				'green' => array(
								'title'  => esc_html__( 'Natural Green', 'prisma' ),
								'colors' => array(
												'default' => array(
																	'text_link'  => '#75ac78',
																	'text_hover' => '#378e6d',
																	),
												'dark' => array(
																	'text_link'  => '#75ac78',
																	'text_hover' => '#378e6d',
																	)
												)
							),
			)
		);
	}
}

// Activation methods
if ( ! function_exists( 'prisma_skin_filter_activation_methods2' ) ) {
    add_filter( 'trx_addons_filter_activation_methods', 'prisma_skin_filter_activation_methods2', 11, 1 );
    function prisma_skin_filter_activation_methods2( $args ) {
        $args['elements_key'] = true;
        return $args;
    }
}

//Add new option
if ( ! function_exists( 'prisma_skin_add_page_lined_texture' ) ) {
    add_filter( 'after_setup_theme', 'prisma_skin_add_page_lined_texture', 3 );
    function prisma_skin_add_page_lined_texture() {
		prisma_storage_set_array_after(
			'options', 'remove_margins', array_merge(
				array(
					'lined_switch' => array(
						'title'    => esc_html__( 'Vertical Lines', 'prisma' ),
						'desc'     => wp_kses_data( __( 'Add decorative vertical lines through the page', 'prisma' ) ),
						"override" => array(
							'mode' => 'page',
							'section' => esc_html__('Content', 'prisma')
						),
						'refresh'  => false,
						'std'      => 0,
						'pro_only'   => PRISMA_THEME_FREE,
						'type'     => 'switch',
					)
				)
			)
		);
    }
}
// Add div with fixed background
if ( ! function_exists( 'prisma_skin_action_before_page_wrap' ) ) {
    add_action('prisma_action_before_page_wrap', 'prisma_skin_action_before_page_wrap');
    function prisma_skin_action_before_page_wrap()  {

        $lined_switch_on = prisma_is_on( prisma_get_theme_option( 'lined_switch' ) );
        $lined = ($lined_switch_on) ? 'lined_effect' : '';
        $lined_wrap = '<div class="'. $lined .'" > <span></span><span></span><span></span>' .'</div>';

        if  ( $lined_switch_on ) {
            prisma_show_layout($lined_wrap );
        }
    }
}

// Add theme specified classes to the body
if ( ! function_exists( 'prisma_skin_add_body_classes' ) ) {
    add_filter( 'body_class', 'prisma_skin_add_body_classes' );
    function prisma_skin_add_body_classes($classes) {
        if ( prisma_is_on( prisma_get_theme_option( 'lined_switch' )  ) ) {
            $classes[] = 'lined_bg';
        }
        return $classes;
    }
}
