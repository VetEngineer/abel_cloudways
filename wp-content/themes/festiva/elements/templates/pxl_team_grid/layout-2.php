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
$image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';
$gradient_from = !empty($settings['gradient_color_from']) ? $settings['gradient_color_from'] : '#E100A8';
$gradient_to = !empty($settings['gradient_color_to']) ? $settings['gradient_color_to'] : '#71009C';
?>
<?php if(isset($settings['team']) && !empty($settings['team']) && count($settings['team'])): ?>
<div class="pxl-grid pxl-team-grid pxl-team-grid2">
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
                <div class="pxl-item--background">
                    <div class="background-front">
                        <svg xmlns="http://www.w3.org/2000/svg" width="406" height="463" viewBox="0 0 406 463">
                            <path d="M414 287.93C223.72 266.793 54.7168 87.4585 -6 0.433594V480.434H414V287.93Z" fill="white" fill-opacity="0.06"/>
                        </svg>
                    </div>
                    <div class="background-back">
                        <div class="background-top">
                            <svg xmlns="http://www.w3.org/2000/svg" width="406" height="464" viewBox="0 0 406 464" fill="none">
                                <path d="M414 288.364C223.72 267.226 54.7168 87.8921 -6 0.867188V480.867H414V288.364Z" fill="url(#paint0_linear_5292_2077)"/>
                                <defs>
                                    <linearGradient id="paint0_linear_5292_2077" x1="204" y1="0.867187" x2="204" y2="480.867" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="<?php echo pxl_print_html($gradient_from); ?>"/>
                                            <stop offset="1" stop-color=" <?php echo pxl_print_html($gradient_to); ?>"/>
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                                <div class="background-below">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="406" height="430" viewBox="0 0 406 430">
                                    <path opacity="0.7" d="M391.405 258.587C284.492 116.441 83.9211 27.5463 -3 0.867188V429.867H424V306.61C419.111 298.072 405.747 276.516 391.405 258.587Z" fill="#FF2883" fill-opacity="0.4"/>
                                </svg>  
                            </div>
                        </div>

                    </div>
                    <?php if(!empty($social)): ?>
                        <div class="pxl-social">
                            <div class="pxl--item">
                                <div class="pxl-button--social">
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                            <rect x="0.125" y="7.68066" width="17.124" height="2.85401" fill="#E0E2E5"/>
                                            <rect x="10.1133" y="0.545654" width="17.124" height="2.85401" transform="rotate(90 10.1133 0.545654)" fill="#E0E2E5"/>
                                        </svg>
                                    </a>
                                </div>

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
                        <?php endif ?>
                        <?php if (!empty ($schedule)) : ?>
                            <div class="pxl-item--schedule"><?php echo pxl_print_html($schedule); ?></div>
                        <?php endif ?>

                    </div>

                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>
