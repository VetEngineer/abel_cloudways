<?php 
$html_id = pxl_get_element_id($settings);
$gradient_from = !empty($settings['gradient_color_from']) ? $settings['gradient_color_from'] : '#E91A83';
$gradient_to = !empty($settings['gradient_color_to']) ? $settings['gradient_color_to'] : '#4C24C1';
?>

<div id="pxl-<?php echo esc_attr($html_id) ?>" class="pxl-get--ticket">

	<div class="pxl-ticket--inner">
		<?php if (!empty($settings['title_ticket'])) : ?>
			<div class="pxl-ticket">
				<div class="pxl-title--ticket">
					<?php echo pxl_print_html($settings['title_ticket']); ?>
				</div>
				<div class="bg-title-ticket">
					<svg xmlns="http://www.w3.org/2000/svg" width="127" height="38" viewBox="0 0 127 38" fill="none">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M0 0H22.3129C23.6028 3.47931 26.9516 5.9589 30.8797 5.9589C34.8077 5.9589 38.1565 3.47931 39.4464 0H53.6284C54.9182 3.47931 58.2671 5.9589 62.1951 5.9589C66.1231 5.9589 69.472 3.47931 70.7618 0H83.5788C85.0705 3.01544 88.1782 5.08902 91.7703 5.08902C95.3623 5.08902 98.4701 3.01544 99.9618 0H127V38H100.48C99.3114 34.3031 95.8538 31.6233 91.7703 31.6233C87.6868 31.6233 84.2292 34.3031 83.0601 38H70.5803C69.177 34.7599 65.9508 32.4932 62.1951 32.4932C58.4394 32.4932 55.2132 34.7599 53.8099 38H39.2648C37.8616 34.7599 34.6353 32.4932 30.8797 32.4932C27.124 32.4932 23.8978 34.7599 22.4945 38H0V0Z" fill="url(#paint0_linear_5115_1094)"/>
						<defs>
							<linearGradient id="paint0_linear_5115_1094" x1="0" y1="19" x2="127" y2="19" gradientUnits="userSpaceOnUse">
								<stop stop-color= "<?php echo pxl_print_html($gradient_from); ?>"/>
									<stop offset="1" stop-color= "<?php echo pxl_print_html($gradient_to); ?>"/>
									</linearGradient>
								</defs>
							</svg>
						</div>
					</div>
				<?php endif; ?>

				<div class="pxl-content">
					<?php if (!empty($settings['price'])) : ?>
						<div class="pxl-price--inner">
							<?php echo pxl_print_html($settings['price']); ?>
						</div>
					<?php endif; ?>
					<?php if (!empty($settings['object'])) : ?>
						<div class="pxl-object">
							<?php echo pxl_print_html($settings['object']); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>