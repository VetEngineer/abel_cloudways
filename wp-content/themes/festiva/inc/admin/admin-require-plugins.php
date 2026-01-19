<?php
/**
 * Include the TGM_Plugin_Activation class.
 */
get_template_part( 'inc/admin/libs/tgmpa/class-tgm-plugin-activation' );

add_action( 'tgmpa_register', 'festiva_register_required_plugins' );
function festiva_register_required_plugins() {
    include( locate_template( 'inc/admin/demo-data/demo-config.php' ) );
    $pxl_server_info = apply_filters( 'pxl_server_info', ['plugin_url' => 'https://api.bravisthemes.com/plugins/'] ) ; 
    $default_path = $pxl_server_info['plugin_url'];  
    $images = get_template_directory_uri() . '/inc/admin/assets/img/plugins'; 
    $plugins = array(

        array(
            'name'               => esc_html__('Redux Framework', 'festiva'),
            'slug'               => 'redux-framework',
            'required'           => true,
            'logo'        => $images . '/redux.png',
            'description' => esc_html__( 'Build theme options and post, page options for WordPress Theme.', 'festiva' ),
        ),

        array(
            'name'               => esc_html__('Elementor', 'festiva'),
            'slug'               => 'elementor',
            'required'           => true,
            'logo'        => $images . '/elementor.png',
            'description' => esc_html__( 'Introducing a WordPress website builder, with no limits of design. A website builder that delivers high-end page designs and advanced capabilities', 'festiva' ),
        ),  

        array(
            'name'               => esc_html__('Bravis Addons', 'festiva'),
            'slug'               => 'bravis-addons',
            'source'             => 'bravis-addons.zip',
            'required'           => true,
            'logo'        => $images . '/bravis-logo.png',
            'description' => esc_html__( 'Main process and Powerful Elements Plugin, exclusively for Farmas WordPress Theme.', 'festiva' ),
        ),
        
        array(
            'name'               => esc_html__('Contact Form 7', 'festiva'),
            'slug'               => 'contact-form-7',
            'required'           => true,
            'logo'        => $images . '/contact-f7.png',
            'description' => esc_html__( 'Contact Form 7 can manage multiple contact forms, you can customize the form and the mail contents flexibly with simple markup', 'festiva' ),
        ),

        array(
            'name'               => esc_html__('One User Avatar', 'festiva'),
            'slug'               => 'one-user-avatar',
            'required'           => true,
            'logo'        => $images . '/avatar.png',
            'description' => esc_html__( 'One User Avatar enables you to use any photo uploaded into your Media Library as an avatar. ', 'festiva' ),
        ),

        array(
            'name'               => esc_html__('WooCommerce', 'festiva'),
            'slug'               => "woocommerce",
            'required'           => true,
            'logo'        => $images . '/woo.png',
            'description' => esc_html__( 'WooCommerce is the world’s most popular open-source eCommerce solution.', 'festiva' ),
        ),
    );
    $config = array(
        'default_path' => $default_path,           // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'is_automatic' => true,
    );

    tgmpa( $plugins, $config );
}