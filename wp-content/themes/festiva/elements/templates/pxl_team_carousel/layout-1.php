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

$gradient_from_1 = !empty($settings['svg_gradient_color_from_1']) ? $settings['svg_gradient_color_from_1'] : '#CF134C';
$gradient_to_1 = !empty($settings['svg_gradient_color_to_1']) ? $settings['svg_gradient_color_to_1'] : '#870970';
$gradient_from_2 = !empty($settings['svg_gradient_color_from_2']) ? $settings['svg_gradient_color_from_2'] : '#E100A8';
$gradient_to_2 = !empty($settings['svg_gradient_color_to_2']) ? $settings['svg_gradient_color_to_2'] : '#71009C';
?>
<?php if(isset($settings['team']) && !empty($settings['team']) && count($settings['team'])): 
$image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full'; ?>
<div class="pxl-swiper-sliders pxl-team pxl-team-carousel1 pxl-team-layout1 <?php echo esc_attr($settings['style_l1']); ?>" <?php if($settings['drap']) : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'festiva'); ?>"<?php endif; ?>>
    <div class="pxl-carousel-inner">
        <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
            <div class="pxl-swiper-wrapper">
                <?php foreach ($settings['team'] as $key => $value):
                    $title = isset($value['title']) ? $value['title'] : '';
                    $position = isset($value['position']) ? $value['position'] : '';
                    $image = isset($value['image']) ? $value['image'] : '';
                    $social = isset($value['social']) ? $value['social'] : '';
                    $btn_text = isset($value['btn_text']) ? $value['btn_text'] : '';
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
                    <div class="pxl-swiper-slide">
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
                                    <svg class="svg1" xmlns="http://www.w3.org/2000/svg" width="245" height="260" viewBox="0 0 245 260" fill="none">
                                        <path d="M151.677 9.13495C187.578 26.1242 221.729 81.9291 234.317 107.708C258.074 157.912 239.08 219.195 177.827 247.799C116.574 276.403 51.4405 251.264 19.7346 205.824C-11.9713 160.385 -1.89627 90.4308 28.8961 48.083C59.6884 5.73528 106.802 -12.1016 151.677 9.13495Z" fill="url(#paint0_linear_5195_543)" fill-opacity="0.5"/>
                                        <defs>
                                            <linearGradient id="paint0_linear_5195_543" x1="2.36824" y1="113.535" x2="245.632" y2="148.571" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="<?php echo pxl_print_html($gradient_from_1); ?>"/>
                                                    <stop offset="1" stop-color="<?php echo pxl_print_html($gradient_to_1); ?>"/>
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                    <svg class="svg2" xmlns="http://www.w3.org/2000/svg" width="255" height="237" viewBox="0 0 255 237" fill="none">
                                        <path opacity="0.6" d="M5.82693 134.168C18.9289 170.26 70.1475 208.338 94.119 222.865C140.878 250.43 202.642 237.972 236.588 181.832C270.534 125.692 252.32 60.7485 210.996 25.9984C169.671 -8.75169 100.301 -5.68119 55.8947 19.8988C11.4884 45.4788 -10.5506 89.0529 5.82693 134.168Z" fill="url(#paint0_linear_5195_544)"/>
                                        <defs>
                                            <linearGradient id="paint0_linear_5195_544" x1="122.471" y1="0.597884" x2="132.961" y2="237.595" gradientUnits="userSpaceOnUse">
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
