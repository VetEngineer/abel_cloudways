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
<?php if(isset($settings['process']) && !empty($settings['process']) && count($settings['process'])): 
$image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full'; ?>
<div class="pxl-swiper-sliders pxl-process pxl-process-carousel1 pxl-process-layout1" <?php if($settings['drap']) : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'festiva'); ?>"<?php endif; ?>>
    <div class="pxl-carousel-inner">
        <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
            <div class="pxl-swiper-wrapper">
                <?php foreach ($settings['process'] as $key => $value):
                    $title = isset($value['title']) ? $value['title'] : '';
                    $step = isset($value['step']) ? $value['step'] : '';
                    $desc = isset($value['desc']) ? $value['desc'] : '';
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
                    <div class="pxl-swiper-slide <?php echo esc_attr($settings['pxl_animate']); ?> " data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                        <div class="pxl-item--inner">
                                <div class="pxl-item--step">
                                    <?php echo pxl_print_html($step); ?>
                                </div>
                            <div class="line">
                                <i class="fal fa-long-arrow-right"></i>
                            </div>
                            <div class="wrap-content">
                                <h5 class="pxl-item-title el-empty"><?php echo pxl_print_html($title); ?></h5>
                                <div class="pxl-item--description el-empty"><?php echo pxl_print_html($desc); ?></div>
                                <a  class="button-more"  <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="11" viewBox="0 0 13 11" fill="none">
                                        <g clip-path="url(#clip0_273_10764)">
                                            <path d="M9.03711 6.99023H0.00390625V4.98828H9.03711V6.99023ZM9.03711 6.99023L6.24414 9.70508C6.10091 9.84831 6.0293 10.0241 6.0293 10.2324C6.0293 10.4408 6.10417 10.6198 6.25391 10.7695C6.27344 10.7891 6.29622 10.8086 6.32227 10.8281C6.34831 10.8477 6.37435 10.8639 6.40039 10.877C6.43945 10.903 6.48014 10.9258 6.52246 10.9453C6.56478 10.9648 6.60872 10.9811 6.6543 10.9941H7.38672C7.46484 10.9746 7.53971 10.9437 7.61133 10.9014C7.68294 10.859 7.74805 10.8086 7.80664 10.75L11.791 6.55078C11.8236 6.51823 11.8512 6.48405 11.874 6.44824C11.8968 6.41244 11.918 6.375 11.9375 6.33594C11.9766 6.27734 12.0059 6.21712 12.0254 6.15527C12.0449 6.09342 12.0547 6.02669 12.0547 5.95508C12.0482 5.79883 11.9993 5.65723 11.9082 5.53027C11.8171 5.40332 11.6999 5.30729 11.5566 5.24219L7.80664 1.30664C7.61784 1.11784 7.3916 1.01204 7.12793 0.989258C6.86426 0.966472 6.62174 1.02669 6.40039 1.16992C6.22461 1.27409 6.10905 1.42708 6.05371 1.62891C5.99837 1.83073 6.02279 2.01953 6.12695 2.19531C6.14648 2.22786 6.16602 2.25553 6.18555 2.27832C6.20508 2.30111 6.22461 2.32552 6.24414 2.35156L9.03711 4.98828V6.99023Z" fill="#1C3F39"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_273_10764">
                                                <rect width="12.0469" height="10" fill="white" transform="matrix(1 0 0 -1 0 10.9844)"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    <?php echo pxl_print_html($btn_text); ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="11" viewBox="0 0 13 11" fill="none" style="transform: scaleX(-1);">
                                        <g clip-path="url(#clip0_273_10764)">
                                            <path d="M9.03711 6.99023H0.00390625V4.98828H9.03711V6.99023ZM9.03711 6.99023L6.24414 9.70508C6.10091 9.84831 6.0293 10.0241 6.0293 10.2324C6.0293 10.4408 6.10417 10.6198 6.25391 10.7695C6.27344 10.7891 6.29622 10.8086 6.32227 10.8281C6.34831 10.8477 6.37435 10.8639 6.40039 10.877C6.43945 10.903 6.48014 10.9258 6.52246 10.9453C6.56478 10.9648 6.60872 10.9811 6.6543 10.9941H7.38672C7.46484 10.9746 7.53971 10.9437 7.61133 10.9014C7.68294 10.859 7.74805 10.8086 7.80664 10.75L11.791 6.55078C11.8236 6.51823 11.8512 6.48405 11.874 6.44824C11.8968 6.41244 11.918 6.375 11.9375 6.33594C11.9766 6.27734 12.0059 6.21712 12.0254 6.15527C12.0449 6.09342 12.0547 6.02669 12.0547 5.95508C12.0482 5.79883 11.9993 5.65723 11.9082 5.53027C11.8171 5.40332 11.6999 5.30729 11.5566 5.24219L7.80664 1.30664C7.61784 1.11784 7.3916 1.01204 7.12793 0.989258C6.86426 0.966472 6.62174 1.02669 6.40039 1.16992C6.22461 1.27409 6.10905 1.42708 6.05371 1.62891C5.99837 1.83073 6.02279 2.01953 6.12695 2.19531C6.14648 2.22786 6.16602 2.25553 6.18555 2.27832C6.20508 2.30111 6.22461 2.32552 6.24414 2.35156L9.03711 4.98828V6.99023Z" fill="#1C3F39"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_273_10764">
                                                <rect width="12.0469" height="10" fill="white" transform="matrix(1 0 0 -1 0 10.9844)"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
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
