<article <?php post_class( 'post_item_single post_item_404' ); ?>>
	<div class="post_content">
		<h1 class="page_title"> <span class="first"> <?php esc_html_e( '4', 'prisma' ) ?> </span> 
		 <img src="<?php echo esc_url( prisma_get_file_url( '/images/404-image.png' ) ); ?>" 
		 alt=" <?php esc_attr_e( '404', 'prisma' ); ?>" >
		 <span class="second"> <?php esc_html_e( '4', 'prisma' ); ?> </span>
		</h1>
		<div class="page_info">
			<h2 class="page_subtitle"><?php esc_html_e( 'Oops...', 'prisma' ); ?></h2>
			<p class="page_description"><?php echo wp_kses( __( "We're sorry, but <br>something went wrong.", 'prisma' ), 'prisma_kses_content' ); ?></p>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="go_home sc_button sc_button_bordered color_style_dark"><?php esc_html_e( 'Homepage', 'prisma' ); ?></a>
		</div>
	</div>
</article>