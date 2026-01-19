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
?>
<?php if(isset($settings['team']) && !empty($settings['team']) && count($settings['team'])): 
$image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full'; ?>
<div class="pxl-swiper-sliders pxl-team pxl-team-carousel2 pxl-team-layout2" <?php if($settings['drap']) : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'festiva'); ?>"<?php endif; ?>>
    <div class="pxl-carousel-inner">
        <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
            <div class="pxl-swiper-wrapper">
                <?php foreach ($settings['team'] as $key => $value):
                    $title = isset($value['title']) ? $value['title'] : '';
                    $position = isset($value['position']) ? $value['position'] : '';
                    $description = isset($value['description']) ? $value['description'] : '';
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
                        <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                            <?php if(!empty($value['image']['id'])) { 
                                $img = pxl_get_image_by_size( array(
                                    'attach_id'  => $value['image']['id'],
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
                            <div class="pxl-item--holder">

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
                            <?php if (!empty($description)): ?>
                                <div class="pxl-item--description">
                                    <?php echo pxl_print_html($description); ?>
                                </div>
                            <?php endif; ?>
                            <div class="background-svg">
                                <svg class="svg1" xmlns="http://www.w3.org/2000/svg" width="143" height="144" viewBox="0 0 143 144" fill="none">
                                    <path opacity="0.05" fill-rule="evenodd" clip-rule="evenodd" d="M18.1248 58.6731C7.6733 48.2215 7.6733 31.217 18.1248 20.7654C28.5764 10.3139 45.5809 10.3139 56.0273 20.7654L62.6507 27.3889L82.7063 7.33334C87.2488 2.7934 93.2882 0.290039 99.7135 0.290039H165.56L128.372 15.6961H99.7135C97.4031 15.6961 95.2335 16.5958 93.5985 18.2282L62.6507 49.176L45.135 31.6603C42.9107 29.4333 39.9979 28.3277 37.0773 28.3277C34.1568 28.3277 31.2414 29.4333 29.0144 31.6603C24.5736 36.1011 24.5736 43.3348 29.0144 47.7782L62.6438 81.405L103.653 40.3987L103.585 62.1198L62.583 103.119L62.5829 103.131L62.5769 103.125L62.5729 103.129L62.5761 103.133L37.8722 127.836L37.8725 127.836H66.5308C68.8412 127.836 71.0107 126.937 72.6457 125.304L103.594 94.3565L121.109 111.872C123.261 114.031 126.126 115.213 129.167 115.213C132.21 115.213 135.076 114.031 137.23 111.872C141.671 107.431 141.671 100.198 137.23 95.7542L103.591 62.1179L103.659 40.3987L148.119 84.8594C158.571 95.3109 158.571 112.315 148.119 122.767C137.668 133.219 120.663 133.219 110.217 122.767L103.594 116.144L83.538 136.199C78.998 140.739 72.9587 143.242 66.5308 143.242H0.681965L32.2486 130.166L0.677734 143.242L51.6803 92.2393L62.5628 103.119L62.5628 103.111L18.1248 58.6731ZM165.564 0.292831L114.559 51.2955L103.666 40.3997L128.37 15.6977L165.564 0.292831Z" fill="white"/>
                                </svg>
                                <svg class="svg-line" xmlns="http://www.w3.org/2000/svg" width="1" height="144" viewBox="0 0 1 144" fill="none">
                                    <rect opacity="0.2" x="0.00195312" width="1" height="144" fill="white"/>
                                </svg>
                                <div class="bg-blur"></div>
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
                <div class="pxl-swiper-arrow pxl-swiper-arrow-prev">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
                        <path d="M21.8999 12.541H4.18997" stroke="white" stroke-width="1.56535" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M11.3848 5.34619L4.19012 12.5408L11.3848 19.7355" stroke="white" stroke-width="1.56535" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="pxl-swiper-arrow pxl-swiper-arrow-next">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
                        <path d="M4.10013 12.541H21.81" stroke="white" stroke-width="1.56535" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M14.6152 5.34619L21.8099 12.5408L14.6152 19.7355" stroke="white" stroke-width="1.56535" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>
