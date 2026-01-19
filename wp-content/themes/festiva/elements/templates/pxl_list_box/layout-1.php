<?php 
$active = intval($settings['active']);
?>
<?php if(isset($settings['list_box']) && !empty($settings['list_box']) && count($settings['list_box'])): 
$is_new = \Elementor\Icons_Manager::is_migration_allowed(); ?>
<div class="pxl-listbox pxl-listbox-1  <?php echo pxl_print_html($settings['pxl-type-list'])?> <?php echo pxl_print_html($settings['pxl-layout-list'])?> <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <?php 
    $image_size = !empty($settings['img_size']) ? $settings['img_size'] : '270x182';
    ?>
    <?php foreach ($settings['list_box'] as $key => $content) : 
     $is_active = ($key + 1) == $active;
     $link_key = $widget->get_repeater_setting_key( 'link', 'value', $key );
     if ( ! empty( $content['link']['url'] ) ) {
        $widget->add_render_attribute( $link_key, 'href', $content['link']['url'] );

        if ( $content['link']['is_external'] ) {
            $widget->add_render_attribute( $link_key, 'target', '_blank' );
        }

        if ( $content['link']['nofollow'] ) {
            $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
        }
    }
    $link_attributes = $widget->get_render_attribute_string( $link_key );
    ?>
    <div class="pxl-content--lb <?php echo esc_attr($is_active ? 'active' : ''); ?>">
        <?php if ( !empty($content['image']['id']) ) : ?>
            <?php $img  = pxl_get_image_by_size( array(
                'attach_id'  => $content['image']['id'],
                'thumb_size' => $image_size,
            ) );
            $thumbnail    = $img['thumbnail'];
            $thumbnail_url    = $img['url'];
            ?>
            <div class="pxl-content--img"  style="background-image: url(<?php echo esc_url($thumbnail_url); ?>);"></div>
        <?php endif; ?>
        <div class="pxl-number">
            <?php $number = $key + 1;
            $formatted_number = ($key < 9) ? '0'.$number : $number;
            echo esc_attr($formatted_number);?>
        </div>
        <div class="pxl-author">
            <div class="pxl-author--name">
                <div class="pxl-first--name"><?php echo pxl_print_html($content['author_fisrtname']); ?></div>
                <div class="pxl-last--name"><?php echo pxl_print_html($content['author_lastname']); ?></div>
            </div>
            <div class="pxl--position">
                <?php echo pxl_print_html($content['position']); ?>
            </div>     
        </div>
        <a <?php echo implode('' ,[$link_attributes]); ?>></a>
    </div>
<?php endforeach; ?>
</div>
<?php endif; ?>