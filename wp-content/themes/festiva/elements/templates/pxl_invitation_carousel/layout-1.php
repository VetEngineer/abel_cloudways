<?php
$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');
$col_xxl = $widget->get_setting('col_xxl', '');
if($col_xxl == 'inherit') {
	$col_xxl = $col_xl;
}
$slides_to_scroll = $widget->get_setting('slides_to_scroll', '');
$arrows = $widget->get_setting('arrows','false');  
$pagination = $widget->get_setting('pagination','false');
$pagination_type = $widget->get_setting('pagination_type','bullets');
$pause_on_hover = $widget->get_setting('pause_on_hover');
$autoplay = $widget->get_setting('autoplay', '');
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite','false');  
$speed = $widget->get_setting('speed', '500');
$opts = [
	'slide_direction'               => 'horizontal',
	'slide_percolumn'               => '1', 
	'slide_mode'                    => 'slide', 
	'slides_to_show'                => $col_xl, 
	'slides_to_show_xxl'             => $col_xxl, 
	'slides_to_show_lg'             => $col_lg, 
	'slides_to_show_md'             => $col_md, 
	'slides_to_show_sm'             => $col_sm, 
	'slides_to_show_xs'             => $col_xs, 
	'slides_to_scroll'              => $slides_to_scroll,
	'arrow'                         => $arrows,
	'pagination'                    => $pagination,
	'pagination_type'               => $pagination_type,
	'autoplay'                      => $autoplay,
	'pause_on_hover'                => $pause_on_hover,
	'pause_on_interaction'          => 'true',
	'delay'                         => $autoplay_speed,
	'loop'                          => $infinite,
	'speed'                         => $speed
];
$widget->add_render_attribute( 'carousel', [
	'class'         => 'pxl-swiper-container',
	'dir'           => is_rtl() ? 'rtl' : 'ltr',
	'data-settings' => wp_json_encode($opts)
]);
if(isset($settings['invitation']) && !empty($settings['invitation']) && count($settings['invitation'])): ?>
	<div class="pxl-swiper-sliders pxl-invitation-carousel pxl-invitation-carousel1">
		<div class="pxl-carousel-inner">
			<div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
				<div class="pxl-swiper-wrapper">
					<?php foreach ($settings['invitation'] as $key => $value):
						$title = isset($value['title']) ? $value['title'] : '';
						$link_key = $widget->get_repeater_setting_key( 'link', 'value', $key );
						if ( ! empty( $value['link']['url'] ) ) {
							$widget->add_render_attribute( $link_key, 'href', $value['link']['url'] );

							if ( $value['link']['is_external'] ) {
								$widget->add_render_attribute( $link_key, 'target', '_blank' );
							}

							if ( $value['link']['nofollow'] ) {
								$widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
							}
						}
						$link_attributes = $widget->get_render_attribute_string( $link_key );
						?>
						<div class="pxl-swiper-slide">
							<div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
								<div class="pxl-inner--stage">
									<?php if (!empty($value['stage'])): ?>
										<?php echo pxl_print_html($value['stage']); ?>
									<?php endif ?>
								</div>
								<div class="pxl-inner--title">
									<?php if (!empty($value['title'])): ?>
										<a <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php echo pxl_print_html($value['title']); ?></a>
									<?php endif ?>
								</div>
								<div class="pxl-inner--describe">
									<?php if (!empty($value['describe'])): ?>
										<?php echo pxl_print_html($value['describe']); ?>
									<?php endif ?>
								</div>

								<div class="pxl-number">
									<?php 
									$number = $key + 1;
									$formatted_number = ($key < 9) ? '0'.$number : $number;
									echo esc_attr($formatted_number);
									?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<?php if($pagination !== 'false'): ?>
				<div class="pxl-swiper-dots style-1"></div>
			<?php endif; ?>

			<?php if($arrows !== 'false'): ?>
				<div class="pxl-swiper-arrow-wrap">
					<div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><i class="caseicon-angle-arrow-left rtl-icon"></i></div>
					<div class="pxl-swiper-arrow pxl-swiper-arrow-next"><i class="caseicon-angle-arrow-right rtl-icon"></i></div>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>
