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
$gradient_from = !empty($settings['gradient_color_from']) ? $settings['gradient_color_from'] : '#E100A8';
$gradient_to = !empty($settings['gradient_color_to']) ? $settings['gradient_color_to'] : '#71009C';
?>
<?php if(isset($settings['team']) && !empty($settings['team']) && count($settings['team'])): ?>
<div class="pxl-grid pxl-team-grid pxl-team-grid3">
    <div class="pxl-grid-inner pxl-grid-masonry row" data-gutter="15">
        <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
        <?php foreach ($settings['team'] as $key => $value):
           $title = isset($value['title']) ? $value['title'] : '';
           $position = isset($value['position']) ? $value['position'] : '';
           $schedule = isset($value['schedule']) ? $value['schedule'] : '';
           $description = isset($value['description']) ? $value['description'] : '';
           $image = isset($value['image']) ? $value['image'] : '';
           $background_image = isset($value['background_image']) ? $value['background_image'] : '';
           $social = isset($value['social']) ? $value['social'] : '';
           $btn_text = isset($value['btn_text']) ? $value['btn_text'] : '';
           $link_key = $widget->get_repeater_setting_key( 'btn_link', 'value', $key );
           $image_size = !empty($settings['img_size']) ? $settings['img_size'] : '410x467';
           
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
                    </div>
                <?php } ?>
                <?php if(!empty($social)): ?>
                    <div class="pxl-social">
                        <div class="pxl--item">
                            <div class="pxl-item--social">
                                <?php  $team_social = json_decode($social, true);
                                foreach ($team_social as $value): ?>
                                    <a href="<?php echo esc_url($value['url']); ?>" target="_blank"><i class="<?php echo esc_attr($value['icon']); ?>"></i></a>
                                <?php endforeach; ?>
                            </div>
                            
                        </div>
                    </div>
                <?php endif; ?>
                <div class="pxl-item--holder">
                    <h5 class="pxl-item--title">    
                        <a <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                            <?php echo pxl_print_html($title); ?>
                        </a>
                    </h5>
                    <?php if (!empty ($position)) : ?>
                        <div class="pxl-item--position"><?php echo pxl_print_html($position); ?></div>
                    <?php endif; ?>
                    <?php if (!empty ($schedule)) : ?>
                        <div class="pxl-item--schedule"><?php echo pxl_print_html($schedule); ?></div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    <?php endforeach; ?>
</div>
</div>
<?php endif; ?>
