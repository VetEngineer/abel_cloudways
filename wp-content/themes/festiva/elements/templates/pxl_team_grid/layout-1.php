<?php
$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');

$col_xl = 12 / intval($col_xl);
$col_lg = 12 / intval($col_lg);
$col_md = 12 / intval($col_md);
$col_sm = 12 / intval($col_sm);
$col_xs = 12 / intval($col_xs);

$grid_sizer = "col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';
$gradient_from_1 = !empty($settings['gradient_color_from_1']) ? $settings['gradient_color_from_1'] : '#CF134C';
$gradient_to_1 = !empty($settings['gradient_color_to_1']) ? $settings['gradient_color_to_1'] : '#870970';
$gradient_from_2 = !empty($settings['gradient_color_from_2']) ? $settings['gradient_color_from_2'] : '#E100A8';
$gradient_to_2 = !empty($settings['gradient_color_to_2']) ? $settings['gradient_color_to_2'] : '#71009C';
?>
<?php if(isset($settings['team']) && !empty($settings['team']) && count($settings['team'])): ?>
<div class="pxl-grid pxl-team-grid pxl-team-grid1 pxl-team-layout1">
    <div class="pxl-grid-inner pxl-grid-masonry row" data-gutter="15">

        <?php foreach ($settings['team'] as $key => $value):
         $title = isset($value['title']) ? $value['title'] : '';
         $position = isset($value['position']) ? $value['position'] : '';
         $image = isset($value['image']) ? $value['image'] : '';
         $social = isset($value['social']) ? $value['social'] : '';
         $link_key = $widget->get_repeater_setting_key( 'btn_link', 'value', $key );
         if ( ! empty( $value['btn_link']['url'] ) ) {
            $widget->add_render_attribute( $link_key, 'href', $value['btn_link']['url'] );

            if ( $value['btn_link']['is_external'] ) {
                $widget->add_render_attribute( $link_key, 'target', '_blank' );
            }

            if ( $value['btn_link']['nofollow'] ) {
                $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
            }
        }
        $link_attributes = $widget->get_render_attribute_string( $link_key );
        ?>
        <div class="<?php echo esc_attr($item_class); ?>">
            <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>">
              <?php if(!empty($image['id'])) { 
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $image['id'],
                    'thumb_size' => $image_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
                ?>
                <div class="pxl-item--image">
                 <a <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                    <?php echo wp_kses_post($thumbnail); ?>
                </a>
                <div class="pxl-item--svg">
                    <svg class="svg1"xmlns="http://www.w3.org/2000/svg" width="374" height="399" viewBox="0 0 374 399" fill="none">
                        <path d="M232.116 14.42C287.115 40.4478 339.435 125.941 358.72 165.435C395.116 242.348 366.017 336.234 272.177 380.056C178.336 423.878 78.5518 385.364 29.978 315.75C-18.5958 246.136 -3.16069 138.966 44.0135 74.0889C91.1877 9.21171 163.366 -18.1146 232.116 14.42Z" fill="url(#paint0_linear_5151_1797)" fill-opacity="0.5"/>
                        <defs>
                            <linearGradient id="paint0_linear_5151_1797" x1="3.37258" y1="174.362" x2="376.055" y2="228.037" gradientUnits="userSpaceOnUse">
                                <stop stop-color="<?php echo pxl_print_html($gradient_from_1); ?>"/>
                                <stop offset="1" stop-color="<?php echo pxl_print_html($gradient_to_1); ?>"/>
                            </linearGradient>
                        </defs>
                    </svg>
                    <svg class="svg2" xmlns="http://www.w3.org/2000/svg" width="390" height="364" viewBox="0 0 390 364" fill="none">
                        <path opacity="0.6" d="M8.5364 205.548C28.6088 260.841 107.076 319.177 143.801 341.434C215.436 383.662 310.059 364.577 362.065 278.57C414.07 192.564 386.167 93.069 322.857 39.8315C259.548 -13.4061 153.272 -8.70203 85.2407 30.4868C17.2098 69.6756 -16.5541 136.432 8.5364 205.548Z" fill="url(#paint0_linear_5151_1798)"/>
                        <defs>
                            <linearGradient id="paint0_linear_5151_1798" x1="187.236" y1="0.917583" x2="203.307" y2="364" gradientUnits="userSpaceOnUse">
                                <stop stop-color="<?php echo pxl_print_html($gradient_from_2); ?>"/>
                                <stop offset="1" stop-color="<?php echo pxl_print_html($gradient_to_2); ?>"/>
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
            </div>
        <?php } ?>
        <div class="pxl-item--holder pxl-item--front">
            <h5 class="pxl-item--title">    
                <a <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                    <?php echo pxl_print_html($title); ?>
                </a>
            </h5>
            <div class="pxl-item--position"><?php echo pxl_print_html($position); ?></div>
            <?php if(!empty($social)): ?>
                <div class="pxl-item--social">
                    <?php  $team_social = json_decode($social, true);
                    foreach ($team_social as $value): ?>
                        <a href="<?php echo esc_url($value['url']); ?>" target="_blank"><i class="<?php echo esc_attr($value['icon']); ?>"></i></a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?> 

        </div>
    </div>
</div>
<?php endforeach; ?>
<div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
</div>
</div>
<?php endif; ?>
