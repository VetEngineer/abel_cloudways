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
    <div class="pxl-swiper-sliders pxl-testimonial-carousel pxl-testimonial-carousel1 <?php echo esc_attr($settings['style_l1']); ?>" <?php if($drap !== 'false') : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'festiva'); ?>"<?php endif; ?>>
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['testimonial'] as $key => $value):
                        $name_author = isset($value['name_author']) ? $value['name_author'] : '';
                        $position = isset($value['position']) ? $value['position'] : '';
                        $desc = isset($value['desc']) ? $value['desc'] : '';
                        $image = isset($value['image']) ? $value['image'] : '';
                        $star = isset($value['star']) ? $value['star'] : '';
                        ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                                <?php if (!empty($image['id'])) :
                                    $img = pxl_get_image_by_size([
                                        'attach_id'  => $image['id'],
                                        'thumb_size' => 'full',
                                        'class'      => 'no-lazyload',
                                    ]);
                                    $thumbnail = $img['thumbnail'];
                                    ?>
                                    <div class="pxl-item--image">
                                        <div class="item--image">
                                            <?php echo wp_kses_post($thumbnail); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="pxl-item--holder">
                                    <div class="pxl-item--star pxl-item--<?php echo esc_attr($star); ?>-star">
                                        <?php for ($i = 0; $i < $star; $i++) : ?>
                                            <i class="fas fa-star"></i>
                                        <?php endfor; ?>
                                    </div>
                                    <h5 class="pxl-name--author el-empty"><?php echo esc_html($name_author); ?></h5>
                                    <div class="pxl-item--position el-empty"><?php echo esc_html($position); ?></div>
                                    <div class="pxl-item--desc el-empty"><?php echo esc_html($desc); ?></div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <?php if($pagination !== 'false'): ?>
            <div class="pxl-swiper-pagination">
                <div class="pxl-swiper-dots style-3"></div>
            </div>
        <?php endif; ?>

        <?php if($arrows !== 'false'): ?>
           <div class="pxl-swiper-arrow-wrap style-1">
            <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><svg xmlns="http://www.w3.org/2000/svg" width="11" height="18" viewBox="0 0 11 18" fill="none">
              <path d="M9.61523 0.922852L1.53831 8.99977L9.61523 16.4998" stroke="#505D7B" stroke-width="1.5"/>
          </svg>
      </div>
      <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><svg xmlns="http://www.w3.org/2000/svg" width="11" height="18" viewBox="0 0 11 18" fill="none">
          <path d="M1.38477 0.922852L9.46169 8.99977L1.38477 16.4998" stroke="#505D7B" stroke-width="1.5"/>
      </svg>
  </div>
</div>
<?php endif; ?>

</div>
<?php endif; ?>
