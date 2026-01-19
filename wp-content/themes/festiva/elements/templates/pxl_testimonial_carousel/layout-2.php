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
if(isset($settings['testimonial']) && !empty($settings['testimonial']) && count($settings['testimonial'])): ?>
    <div class="pxl-swiper-sliders pxl-testimonial-carousel pxl-testimonial-carousel2 <?php echo esc_attr($settings['style_l1']); ?>" <?php if($drap !== 'false') : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'festiva'); ?>"<?php endif; ?>>
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
                        ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                                <div class="pxl-item--holder ">
                                    <div class="pxl-item--star pxl-item--<?php echo esc_attr($star); ?>-star">
                                        <?php for ($i = 0; $i < $star; $i++) : ?>
                                            <i class="fas fa-star"></i>
                                        <?php endfor; ?>
                                    </div>

                                    <div class="pxl-item--desc el-empty"><?php echo pxl_print_html($desc); ?></div>
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
                                    <div class="qoute-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="91" height="91" viewBox="0 0 91 91" fill="none">
                                            <g clip-path="url(#clip0_5127_3148)">
                                                <path d="M51.0588 51.1673V11.9365H90.2896V51.7278C90.2896 78.6289 65.0698 81.9916 65.0698 81.9916L61.7071 74.1454C61.7071 74.1454 72.9159 72.4641 75.1577 63.497C77.3995 56.7718 72.9159 51.1673 72.9159 51.1673H51.0588ZM0.619141 51.1673V11.9365H39.85V51.7278C39.85 78.6289 14.6301 81.9916 14.6301 81.9916L11.2675 74.1454C11.2675 74.1454 22.4763 72.4641 24.7181 63.497C26.9598 56.7718 22.4763 51.1673 22.4763 51.1673H0.619141Z" fill="white" fill-opacity="0.2"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_5127_3148">
                                                    <rect width="89.6705" height="89.6705" fill="white" transform="translate(0.619141 0.728516)"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                </div>

                                <?php if(!empty($attendee['id'])) {
                                    $img_attendee = pxl_get_image_by_size( array(
                                        'attach_id'  => $attendee ['id'],
                                        'thumb_size' => '523x634',
                                        'class' => 'no-lazyload',
                                    ));
                                    $thumbnail_attendee = $img_attendee['thumbnail'];?>
                                    <div class="pxl-image-attendee">
                                        <?php echo wp_kses_post($thumbnail_attendee); ?>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
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
    <?php if($pagination !== 'false'): ?>
        <div class="pxl-swiper-pagination">
            <div class="pxl-swiper-dots style-2"></div>
        </div>
    <?php endif; ?>       
</div>
<?php endif; ?>
