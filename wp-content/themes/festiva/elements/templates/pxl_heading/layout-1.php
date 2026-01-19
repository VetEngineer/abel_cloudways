<?php
use Elementor\Utils;
$html_id = pxl_get_element_id($settings);
$editor_title = $widget->get_settings_for_display( 'title' );
$editor_title = $widget->parse_text_editor( $editor_title ); 
$hightlight_list = $widget->get_settings('text_list');  
$list_array = [];
if(count($hightlight_list) > 0){
	foreach ($hightlight_list as $key => $list) {
		$list_array[] = $list['highlight_text'];
	}
}
?>
<div id="pxl-<?php echo esc_attr($html_id) ?>" class="pxl-heading <?php echo esc_attr($settings['title_typography_type']); ?>">
	<div class="pxl-heading--inner">

		<?php if(!empty($settings['sub_title'])) : ?>

		<div class="pxl-item--subtitle <?php echo esc_attr($settings['pxl_animate_sub']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay_sub']); ?>ms">
			<span class="pxl-item--subtext <?php if($settings['indentation'] === 'yes'){echo "pxl-indentation";} ?>">
				
				<?php echo esc_attr($settings['sub_title']); ?>
			</span>
		</div>
	<?php endif; ?>

	<<?php echo esc_attr($settings['title_tag']); ?> class="pxl-item--title  <?php echo esc_attr($settings['pxl_divider_title']) ?> <?php echo esc_attr($settings['title_color_type']) ?> <?php if($settings['pxl_animate'] !== 'wow letter') { echo esc_attr($settings['pxl_animate']); } ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">


	<?php if($settings['source_type'] == 'text' && !empty($editor_title)) {
		if($settings['pxl_animate'] == 'wow letter') {
			$arr_str = explode(' ', $editor_title); ?>
			<span class="pxl-item--text">
				<?php foreach ($arr_str as $index => $value) {
					$arr_str[$index] = '<span class="pxl-text--slide"><span class="'.$settings['pxl_animate'].'">' . $value . '</span></span>';
				}
				$str = implode(' ', $arr_str);
				echo wp_kses_post($str); ?>
			</span>
		<?php } else {
			echo wp_kses_post($editor_title);
		} 
	}

	elseif($settings['source_type'] == 'title') {
		$titles = festiva()->page->get_title();
		if(!empty($_GET['blog_title'])) {
			$blog_title = $_GET['blog_title'];
			$custom_title = explode('_', $blog_title);
			foreach ($custom_title as $index => $value) {
				$arr_str_b[$index] = $value;
			}
			$str = implode(' ', $arr_str_b);
			echo wp_kses_post($str);
		} else {
			echo pxl_print_html($titles['title']);
		}
	}?>
	<?php 
	if(!empty($list_array)){
		?>
		<span class="heading-highlight typewrite" data-period="3500" data-type="<?php echo esc_attr(json_encode($list_array)); ?>">
			<span class="wrap"></span>
		</span>
		<span class="typed-cursor">|</span>
		<?php
	}
	?>		
	</<?php echo esc_attr($settings['title_tag']); ?>>

</div>
</div>