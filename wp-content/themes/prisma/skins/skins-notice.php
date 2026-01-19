<?php
/**
 * The template to display Admin notices
 *
 * @package PRISMA
 * @since PRISMA 1.0.64
 */

$prisma_skins_url  = get_admin_url( null, 'admin.php?page=trx_addons_theme_panel#trx_addons_theme_panel_section_skins' );
$prisma_skins_args = get_query_var( 'prisma_skins_notice_args' );
?>
<div class="prisma_admin_notice prisma_skins_notice notice notice-info is-dismissible" data-notice="skins">
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
		<?php esc_html_e( 'New skins are available', 'prisma' ); ?>
	</h3>
	<?php

	// Description
	$prisma_total      = $prisma_skins_args['update'];	// Store value to the separate variable to avoid warnings from ThemeCheck plugin!
	$prisma_skins_msg  = $prisma_total > 0
							// Translators: Add new skins number
							? '<strong>' . sprintf( _n( '%d new version', '%d new versions', $prisma_total, 'prisma' ), $prisma_total ) . '</strong>'
							: '';
	$prisma_total      = $prisma_skins_args['free'];
	$prisma_skins_msg .= $prisma_total > 0
							? ( ! empty( $prisma_skins_msg ) ? ' ' . esc_html__( 'and', 'prisma' ) . ' ' : '' )
								// Translators: Add new skins number
								. '<strong>' . sprintf( _n( '%d free skin', '%d free skins', $prisma_total, 'prisma' ), $prisma_total ) . '</strong>'
							: '';
	$prisma_total      = $prisma_skins_args['pay'];
	$prisma_skins_msg .= $prisma_skins_args['pay'] > 0
							? ( ! empty( $prisma_skins_msg ) ? ' ' . esc_html__( 'and', 'prisma' ) . ' ' : '' )
								// Translators: Add new skins number
								. '<strong>' . sprintf( _n( '%d paid skin', '%d paid skins', $prisma_total, 'prisma' ), $prisma_total ) . '</strong>'
							: '';
	?>
	<div class="prisma_notice_text">
		<p>
			<?php
			// Translators: Add new skins info
			echo wp_kses_data( sprintf( __( "We are pleased to announce that %s are available for your theme", 'prisma' ), $prisma_skins_msg ) );
			?>
		</p>
	</div>
	<?php

	// Buttons
	?>
	<div class="prisma_notice_buttons">
		<?php
		// Link to the theme dashboard page
		?>
		<a href="<?php echo esc_url( $prisma_skins_url ); ?>" class="button button-primary"><i class="dashicons dashicons-update"></i> 
			<?php
			esc_html_e( 'Go to Skins manager', 'prisma' );
			?>
		</a>
		<?php
		// Dismiss notice for 7 days
		?>
		<a href="#" role="button" class="button button-secondary prisma_notice_button_dismiss" data-notice="skins"><i class="dashicons dashicons-no-alt"></i> 
			<?php
			esc_html_e( 'Dismiss', 'prisma' );
			?>
		</a>
		<?php
		// Hide notice forever
		?>
		<a href="#" role="button" class="button button-secondary prisma_notice_button_hide" data-notice="skins"><i class="dashicons dashicons-no-alt"></i> 
			<?php
			esc_html_e( 'Never show again', 'prisma' );
			?>
		</a>
	</div>
</div>
