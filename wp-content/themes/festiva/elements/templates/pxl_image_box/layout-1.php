<?php if ( !empty($settings['image']['id']) ) : 
    $image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';
    $img  = pxl_get_image_by_size( array(
        'attach_id'  => $settings['image']['id'],
        'thumb_size' => $image_size,
    ) );
    $thumbnail    = $img['thumbnail'];
    $thumbnail_url    = $img['url'];

    if ( ! empty( $settings['link']['url'] ) ) {
        $widget->add_render_attribute( 'button', 'href', $settings['link']['url'] );

        if ( $settings['link']['is_external'] ) {
            $widget->add_render_attribute( 'button', 'target', '_blank' );
        }

        if ( $settings['link']['nofollow'] ) {
            $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
        }
    }

    if($settings['img_effect'] == 'pxl-image-parallax') { wp_enqueue_script( 'pxl-parallax-move-mouse'); }
    ?>


    <div class="pxl-image-box pxl-image-box1 <?php if(!empty($settings['img_effect'])) { echo esc_attr($settings['img_effect']); } ?> <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms" <?php if($settings['img_effect'] == 'pxl-image-tilt') : ?>data-maxtilt="<?php echo esc_attr($settings['max_tilt']); ?>" data-speedtilt="<?php echo esc_attr($settings['speed_tilt']); ?>" data-perspectivetilt="<?php echo esc_attr($settings['perspective_tilt']); ?>"<?php endif; ?> <?php if($settings['img_effect'] == 'pxl-parallax-scroll') : ?>data-parallax='{"<?php echo esc_attr($settings['parallax_scroll_type']); ?>":<?php echo esc_attr($settings['parallax_scroll_value_x']); ?>}'<?php endif; ?>>
        <div class="pxl-item--inner">
            <?php if($settings['image_type'] == 'img') : ?>
                <div class="pxl-item--image"  data-parallax-value="<?php echo esc_attr($settings['parallax_value']); ?>">
                    <?php echo wp_kses_post($thumbnail); ?>
                </div>
            <?php endif; ?>

            <?php if($settings['image_type'] == 'bg') : ?>
                <div class="pxl-item--bg bg-image" style="background-image: url(<?php echo esc_url($thumbnail_url); ?>);"></div>
            <?php endif; ?>

        <?php endif; ?>
        <div class="pxl-item--holder">

            <<?php echo esc_attr($settings['title_tag']); ?> class="pxl-item--title el-empty"><?php echo pxl_print_html($settings['title']); ?></<?php echo esc_attr($settings['title_tag']); ?>>
            <?php if ( !empty($settings['sub_title'])) : ?>
                <div class="pxl-item--sub">
                    <a <?php pxl_print_html($widget->get_render_attribute_string( 'button' )); ?>> <?php echo pxl_print_html($settings['sub_title']); ?></a>
                </div>
            <?php endif; ?>
        </div>
        
        
    </div>
</div>