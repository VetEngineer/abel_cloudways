<?php
/**
 * The template to display Admin notices
 *
 * @package PRISMA
 * @since PRISMA 1.0.1
 */

$prisma_theme_slug = get_option( 'template' );
$prisma_theme_obj  = wp_get_theme( $prisma_theme_slug );
?>
<div class="prisma_admin_notice prisma_welcome_notice notice notice-info is-dismissible" data-notice="admin">
	<?php
	// Theme image
	$prisma_theme_img = prisma_get_file_url( 'screenshot.jpg' );
	if ( '' != $prisma_theme_img ) {
		?>
		<div class="prisma_notice_image"><img src="<?php echo esc_url( $prisma_theme_img ); ?>" alt="<?php esc_attr_e( 'Theme screenshot', 'prisma' ); ?>"></div>
		<?php
	}

	// Title
	?>
	<h3 class="prisma_notice_title">
		<?php
		echo esc_html(
			sprintf(
				// Translators: Add theme name and version to the 'Welcome' message
				__( 'Welcome to %1$s v.%2$s', 'prisma' ),
				$prisma_theme_obj->get( 'Name' ) . ( PRISMA_THEME_FREE ? ' ' . __( 'Free', 'prisma' ) : '' ),
				$prisma_theme_obj->get( 'Version' )
			)
		);
		?>
	</h3>
	<?php

	// Description
	?>
	<div class="prisma_notice_text">
		<p class="prisma_notice_text_description">
			<?php
			echo str_replace( '. ', '.<br>', wp_kses_data( $prisma_theme_obj->description ) );
			?>
		</p>
		<p class="prisma_notice_text_info">
			<?php
			echo wp_kses_data( __( 'Attention! Plugin "ThemeREX Addons" is required! Please, install and activate it!', 'prisma' ) );
			?>
		</p>
	</div>
	<?php

	// Buttons
	?>
	<div class="prisma_notice_buttons">
		<?php
		// Link to the page 'About Theme'
		?>
		<a href="<?php echo esc_url( admin_url() . 'themes.php?page=prisma_about' ); ?>" class="button button-primary"><i class="dashicons dashicons-nametag"></i> 
			<?php
			echo esc_html__( 'Install plugin "ThemeREX Addons"', 'prisma' );
			?>
		</a>
	</div>
</div>
