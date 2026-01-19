<?php
$html_id = pxl_get_element_id($settings);
$select_post_by = $widget->get_setting('select_post_by', '');
$source = $post_ids = [];
if($select_post_by === 'post_selected'){
    $post_ids = $widget->get_setting('source_'.$settings['post_type'].'_post_ids', '');
}else{
    $source  = $widget->get_setting('source_'.$settings['post_type'], '');
}
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
$settings['layout']    = $settings['layout_'.$settings['post_type']];
extract(pxl_get_posts_of_grid('event', [
    'source' => $source,
    'orderby' => $orderby,
    'order' => $order,
    'limit' => $limit,
    'post_ids' => $post_ids,
]));

$pxl_animate = $widget->get_setting('pxl_animate', '');
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

$arrows = $widget->get_setting('arrows', false);
$pagination = $widget->get_setting('pagination', false);
$pagination_type = $widget->get_setting('pagination_type', 'bullets');
$pause_on_hover = $widget->get_setting('pause_on_hover', false);
$autoplay = $widget->get_setting('autoplay', false);
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite', false);
$speed = $widget->get_setting('speed', '500');
$center = $widget->get_setting('center', false);
$drap = $widget->get_setting('drap', false);

$img_size = $widget->get_setting('img_size');
$show_button = $widget->get_setting('show_button');
$show_category = $widget->get_setting('show_category');
$show_date = $widget->get_setting('show_date');
$button_text = $widget->get_setting('button_text');
$pxl_title = $widget->get_setting('pxl_title');

$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => 1, 
    'slide_percolumnfill'           => 1, 
    'slide_mode'                    => 'slide', 
    'slides_to_show'                => $col_xl, 
    'slides_to_show_xxl'            => $col_xxl, 
    'slides_to_show_lg'             => $col_lg, 
    'slides_to_show_md'             => $col_md, 
    'slides_to_show_sm'             => $col_sm, 
    'slides_to_show_xs'             => $col_xs, 
    'slides_to_scroll'              => $slides_to_scroll,  
    'slides_gutter'                 => 30, 
    'arrow'                         => $arrows,
    'pagination'                    => $pagination,
    'pagination_type'               => $pagination_type,
    'autoplay'                      => $autoplay,
    'pause_on_hover'                => $pause_on_hover,
    'pause_on_interaction'          => true,
    'delay'                         => $autoplay_speed,
    'loop'                          => $infinite,
    'speed'                         => $speed,
    'center'                        => $center,
];

$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]); ?>

<?php if (is_array($posts)): ?>
    <div class="pxl-swiper-slider pxl-event-carousel pxl-event-carousel2 pxl-event-style2 <?php echo esc_attr($settings['event_style_l1']); ?>" <?php if($drap !== false): ?>data-cursor-drap="<?php echo esc_html('DRAG', 'festiva'); ?>"<?php endif; ?>>
        <div class="pxl-carousel-inner">
            <?php if(!empty($pxl_title)) : ?>
                <div class="pxl--title <?php if($settings['pxl_animate_tt'] !== 'wow letter') { echo esc_attr($settings['pxl_animate_tt']); } ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                    <?php echo esc_attr($settings['pxl_title']) ?>
                </div>
            <?php endif; ?>
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php
                    foreach ($posts as $post):
                        $event_main_color = get_post_meta($post->ID, 'event_main_color', true);
                        $event_excerpt = get_post_meta($post->ID, 'event_excerpt', true);
                        $event_external_link = get_post_meta($post->ID, 'event_external_link', true);
                        $event_icon_type = get_post_meta($post->ID, 'event_icon_type', true);
                        $event_icon_font = get_post_meta($post->ID, 'event_icon_font', true);
                        $event_icon_img = get_post_meta($post->ID, 'event_icon_img', true);
                        $event_date = get_post_meta($post->ID, 'event_date', true);
                        $images_size = !empty($img_size) ? $img_size : '410x514';
                        $event_category = !empty($event_category) ? $event_category : 'conference';

                        ?>
                        <div class="pxl-swiper-slide">
                            <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                            <?php $img_id = get_post_thumbnail_id($post->ID);
                            if($img_id) {
                                $img = pxl_get_image_by_size( array(
                                    'attach_id'  => $img_id,
                                    'thumb_size' => $images_size,
                                    'class' => 'no-lazyload',
                                ));
                                $thumbnail = $img['thumbnail'];
                            } else {
                                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
                            } ?>
                            <div class="pxl--item <?php echo esc_attr($settings['bg_items_color']); ?>">
                                <div class="pxl-item--featured">
                                    <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"></a>
                                    <?php echo wp_kses_post($thumbnail); ?>
                                </div>
                            <?php endif; ?>
                            <div class="pxl--inner">
                                <?php if($show_date == 'true') : ?>
                                    <div class="pxl-schedule <?php echo pxl_print_html($settings['bg_color_type']); ?>">
                                        <?php if (!empty($event_date)) : ?>
                                            <i class="far fa-calendar-alt"></i>
                                            <?php echo pxl_print_html($event_date);?> 
                                        <?php endif;?>
                                    </div>
                                <?php endif; ?> 
                                <h3 class="pxl-item--title">
                                    <a href="<?php if(!empty($event_external_link)) { echo esc_url($event_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>"><?php echo pxl_print_html(get_the_title($post->ID)); ?></a>
                                </h3> 
                            </div>
                        </div>    
                    </div>    
                <?php endforeach; ?>
            </div> 
        </div>
        <?php if($pagination !== false): ?>
            <div class="pxl-swiper-dots style-1"></div>
        <?php endif; ?>

        <?php if($arrows !== false): ?>
            <div class="pxl-swiper-arrow-wrap style-1 <?php echo pxl_print_html($settings['arrows_position']); ?>">
                <div class="pxl-swiper-arrow pxl-swiper-arrow-prev">
                   <svg id="fi_2223615" enable-background="new 0 0 64 64" height="20" viewBox="0 0 64 64" width="50" xmlns="http://www.w3.org/2000/svg"><path d="m54 30h-39.899l15.278-14.552c.8-.762.831-2.028.069-2.828-.761-.799-2.027-.831-2.828-.069l-17.448 16.62c-.755.756-1.172 1.76-1.172 2.829 0 1.068.417 2.073 1.207 2.862l17.414 16.586c.387.369.883.552 1.379.552.528 0 1.056-.208 1.449-.621.762-.8.731-2.065-.069-2.827l-15.342-14.552h39.962c1.104 0 2-.896 2-2s-.896-2-2-2z" fill="#2562FF"></path></svg>
               </div>
               <div class="pxl-swiper-arrow pxl-swiper-arrow-next">
                   <svg id="fi_2223684" enable-background="new 0 0 64 64" height="20" viewBox="0 0 64 64" width="50" xmlns="http://www.w3.org/2000/svg"><path d="m37.38 12.552c-.799-.761-2.064-.731-2.828.068-.762.8-.731 2.066.068 2.828l15.341 14.552h-39.961c-1.104 0-2 .896-2 2s.896 2 2 2h39.892l-15.272 14.552c-.8.762-.83 2.028-.068 2.828.393.412.921.62 1.448.62.496 0 .992-.183 1.38-.552l17.445-16.625c.758-.758 1.175-1.76 1.175-2.823s-.417-2.065-1.21-2.858z" fill="#2562FF"></path></svg>                      
               </div>
           </div>
       <?php endif; ?>
   </div>

</div>
<?php endif; ?>