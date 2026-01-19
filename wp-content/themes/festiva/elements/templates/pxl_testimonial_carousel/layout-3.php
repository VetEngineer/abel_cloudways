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
$drap = $widget->get_setting('drap','false');  
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
    'pagination_number'             => 'true',
    'autoplay'                      => $autoplay,
    'pause_on_hover'                => $pause_on_hover,
    'pause_on_interaction'          => 'true',
    'delay'                         => $autoplay_speed,
    'loop'                          => $infinite,
    'speed'                         => $speed,
];
$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]);
if ( ! empty( $settings['link']['url'] ) ) {
    $widget->add_render_attribute( 'button', 'href', $settings['link']['url'] );

    if ( $settings['link']['is_external'] ) {
        $widget->add_render_attribute( 'button', 'target', '_blank' );
    }

    if ( $settings['link']['nofollow'] ) {
        $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
    }
}
if(isset($settings['testimonial']) && !empty($settings['testimonial']) && count($settings['testimonial'])): ?>
    <div class="pxl-swiper-sliders pxl-testimonial-carousel pxl-testimonial-carousel3 " <?php if($drap !== 'false') : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'festiva'); ?>"<?php endif; ?>>
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['testimonial'] as $key => $value):
                        $star = isset($value['star']) ? $value['star'] : '';
                        $desc = isset($value['desc']) ? $value['desc'] : '';
                        $image = isset($value['image']) ? $value['image'] : '';
                        $attendee = isset($value['attendee']) ? $value['attendee'] : '';
                        $name_author = isset($value['name_author']) ? $value['name_author'] : '';
                        $position = isset($value['position']) ? $value['position'] : '';
                        $editor_title = isset($value['testimonial_title']) ? $value['testimonial_title'] : '';
                        $editor_title = $widget->parse_text_editor( $editor_title );
                        ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                                <?php if(!empty($attendee['id'])) {
                                    $img_attendee = pxl_get_image_by_size( array(
                                        'attach_id'  => $attendee ['id'],
                                        'thumb_size' => '362x480',
                                        'class' => 'no-lazyload',
                                    ));
                                    $thumbnail_attendee = $img_attendee['thumbnail'];?>
                                    <div class="pxl-image-attendee">
                                        <?php echo wp_kses_post($thumbnail_attendee); ?>
                                    </div>
                                <?php } ?>
                                <div class="pxl-item--holder ">
                                    <?php if ($editor_title) : ?>
                                        <div class="pxl-item--title">
                                            <?php echo wp_kses_post($editor_title); ?>
                                        </div>
                                    <?php endif ?>
                                    <div class="pxl-item--desc el-empty">
                                        <?php echo pxl_print_html($desc); ?>
                                        <svg class="qoute-icon" xmlns="http://www.w3.org/2000/svg" width="102" height="89" viewBox="0 0 102 89" fill="none">
                                            <path d="M92.4375 44.5H76.5V57.2143C76.5 64.227 82.2176 69.9286 89.25 69.9286H90.8438C93.4934 69.9286 95.625 72.0542 95.625 74.6964V84.2321C95.625 86.8743 93.4934 89 90.8438 89H89.25C71.6391 89 57.375 74.7759 57.375 57.2143V9.53571C57.375 4.2712 61.6582 0 66.9375 0H92.4375C97.7168 0 102 4.2712 102 9.53571V34.9643C102 40.2288 97.7168 44.5 92.4375 44.5ZM35.0625 44.5H19.125V57.2143C19.125 64.227 24.8426 69.9286 31.875 69.9286H33.4688C36.1184 69.9286 38.25 72.0542 38.25 74.6964V84.2321C38.25 86.8743 36.1184 89 33.4688 89H31.875C14.2641 89 0 74.7759 0 57.2143V9.53571C0 4.2712 4.2832 0 9.5625 0H35.0625C40.3418 0 44.625 4.2712 44.625 9.53571V34.9643C44.625 40.2288 40.3418 44.5 35.0625 44.5Z" fill="#CDF5F0"/>
                                        </svg>
                                    </div>
                                    <div class="pxl-item--author">
                                        <?php if(!empty($image['id'])) { 
                                            $img = pxl_get_image_by_size( array(
                                                'attach_id'  => $image['id'],
                                                'thumb_size' => 'full',
                                                'class' => 'no-lazyload',
                                            ));
                                            $thumbnail = $img['thumbnail'];?>
                                            <div class="pxl-author--image">
                                                <?php echo wp_kses_post($thumbnail); ?>
                                            </div>
                                            <div class="pxl-author--info">
                                                <div class="pxl-name--author">
                                                    <?php echo pxl_print_html($name_author); ?>
                                                </div>
                                                <div class="pxl-item--position">
                                                    <?php echo pxl_print_html($position); ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php if ($settings['button_text']) : ?>
                    <div class="pxl--button pxl-mr-15">
                        <a <?php pxl_print_html($widget->get_render_attribute_string( 'button' )); ?>>
                            <span class="pxl--btn-text"><?php echo pxl_print_html($settings['button_text']); ?></span>
                        </a>
                    </div>
                <?php endif; ?>
                <?php if($pagination !== 'false'): ?>
                    <div class="pxl-swiper-pagination">
                        <div class="pxl-swiper-dots style-3"></div>
                    </div>
                <?php endif; ?>
            </div>
        </div>


        <?php if($arrows !== 'false'): ?>
         <div class="pxl-swiper-arrow-wrap style-3">
            <div class="pxl-swiper-arrow pxl-swiper-arrow-prev">
                <svg xmlns="http://www.w3.org/2000/svg" width="76" height="75" viewBox="0 0 76 75" fill="none">
                    <path d="M50.4074 37.3585L26.9551 37.3585M26.9551 37.3585L35.7497 29.0812M26.9551 37.3585L35.7497 45.6357" stroke="white" stroke-width="1.72443" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="pxl-swiper-arrow pxl-swiper-arrow-next">
                <svg xmlns="http://www.w3.org/2000/svg" width="76" height="75" viewBox="0 0 76 75" fill="none">
                    <path d="M25.6259 37.3585L49.0781 37.3585M49.0781 37.3585L40.2835 29.0812M49.0781 37.3585L40.2835 45.6357" stroke="white" stroke-width="1.72443" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>                                  
            </div>
        </div>
    <?php endif; ?>  
</div>
<?php endif; ?>
