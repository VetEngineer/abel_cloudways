<?php 
if ( ! empty( $settings['contact_link']['url'] ) ) {
    $widget->add_render_attribute( 'contact', 'href', $settings['contact_link']['url'] );

    if ( $settings['contact_link']['is_external'] ) {
        $widget->add_render_attribute( 'contact', 'target', '_blank' );
    }

    if ( $settings['contact_link']['nofollow'] ) {
        $widget->add_render_attribute( 'contact', 'rel', 'nofollow' );
    }
}
?>

<?php
$col_xs = $widget->get_setting('col_xs', '1');
$col_sm = $widget->get_setting('col_sm', '1');
$col_md = $widget->get_setting('col_md', '1');
$col_lg = $widget->get_setting('col_lg', '1');
$col_xl = $widget->get_setting('col_xl', '1');
$col_xxl = $widget->get_setting('col_xxl', '1');
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
    'slide_mode'                    => 'fade', 
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
if(isset($settings['items']) && !empty($settings['items']) && count($settings['items'])): ?>
    <div class="pxl-swiper-sliders pxl-slider pxl-slider1">
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['items'] as $key => $value):
                        $total_keys = $key + 1;
                        $date = isset($value['date']) ? $value['date'] : '';
                        $title = isset($value['title']) ? $value['title'] : '';
                        $button = isset($value['button']) ? $value['button'] : '';
                        $image = isset($value['img_feature']) ? $value['img_feature'] : '';
                        $image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';
                        $img = pxl_get_image_by_size( array(
                            'attach_id'  => $image['id'],
                            'thumb_size' => $image_size,
                            'class' => 'no-lazyload',
                        ));
                        $thumbnail_url    = $img['url'];

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
                                <div class="pxl-content--left">
                                    <div class="pxl-group--item">
                                        <?php if (!empty($date)) : ?>
                                            <div class="pxl-item--date">
                                                <?php echo pxl_print_html($date); ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($title)) : ?>
                                            <div class="pxl-item--title">
                                                <?php echo pxl_print_html($title); ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($button)) : ?>
                                            <div class="pxl-item--button">
                                                <a <?php echo implode('', [$link_attributes]) ; ?>><?php echo pxl_print_html($button); ?></a>
                                            </div>
                                        <?php endif; ?>

                                    </div>

                                </div>

                                <div class="pxl-content--right">
                                    <div class="pxl-item--image" style="background-image: url(<?php echo esc_url($thumbnail_url); ?>);">
                                    </div>
                                    <div class="pxl-bg--image">
                                        <?php pxl_print_html(svg_obj()); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="pxl-item--contact">
                <a <?php pxl_print_html($widget->get_render_attribute_string( 'contact' )); ?> > <?php pxl_print_html($settings['contact']); ?></a>

            </div>
            <?php if ($pagination !== 'false'): ?>
                <div class="swipder-dot">
                    <div class="pxl-swiper-fraction pxl-swiper-fraction-first">01</div>
                    <div class="pxl-swiper-dots style-2"></div>
                    <div class="pxl-swiper-fraction pxl-swiper-fraction-last">
                        <?php echo esc_attr($total_keys <= 9) ? '0' . $total_keys : $total_keys;    ?>
                    </div>
                </div>
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
