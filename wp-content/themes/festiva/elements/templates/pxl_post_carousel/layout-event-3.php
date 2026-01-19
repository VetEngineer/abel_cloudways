<?php
$html_id = pxl_get_element_id($settings);
$select_post_by = $widget->get_setting('select_post_by', '');

if ($select_post_by === 'post_selected') {
    $post_ids = $widget->get_setting('source_'.$settings['post_type'].'_post_ids', '');
} else {
    $source = $widget->get_setting('source_'.$settings['post_type'], '');
}

$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
$settings['layout'] = $settings['layout_'.$settings['post_type']];

extract(pxl_get_posts_of_grid('event', [
    'source' => $source,
    'orderby' => $orderby,
    'order' => $order,
    'limit' => $limit,
    'post_ids' => $post_ids,
]));

$opts = [
    'slide_direction' => 'horizontal',
    'slide_percolumn' => 1,
    'slide_percolumnfill' => 1,
    'slide_mode' => 'slide',
    'slides_to_show' => (int)$widget->get_setting('col_xl', ''),
    'slides_to_show_xxl' => (int)$widget->get_setting('col_xxl', ''),
    'slides_to_show_lg' => (int)$widget->get_setting('col_lg', ''),
    'slides_to_show_md' => $widget->get_setting('col_md', ''),
    'slides_to_show_sm' => $widget->get_setting('col_sm', ''),
    'slides_to_show_xs' => $widget->get_setting('col_xs', ''),
    'slides_to_scroll' => $widget->get_setting('slides_to_scroll', ''),
    'slides_gutter' => 30,
    'arrow' => $widget->get_setting('arrows', false),
    'pagination' => $widget->get_setting('pagination', false),
    'pagination_type' => $widget->get_setting('pagination_type', 'bullets'),
    'autoplay' => $widget->get_setting('autoplay', false),
    'pause_on_hover' => $widget->get_setting('pause_on_hover', false),
    'pause_on_interaction' => true,
    'delay' => $widget->get_setting('autoplay_speed', 5000),
    'loop' => $widget->get_setting('infinite', false),
    'speed' => $widget->get_setting('speed', 500),
];

$widget->add_render_attribute('carousel', [
    'class' => 'pxl-swiper-container',
    'dir' => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts),
]);

$i = 0;

$show_button = $widget->get_setting('show_button', '');
$button_text = !empty($settings['button_text']) ? $settings['button_text'] : 'Learn More';
$show_date = !empty($settings['show_date']) ? $settings['show_date'] : '';

?>

<?php if (is_array($posts)): ?>
    <div class="pxl-swiper-slider pxl-event-carousel pxl-event-carousel3 pxl-event-style3 <?php echo esc_attr($settings['layout']); ?>">
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string('carousel')); ?>>
                <div class="pxl-swiper-wrapper">
                    <div class="pxl-swiper-slide">
                        <?php foreach ($posts as $key => $post) : ?>
                            <?php
                            $event_time = get_post_meta($post->ID, 'event_time', true);
                            $event_date = get_post_meta($post->ID, 'event_date', true);
                            $event_summary = get_post_meta($post->ID, 'event_summary', true);
                            $img_size = $widget->get_setting('img_size', '270x321');

                            $thumbnail = '';
                            if (has_post_thumbnail($post->ID)) {
                                $thumbnail = pxl_get_image_by_size([
                                    'attach_id' => get_post_thumbnail_id($post->ID),
                                    'thumb_size' => $img_size,
                                ]);
                            }
                            ?>
                            <div class="pxl--item <?php echo esc_attr($animate); ?>" data-wow-duration="1.2s">
                                <?php if (!empty($thumbnail['thumbnail'])) : ?>
                                    <div class="pxl-post--featured hover-imge-effect2 <?php echo esc_attr($image_overlay); ?>">
                                        <a class="pxl-image--link" href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                            <?php echo wp_kses_post($thumbnail['thumbnail']); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <div class="pxl--inner">
                                    <h3 class="pxl-item--title <?php echo pxl_print_html($style_color_title) ?>">
                                        <a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php echo pxl_print_html(get_the_title($post->ID)); ?></a>
                                    </h3>
                                    <div class="meta-content">
                                        <?php if ($show_date) : ?>
                                            <div class="pxl-schedule">
                                                <?php if (!empty($event_time)) : ?>
                                                    <div class="pxl-event--time">
                                                        <i class="far fa-clock"></i>
                                                        <?php echo pxl_print_html($event_time); ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (!empty($event_date)) : ?>
                                                    <div class="pxl-event--date">
                                                        <i class="far fa-calendar-alt"></i>
                                                        <?php echo pxl_print_html($event_date); ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php if (!empty($event_summary)) : ?>
                                            <div class="pxl-item--summary">
                                                <?php echo pxl_print_html($event_summary); ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ($show_button) : ?>
                                            <div class="pxl-item--button">
                                                <a href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                                    <?php echo pxl_print_html($button_text); ?>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php $i++; ?>
                            <?php if ($i % 2 == 0 && $i != count($posts)) : ?>
                            </div><div class="pxl-swiper-slide">
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php if($pagination !== false): ?>
                <div class="pxl-swiper-dots style-3"></div>
            <?php endif; ?>

            <?php if ($opts['arrow']) : ?>
                <div class="pxl-swiper-arrow-wrap <?php echo esc_attr($arrow_style); ?>">
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><i class="caseicon-angle-arrow-left rtl-icon"></i></div>
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><i class="caseicon-angle-arrow-right rtl-icon"></i></div>
                </div>
            <?php endif; ?>

        </div>
    </div>
    <?php endif; ?>